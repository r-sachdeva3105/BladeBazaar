@extends('layouts.app')

@section('content')
<div class="bg-white py-16">
    <!-- Header Section -->
    <div class="max-w-7xl mx-auto text-center">
        <h1 class="text-5xl font-extrabold text-gray-800 mb-4 tracking-wide">
            Collections of Women
        </h1>
        <p class="text-gray-600 text-lg italic mb-12">
            Discover the elegance and beauty of our women's collection.
        </p>
    </div>

    <!-- Product Section -->
    <div id="product-container" class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-8">
        <!-- Product 1 -->
        <a href="{{ route('product.show', ['id' => 1]) }}" class="group relative bg-white rounded-lg shadow-md overflow-hidden transform transition-transform duration-300 hover:scale-105">
            <img src="{{ asset('assets/products/product_1.png') }}" alt="Women's Product 1" class="w-full h-[400px] object-cover">
        </a>

        <!-- Product 2 -->
        <a href="{{ route('product.show', ['id' => 2]) }}" class="group relative bg-white rounded-lg shadow-md overflow-hidden transform transition-transform duration-300 hover:scale-105">
            <img src="{{ asset('assets/products/product_2.png') }}" alt="Women's Product 2" class="w-full h-[400px] object-cover">
        </a>

        <!-- Product 3 -->
        <a href="{{ route('product.show', ['id' => 3]) }}" class="group relative bg-white rounded-lg shadow-md overflow-hidden transform transition-transform duration-300 hover:scale-105">
            <img src="{{ asset('assets/products/product_3.png') }}" alt="Women's Product 3" class="w-full h-[400px] object-cover">
        </a>
    </div>

    <!-- Stylish See More Button -->
    <div class="mt-20 text-center">
        <button id="load-more" class="relative inline-flex items-center px-6 py-3 font-medium text-red-500 border border-red-500 rounded-full group hover:bg-red-500 hover:text-white transition-all">
            <span class="absolute left-0 w-full h-0 transition-all duration-300 ease-out bg-red-500 opacity-100 group-hover:h-full"></span>
            <span class="relative flex items-center space-x-2">
                <span>View More</span>
                <span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                    </svg>
                </span>
            </span>
        </button>
    </div>
</div>

<script>
    document.getElementById('load-more').addEventListener('click', function () {
        const products = [
            `<a href="{{ route('product.show', ['id' => 4]) }}" class="group relative bg-white rounded-lg shadow-md overflow-hidden transform transition-transform duration-300 hover:scale-105">
                <img src="{{ asset('assets/products/product_4.png') }}" alt="Women's Product 4" class="w-full h-[400px] object-cover">
            </a>`,
            `<a href="{{ route('product.show', ['id' => 5]) }}" class="group relative bg-white rounded-lg shadow-md overflow-hidden transform transition-transform duration-300 hover:scale-105">
                <img src="{{ asset('assets/products/product_5.png') }}" alt="Women's Product 5" class="w-full h-[400px] object-cover">
            </a>`,
            `<a href="{{ route('product.show', ['id' => 6]) }}" class="group relative bg-white rounded-lg shadow-md overflow-hidden transform transition-transform duration-300 hover:scale-105">
                <img src="{{ asset('assets/products/product_6.png') }}" alt="Women's Product 6" class="w-full h-[400px] object-cover">
            </a>`
        ];

        const container = document.getElementById('product-container');
        products.forEach(product => {
            container.insertAdjacentHTML('beforeend', product);
        });

        this.style.display = 'none'; // Hide button after all products are loaded
    });
</script>
@endsection
