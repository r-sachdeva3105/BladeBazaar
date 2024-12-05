@extends('layouts.admin')

@section('content')
<div class="container mx-auto p-4">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-semibold text-gray-800">Products</h1>
        <a href="{{ route('admin.products.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
            Add Product
        </a>
    </div>

    <div class="bg-white rounded-lg shadow-md p-6">
        <table class="min-w-full border-collapse border border-gray-300">
            <thead class="bg-gray-200">
                <tr>
                    <th class="border border-gray-300 px-4 py-2 text-left text-gray-700">#</th>
                    <th class="border border-gray-300 px-4 py-2 text-left text-gray-700">Name</th>
                    <th class="border border-gray-300 px-4 py-2 text-left text-gray-700">Category</th>
                    <th class="border border-gray-300 px-4 py-2 text-left text-gray-700">Price</th>
                    <th class="border border-gray-300 px-4 py-2 text-left text-gray-700">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                <tr>
                    <td class="border border-gray-300 px-4 py-2">{{ $product['id'] }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $product['title'] }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $product['category'] ?? 'N/A' }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $product['price'] }}</td>
                    <td class="border border-gray-300 px-4 py-2">
                        <a href="{{ route('admin.products.edit', $product['id']) }}" class="text-blue-500 hover:underline">Edit</a> |
                        <form action="{{ route('admin.products.destroy', $product['id']) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:underline">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection