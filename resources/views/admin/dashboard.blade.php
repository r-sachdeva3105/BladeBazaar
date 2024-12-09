@extends('layouts.admin')

@section('content')
<div class="container mx-auto p-6" style="margin-left: 2rem;">

    <!-- Welcome Header -->
    <div class="mb-6 text-center">
        <h1 class="text-4xl font-bold text-gray-800">Admin Dashboard</h1>
        <p class="text-gray-600">Get a quick overview of your platform's performance</p>
    </div>

    <!-- Dashboard Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6 mx-auto max-w-6xl">

        <!-- Categories -->
        <a href="/admin/categories" class="bg-gradient-to-r from-blue-500 to-blue-700 text-white rounded-lg shadow-md p-6 flex items-center justify-between hover:shadow-lg hover:scale-105 transition-all">
            <div>
                <h3 class="text-sm font-semibold uppercase">Categories</h3>
                <p class="text-4xl font-bold">{{ $categoriesCount }}</p>
            </div>
            <i class="fas fa-sitemap text-5xl"></i>
        </a>

        <!-- Products -->
        <a href="/admin/products" class="bg-gradient-to-r from-red-500 to-red-700 text-white rounded-lg shadow-md p-6 flex items-center justify-between hover:shadow-lg hover:scale-105 transition-all">
            <div>
                <h3 class="text-sm font-semibold uppercase">Products</h3>
                <p class="text-4xl font-bold">{{ $totalProducts }}</p>
            </div>
            <i class="fas fa-boxes text-5xl"></i>
        </a>

        <!-- Orders -->
        <a href="/admin/orders" class="bg-gradient-to-r from-green-500 to-green-700 text-white rounded-lg shadow-md p-6 flex items-center justify-between hover:shadow-lg hover:scale-105 transition-all">
            <div>
                <h3 class="text-sm font-semibold uppercase">Orders</h3>
                <p class="text-4xl font-bold">{{ $ordersCount }}</p>
            </div>
            <i class="fas fa-clipboard-list text-5xl"></i>
        </a>

        <!-- Users -->
        <a href="/admin/users" class="bg-gradient-to-r from-yellow-500 to-yellow-700 text-white rounded-lg shadow-md p-6 flex items-center justify-between hover:shadow-lg hover:scale-105 transition-all">
            <div>
                <h3 class="text-sm font-semibold uppercase">Users</h3>
                <p class="text-4xl font-bold">{{ $usersCount }}</p>
            </div>
            <i class="fas fa-users text-5xl"></i>
        </a>

    </div>

    <!-- Analytics Section -->
    <div class="mt-10 bg-white p-6 rounded-lg shadow-md mx-auto max-w-6xl">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">Platform Insights</h2>
        <canvas id="dashboard-chart" class="w-full h-64"></canvas>
    </div>
</div>

<!-- Include Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('dashboard-chart').getContext('2d');

    const mockData = {
        labels: ['January', 'February', 'March', 'April', 'May', 'June'],
        datasets: [
            {
                label: 'Orders',
                data: [120, 150, 180, 200, 240, 300], // Mock data for orders
                borderColor: '#34D399',
                backgroundColor: 'rgba(52, 211, 153, 0.2)',
                tension: 0.3,
                fill: true,
            },
            {
                label: 'Products Sold',
                data: [80, 100, 130, 170, 200, 250], // Mock data for products
                borderColor: '#3B82F6',
                backgroundColor: 'rgba(59, 130, 246, 0.2)',
                tension: 0.3,
                fill: true,
            },
        ],
    };

    new Chart(ctx, {
        type: 'line',
        data: mockData,
        options: {
            responsive: true,
            plugins: {
                legend: { display: true },
                tooltip: { enabled: true },
            },
            scales: {
                x: { grid: { display: false }, title: { display: true, text: 'Months' } },
                y: { beginAtZero: true, title: { display: true, text: 'Counts' } },
            },
        },
    });
</script>
@endsection
