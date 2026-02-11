<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Service\CategoryService;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{

    public function __construct(protected CategoryService $services) {}
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = $this->services->getAll();
        return view('category.index', compact('categories'));
    }


    public function create()
    {
        return view('category.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
        $this->services->create($request->validated());
        return redirect()->route('categories.index')->with('Mensaje', 'Category created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return view('category.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('category.form', compact('category'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, Category $category)
    {
        $this->services->update($category,$request->validated());
        return redirect()->route('categories.index')->with('Mensaje', 'Category update successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $this->services->delete($category);
        return redirect()->route('categories.index')->with('Mensaje', 'Category deleted successfully');
    }
}
