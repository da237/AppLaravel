@extends('Layout.app')

@section('title', 'Categories')

@section('content')

<div class="max-w-6xl mx-auto mt-8">

    <!-- Header -->
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">Categories</h1>

        <a 
            href="{{ route('categories.create') }}"
            class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded shadow"
        >
            + Create Category
        </a>
    </div>

    <!-- Table -->
    <div class="overflow-x-auto bg-white shadow rounded">

        <table class="min-w-full border border-gray-200">

            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-3 text-left text-sm font-semibold text-gray-600">
                        ID
                    </th>
                    <th class="px-4 py-3 text-left text-sm font-semibold text-gray-600">
                        Name
                    </th>
                    <th class="px-4 py-3 text-left text-sm font-semibold text-gray-600">
                        Created At
                    </th>
                    <th class="px-4 py-3 text-center text-sm font-semibold text-gray-600">
                        Actions
                    </th>
                </tr>
            </thead>

            <tbody>

                @forelse ($categories as $category)

                    <tr class="border-t hover:bg-gray-50">

                        <td class="px-4 py-3 text-sm text-gray-700">
                            {{ $category->id }}
                        </td>

                        <td class="px-4 py-3 font-medium text-gray-800">
                            {{ $category->name }}
                        </td>

                        <td class="px-4 py-3 text-sm text-gray-600">
                            {{ $category->created_at->format('d/m/Y') }}
                        </td>

                        <td class="px-4 py-3">
                            <div class="flex justify-center gap-2">

                                <!-- Edit -->
                                <a 
                                    href="{{ route('categories.edit', $category->id) }}"
                                    class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded text-sm"
                                >
                                    Edit
                                </a>

                                <!-- Delete -->
                                <form 
                                    action="{{ route('categories.destroy', $category->id) }}" 
                                    method="POST"
                                    onsubmit="return confirm('¿Delete this category?')"
                                >
                                    @csrf
                                    @method('DELETE')

                                    <button 
                                        type="submit"
                                        class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded text-sm"
                                    >
                                        Delete
                                    </button>
                                </form>

                            </div>
                        </td>

                    </tr>

                @empty

                    <tr>
                        <td colspan="4" class="px-4 py-6 text-center text-gray-500">
                            No categories found
                        </td>
                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection
