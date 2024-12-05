@extends('layouts.app')

@section('content')
<div class="bg-white py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-3xl font-semibold text-gray-700 mb-8">Checkout</h2>

        @if(session('success'))
            <div class="bg-green-500 text-white p-4 rounded mb-4">{{ session('success') }}</div>
        @endif

        @if(empty($cart) || count($cart) === 0)
            <p class="text-gray-600">Your cart is empty. <a href="{{ route('products') }}" class="text-blue-500 hover:underline">Continue Shopping</a></p>
        @else
        <form action="{{ route('checkout.perform') }}" method="POST">
            @csrf
            <!-- Order Summary -->
            <div class="bg-white shadow-md rounded-lg overflow-hidden mb-6">
                <table class="min-w-full text-sm">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="py-3 px-6 text-left font-medium text-gray-600">Product</th>
                            <th class="py-3 px-6 text-left font-medium text-gray-600">Price</th>
                            <th class="py-3 px-6 text-left font-medium text-gray-600">Quantity</th>
                            <th class="py-3 px-6 text-left font-medium text-gray-600">Total</th>
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
                            <td class="py-4 px-6">{{ $item['quantity'] }}</td>
                            <td class="py-4 px-6 text-gray-700">${{ number_format($subtotal, 2) }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Total Amount -->
            <div class="flex justify-between items-center mb-8">
                <span class="text-xl font-semibold text-gray-700">Total: ${{ number_format($total, 2) }}</span>
            </div>

            <!-- Payment Details -->
            <div class="mb-6">
                <h3 class="text-lg font-semibold text-gray-700 mb-4">Payment Details</h3>
                <input type="text" name="card_number" class="w-full p-3 border border-gray-300 rounded-lg mb-4" placeholder="Card Number" required>
                <div class="flex space-x-4">
                    <input type="text" name="expiry_date" class="w-full p-3 border border-gray-300 rounded-lg" placeholder="Expiry Date (MM/YY)" required>
                    <input type="text" name="cvv" class="w-full p-3 border border-gray-300 rounded-lg" placeholder="CVV" required>
                </div>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="w-full py-3 bg-blue-500 text-white font-semibold rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-300">
                Complete Order
            </button>
        </form>
        @endif
    </div>
</div>
@endsection
