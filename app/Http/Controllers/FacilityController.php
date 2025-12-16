<?php

namespace App\Http\Controllers;

use App\Models\Facility;
use Illuminate\Http\Request;

class FacilityController extends Controller
{

    public function index(Request $request)
    {
        $query = Facility::query();

        // البحث
        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where('room_name', 'like', "%{$search}%")
                ->orWhere('floor', 'like', "%{$search}%")
                ->orWhere('room_capacity', 'like', "%{$search}%");
        }

        $facilities = $query->paginate(10);

        $totalFacilities = Facility::count(); // احسب العدد الكلي

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
        return view('facilities.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'room_name' => 'required|string|max:255',
            'floor' => 'required|string|max:50',
            'room_capacity' => 'required|integer|min:1'
        ]);

        Facility::create($request->all());

        return redirect()->route('facilities.index')
            ->with('success', 'تم إنشاء المرفق بنجاح.');
    }


    public function show(Facility $facility)
    {
        $facility->load('activities');
        return view('facilities.show', compact('facility'));
    }


    public function edit(Facility $facility)
    {
        return view('facilities.edit', compact('facility'));
    }


    public function update(Request $request, Facility $facility)
    {
        $request->validate([
            'room_name' => 'required|string|max:255',
            'floor' => 'required|string|max:50',
            'room_capacity' => 'required|integer|min:1'
        ]);

        $facility->update($request->all());

        return redirect()->route('facilities.index')
            ->with('success', 'تم تحديث المرفق بنجاح.');
    }


    public function destroy(Facility $facility)
    {
        $facility->delete();

        return redirect()->route('facilities.index')
            ->with('success', 'تم حذف المرفق بنجاح.');
    }
}
