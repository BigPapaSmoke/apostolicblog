<?php

namespace App\Http\Controllers;


use App\Http\Requests\StoreCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return view('dashboard.categories.index', [
            'categories' => Category::with('subCategories')->whereNull('parent_id')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.categories.create', [
            'categories' => Category::with('subCategories')->whereNull('parent_id')->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        $category               = new Category;
        $category->name         = $request->name;
        $category->parent_id    = $request->parent_id;
        $category->slug         = Str::slug($request->name);
        $category->save();

        return redirect()->route('categories.index')->with('success', 'Category successfully Saved');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('dashboard.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $this->validate($request, [
            'name'      => ['required', 'unique:categories'],
            'parent_id' => ['sometimes', 'nullable'],
        ]);

        $category->name = $request->name;
        $category->slug = Str::slug($request->name);
        $category->save();

        return redirect()->route('categories.index')->with('success', 'Category successfully UPDATED');
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('categories.index')->with('success', 'Category successfully DELETED');
    }
}


// START VIDEO #7
