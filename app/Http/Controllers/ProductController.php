<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Service\ProductServices;
use App\Http\Requests\ProductRequest;
use App\Models\Category;

class ProductController extends Controller
{

    public function __construct(protected ProductServices $services)
    {

    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = $this->services->getAll();
        return view ('Product.index',compact('products'));
    }   

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('Product.form',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        $this->services->create($request->validated());
        return redirect()->route('products.index')->with('Mensaje','Product created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('Product.show',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        // $product = $this->services->find($product->id);
        $categories = Category::all();
        return view('Product.form',compact('product','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, Product $product)
    {
        $this->services->update($product,$request->validated());
        return redirect()->route('products.index')->with('Mensaje','Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $this->services->delete($product);
        return redirect()->route('products.index')->with('Mensaje','Product deleted successfully');
    }
}
