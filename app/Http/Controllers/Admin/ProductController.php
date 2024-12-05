<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private $products;

    public function __construct()
    {
        $mockData = include base_path('routes/mockData.php');
        $this->products = collect(array_merge($mockData['men'], $mockData['women'], $mockData['kids']));
    }

    public function index()
    {
        return view('admin.products', ['products' => $this->products]);
    }

    public function create()
    {
        return view('admin.products.create');
    }

    public function store(Request $request)
    {
        $newProduct = [
            'id' => $this->products->max('id') + 1,
            'image' => $request->input('image'),
            'title' => $request->input('title'),
            'price' => $request->input('price'),
        ];
        $this->products->push($newProduct);

        return redirect()->route('admin.products.index')->with('success', 'Product created successfully.');
    }

    public function edit($id)
    {
        $product = $this->products->firstWhere('id', $id);
        return view('admin.products.edit', ['product' => $product]);
    }

    public function update(Request $request, $id)
    {
        $index = $this->products->search(fn($product) => $product['id'] == $id);
        if ($index !== false) {
            $this->products[$index]['title'] = $request->input('title');
            $this->products[$index]['price'] = $request->input('price');
            $this->products[$index]['image'] = $request->input('image');
        }

        return redirect()->route('admin.products.index')->with('success', 'Product updated successfully.');
    }

    public function destroy($id)
    {
        $this->products = $this->products->filter(fn($product) => $product['id'] != $id);

        return redirect()->route('admin.products.index')->with('success', 'Product deleted successfully.');
    }
}