<?php

namespace App\Http\Controllers;

use App\Models\Facility;
/*   */
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Gate;

class FacilityController extends Controller
{
    use AuthorizesRequests;

    public function index(Request $request)
    {
        $this->authorize('manegeFacility', Facility::class);
        $query = Facility::query();

        // search
        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where('room_name', 'like', "%{$search}%")
                ->orWhere('floor', 'like', "%{$search}%")
                ->orWhere('room_capacity', 'like', "%{$search}%");
        }

        $facilities = $query->paginate(10);

        $totalFacilities = Facility::count();

        return view('facilities.index', compact('facilities', 'totalFacilities'));
    }

    public function search(Request $request)
    {
        $query = Facility::query();

        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where('room_name', 'like', "%{$search}%")
                ->orWhere('floor', 'like', "%{$search}%")
                ->orWhere('room_capacity', 'like', "%{$search}%");
        }

        $facilities = $query->paginate(10);

        return view('facilities.partials.table', compact('facilities'))->render();
    }


    public function create()
    {
        $this->authorize('manegeFacility', Facility::class);
        return view('facilities.create');
    }


    public function store(Request $request)
    {
        $this->authorize('manegeFacility', Facility::class);
        $request->validate([
            'room_name' => 'required|string|max:255',
            'floor' => 'required|string|max:50',
            'room_capacity' => 'required|integer|min:1'
        ]);

        Facility::create($request->all());

        return redirect()->route('facilities.index')
            ->with('success', 'The facility has been successfully established.');
    }


    public function show(Facility $facility)
    {
        $this->authorize('manegeFacility', Facility::class);
        $facility->load('activities');
        return view('facilities.show', compact('facility'));
    }


    public function edit(Facility $facility)
    {
        $this->authorize('manegeFacility', Facility::class);
        return view('facilities.edit', compact('facility'));
    }


    public function update(Request $request, Facility $facility)
    {
        $this->authorize('manegeFacility', Facility::class);
        $request->validate([
            'room_name' => 'required|string|max:255',
            'floor' => 'required|string|max:50',
            'room_capacity' => 'required|integer|min:1'
        ]);

        $facility->update($request->all());

        return redirect()->route('facilities.index')
            ->with('success', 'The facility has been successfully updated.');
    }


    public function destroy(Facility $facility)
    {
        $this->authorize('manegeFacility', Facility::class);
        $facility->delete();

        return redirect()->route('facilities.index')
            ->with('success', 'The attachment has been successfully deleted.');
    }
}
