@extends('layouts.admin')

@section('content')
<div class="container mx-auto p-4">
    <!-- Page Heading -->
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-semibold text-gray-800">Categories</h1>
        <a href="{{ route('admin.categories.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
            Add Category
        </a>
    </div>

    <!-- Table -->
    <div class="bg-white rounded-lg shadow-md p-6">
        <table class="min-w-full border-collapse border border-gray-300">
            <thead class="bg-gray-200">
                <tr>
                    <th class="border border-gray-300 px-4 py-2 text-left text-gray-700">Category</th>
                    <th class="border border-gray-300 px-4 py-2 text-left text-gray-700">Total Products</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $categoryName => $categoryData)
                    <tr>
                        <td class="border border-gray-300 px-4 py-2">{{ ucfirst($categoryName) }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ count($categoryData) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
