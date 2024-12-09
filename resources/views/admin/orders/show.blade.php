@extends('layouts.admin')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-3xl font-semibold text-gray-800 mb-6">Order #{{ $order['id'] }}</h1>
    <p><strong>Customer:</strong> {{ $order['customer'] }}</p>
    <p><strong>Status:</strong> {{ $order['status'] }}</p>
    <p><strong>Total:</strong> ${{ number_format($order['total'], 2) }}</p>

    <h2 class="text-xl font-semibold text-gray-800 mt-6">Items</h2>
    <div class="bg-white rounded-lg shadow-md p-4">
        <table class="min-w-full border-collapse border border-gray-300">
            <thead>
                <tr>
                    <th class="border border-gray-300 px-4 py-2 text-left text-gray-700">Product</th>
                    <th class="border border-gray-300 px-4 py-2 text-left text-gray-700">Price</th>
                    <th class="border border-gray-300 px-4 py-2 text-left text-gray-700">Quantity</th>
                    <th class="border border-gray-300 px-4 py-2 text-left text-gray-700">Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach($order['items'] as $item)
                <tr>
                    <td class="border border-gray-300 px-4 py-2">{{ $item['title'] }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $item['price'] }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $item['quantity'] }}</td>
                    <td class="border border-gray-300 px-4 py-2">
                        ${{ number_format($item['quantity'] * (float) substr($item['price'], 1), 2) }}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
