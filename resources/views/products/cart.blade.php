@extends('layouts.app')

@section('content')
<div class="py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-3xl font-semibold text-gray-700 mb-8">Your Shopping Cart</h2>

        <!-- Cart Table -->
        <div class="bg-white shadow-md rounded-lg overflow-hidden">
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
                    <!-- Loop through each cart item -->
                    <tr class="border-b border-gray-200">
                        <td class="py-4 px-6 flex items-center space-x-4">
                            <img src="https://via.placeholder.com/100" alt="Product" class="w-20 h-20 object-cover rounded-lg">
                            <span class="text-gray-700">Product Name</span>
                        </td>
                        <td class="py-4 px-6 text-gray-700">$49.99</td>
                        <td class="py-4 px-6">
                            <input type="number" value="1" min="1" class="w-16 p-2 border border-gray-300 rounded-lg">
                        </td>
                        <td class="py-4 px-6 text-gray-700">$49.99</td>
                        <td class="py-4 px-6 text-center">
                            <button class="text-red-500 hover:text-red-700">Remove</button>
                        </td>
                    </tr>
                    <tr class="border-b border-gray-200">
                        <td class="py-4 px-6 flex items-center space-x-4">
                            <img src="https://via.placeholder.com/100" alt="Product" class="w-20 h-20 object-cover rounded-lg">
                            <span class="text-gray-700">Product Name 2</span>
                        </td>
                        <td class="py-4 px-6 text-gray-700">$89.99</td>
                        <td class="py-4 px-6">
                            <input type="number" value="2" min="1" class="w-16 p-2 border border-gray-300 rounded-lg">
                        </td>
                        <td class="py-4 px-6 text-gray-700">$179.98</td>
                        <td class="py-4 px-6 text-center">
                            <button class="text-red-500 hover:text-red-700">Remove</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Cart Summary -->
        <div class="mt-8 flex justify-between bg-white shadow-md rounded-lg p-6 items-center">
            <div>
                <h3 class="text-lg font-semibold text-gray-700">Order Summary</h3>
                <p class="text-gray-600 mt-2">Items: 3</p>
                <p class="text-gray-600">Total: $229.97</p>
            </div>
            <div class="flex flex-col items-center">
                <button class="w-full py-2 px-3 bg-blue-500 text-white font-semibold rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-300 mb-4"><a href="/checkout">Proceed to Checkout</a></button>
                <a href="/products" class="text-blue-500 hover:text-blue-700 text-sm">Continue Shopping</a>
            </div>
        </div>
    </div>
</div>
@endsection