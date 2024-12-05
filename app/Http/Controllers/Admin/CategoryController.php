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
        $this->mockDataPath = base_path('routes/mockData.php');
        $this->mockData = include $this->mockDataPath;
    }

    public function index()
    {
        $categories = [
            ['id' => 1, 'name' => 'men', 'description' => 'Men\'s Fashion Collection'],
            ['id' => 2, 'name' => 'women', 'description' => 'Women\'s Fashion Collection'],
            ['id' => 3, 'name' => 'kids', 'description' => 'Kids\' Fashion Collection']
        ];
        return view('admin.categories', ['categories' => collect($categories)]);
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required'
        ]);

        return redirect()->route('admin.categories.index')
            ->with('info', 'Adding new categories is not supported in mock data mode');
    }

    public function edit($id)
    {
        $mockData = include $this->mockDataPath;
        $categories = [
            ['id' => 1, 'name' => 'men', 'description' => 'Men\'s Fashion Collection'],
            ['id' => 2, 'name' => 'women', 'description' => 'Women\'s Fashion Collection'],
            ['id' => 3, 'name' => 'kids', 'description' => 'Kids\' Fashion Collection']
        ];
        
        $category = collect($categories)->firstWhere('id', (int)$id);
        
        if (!$category) {
            return redirect()->route('admin.categories.index')
                ->with('error', 'Category not found');
        }
        
        return view('admin.categories.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required'
        ]);

        $mockData = include $this->mockDataPath;
        $categories = [
            ['id' => 1, 'name' => 'men', 'description' => 'Men\'s Fashion Collection'],
            ['id' => 2, 'name' => 'women', 'description' => 'Women\'s Fashion Collection'],
            ['id' => 3, 'name' => 'kids', 'description' => 'Kids\' Fashion Collection']
        ];

        $category = collect($categories)->firstWhere('id', (int)$id);
        if (!$category) {
            return redirect()->route('admin.categories.index')
                ->with('error', 'Category not found');
        }

        // Prevent changing category names to maintain data structure
        if (strtolower($request->input('name')) !== strtolower($category['name'])) {
            return redirect()->route('admin.categories.index')
                ->with('error', 'Category name cannot be changed in mock data mode');
        }

        return redirect()->route('admin.categories.index')
            ->with('info', 'Category updated successfully');
    }

    public function destroy($id)
    {
        return redirect()->route('admin.categories.index')
            ->with('info', 'Deleting categories is not supported in mock data mode');
    }

    public function show($id)
    {
        return redirect()->route('admin.categories.index');
    }
}