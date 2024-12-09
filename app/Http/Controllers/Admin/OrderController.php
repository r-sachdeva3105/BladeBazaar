<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class OrderController extends Controller
{
    private $orders;

    public function __construct()
    {
        $mockOrdersPath = storage_path('mock_orders.json');
        $this->orders = collect(File::exists($mockOrdersPath) ? json_decode(File::get($mockOrdersPath), true) : []);
    }

    public function index()
    {
        return view('admin.orders', ['orders' => $this->orders]);
    }

    public function show($id)
    {
        $order = $this->orders->firstWhere('id', $id);
        if (!$order) {
            abort(404, 'Order not found');
        }
        return view('admin.orders.show', ['order' => $order]);
    }

    public function update(Request $request, $id)
    {
        $mockOrdersPath = storage_path('mock_orders.json');
        $mockOrders = File::exists($mockOrdersPath) ? json_decode(File::get($mockOrdersPath), true) : [];

        $index = collect($mockOrders)->search(fn($order) => $order['id'] == $id);

        if ($index === false) {
            return redirect()->route('admin.orders.index')->with('error', 'Order not found.');
        }

        $request->validate([
            'status' => 'required|in:Pending,Processing,Completed,Cancelled',
        ]);

        // Update the order status
        $mockOrders[$index]['status'] = $request->input('status');

        // Save the updated orders back to the file
        File::put($mockOrdersPath, json_encode($mockOrders, JSON_PRETTY_PRINT));

        return redirect()->route('admin.orders.index')->with('success', 'Order status updated successfully.');
    }


    public function destroy($id)
    {
        $mockOrdersPath = storage_path('mock_orders.json');
        $mockOrders = File::exists($mockOrdersPath) ? json_decode(File::get($mockOrdersPath), true) : [];

        $mockOrders = collect($mockOrders)->reject(fn($order) => $order['id'] == $id)->values()->all();

        File::put($mockOrdersPath, json_encode($mockOrders, JSON_PRETTY_PRINT));

        return redirect()->route('admin.orders.index')->with('success', 'Order deleted successfully.');
    }
}
