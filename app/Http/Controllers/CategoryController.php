<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Item;
use App\Models\Employee;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    use AuthorizesRequests;

    
    private function authorizeCategory()
    {
        $user = Auth::user();
        
        
        if ($user->is_admin) {
            
            $employee = new Employee();
            $employee->id = 0;
            $employee->position = 'admin';
            $employee->mgr_id = null;
            $employee->full_name = $user->full_name;
            
            $this->authorize('manageCategories', [Category::class, $employee]);
            return $employee;
        }
        
        
        if (Auth::guard('employee')->check()) {
            $employee = Auth::guard('employee')->user();
            
            
            $this->authorize('manageCategories', [Category::class, $employee]);
            return $employee;
        }
        
        
        abort(403, 'Access denied. You must be registered as an employee.');
    }

    
    public function index(Request $request)
    {
        $employee = $this->authorizeCategory();

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

        return view('categories.index', compact('categories', 'search'));
    }

    public function create()
    {
        $this->authorizeCategory();
        return view('categories.create');
    }

    public function store(Request $request)
    {
        $this->authorizeCategory();
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:categories',
            'description' => 'required|string'
        ]);

        Category::create($validated);

        return redirect()->route('categories.index')
            ->with('success', 'The classification was created successfully.');
    }

    public function show(Category $category)
    {
        $this->authorizeCategory();
        $items = $category->items()->latest()->get();
        return view('categories.show', compact('category', 'items'));
    }

    public function edit(Category $category)
    {
        $this->authorizeCategory();
        return view('categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $this->authorizeCategory();
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:categories,name,' . $category->id,
            'description' => 'required|string'
        ]);

        $category->update($validated);

        return redirect()->route('categories.index')
            ->with('success', 'The classification was updated successfully.');
    }

    public function destroy(Category $category)
    {
        $this->authorizeCategory();
        $category->delete();

        return redirect()->route('categories.index')
            ->with('success', 'The classification was deleted successfully.');
    }

    public function search(Request $request)
    {
        $this->authorizeCategory();
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
    }
}
