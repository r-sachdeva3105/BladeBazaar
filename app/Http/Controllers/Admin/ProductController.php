<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private $products;

    public function __construct()
    {
        // Load mock data from routes/mockData.php
        $mockData = include base_path('routes/mockData.php');
        // Combine all categories dynamically into the products collection
        $this->products = collect(array_merge(...array_values($mockData)));
    }

    public function index()
    {
        return view('admin.products', ['products' => $this->products]);
    }

    public function create()
    {
        // Retrieve categories dynamically from mock data
        $mockData = include base_path('routes/mockData.php');
        // Extract keys (categories) from mock data to pass to the view
        $categories = array_keys($mockData);

        // Pass categories to the view
        return view('admin.products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        // Load mock data from mockData.php
        $mockData = include base_path('routes/mockData.php');
        $category = $request->input('category'); // Get the selected category

        // Create new product data
        $newProduct = [
            'id' => $this->products->max('id') + 1,
            'image' => $request->input('image'),
            'title' => $request->input('title'),
            'price' => $request->input('price'),
            'category' => $category,  // Add the category to the product
        ];

        // Add the new product to the corresponding category in the mock data
        if (isset($mockData[$category])) {
            $mockData[$category][] = $newProduct;
        }

        // Save the updated mock data back to the file
        file_put_contents(base_path('routes/mockData.php'), '<?php return ' . var_export($mockData, true) . ';');

        // Reload the products collection after adding the new product
        $this->products = collect(array_merge(...array_values($mockData)));

        return redirect()->route('admin.products.index')->with('success', 'Product created successfully.');
    }

    public function edit($id)
    {
        // Find the product by ID
        $product = $this->products->firstWhere('id', $id);

        // Retrieve categories dynamically from mock data
        $mockData = include base_path('routes/mockData.php');
        $categories = array_keys($mockData); // Get categories (men, women, kids)

        return view('admin.products.edit', ['product' => $product, 'categories' => $categories]);
    }

    public function update(Request $request, $id)
    {
        // Load mock data from mockData.php
        $mockData = include base_path('routes/mockData.php');
        
        // Step 1: Find and update the product in the mock data
        foreach ($mockData as $category => &$categoryProducts) {
            foreach ($categoryProducts as &$product) {
                if ($product['id'] == $id) {
                    // Update product fields
                    $product['title'] = $request->input('title');
                    $product['price'] = $request->input('price');
                    $product['image'] = $request->input('image');
                    $product['category'] = $request->input('category'); // Update category as well
                    break 2; // Break out of both loops after the product is found and updated
                }
            }
        }

        // Step 2: Save the updated mock data back to the file
        file_put_contents(base_path('routes/mockData.php'), '<?php return ' . var_export($mockData, true) . ';');

        // Reload the products collection after updating
        $this->products = collect(array_merge(...array_values($mockData)));

        // Step 3: Redirect to product list with success message
        return redirect()->route('admin.products.index')->with('success', 'Product updated successfully.');
    }

    public function destroy($id)
    {
        // Load mock data from mockData.php
        $mockData = include base_path('routes/mockData.php');

        // Find the product to delete
        $productToDelete = null;
        foreach ($mockData as $category => $products) {
            foreach ($products as $key => $product) {
                if ($product['id'] == $id) {
                    $productToDelete = ['category' => $category, 'key' => $key];
                    break 2; // Break out of both loops
                }
            }
        }

        // If product is found, remove it
        if ($productToDelete) {
            unset($mockData[$productToDelete['category']][$productToDelete['key']]);
            // Reindex the array to prevent gaps in the keys
            $mockData[$productToDelete['category']] = array_values($mockData[$productToDelete['category']]);
            // Save the updated mock data back to the file
            file_put_contents(base_path('routes/mockData.php'), '<?php return ' . var_export($mockData, true) . ';');
            
            // Reload the products collection after deleting
            $this->products = collect(array_merge(...array_values($mockData)));

            return redirect()->route('admin.products.index')
                ->with('success', 'Product deleted successfully!');
        } else {
            return redirect()->route('admin.products.index')
                ->with('error', 'Product not found.');
        }
    }
}
