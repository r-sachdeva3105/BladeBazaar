@extends('layouts.app')

@section('content')
<div class="py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-semibold text-gray-800 mb-8">My Profile</h1>

        <!-- User Information -->
        <div class="bg-white shadow-md rounded-lg p-6 mb-8">
            <h2 class="text-2xl font-bold text-gray-800 mb-4">Profile Information</h2>
            <p><strong>Name:</strong> {{ $user['name'] }}</p>
            <p><strong>Email:</strong> {{ $user['email'] }}</p>
        </div>

        <!-- Order History -->
        <div class="bg-white shadow-md rounded-lg p-6">
            <h2 class="text-2xl font-bold text-gray-800 mb-4">Order History</h2>
            @if(empty($userOrders))
                <p class="text-gray-600">You have no orders yet.</p>
            @else
                <table class="min-w-full border-collapse border border-gray-300">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="border border-gray-300 px-4 py-2 text-left">Order ID</th>
                            <th class="border border-gray-300 px-4 py-2 text-left">Total</th>
                            <th class="border border-gray-300 px-4 py-2 text-left">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($userOrders as $order)
                        <tr>
                            <td class="border border-gray-300 px-4 py-2">{{ $order['id'] }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $order['total'] }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $order['status'] }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
</div>
@endsection
