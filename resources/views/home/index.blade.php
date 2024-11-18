@extends('layouts.app')

@section('content')
<div class="container mx-auto px-6 py-12">

    <!-- Carousel Section -->
    <div id="carouselExample" class="carousel slide mb-12" data-bs-ride="carousel">
        <div class="carousel-inner">
            <!-- Slide 1 -->
            <div class="carousel-item active">
                <img src="assets/banner_kids.png" alt="Kids" class="d-block w-100 rounded-lg shadow-md">
            </div>
            <!-- Slide 2 -->
            <div class="carousel-item">
                <img src="assets/banner_women.png" alt="Women" class="d-block w-100 rounded-lg shadow-md">
            </div>
            <!-- Slide 3 -->
            <div class="carousel-item">
                <img src="assets/banner_kids.png" alt="Men" class="d-block w-100 rounded-lg shadow-md">
            </div>
        </div>
    </div>

    <!-- Fashion Products Section -->
    <div class="text-center mb-12">
        <h2 class="text-3xl font-bold text-gray-800">Our Popular Products</h2>
        <p class="text-lg text-gray-600 mt-4">Explore the latest trends and styles.</p>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
        <!-- Product 1 -->
        <div class="bg-white rounded-lg shadow-lg p-6">
            <img src="https://via.placeholder.com/300x300?Text=Shirt+1" alt="Product 1" class="w-full h-64 object-cover rounded-lg mb-4">
            <h3 class="text-xl font-semibold text-gray-800">Fashionable Shirt</h3>
            <p class="text-lg text-gray-600">$39.99</p>
            <button class="mt-4 px-4 py-2 bg-orange-600 text-white rounded-lg hover:bg-orange-700">Add to Cart</button>
        </div>

        <!-- Product 2 -->
        <div class="bg-white rounded-lg shadow-lg p-6">
            <img src="https://via.placeholder.com/300x300?Text=Shirt+2" alt="Product 2" class="w-full h-64 object-cover rounded-lg mb-4">
            <h3 class="text-xl font-semibold text-gray-800">Trendy Hoodie</h3>
            <p class="text-lg text-gray-600">$49.99</p>
            <button class="mt-4 px-4 py-2 bg-orange-600 text-white rounded-lg hover:bg-orange-700">Add to Cart</button>
        </div>

        <!-- Product 3 -->
        <div class="bg-white rounded-lg shadow-lg p-6">
            <img src="https://via.placeholder.com/300x300?Text=Shoes+1" alt="Product 3" class="w-full h-64 object-cover rounded-lg mb-4">
            <h3 class="text-xl font-semibold text-gray-800">Stylish Sneakers</h3>
            <p class="text-lg text-gray-600">$59.99</p>
            <button class="mt-4 px-4 py-2 bg-orange-600 text-white rounded-lg hover:bg-orange-700">Add to Cart</button>
        </div>

        <!-- Product 4 -->
        <div class="bg-white rounded-lg shadow-lg p-6">
            <img src="https://via.placeholder.com/300x300?Text=Bag+1" alt="Product 4" class="w-full h-64 object-cover rounded-lg mb-4">
            <h3 class="text-xl font-semibold text-gray-800">Leather Handbag</h3>
            <p class="text-lg text-gray-600">$79.99</p>
            <button class="mt-4 px-4 py-2 bg-orange-600 text-white rounded-lg hover:bg-orange-700">Add to Cart</button>
        </div>
    </div>
</div>
@endsection