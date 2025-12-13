<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Category;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ItemController extends Controller
{
    use AuthorizesRequests;


    // ==================== Create ====================
    public function create(Category $category)
    {
        $user = Auth::user();
        $employee = Employee::where('email', $user->email)->first();

        if ($employee) {
            $this->authorize('manageItem', $employee);
        } else {
            $this->authorize('manageItem', Item::class);
        }

        return view('items.create', compact('category'));
    }

    // ==================== Store ====================
    public function store(Request $request)
    {
        $user = Auth::user();
        $employee = Employee::where('email', $user->email)->first();

        if ($employee) {
            $this->authorize('manageItem', $employee);
        } else {
            $this->authorize('manageItem', Item::class);
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'quantity' => 'required|integer|min:0',
            'status' => 'required|in:available,not available,under maintenance,out of service',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        try {
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $imageName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)
                    . '-' . time() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('/images/items'), $imageName);

                $validated['image'] = $imageName;
            }

            Item::create($validated);

            return redirect()->route('categories.show', $validated['category_id'])
                ->with('success', 'Item created successfully!');
        } catch (QueryException $e) {

            if ($e->errorInfo[1] == 1062) {
                return redirect()->back()
                    ->withInput()
                    ->withErrors([
                        'name' => '⚠️ This item name already exists in this category. Please choose a different name.'
                    ]);
            }

            return redirect()->back()
                ->withInput()
                ->withErrors(['error' => 'An error occurred: ' . $e->getMessage()]);
        }
    }

    
    // ==================== Edit ====================
    public function edit(Category $category, Item $item)
    {
        $user = Auth::user();
        $employee = Employee::where('email', $user->email)->first();

        if ($employee) {
            $this->authorize('manageItem', $employee);
        } else {
            $this->authorize('manageItem', Item::class);
        }
        if ($item->category_id !== $category->id) {
            abort(404, 'Item does not belong to this category');
        }


        $categories = Category::all();

        return view('items.edit', compact('category', 'item', 'categories'));
    }

    // ==================== Update ====================
    public function update(Request $request, Category $category, Item $item)
    {

        $user = Auth::user();
        $employee = Employee::where('email', $user->email)->first();

        if ($employee) {
            $this->authorize('manageItem', $employee);
        } else {
            $this->authorize('manageItem', Item::class);
        }


        if ($item->category_id !== $category->id) {
            abort(404, 'Item does not belong to this category');
        }
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'quantity' => 'required|integer|min:0',
            'status' => 'required|in:available,not available,under maintenance,out of service',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        try {

            if ($request->hasFile('image')) {
                if ($item->image && file_exists(public_path('images/items/' . $item->image))) {
                    unlink(public_path('images/items/' . $item->image));
                }

                $file = $request->file('image');

                $imageName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)
                    . '-' . time() . '.' . $file->getClientOriginalExtension();

                $file->move(public_path('/images/items'), $imageName);

                $validated['image'] = $imageName;
            }else {
            
            unset($validated['image']);
        }
            $item->update($validated);

            return redirect()->route('categories.show', $item->category_id)
                ->with('success', 'Item updated successfully!');
        } catch (QueryException $e) {

            if ($e->errorInfo[1] == 1062) {
                return redirect()->back()
                    ->withInput()
                    ->withErrors([
                        'name' => '⚠️ This item name already exists in this category. Please choose a different name.'
                    ]);
            }

            return redirect()->back()
                ->withInput()
                ->withErrors(['error' => 'An error occurred: ' . $e->getMessage()]);
        }
    }

    // ==================== Destroy ====================
    public function destroy(Category $category, Item $item)
    {
        $user = Auth::user();
        $employee = Employee::where('email', $user->email)->first();

        if ($employee) {
            $this->authorize('manageItem', $employee);
        } else {
            $this->authorize('manageItem', Item::class);
        }

        if ($item->image && file_exists(public_path('images/items/' . $item->image))) {
            unlink(public_path('images/items/' . $item->image));
        }

        $categoryId = $item->category_id;
        $item->delete();

        return redirect()->route('categories.show', $categoryId)
            ->with('success', 'Item deleted successfully!');
    }
}