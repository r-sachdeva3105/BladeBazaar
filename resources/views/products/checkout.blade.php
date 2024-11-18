@extends('layouts.app')

@section('content')
<div class="py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-3xl font-semibold text-gray-700 mb-8">Checkout</h2>

        <div class="lg:flex lg:space-x-8">
            <!-- Left Section: Order Summary -->
            <div class="w-full lg:w-2/3 bg-white shadow-md rounded-lg p-6">
                <h3 class="text-xl font-semibold text-gray-700 mb-4">Order Summary</h3>

                <div class="space-y-4">
                    <!-- Product 1 -->
                    <div class="flex justify-between border-b py-4">
                        <div class="flex items-center space-x-4">
                            <img src="https://via.placeholder.com/80" alt="Product" class="w-20 h-20 object-cover rounded-lg">
                            <span class="text-gray-700">Product Name 1</span>
                        </div>
                        <div class="text-gray-700">
                            x1
                            <span class="font-semibold">$50.00</span>
                        </div>
                    </div>

                    <!-- Product 2 -->
                    <div class="flex justify-between border-b py-4">
                        <div class="flex items-center space-x-4">
                            <img src="https://via.placeholder.com/80" alt="Product" class="w-20 h-20 object-cover rounded-lg">
                            <span class="text-gray-700">Product Name 2</span>
                        </div>
                        <div class="text-gray-700">
                            x2
                            <span class="font-semibold">$100.00</span>
                        </div>
                    </div>

                    <!-- Product 3 -->
                    <div class="flex justify-between border-b py-4">
                        <div class="flex items-center space-x-4">
                            <img src="https://via.placeholder.com/80" alt="Product" class="w-20 h-20 object-cover rounded-lg">
                            <span class="text-gray-700">Product Name 3</span>
                        </div>
                        <div class="text-gray-700">
                            x1
                            <span class="font-semibold">$30.00</span>
                        </div>
                    </div>
                </div>

                <div class="flex justify-between mt-6 font-semibold text-lg">
                    <span>Total</span>
                    <span>$180.00</span>
                </div>
            </div>

            <!-- Right Section: Shipping Information -->
            <div class="w-full lg:w-1/3 mt-8 lg:mt-0 bg-white shadow-md rounded-lg p-6">
                <h3 class="text-xl font-semibold text-gray-700 mb-6">Shipping Information</h3>

                <form>
                    <!-- Name -->
                    <div class="mb-4">
                        <label for="name" class="block text-gray-700 font-medium mb-2">Full Name</label>
                        <input type="text" id="name" class="w-full p-3 border border-gray-300 rounded-lg" placeholder="Enter your full name">
                    </div>

                    <!-- Address -->
                    <div class="mb-4">
                        <label for="address" class="block text-gray-700 font-medium mb-2">Shipping Address</label>
                        <input type="text" id="address" class="w-full p-3 border border-gray-300 rounded-lg" placeholder="Enter your address">
                    </div>

                    <!-- City -->
                    <div class="mb-4">
                        <label for="city" class="block text-gray-700 font-medium mb-2">City</label>
                        <input type="text" id="city" class="w-full p-3 border border-gray-300 rounded-lg" placeholder="Enter your city">
                    </div>

                    <!-- State -->
                    <div class="mb-4">
                        <label for="state" class="block text-gray-700 font-medium mb-2">State</label>
                        <input type="text" id="state" class="w-full p-3 border border-gray-300 rounded-lg" placeholder="Enter your state">
                    </div>

                    <!-- Postal Code -->
                    <div class="mb-4">
                        <label for="postal_code" class="block text-gray-700 font-medium mb-2">Postal Code</label>
                        <input type="text" id="postal_code" class="w-full p-3 border border-gray-300 rounded-lg" placeholder="Enter your postal code">
                    </div>

                    <!-- Payment Method -->
                    <div class="mb-6">
                        <label for="payment_method" class="block text-gray-700 font-medium mb-2">Payment Method</label>
                        <select id="payment_method" class="w-full p-3 border border-gray-300 rounded-lg">
                            <option value="credit_card">Credit Card</option>
                            <option value="paypal">PayPal</option>
                            <option value="bank_transfer">Bank Transfer</option>
                        </select>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="w-full py-3 bg-blue-500 text-white font-semibold rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-300">
                        Complete Checkout
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection