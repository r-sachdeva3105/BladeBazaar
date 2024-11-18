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
        <div class="bg-white rounded-lg shadow-md p-6 flex items-center justify-between border-r-4 border-blue-500">
            <div>
                <h3 class="text-sm font-semibold text-gray-600 uppercase">Category</h3>
                <p class="text-lg font-bold text-gray-800">4</p>
            </div>
            <div>
                <i class="fas fa-sitemap text-blue-500 text-3xl"></i>
            </div>
        </div>

        <!-- Products -->
        <div class="bg-white rounded-lg shadow-md p-6 flex items-center justify-between border-r-4 border-red-500">
            <div>
                <h3 class="text-sm font-semibold text-gray-600 uppercase">Products</h3>
                <p class="text-lg font-bold text-gray-800">36</p>
            </div>
            <div>
                <i class="fas fa-cubes text-red-500 text-3xl"></i>
            </div>
        </div>

        <!-- Order -->
        <div class="bg-white rounded-lg shadow-md p-6 flex items-center justify-between border-r-4 border-green-500">
            <div>
                <h3 class="text-sm font-semibold text-gray-600 uppercase">Order</h3>
                <p class="text-lg font-bold text-gray-800">10</p>
            </div>
            <div>
                <i class="fas fa-clipboard-list text-green-500 text-3xl"></i>
            </div>
        </div>

        <!-- Posts -->
        <div class="bg-white rounded-lg shadow-md p-6 flex items-center justify-between border-r-4 border-yellow-500">
            <div>
                <h3 class="text-sm font-semibold text-gray-600 uppercase">Users</h3>
                <p class="text-lg font-bold text-gray-800">5</p>
            </div>
            <div>
                <i class="fas fa-users text-yellow-500 text-3xl"></i>
            </div>
        </div>

    </div>

    <!-- Content Row -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-8">

        <!-- Area Chart -->
        <div class="bg-white rounded-lg shadow-md p-6">
            <div class="flex justify-between items-center mb-4">
                <h6 class="text-xl font-semibold text-gray-800">Earnings Overview</h6>
            </div>
            <div class="h-96">
                <canvas id="myAreaChart"></canvas>
            </div>
        </div>

        <!-- Pie Chart -->
        <div class="bg-white rounded-lg shadow-md p-6">
            <div class="flex justify-between items-center mb-4">
                <h6 class="text-xl font-semibold text-gray-800">Users</h6>
            </div>
            <div id="pie_chart" class="w-full h-96" style="overflow:hidden;">
                <!-- Pie chart content here -->
            </div>
        </div>

    </div>
</div>
@endsection