<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Category;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ItemController extends Controller
{
    use AuthorizesRequests;

    

    public function index()
    {
        $this->authorize('manageItem', Employee::class);
        $items = Item::with('category')->latest()->get();
        return view('items.index', compact('items'));
    }

    public function create()
    {
        $this->authorize('manageItem', Employee::class);
        $categories = Category::all();
        return view('items.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $this->authorize('manageItem', Employee::class);
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'quantity' => 'required|integer|min:0',
            'status' => 'required|in:available,not available,under maintenance,out of service',
            'image' => 'nullable|image|max:2048',
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('items', 'public');
        }

        Item::create($validated);

        return redirect()->route('categories.show', $validated['category_id'])
            ->with('success', 'Item created successfully.');
    }

    public function show(Item $item)
    {
        $this->authorize('manageItem', Employee::class);
        return view('items.show', compact('item'));
    }

    public function edit(Item $item)
    {
        $this->authorize('manageItem', Employee::class);
        $categories = Category::all();
        return view('items.edit', compact('item', 'categories'));
    }

    public function update(Request $request, Item $item)
    {
        $this->authorize('manageItem', Employee::class);
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'quantity' => 'required|integer|min:0',
            'status' => 'required|in:available,not available,under maintenance,out of service',
            'image' => 'nullable|image|max:2048',
        ]);

        // Handle image update
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($item->image) {
                Storage::disk('public')->delete($item->image);
            }
            $validated['image'] = $request->file('image')->store('items', 'public');
        }

        $item->update($validated);

        return redirect()->route('categories.show', $item->category_id)
            ->with('success', 'Item updated successfully.');
    }

    public function destroy(Item $item)
    {
        $this->authorize('manageItem', Employee::class);
        // Delete image if exists
        if ($item->image) {
            Storage::disk('public')->delete($item->image);
        }

        $categoryId = $item->category_id;
        $item->delete();

        return redirect()->route('categories.show', $categoryId)
            ->with('success', 'Item deleted successfully.');
    }
}