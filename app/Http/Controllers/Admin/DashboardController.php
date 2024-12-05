<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        try {
            // Get mock data from mockData.php
            $mockData = include base_path('routes/mockData.php');
            
            // Calculate categories count
            $categoriesCount = count($mockData); // Will count men, women, kids categories
            
            // Calculate total products
            $totalProducts = 0;
            foreach ($mockData as $category) {
                $totalProducts += count($category);
            }
            
            // Get users count from mock_users.json
            $usersJson = file_get_contents(storage_path('mock_users.json'));
            $users = json_decode($usersJson, true);
            $usersCount = count($users);
            
            // For orders, since it's mock data, we'll use a sample count
            // In a real application, this would come from an orders table or file
            $ordersCount = 10;
            
            return view('admin.dashboard', [
                'categoriesCount' => $categoriesCount,
                'totalProducts' => $totalProducts,
                'usersCount' => $usersCount,
                'ordersCount' => $ordersCount
            ]);
            
        } catch (\Exception $e) {
            // Handle any errors that might occur while reading files
            return view('admin.dashboard', [
                'categoriesCount' => 0,
                'totalProducts' => 0,
                'usersCount' => 0,
                'ordersCount' => 0
            ])->with('error', 'Error loading dashboard data');
        }
    }
}