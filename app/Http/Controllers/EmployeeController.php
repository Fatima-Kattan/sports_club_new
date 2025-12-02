<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class EmployeeController extends Controller
{
    use AuthorizesRequests;

    public function index()
    {
        $user = Auth::user();

        $employees = Employee::with(['manager:id,full_name'])
            ->when(!$user->is_admin, function ($query) {
                return $query->where(function ($q) {
                    $q->where('role', 'coach');
                });
            })
            ->latest()
            ->get();

        return view('employees.index', compact('employees'));
    }

    public function create()
    {
        $this->authorize('manageEmployees', Employee::class);

        $managers = Employee::whereIn('position', ['manager', 'hr'])->get();
        return view('employees.create', compact('managers'));
    }

    public function store(Request $request)
    {
        $this->authorize('manageEmployees', Employee::class);

        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'mgr_id' => 'nullable|exists:employees,id',
            'salary' => 'required|numeric|min:0',
            'email' => 'required|email|unique:employees',
            'position' => 'required|string|max:255',
            'phone_number' => 'required|string|max:20|unique:employees',
            'specialization' => 'nullable|string|max:255',
            'working_hours_start' => 'required|date_format:H:i',
            'working_hours_end' => 'required|date_format:H:i|after:working_hours_start',
            'years_of_experience' => 'required|integer|min:0',
            'role' => 'required|in:coach,employee',
            'hire_date' => 'required|date',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);


        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('employees', 'public');
            $validated['image'] = $imagePath;
        }

        Employee::create($validated);

        return redirect()->route('employees.index')
            ->with('success', 'Employee added successfully');
    }

    public function show($id)
    {
        $user = Auth::user();
        $employee = Employee::with(['manager:id,full_name,email,position'])->findOrFail($id);

        
        if ($user->is_admin) {
            return view('employees.show', compact('employee'));
        } else {
            
            if ($employee->role === 'coach' ) {
                return view('employees.public_show', compact('employee'));
            } else {
                abort(403, 'You are not authorized to see the employee');
            }
        }
    }

    public function edit($id)
    {
        $employee = Employee::findOrFail($id);
        $this->authorize('manageEmployees', $employee);

        $managers = Employee::whereIn('position', ['manager', 'hr'])
            ->where('id', '!=', $id)
            ->orWhere('is_admin', true)
            ->get();

        return view('employees.edit', compact('employee', 'managers'));
    }

    public function update(Request $request, $id)
    {
        $employee = Employee::findOrFail($id);
        $this->authorize('manageEmployees', $employee);

        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'mgr_id' => 'required|exists:employees,id',
            'salary' => 'required|numeric|min:0',
            'email' => 'required|email|unique:employees,email,' . $id,
            'position' => 'required|string|max:255',
            'phone_number' => 'required|string|max:20|unique:employees,phone_number,' . $id,
            'specialization' => 'nullable|string|max:255',
            'working_hours_start' => 'required|date_format:H:i',
            'working_hours_end' => 'required|date_format:H:i|after:working_hours_start',
            'years_of_experience' => 'required|integer|min:0',
            'role' => 'required|in:coach,employee',
            'hire_date' => 'required|date',
            'image' => 'sometimes|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        
        if ($request->hasFile('image')) {
            
            if ($employee->image && Storage::disk('public')->exists($employee->image)) {
                Storage::disk('public')->delete($employee->image);
            }

            $imagePath = $request->file('image')->store('employees', 'public');
            $validated['image'] = $imagePath;
        } else {
            unset($validated['image']);
        }

        $employee->update($validated);

        return redirect()->route('employees.index')
            ->with('success','Employee data has been successfully updated');
    }

    public function destroy($id)
{
    $employee = Employee::findOrFail($id);
    $this->authorize('manageEmployees', $employee);

    
    $employee->delete(); 

    return redirect()->route('employees.index')
        ->with('success', 'The employee has been moved to the trash bin.');
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

        
        if ($employee->image && Storage::disk('public')->exists($employee->image)) {
            Storage::disk('public')->delete($employee->image);
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
