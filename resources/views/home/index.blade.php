@extends('layouts.app')

@section('content')
<!-- Hero Section -->
<section class="relative bg-gradient-to-r from-gray-900 to-gray-800 text-white py-20">
    <div class="container mx-auto px-6 lg:px-12 relative z-10">
        <div class="flex flex-col lg:flex-row items-center justify-between">
            <div class="lg:w-1/2 text-center lg:text-left">
                <h1 class="text-5xl font-extrabold leading-tight mb-6">
                    Elevate Your Style with BladeBazaar
                </h1>
                <p class="text-lg mb-6 text-gray-300">
                    Discover exclusive collections and redefine your wardrobe with the latest trends.
                </p>
                <a href="#products" class="px-6 py-3 bg-orange-500 hover:bg-orange-600 text-white text-lg font-bold rounded-lg transition-all">
                    Shop Now
                </a>
            </div>
        </div>
    </div>
    <!-- Blended Image -->
    <div class="absolute inset-0">
        <img src="{{ asset('assets/products/hero-image3.jpg') }}" alt="Fashion Trends"
             class="w-full h-98 object-cover object-center md:object-right opacity-70 mix-blend-overlay">
    </div>
</section>



<!-- Popular Products Section -->
<div id="products" class="bg-white py-16">
    <div class="max-w-7xl mx-auto text-center mb-12">
        <h2 class="text-5xl font-extrabold text-gray-800 tracking-wide">Our Popular Products</h2>
        <p class="text-gray-600 text-lg italic">Explore the latest trends and styles.</p>
    </div>

    <div class="max-w-7xl mx-auto grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-8">
        @foreach(array_slice($popularProducts, 0, 4) as $product)
        <div class="group relative bg-white rounded-lg shadow-md overflow-hidden transform transition-transform duration-300 hover:scale-105">
            <a href="{{ route('product.show', ['id' => $product['id']]) }}">
                <!-- Original Product Images -->
                <img src="{{ asset($product['image']) }}" alt="{{ $product['title'] }}" class="w-full h-72 object-cover">
            </a>
            <div class="p-4 text-center">
                <h3 class="text-lg font-semibold text-gray-800">{{ $product['title'] }}</h3>
                <p class="text-gray-600">{{ $product['price'] }}</p>
                <form action="{{ route('cart.add') }}" method="POST">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product['id'] }}">
                    <input type="hidden" name="product_title" value="{{ $product['title'] }}">
                    <input type="hidden" name="product_price" value="{{ $product['price'] }}">
                    <input type="hidden" name="product_image" value="{{ $product['image'] }}">
                    <button type="submit" class="mt-2 px-4 py-2 bg-orange-500 text-white rounded-lg hover:bg-orange-600 transition-all">
                        Add to Cart
                    </button>
                </form>
            </div>
        </div>
        @endforeach
    </div>
</div>

<!-- Featured Categories -->
<section class="bg-gray-100 py-16">
    <div class="container mx-auto px-6 lg:px-12 text-center">
        <h2 class="text-4xl font-extrabold text-gray-800 mb-6">Shop by Categories</h2>
        <p class="text-gray-600 mb-12">Explore products curated for you in each category.</p>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Category: Men -->
            <a href="/men" class="relative group block bg-white rounded-lg shadow-lg overflow-hidden hover:scale-105 transition-transform">
                <img src="{{ asset('assets/products/men.jpg') }}" alt="Men" class="w-full h-64 object-cover">
                <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">
                    <h3 class="text-white text-xl font-bold">Men</h3>
                </div>
            </a>
            <!-- Category: Women -->
            <a href="/women" class="relative group block bg-white rounded-lg shadow-lg overflow-hidden hover:scale-105 transition-transform">
                <img src="{{ asset('assets/products/woman.webp') }}" alt="Women" class="w-full h-64 object-cover">
                <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">
                    <h3 class="text-white text-xl font-bold">Women</h3>
                </div>
            </a>
            <!-- Category: Kids -->
            <a href="/kids" class="relative group block bg-white rounded-lg shadow-lg overflow-hidden hover:scale-105 transition-transform">
                <img src="{{ asset('assets/products/kids.webp') }}" alt="Kids" class="w-full h-64 object-cover">
                <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">
                    <h3 class="text-white text-xl font-bold">Kids</h3>
                </div>
            </a>
        </div>
    </div>
</section>

@endsection
