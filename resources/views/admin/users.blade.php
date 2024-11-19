@extends('layouts.admin')

@section('content')
<div class="container mx-auto p-4">
    <!-- Page Heading -->
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-semibold text-gray-800">Users</h1>
        <a href="#" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
            Add User
        </a>
    </div>

    <!-- Table -->
    <div class="bg-white rounded-lg shadow-md p-6">
        <table class="min-w-full border-collapse border border-gray-300">
            <thead class="bg-gray-200">
                <tr>
                    <th class="border border-gray-300 px-4 py-2 text-left text-gray-700">#</th>
                    <th class="border border-gray-300 px-4 py-2 text-left text-gray-700">Name</th>
                    <th class="border border-gray-300 px-4 py-2 text-left text-gray-700">Email</th>
                    <th class="border border-gray-300 px-4 py-2 text-left text-gray-700">Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="border border-gray-300 px-4 py-2">1</td>
                    <td class="border border-gray-300 px-4 py-2">Jane Doe</td>
                    <td class="border border-gray-300 px-4 py-2">jane.doe@example.com</td>
                    <td class="border border-gray-300 px-4 py-2">
                        <a href="#" class="text-blue-500 hover:underline">Edit</a> |
                        <a href="#" class="text-red-500 hover:underline">Delete</a>
                    </td>
                </tr>
                <!-- Add more rows as needed -->
            </tbody>
        </table>
    </div>
</div>
@endsection
