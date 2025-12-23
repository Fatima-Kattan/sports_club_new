<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Employee;
use App\Models\Facility;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;

class ActivityController extends Controller
{
    use AuthorizesRequests;
    public function index(Request $request)
    {
        $search = $request->input('search');
        
        $activities = Activity::with('facility')
            ->when($search, function ($query, $search) {
                $query->where(function ($q) use ($search) {
                    $q->where('name', 'like', "%{$search}%")
                        ->orWhere('description', 'like', "%{$search}%")
                        ->orWhere('level', 'like', "%{$search}%");
                });
            })
            ->orderBy('id', 'desc')
            ->paginate(10);

        return view('activities.index', compact('activities', 'search'));
    }

    public function create()
    {
        $this->authorize('manageActivities', Activity::class);

        $facilities = Facility::all();
        return view('activities.create', compact('facilities'));
    }

    public function store(Request $request)
    {
        $this->authorize('manageActivities', Activity::class);

        $data = $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'nullable|string',
            'image'       => 'nullable|image|mimes:png,jpg,jpeg,webp',
            'free_time'   => 'required|boolean',
            'level'       => 'nullable|string|max:255',
            'is_active'   => 'required|boolean',
            'facility_id' => 'required|exists:facilities,id',
        ]);

        if ($request->hasFile('image')) {

            $file = $request->file('image');

            $imageName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)
                . '-' . time() . '.' . $file->getClientOriginalExtension();

            $file->move(public_path('/images/activities'), $imageName);

            $data['image'] = $imageName;
        }

        Activity::create($data);

        return redirect()->route('activities.index')
            ->with('success', 'Activity created successfully.');
    }

    public function show(Activity $activity)
    {
        $activity->load('facility');

        return view('activities.show', compact('activity'));
    }

    public function edit(Activity $activity)
    {
        $this->authorize('manageActivities', Activity::class);

        $facilities = Facility::all();
        return view('activities.edit', compact('activity', 'facilities'));
    }

    public function update(Request $request, $id)
    {
        $activity = Activity::findOrFail($id);
        $this->authorize('manageActivities', Activity::class);


        $validated = $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'nullable|string',
            'image'       => 'sometimes|image|mimes:jpeg,png,jpg,webp|max:2048',
            'free_time'   => 'required|boolean',
            'level'       => 'nullable|string|max:255',
            'is_active'   => 'required|boolean',
            'facility_id' => 'required|exists:facilities,id',
        ]);

        if ($request->hasFile('image')) {
            if ($activity->image && File::exists(public_path('/images/activities/' . $activity->image))) {
                File::delete(public_path('/images/activities/' . $activity->image));
            }

            $file = $request->file('image');

            $imageName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)
                . '-' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('/images/activities'), $imageName);

            $validated['image'] = $imageName;
        } else {
            $validated['image'] = $activity->image;
        }

        $activity->update($validated);

        return redirect()->route('activities.index')
            ->with('success', 'Activity updated successfully.');
    }

    public function destroy($id)
    {
        $activity = Activity::findOrFail($id);
        $this->authorize('manageActivities', Activity::class);


        if ($activity->image && File::exists(public_path('/images/activities/' . $activity->image))) {
            File::delete(public_path('/images/activities/' . $activity->image));
        }

        $activity->delete();

        return redirect()->route('activities.index')
            ->with('success', 'Activity deleted successfully.');
    }
}
