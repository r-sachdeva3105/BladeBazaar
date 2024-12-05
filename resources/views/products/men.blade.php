@extends('layouts.app')

@section('content')
<div class="bg-white py-16">
    <!-- Header Section -->
    <div class="max-w-7xl mx-auto text-center">
        <h1 class="text-5xl font-extrabold text-gray-800 mb-4 tracking-wide">
            Collections of Men
        </h1>
        <p class="text-gray-600 text-lg italic mb-12">
            Discover the latest trends for men.
        </p>
    </div>

    <!-- Product Section -->
    <div id="product-container" class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-8">
        <!-- Loop through products -->
        @foreach($products as $product)
            <div class="group relative bg-white rounded-lg shadow-md overflow-hidden transform transition-transform duration-300 hover:scale-105">
                <a href="{{ route('product.show', ['id' => $product['id']]) }}">
                    <img src="{{ asset($product['image']) }}" alt="{{ $product['title'] }}" class="w-full h-[400px] object-cover">
                </a>
                <div class="p-4 text-center">
                    <span class="block text-gray-800 font-semibold text-lg">{{ $product['title'] }}</span>
                    <span class="block text-gray-600">{{ $product['price'] }}</span>
                    <form action="{{ route('cart.add') }}" method="POST" class="mt-2">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product['id'] }}">
                        <input type="hidden" name="product_title" value="{{ $product['title'] }}">
                        <input type="hidden" name="product_price" value="{{ $product['price'] }}">
                        <input type="hidden" name="product_image" value="{{ $product['image'] }}">
                        <button type="submit" class="px-4 py-2 bg-orange-500 text-white rounded-lg hover:bg-orange-600 transition-all">
                            Add to Cart
                        </button>
                    </form>
                </div>
            </div>
        @endforeach

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
        const additionalProducts = @json($products); // Use Laravel's JSON directive to pass products

        const container = document.getElementById('product-container');
        additionalProducts.forEach(product => {
            container.insertAdjacentHTML('beforeend', `
                <div class="group relative bg-white rounded-lg shadow-md overflow-hidden transform transition-transform duration-300 hover:scale-105">
                    <a href="/product/${product.id}">
                        <img src="${product.image}" alt="${product.title}" class="w-full h-[400px] object-cover">
                    </a>
                    <div class="p-4 text-center">
                        <span class="block text-gray-800 font-semibold text-lg">${product.title}</span>
                        <span class="block text-gray-600">${product.price}</span>
                        <form action="{{ route('cart.add') }}" method="POST" class="mt-2">
                            @csrf
                            <input type="hidden" name="product_id" value="${product.id}">
                            <button type="submit" class="px-4 py-2 bg-orange-500 text-white rounded-lg hover:bg-orange-600 transition-all">
                                Add to Cart
                            </button>
                        </form>
                    </div>
                </div>
            `);
        });

        this.style.display = 'none'; // Hide button after loading all products
    });
</script>
@endsection
