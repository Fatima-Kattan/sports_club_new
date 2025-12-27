<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Employee;
use App\Models\Facility;
use App\Models\Item;
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


    public function attachItems(Request $request, Activity $activity)
    {
        $items = $request->input('items', []);

        foreach ($items as $itemId => $data) {
            $qty = (int) $data['quantity'];

            if ($qty > 0) {
                $item = Item::findOrFail($itemId);

                // تحقق من الكمية المتاحة في المخزون
                if ($item->quantity >= $qty) {
                    // خصم من المخزون الأصلي
                    $item->quantity -= $qty;
                    $item->save();

                    // جلب الكمية القديمة من الجدول الوسيط
                    $existingQty = $activity->items()
                        ->where('item_id', $itemId)
                        ->first()?->pivot->quantity ?? 0;

                    // جمع الكمية القديمة مع الجديدة
                    $newQty = $existingQty + $qty;

                    // تحديث الجدول الوسيط بالكمية الجديدة
                    $activity->items()->syncWithoutDetaching([
                        $itemId => ['quantity' => $newQty]
                    ]);
                } else {
                    return back()->with('error', "الكمية المطلوبة من {$item->name} غير متاحة");
                }
            }
        }

        return redirect()->route('activities.show', $activity->id)
            ->with('success', 'تم ربط العناصر بالنشاط وتحديث المخزون بنجاح');
    }
    public function detachItem(Activity $activity, Item $item)
    {
        // تحميل العلاقة مع الكمية
        $linked = $activity->items()->where('items.id', $item->id)->first();

        if (!$linked) {
            return back()->with('error', 'العنصر غير مرتبط بهذا النشاط');
        }

        $takenQty = (int) ($linked->pivot->quantity ?? 0);

        // رجع الكمية للمخزون الأصلي
        if ($takenQty > 0) {
            $item->quantity += $takenQty;
            $item->save();
        }

        // فصل العلاقة من الجدول الوسيط
        $activity->items()->detach($item->id);

        return back()->with('success', 'تم حذف العنصر وإرجاع الكمية للمخزون');
    }

    public function updateItemQuantity(Request $request, Activity $activity, Item $item)
    {
        $newQty = (int) $request->input('quantity');

        // جلب الكمية القديمة من الجدول الوسيط
        $linked = $activity->items()->where('items.id', $item->id)->first();
        $oldQty = $linked ? (int) $linked->pivot->quantity : 0;

        // رجع الكمية القديمة للمخزون الأصلي
        if ($oldQty > 0) {
            $item->quantity += $oldQty;
        }

        // تحقق أن الكمية الجديدة متاحة
        if ($item->quantity < $newQty) {
            return back()->with('error', 'الكمية المطلوبة غير متاحة في المخزون');
        }

        // خصم الكمية الجديدة من المخزون
        $item->quantity -= $newQty;
        $item->save();

        // تحديث الجدول الوسيط بالكمية الجديدة فقط
        $activity->items()->updateExistingPivot($item->id, [
            'quantity' => $newQty
        ]);

        return back()->with('success', 'تم تعديل الكمية بنجاح');
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
        $items = $activity->items;

        return view('activities.show', compact('activity', 'items'));
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

        // استرجاع الكميات إلى المخزون الأصلي
        foreach ($activity->items as $item) {
            $item->quantity += $item->pivot->quantity; // رجع الكمية
            $item->save();
        }

        // حذف العلاقات من الجدول الوسيط
        $activity->items()->detach();

        // حذف الصورة إذا موجودة
        if ($activity->image && File::exists(public_path('/images/activities/' . $activity->image))) {
            File::delete(public_path('/images/activities/' . $activity->image));
        }

        // حذف النشاط نفسه
        $activity->delete();

        return redirect()->route('activities.index')
            ->with('success', 'Activity deleted successfully and items restored.');
    }
}
