<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    private $mockDataPath;
    private $mockData;

    public function __construct()
    {
        // Path to the mockData.php file
        $this->mockDataPath = base_path('routes/mockData.php');
        $this->loadMockData();
    }

    private function loadMockData()
    {
        // Load the mock data from the PHP file
        $this->mockData = include $this->mockDataPath;
    }

    private function saveMockData()
    {
        // Manually format the mock data into a valid PHP array syntax
        $phpData = '<?php return ' . $this->arrayToPhp($this->mockData) . ';';

        // Save it back to the mockData.php file
        file_put_contents($this->mockDataPath, $phpData);
    }

    private function arrayToPhp($array)
    {
        $output = [];
        foreach ($array as $key => $value) {
            // If the value is an array, call this function recursively
            if (is_array($value)) {
                $output[] = "'" . addslashes($key) . "' => " . $this->arrayToPhp($value);
            } else {
                // If it's a scalar value (string, integer, etc.), escape the string and format
                $output[] = "'" . addslashes($key) . "' => '" . addslashes($value) . "'";
            }
        }
        
        return '[' . implode(', ', $output) . ']';
    }

    public function index()
    {
        // Fetch categories from mock data
        $categories = collect($this->mockData);

        return view('admin.categories', ['categories' => $categories]);
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required', // Ensure the category name is provided
        ]);
    
        $name = strtolower($request->input('name'));
    
        // Check if the category already exists in the mock data
        if (array_key_exists($name, $this->mockData)) {
            return redirect()->route('admin.categories.index')
                ->with('error', 'Category already exists.');
        }
    
        // Add the new category with an empty array (no products) at the end of the mock data
        $this->mockData[$name] = []; // Initialize with an empty array for products
    
        // Save the updated mock data back to the file
        $this->saveMockData();
    
        return redirect()->route('admin.categories.index')
            ->with('success', 'Category added successfully!');
    }
    

    public function edit($name)
    {
        // Fetch category from mock data
        $category = $this->mockData[$name] ?? null;

        if (!$category) {
            return redirect()->route('admin.categories.index')
                ->with('error', 'Category not found.');
        }

        // Pass both category name and description to the view
        return view('admin.categories.edit', compact('name', 'category'));
    }

    public function update(Request $request, $name)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required', // Ensure description is required when updating
            'products' => 'required|array', // Ensure products are included
        ]);
    
        // Fetch the category from the mock data
        $category = $this->mockData[$name] ?? null;
    
        if (!$category) {
            return redirect()->route('admin.categories.index')
                ->with('error', 'Category not found.');
        }
    
        // Update the category description
        $this->mockData[$name]['description'] = $request->input('description');
    
        // Update products in the category
        $products = [];
        foreach ($request->input('products') as $product) {
            // Ensure products reflect the correct data (may not be necessary if ProductController handles the update)
            $products[] = [
                'id' => $product['id'],
                'image' => $product['image'],
                'title' => $product['title'],
                'price' => $product['price'],
                'category' => $name, // Ensure the category is correctly assigned
            ];
        }
    
        $this->mockData[$name][$name] = $products;
    
        $this->saveMockData();
    
        return redirect()->route('admin.categories.index')
            ->with('success', 'Category updated successfully!');
    }

    public function destroy($name)
    {
        // Fetch the category from the mock data
        if (!array_key_exists($name, $this->mockData)) {
            return redirect()->route('admin.categories.index')
                ->with('error', 'Category not found.');
        }

        // Delete the category from the mock data
        unset($this->mockData[$name]);

        $this->saveMockData();

        return redirect()->route('admin.categories.index')
            ->with('success', 'Category deleted successfully!');
    }
}
