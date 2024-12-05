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
        <!-- Loop through products -->
        @foreach($products as $product)
        <div class="group relative bg-white rounded-lg shadow-md overflow-hidden transform transition-transform duration-300 hover:scale-105">
            <a href="{{ route('product.show', ['id' => $product['id']]) }}">
                <img src="{{ asset($product['image']) }}" alt="{{ $product['title'] }}" class="w-full h-[400px] object-cover">
            </a>
            <div class="p-4 text-center">
                <span class="block text-gray-800 font-semibold text-lg">{{ $product['title'] }}</span>
                <span class="block text-gray-600">{{ $product['price'] }}</span>
                <button
                    class="mt-2 px-4 py-2 bg-orange-500 text-white rounded-lg hover:bg-orange-600 transition-all"
                    onclick="event.preventDefault(); document.getElementById('add-to-cart-{{ $product['id'] }}').submit();">
                    Add to Cart
                </button>
                <form id="add-to-cart-{{ $product['id'] }}" action="{{ route('cart.add') }}" method="POST" class="hidden">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product['id'] }}">
                </form>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
