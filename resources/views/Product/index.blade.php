@extends('Layout.app')

@section('title','Products')

@section('content')

<div class="max-w-6xl mx-auto mt-8">

    <!-- Header -->
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">Products</h1>

        <a 
            href="{{ route('products.create') }}"
            class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded"
        >
            + Create Product
        </a>
    </div>

    <!-- Table -->
    <div class="overflow-x-auto bg-white shadow rounded">
        <table class="min-w-full border border-gray-200">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-2 text-left">Name</th>
                    <th class="px-4 py-2 text-left">Description</th>
                    <th class="px-4 py-2 text-left">Price</th>
                    <th class="px-4 py-2 text-left">Quantity</th>
                    <th class="px-4 py-2 text-center">Actions</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($products as $product)
                    <tr class="border-t hover:bg-gray-50">
                        <td class="px-4 py-2 font-medium">
                            {{ $product->name }}
                        </td>

                        <td class="px-4 py-2 text-gray-600">
                            {{ $product->description }}
                        </td>

                        <td class="px-4 py-2">
                            ${{ number_format($product->price, 2) }}
                        </td>

                        <td class="px-4 py-2">
                            {{ $product->quantity }}
                        </td>

                        <td class="px-4 py-2">
                            <div class="flex justify-center gap-2">

                                <!-- Edit -->
                                <a 
                                    href="{{ route('products.edit', $product->id) }}"
                                    class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded text-sm"
                                >
                                    Edit
                                </a>

                                <!-- Delete -->
                                <form 
                                    action="{{ route('products.destroy', $product->id) }}" 
                                    method="POST"
                                    onsubmit="return confirm('¿Eliminar este producto?')"
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
                        <td 
                            colspan="5" 
                            class="px-4 py-6 text-center text-gray-500"
                        >
                            No products found
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>

@endsection
