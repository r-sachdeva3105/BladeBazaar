@extends('layouts.app')

@section('content')
<div class="bg-white py-16">
    <!-- Header Section -->
    <div class="max-w-7xl mx-auto text-center mb-12">
        <h2 class="text-5xl font-extrabold text-gray-800 tracking-wide">Our Popular Products</h2>
        <p class="text-gray-600 text-lg italic">Explore the latest trends and styles.</p>
    </div>

    <!-- Popular Products Section -->
    <div class="max-w-7xl mx-auto grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-8">
        @foreach(array_slice($popularProducts, 0, 4) as $product) <!-- Display only the first 4 products -->
        <div class="group relative bg-white rounded-lg shadow-md overflow-hidden transform transition-transform duration-300 hover:scale-105">
            <a href="{{ route('product.show', ['id' => $product['id']]) }}">
                <img src="{{ asset($product['image']) }}" alt="{{ $product['title'] }}" class="w-full h-72 object-cover"> <!-- Adjusted height -->
            </a>
            <div class="p-4 text-center">
                <h3 class="text-gray-800 font-semibold text-lg">{{ $product['title'] }}</h3>
                <p class="text-gray-600">{{ $product['price'] }}</p>
                <form action="{{ route('cart.add') }}" method="POST">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product['id'] }}">
                    <button type="submit" class="mt-2 px-4 py-2 bg-orange-500 text-white rounded-lg hover:bg-orange-600 transition-all">
                        Add to Cart
                    </button>
                </form>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
