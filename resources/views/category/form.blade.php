@extends('Layout.app')

@section('title', isset($category) ? 'Edit Category' : 'Create Category')

@section('content')

<div class="max-w-xl mx-auto mt-10 bg-white p-6 rounded shadow">

    <h1 class="text-2xl font-bold mb-6 text-center">
        {{ isset($category) ? 'Edit Category' : 'Create Category' }}
    </h1>

    <form 
        action="{{ isset($category) 
                    ? route('categories.update', $category->id) 
                    : route('categories.store') }}"
        method="POST"
        class="space-y-5"
    >
        @csrf

        @isset($category)
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
                value="{{ old('name', $category->name ?? '') }}"
                class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                placeholder="Category name"
            >

            @error('name')
                <p class="text-red-500 text-sm mt-1">
                    {{ $message }}
                </p>
            @enderror
        </div>

        <!-- Buttons -->
        <div class="flex justify-between items-center pt-4">

            <a 
                href="{{ route('categories.index') }}"
                class="text-gray-600 hover:underline"
            >
                ← Back
            </a>

            <button 
                type="submit"
                class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded"
            >
                {{ isset($category) ? 'Update Category' : 'Save Category' }}
            </button>

        </div>

    </form>

</div>

@endsection
