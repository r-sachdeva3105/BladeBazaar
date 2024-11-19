@extends('layouts.app')

@section('content')
<div class="bg-white py-16">
    <div class="max-w-7xl mx-auto px-6">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
            <!-- Product Image -->
            <div>
                <img src="{{ asset($product['image']) }}" alt="{{ $product['title'] }}" class="w-full h-auto rounded-lg shadow-lg">
            </div>

            <!-- Product Details -->
            <div class="space-y-6">
                <h1 class="text-4xl font-bold text-gray-800">{{ $product['title'] }}</h1>
                <p class="text-gray-600 text-lg">{{ $product['description'] }}</p>
                <div class="flex items-center space-x-4">
                    <span class="text-2xl font-semibold text-gray-800">$49.99</span>
                    <button class="bg-orange-500 text-white px-6 py-3 rounded-lg hover:bg-orange-600 transition-all">
                        Add to Cart
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
