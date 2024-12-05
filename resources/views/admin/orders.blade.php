@extends('layouts.admin')

@section('content')
<div class="container mx-auto p-4">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-semibold text-gray-800">Orders</h1>
    </div>

    <div class="bg-white rounded-lg shadow-md p-6">
        <table class="min-w-full border-collapse border border-gray-300">
            <thead class="bg-gray-200">
                <tr>
                    <th class="border border-gray-300 px-4 py-2 text-left text-gray-700">#</th>
                    <th class="border border-gray-300 px-4 py-2 text-left text-gray-700">Customer</th>
                    <th class="border border-gray-300 px-4 py-2 text-left text-gray-700">Total</th>
                    <th class="border border-gray-300 px-4 py-2 text-left text-gray-700">Status</th>
                    <th class="border border-gray-300 px-4 py-2 text-left text-gray-700">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                <tr>
                    <td class="border border-gray-300 px-4 py-2">{{ $order['id'] }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $order['customer'] }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $order['total'] }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $order['status'] }}</td>
                    <td class="border border-gray-300 px-4 py-2">
                        <a href="{{ route('admin.orders.show', $order['id']) }}" class="text-blue-500 hover:underline">View</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection