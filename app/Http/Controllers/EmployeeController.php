<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class EmployeeController extends Controller
{
    use AuthorizesRequests;

    public function index()
    {
        $this->authorize('manageEmployees', Employee::class);
        $employees = Employee::with(['manager:id,full_name'])
            ->oldest()
            ->get();

        return view('employees.index', compact('employees'));
    }

    public function create()
    {
        $this->authorize('manageEmployees', Employee::class);
        $user = Auth::user();
        $employee = Employee::where('email', $user->email)->first();
        if ($employee) {
            $this->authorize('manageEmployees', $employee);
        } else {
            $this->authorize('manageEmployees', Employee::class);
        }

        $managers = Employee::whereIn('position', ['manager', 'hr'])->get();
        if ($managers->isEmpty()) {
            $managers = collect();  
        }
        return view('employees.create', compact('managers')); 

    }

    public function store(Request $request)
    {
        $this->authorize('manageEmployees', Employee::class);
        $user = Auth::user();

        $employee = Employee::where('email', $user->email)->first();

        if ($employee) {
            $this->authorize('manageEmployees', $employee);
        } else {
            $this->authorize('manageEmployees', Employee::class);
        }

        $validated = $request->validate([
            // حقول الموظف
            'full_name'            => 'required|string|max:255',
            'mgr_id'               => 'nullable|exists:employees,id',
            'salary'               => 'required|numeric|min:0',
            'email'                => 'required|email|unique:employees|unique:users',
            'position'             => 'required|string|max:255',
            'phone_number'         => 'required|string|max:20|unique:employees|unique:users',
            'specialization'       => 'nullable|string|max:255',
            'working_hours_start'  => 'required|date_format:H:i',
            'working_hours_end'    => 'required|date_format:H:i|after:working_hours_start',
            'years_of_experience'  => 'required|integer|min:0',
            'role'                 => 'required|in:coach,employee',
            'hire_date'            => 'required|date',
            'image'                => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',

            // حقول المستخدم
            'password'             => 'required|string|min:8|confirmed',
            'birth_date'           => 'nullable|date',
            'gender'               => 'nullable|in:male,female',
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $imageName = time() . '_' . $file->getClientOriginalName();
            

            $file->move(public_path('/images/employees'), $imageName);

            File::copy(
                public_path('/images/employees/' . $imageName),
                public_path('/images/users/' . $imageName)
            );

            $validated['image'] =  'images/users/' . $imageName;
        }

        DB::transaction(function () use ($validated) {
            // إنشاء الموظف
            $employeeData = collect($validated)->only([
                'full_name',
                'mgr_id',
                'salary',
                'specialization',
                'email',
                'phone_number',
                'working_hours_start',
                'working_hours_end',
                'role',
                'position',
                'years_of_experience',
                'hire_date',
                'image'
            ])->toArray();

            $employee = Employee::create($employeeData);

            // إنشاء المستخدم
            $userData = collect($validated)->only([
                'full_name',
                'email',
                'phone_number',
                'birth_date',
                'gender',
                'is_admin',
                'image'
            ])->toArray();

            $userData['password'] = Hash::make($validated['password']);
            $userData['is_admin'] =  false;

            // تعبئة الحقول الخاصة
            $userData['email_verified_at'] = now();
            $userData['remember_token'] = Str::random(60);
            User::create($userData);
        });

        return redirect()->route('employees.index')
            ->with('success', 'Employee added successfully!');
    }


    public function show($id)
    {
        $user = Auth::user();
        $this->authorize('manageEmployees', Employee::class);
        $employee = Employee::withTrashed()
            ->with(['manager:id,full_name,email,position'])
            ->findOrFail($id);
        return view('employees.show', compact('employee'));
    }

    public function edit($id)
    {
        $employee = Employee::findOrFail($id);
        $this->authorize('manageEmployees', $employee);
        if (Auth::user()->email === $employee->email) {
            abort(403, 'لا يمكنك تعديل نفسك');
        }
        $managers = Employee::whereIn('position', ['manager', 'hr'])
            ->where('email', '!=', $employee->email)
            ->get();
        $user = User::where('email', $employee->email)->first();

        return view('employees.edit', compact('employee', 'managers', 'user'));
    }

    public function update(Request $request, $id)
    {
        $employee = Employee::findOrFail($id);
        $this->authorize('manageEmployees', $employee);
        $user = User::where('email', $employee->email)->first();
        $user_id=$user->id;
        
        $validated = $request->validate([
            // حقول الموظف
            'full_name'            => 'required|string|max:255',
            'mgr_id'               => 'nullable|exists:employees,id',
            'salary'               => 'required|numeric|min:0',
            'email'                => 'required|email|unique:employees,email,' . $id . '|unique:users,email,' . $user_id,
            'position'             => 'required|string|max:255',
            'phone_number'         => 'required|string|max:20|unique:employees,phone_number,' . $id . '|unique:users,phone_number,' . $user_id,
            'specialization'       => 'nullable|string|max:255',
            'working_hours_start'  => 'required|date_format:H:i',
            'working_hours_end'    => 'required|date_format:H:i|after:working_hours_start',
            'years_of_experience'  => 'required|integer|min:0',
            'role'                 => 'required|in:coach,employee',
            'hire_date'            => 'required|date',
            'image'                => 'sometimes|image|mimes:jpeg,png,jpg,gif|max:2048',
            // حقول المستخدم
            'password'             => 'nullable|string|min:8|confirmed',
            'birth_date'           => 'nullable|date',
            'gender'               => 'nullable|in:male,female',
        ]);
        if ($request->hasFile('image')) {
            if ($employee->image && File::exists(public_path( $employee->image))) {
                File::delete(public_path( $employee->image));
            }
            if ($employee->image && File::exists(public_path( $employee->image))) {
                File::delete(public_path( $employee->image));
            }
        
            $file = $request->file('image');
            $imageName = time() . '_' . $file->getClientOriginalName();
            
            $file->move(public_path('/images/employees'), $imageName);
            File::copy(
                public_path('/images/employees/' . $imageName),
                public_path('/images/users/' . $imageName)
            );

            $validated['image'] =  'images/users/' . $imageName;
        } else {
            $validated['image'] = $employee->image;
        }
        DB::transaction(function () use ($validated, $employee) {
            $employeeData = collect($validated)->only([
                'full_name',
                'mgr_id',
                'salary',
                'specialization',
                'email',
                'phone_number',
                'working_hours_start',
                'working_hours_end',
                'role',
                'position',
                'years_of_experience',
                'hire_date',
                'image'
            ])->toArray();
            $employee->update($employeeData);
            $user = User::where('email', $employee->email)->first();
            if ($user) {
                $userData = collect($validated)->only([
                    'full_name',
                    'email',
                    'phone_number',
                    'birth_date',
                    'gender',
                    'is_admin',
                    'image'
                ])->toArray();

                if (!empty($validated['password'])) {
                    $userData['password'] = Hash::make($validated['password']);
                }

                $userData['is_admin'] = false;

                $user->update($userData);
            }
        });
        return redirect()->route('employees.index')
            ->with('success', 'Employee data has been successfully updated');
    }

    public function destroy($id)
    {
        $employee = Employee::findOrFail($id);
        $this->authorize('manageEmployees', $employee);

        DB::transaction(function () use ($employee) {
            $user = User::where('email', $employee->email)->first();
            if ($user) {
                if ($user->image && File::exists(public_path($user->image))) {
                    File::delete(public_path($user->image));
                }
                $user->delete();
            }
            $employee->delete(); 
        });
        return redirect()->route('employees.index')
            ->with('success', 'Employee has been soft deleted and User has been permanently deleted');
    }


    public function trashed()
    {
        $this->authorize('manageEmployees', Employee::class);

        $employees = Employee::onlyTrashed()
            ->with(['manager:id,full_name'])
            ->latest()
            ->get();

        return view('employees.trashed', compact('employees'));
    }


    public function restore($id)
    {
        $employee = Employee::onlyTrashed()->findOrFail($id);
        $this->authorize('manageEmployees', $employee);

        $employee->restore();

        return redirect()->route('employees.trashed')
            ->with('success', 'The employee has been successfully reinstated.');
    }


    public function forceDelete($id)
    {
        $employee = Employee::onlyTrashed()->findOrFail($id);
        $this->authorize('manageEmployees', $employee);

        if ($employee->image && File::exists(public_path($employee->image))) {
            File::delete(public_path($employee->image));
        }

        $employee->forceDelete();

        return redirect()->route('employees.trashed')
            ->with('success', 'Employee permanently deleted successfully');
    }


    public function restoreAll()
    {
        $this->authorize('manageEmployees', Employee::class);

        Employee::onlyTrashed()->restore();

        return redirect()->route('employees.index')
            ->with('success', 'All deleted employees have been reinstated.');
    }


    public function emptyTrash()
    {
        $this->authorize('manageEmployees', Employee::class);

        $employees = Employee::onlyTrashed()->get();

        foreach ($employees as $employee) {

            if ($employee->image && Storage::disk('public')->exists($employee->image)) {
                Storage::disk('public')->delete($employee->image);
            }
            $employee->forceDelete();
        }

        return redirect()->route('employees.trashed')
            ->with('success', 'The recycle bin has been successfully emptied.');
    }


    public function coaches()
    {
        $coaches = Employee::with(['manager:id,full_name'])
            ->where('role', 'coach')
            ->latest()
            ->get();

        return view('employees.coaches', compact('coaches'));
    }




    public function search(Request $request)
    {
        $request->validate([
            'query' => 'required|string|min:2'
        ]);

        $query = $request->input('query');
        $user = Auth::user();

        $employees = Employee::with(['manager:id,full_name'])
            ->where(function ($q) use ($query, $user) {
                $q->where('full_name', 'LIKE', "%{$query}%")
                    ->orWhere('email', 'LIKE', "%{$query}%")
                    ->orWhere('position', 'LIKE', "%{$query}%")
                    ->orWhere('specialization', 'LIKE', "%{$query}%");


                if (!$user->is_admin) {
                    $q->where(function ($subQuery) {
                        $subQuery->where('role', 'coach');
                    });
                }
            })
            ->latest()
            ->get();

        return view('employees.search', compact('employees', 'query'));
    }
}
