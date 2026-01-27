<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Service\ProductServices;
use App\Http\Requests\ProductRequest;

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
        return view ('products.index',compact('products'));
    }   

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        $this->services->create($request->validated());
        return redirect()->route('products.index')->with('success','Product created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('products.show',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $product = $this->services->find($product->id);
        return view('products.edit',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, Product $product)
    {
        $this->services->update($product,$request->validated());
        return redirect()->route('products.index')->with('success','Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $this->services->delete($product);
        return redirect()->route('products.index')->with('success','Product deleted successfully');
    }
}
