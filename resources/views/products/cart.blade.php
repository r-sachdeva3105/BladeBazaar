@extends('layouts.app')

@section('content')
<div class="py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-3xl font-semibold text-gray-700 mb-8">Your Shopping Cart</h2>

        @if(session('success'))
            <div class="bg-green-500 text-white p-4 rounded mb-4">{{ session('success') }}</div>
        @endif

        @if(empty($cart) || count($cart) === 0)
            <p class="text-gray-600">Your cart is empty. <a href="{{ route('products') }}" class="text-blue-500 hover:underline">Continue Shopping</a></p>
        @else
        <!-- Cart Table -->
        <div class="bg-white shadow-md rounded-lg overflow-hidden mb-6">
            <table class="min-w-full text-sm">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="py-3 px-6 text-left font-medium text-gray-600">Product</th>
                        <th class="py-3 px-6 text-left font-medium text-gray-600">Price</th>
                        <th class="py-3 px-6 text-left font-medium text-gray-600">Quantity</th>
                        <th class="py-3 px-6 text-left font-medium text-gray-600">Total</th>
                        <th class="py-3 px-6 text-center font-medium text-gray-600">Remove</th>
                    </tr>
                </thead>
                <tbody>
                    @php $total = 0; @endphp
                    @foreach($cart as $item)
                        @php $subtotal = $item['quantity'] * (float) substr($item['price'], 1); @endphp
                        @php $total += $subtotal; @endphp
                        <tr class="border-b border-gray-200">
                            <td class="py-4 px-6 flex items-center space-x-4">
                                <img src="{{ asset($item['image']) }}" alt="{{ $item['title'] }}" class="w-20 h-20 object-cover rounded-lg">
                                <span class="text-gray-700">{{ $item['title'] }}</span>
                            </td>
                            <td class="py-4 px-6 text-gray-700">{{ $item['price'] }}</td>
                            <td class="py-4 px-6">
                                <form action="{{ route('cart.update') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $item['id'] }}">
                                    <input type="number" name="quantity" value="{{ $item['quantity'] }}" class="w-16 p-2 border rounded-lg">
                                    <button type="submit" class="ml-2 px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600">Update</button>
                                </form>
                            </td>
                            <td class="py-4 px-6 text-gray-700">${{ number_format($subtotal, 2) }}</td>
                            <td class="py-4 px-6 text-center">
                                <form action="{{ route('cart.remove') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $item['id'] }}">
                                    <button type="submit" class="text-red-500 hover:text-red-700">Remove</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Total and Checkout -->
        <div class="flex justify-between items-center mt-8">
            <span class="text-xl font-semibold text-gray-700">Total: ${{ number_format($total, 2) }}</span>
            <a href="{{ route('checkout') }}" class="px-6 py-3 bg-green-500 text-white font-semibold rounded-lg hover:bg-green-600">Proceed to Checkout</a>
        </div>
        @endif
    </div>
</div>
@endsection
