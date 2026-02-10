@extends('Layout.app')

@section('title', isset($product) ? 'Edit Product' : 'Create Product')

@section('content')

<div class="max-w-xl mx-auto mt-10 bg-white p-6 rounded shadow">

    <h1 class="text-2xl font-bold mb-6 text-center">
        {{ isset($product) ? 'Edit Product' : 'Create Product' }}
    </h1>

    <form 
        action="{{ isset($product) ? route('products.update', $product->id) : route('products.store') }}" 
        method="POST"
        class="space-y-5"
    >
        @csrf

        @isset($product)
            @method('PUT')
        @endisset

        <!-- Name -->
        <div>
            <label class="block text-sm font-medium mb-1">
                Name
            </label>
            <input 
                type="text" 
                name="name"
                value="{{ old('name', $product->name ?? '') }}"
                class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                placeholder="Product name"
            >
        </div>

        <!-- Description -->
        <div>
            <label class="block text-sm font-medium mb-1">
                Description
            </label>
            <textarea 
                name="description"
                rows="3"
                class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                placeholder="Product description"
            >{{ old('description', $product->description ?? '') }}</textarea>
        </div>

        <!-- Price -->
        <div>
            <label class="block text-sm font-medium mb-1">
                Price
            </label>
            <input 
                type="number" 
                step="0.01"
                name="price"
                value="{{ old('price', $product->price ?? '') }}"
                class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                placeholder="0.00"
            >
        </div>

        <!-- Quantity -->
        <div>
            <label class="block text-sm font-medium mb-1">
                Quantity
            </label>
            <input 
                type="number" 
                name="quantity"
                value="{{ old('quantity', $product->quantity ?? '') }}"
                class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                placeholder="0"
            >
        </div>

        <!-- Buttons -->
        <div class="flex justify-between items-center pt-4">
            <a 
                href="{{ route('products.index') }}"
                class="text-gray-600 hover:underline"
            >
                ← Back
            </a>

            <button 
                type="submit"
                class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded"
            >
                {{ isset($product) ? 'Update Product' : 'Save Product' }}
            </button>
        </div>

    </form>
</div>

@endsection
