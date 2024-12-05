<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    private $orders;

    public function __construct()
    {
        // Create mock order data
        $this->orders = collect([
            ['id' => 1, 'customer' => 'John Doe', 'total' => 200, 'status' => 'Pending'],
            ['id' => 2, 'customer' => 'Jane Smith', 'total' => 150, 'status' => 'Completed'],
            ['id' => 3, 'customer' => 'Bob Johnson', 'total' => 300, 'status' => 'Processing'],
        ]);
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
        $order = $this->orders->firstWhere('id', $id);
        if (!$order) {
            return redirect()->route('admin.orders.index')->with('error', 'Order not found.');
        }

        $request->validate([
            'status' => 'required|in:Pending,Processing,Completed,Cancelled',
        ]);

        $index = $this->orders->search(fn($o) => $o['id'] == $id);
        $this->orders[$index]['status'] = $request->input('status');

        return redirect()->route('admin.orders.index')->with('success', 'Order status updated successfully.');
    }

    public function destroy($id)
    {
        $this->orders = $this->orders->filter(fn($order) => $order['id'] != $id);
        return redirect()->route('admin.orders.index')->with('success', 'Order deleted successfully.');
    }
}