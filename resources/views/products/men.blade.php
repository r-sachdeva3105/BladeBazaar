@extends('layouts.app')

@section('content')
<div class="bg-white py-16">
    <!-- Header Section -->
    <div class="max-w-7xl mx-auto text-center">
        <h1 class="text-5xl font-extrabold text-gray-800 mb-4 tracking-wide">
            Collections of Men
        </h1>
        <p class="text-gray-600 text-lg italic mb-12">
            It is a long established fact that a reader distracted.
        </p>
    </div>

    <!-- Product Section -->
    <div id="product-container" class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-8">
        <!-- Product 1 -->
        <div class="group relative bg-white rounded-lg shadow-md overflow-hidden transform transition-transform duration-300 hover:scale-105">
            <a href="{{ route('product.show', ['id' => 15]) }}">
                <img src="{{ asset('assets/products/product_15.png') }}" alt="Men's Product 1" class="w-full h-[400px] object-cover">
            </a>
            <div class="p-4 text-center">
                <span class="block text-gray-800 font-semibold text-lg">$49.99</span>
                <button class="mt-2 px-4 py-2 bg-orange-500 text-white rounded-lg hover:bg-orange-600 transition-all">
                    Add to Cart
                </button>
            </div>
        </div>

        <!-- Product 2 -->
        <div class="group relative bg-white rounded-lg shadow-md overflow-hidden transform transition-transform duration-300 hover:scale-105">
            <a href="{{ route('product.show', ['id' => 13]) }}">
                <img src="{{ asset('assets/products/product_13.png') }}" alt="Men's Product 2" class="w-full h-[400px] object-cover">
            </a>
            <div class="p-4 text-center">
                <span class="block text-gray-800 font-semibold text-lg">$39.99</span>
                <button class="mt-2 px-4 py-2 bg-orange-500 text-white rounded-lg hover:bg-orange-600 transition-all">
                    Add to Cart
                </button>
            </div>
        </div>

        <!-- Product 3 -->
        <div class="group relative bg-white rounded-lg shadow-md overflow-hidden transform transition-transform duration-300 hover:scale-105">
            <a href="{{ route('product.show', ['id' => 14]) }}">
                <img src="{{ asset('assets/products/product_14.png') }}" alt="Men's Product 3" class="w-full h-[400px] object-cover">
            </a>
            <div class="p-4 text-center">
                <span class="block text-gray-800 font-semibold text-lg">$59.99</span>
                <button class="mt-2 px-4 py-2 bg-orange-500 text-white rounded-lg hover:bg-orange-600 transition-all">
                    Add to Cart
                </button>
            </div>
        </div>
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

<!-- JavaScript Section -->
<script>
    document.getElementById('load-more').addEventListener('click', function () {
        const products = [
            `<div class="group relative bg-white rounded-lg shadow-md overflow-hidden transform transition-transform duration-300 hover:scale-105">
                <a href="{{ route('product.show', ['id' => 16]) }}">
                    <img src="{{ asset('assets/products/product_16.png') }}" alt="Men's Product 4" class="w-full h-[400px] object-cover">
                </a>
                <div class="p-4 text-center">
                    <span class="block text-gray-800 font-semibold text-lg">$69.99</span>
                    <button class="mt-2 px-4 py-2 bg-orange-500 text-white rounded-lg hover:bg-orange-600 transition-all">
                        Add to Cart
                    </button>
                </div>
            </div>`,
            `<div class="group relative bg-white rounded-lg shadow-md overflow-hidden transform transition-transform duration-300 hover:scale-105">
                <a href="{{ route('product.show', ['id' => 17]) }}">
                    <img src="{{ asset('assets/products/product_17.png') }}" alt="Men's Product 5" class="w-full h-[400px] object-cover">
                </a>
                <div class="p-4 text-center">
                    <span class="block text-gray-800 font-semibold text-lg">$79.99</span>
                    <button class="mt-2 px-4 py-2 bg-orange-500 text-white rounded-lg hover:bg-orange-600 transition-all">
                        Add to Cart
                    </button>
                </div>
            </div>`,
            `<div class="group relative bg-white rounded-lg shadow-md overflow-hidden transform transition-transform duration-300 hover:scale-105">
                <a href="{{ route('product.show', ['id' => 18]) }}">
                    <img src="{{ asset('assets/products/product_18.png') }}" alt="Men's Product 6" class="w-full h-[400px] object-cover">
                </a>
                <div class="p-4 text-center">
                    <span class="block text-gray-800 font-semibold text-lg">$89.99</span>
                    <button class="mt-2 px-4 py-2 bg-orange-500 text-white rounded-lg hover:bg-orange-600 transition-all">
                        Add to Cart
                    </button>
                </div>
            </div>`
        ];

        const container = document.getElementById('product-container');
        products.forEach(product => {
            container.insertAdjacentHTML('beforeend', product);
        });

        // Optionally, hide the button after loading all products
        this.style.display = 'none';
    });
</script>

@endsection
