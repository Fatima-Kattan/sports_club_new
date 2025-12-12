<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Item;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    use AuthorizesRequests;

    // ==================== Index ====================
    public function index(Request $request)
    {
        $user = Auth::user();
        $employee = Employee::where('email', $user->email)->first();

        if ($employee) {
            $this->authorize('manageCategories', $employee);
        } else {
            $this->authorize('manageCategories', Category::class);
        }

        $search = $request->input('search');
        $categories = Category::withCount('items')
            ->when($search, function ($query, $search) {
                return $query->where(function ($q) use ($search) {
                    $q->where('name', 'like', "%{$search}%")
                        ->orWhere('description', 'like', "%{$search}%");
                });
            })
            ->latest()
            ->get();

        /* if ($request->ajax()) {
            return response()->json([
                'categories' => $categories,
                'html' => view(
                    'categories.partials.category_cards',
                    compact('categories')
                )->render()
            ]);
        } */

        return view('categories.index', compact('categories', 'search'));
    }

    // ==================== Create ====================
    public function create()
    {
        $user = Auth::user();
        $employee = Employee::where('email', $user->email)->first();

        if ($employee) {
            $this->authorize('manageCategories', $employee);
        } else {
            $this->authorize('manageCategories', Category::class);
        }

        return view('categories.create');
    }

    // ==================== Store ====================
    public function store(Request $request)
    {
        $user = Auth::user();
        $employee = Employee::where('email', $user->email)->first();

        if ($employee) {
            $this->authorize('manageCategories', $employee);
        } else {
            $this->authorize('manageCategories', Category::class);
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:categories',
            'description' => 'required|string|max:500'
        ]);

        Category::create($validated);

        return redirect()->route('categories.index')
            ->with('success', 'Category created successfully.');
    }

    // ==================== Show ====================
    public function show(Category $category)
    {
        $user = Auth::user();
        $employee = Employee::where('email', $user->email)->first();

        if ($employee) {
            $this->authorize('manageCategories', $employee);
        } else {
            $this->authorize('manageCategories', Category::class);
        }

        $items = $category->items()->latest()->get();

        $statusCounts = [
            'available' => $items->where('status', 'available')->count(),
            'not_available' => $items->where('status', 'not available')->count(),
            'maintenance' => $items->where('status', 'under maintenance')->count(),
            'out_of_service' => $items->where('status', 'out of service')->count(),
        ];

        return view('categories.show', compact('category', 'items', 'statusCounts'));
    }

    // ==================== Edit ====================
    public function edit(Category $category)
    {
        $user = Auth::user();
        $employee = Employee::where('email', $user->email)->first();

        if ($employee) {
            $this->authorize('manageCategories', $employee);
        } else {
            $this->authorize('manageCategories', Category::class);
        }

        return view('categories.edit', compact('category'));
    }

    // ==================== Update ====================
    public function update(Request $request, Category $category)
    {
        $user = Auth::user();
        $employee = Employee::where('email', $user->email)->first();

        if ($employee) {
            $this->authorize('manageCategories', $employee);
        } else {
            $this->authorize('manageCategories', Category::class);
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:categories,name,' . $category->id,
            'description' => 'required|string|max:500'
        ]);

        $category->update($validated);

        return redirect()->route('categories.index')
            ->with('success', 'Category updated successfully.');
    }

    // ==================== Destroy ====================
    public function destroy(Category $category)
    {
        $user = Auth::user();
        $employee = Employee::where('email', $user->email)->first();

        if ($employee) {
            $this->authorize('manageCategories', $employee);
        } else {
            $this->authorize('manageCategories', Category::class);
        }

        if ($category->items()->count() > 0) {
            return redirect()->back()
                ->with('error', 'Cannot delete category that has items. Please delete the items first.');
        }

        $category->delete();

        return redirect()->route('categories.index')
            ->with('success', 'Category deleted successfully.');
    }

    // ==================== Search ====================
    /* public function search(Request $request)
    {
        $user = Auth::user();
        $employee = Employee::where('email', $user->email)->first();

        if ($employee) {
            $this->authorize('manageCategories', $employee);
        } else {
            $this->authorize('manageCategories', Category::class);
        }

        $search = $request->input('search');

        $categories = Category::withCount('items')
            ->where('name', 'like', "%{$search}%")
            ->orWhere('description', 'like', "%{$search}%")
            ->latest()
            ->get();

        if ($request->ajax()) {
            return response()->json([
                'categories' => $categories,
                'html' => view('categories.partials.category_cards', compact('categories'))->render()
            ]);
        }

        return view('categories.index', compact('categories', 'search'));
    } */
}
