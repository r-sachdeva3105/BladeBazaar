@extends('layouts.admin')

@section('content')
<div class="container mx-auto p-4">
    <!-- Page Heading -->
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-semibold text-gray-800">Dashboard</h1>
    </div>

    <!-- Content Row -->
    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6">

        <!-- Category -->
        <a href="admin/categories" class="bg-white rounded-lg shadow-md p-6 flex items-center justify-between border-r-4 border-blue-500 hover:bg-blue-100">
            <div>
                <h3 class="text-sm font-semibold text-gray-600 uppercase">Category</h3>
                <p class="text-lg font-bold text-gray-800">4</p>
            </div>
            <div>
                <i class="fas fa-sitemap text-blue-500 text-3xl"></i>
            </div>
        </a>

        <!-- Products -->
        <a href="admin/products" class="bg-white rounded-lg shadow-md p-6 flex items-center justify-between border-r-4 border-red-500 hover:bg-red-100">
            <div>
                <h3 class="text-sm font-semibold text-gray-600 uppercase">Products</h3>
                <p class="text-lg font-bold text-gray-800">36</p>
            </div>
            <div>
                <i class="fas fa-cubes text-red-500 text-3xl"></i>
            </div>
        </a>

        <!-- Orders -->
        <a href="admin/orders" class="bg-white rounded-lg shadow-md p-6 flex items-center justify-between border-r-4 border-green-500 hover:bg-green-100">
            <div>
                <h3 class="text-sm font-semibold text-gray-600 uppercase">Orders</h3>
                <p class="text-lg font-bold text-gray-800">10</p>
            </div>
            <div>
                <i class="fas fa-clipboard-list text-green-500 text-3xl"></i>
            </div>
        </a>

        <!-- Users -->
        <a href="admin/users" class="bg-white rounded-lg shadow-md p-6 flex items-center justify-between border-r-4 border-yellow-500 hover:bg-yellow-100">
            <div>
                <h3 class="text-sm font-semibold text-gray-600 uppercase">Users</h3>
                <p class="text-lg font-bold text-gray-800">5</p>
            </div>
            <div>
                <i class="fas fa-users text-yellow-500 text-3xl"></i>
            </div>
        </a>

    </div>
</div>
@endsection
