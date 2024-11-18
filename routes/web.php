<?php

use Illuminate\Support\Facades\Route;

// Home Page Route
Route::get('/', function () {
    return view('home.index');
})->name('home');

// Products Page Route
Route::get('/products', function () {
    return view('products.index');
})->name('products');

// Product Detail Page Route
Route::get('/product/{id}', function ($id) {
    return view('products.show', ['id' => $id]);
})->name('product.show');

// Login Page Route
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/reset', function () {
    return view('auth.password-reset');
})->name('password-reset');

// Register Page Route
Route::get('/register', function () {
    return view('auth.register');
})->name('register');

// Cart Page Route
Route::get('/cart', function () {
    return view('products.cart');
})->name('cart');

// Checkout Page Route
Route::get('/checkout', function () {
    return view('products.checkout');
})->name('checkout');

// About Us Page Route (Optional)
Route::get('/about', function () {
    return view('about.index');
})->name('about');

// Contact Us Page Route (Optional)
Route::get('/contact', function () {
    return view('contact.index');
})->name('contact');

//Categories [Men]
Route::get('/men', function () {
    return view('products.men');
})->name('products.men');

Route::get('/product/{id}', function ($id) {
    // Simulate fetching product data from the database
    $products = [
        15 => ['image' => 'assets/products/product_15.png', 'title' => 'Men\'s Jacket', 'description' => 'A stylish and durable men\'s jacket. Perfect for all seasons.'],
        13 => ['image' => 'assets/products/product_13.png', 'title' => 'Hoodie', 'description' => 'A comfortable and trendy hoodie. Perfect for casual wear.'],
        14 => ['image' => 'assets/products/product_14.png', 'title' => 'Men\'s Coat', 'description' => 'A formal men\'s coat for office and events.'],
    ];

    return view('products.show', ['product' => $products[$id]]);
})->name('product.show');

//Categories [Women]
Route::get('/women', function () {
    return view('products.women');
})->name('women');

Route::get('/product/{id}', function ($id) {
    // Simulate fetching product data
    $products = [
        1 => ['image' => 'assets/products/product_1.png', 'title' => 'Women\'s Dress', 'description' => 'A beautiful and elegant women\'s dress perfect for every occasion.', 'price' => '$49.99'],
        2 => ['image' => 'assets/products/product_2.png', 'title' => 'Casual T-Shirt', 'description' => 'A casual and stylish women\'s t-shirt for everyday wear.', 'price' => '$19.99'],
        3 => ['image' => 'assets/products/product_3.png', 'title' => 'Formal Jacket', 'description' => 'A formal jacket for women, ideal for office and meetings.', 'price' => '$69.99'],
        4 => ['image' => 'assets/products/product_4.png', 'title' => 'Evening Gown', 'description' => 'An elegant evening gown for special occasions.', 'price' => '$89.99'],
        5 => ['image' => 'assets/products/product_5.png', 'title' => 'Summer Top', 'description' => 'A light and breezy top for summer days.', 'price' => '$24.99'],
        6 => ['image' => 'assets/products/product_6.png', 'title' => 'Denim Jeans', 'description' => 'Classic denim jeans for a timeless look.', 'price' => '$39.99'],
    ];

    return view('products.show', ['product' => $products[$id]]);
})->name('product.show');

// Admin Routes
Route::prefix('admin')->name('admin.')->group(function () {

    // Admin Dashboard Route
    Route::get('/', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    // Manage Products Page (Admin)
    Route::get('/products', function () {
        return view('admin.products.index');
    })->name('products.index');

    // Add Product Page (Admin)
    Route::get('/products/create', function () {
        return view('admin.products.create');
    })->name('products.create');

    // Edit Product Page (Admin)
    Route::get('/products/{id}/edit', function ($id) {
        return view('admin.products.edit', ['id' => $id]);
    })->name('products.edit');

    // Manage Orders Page (Admin)
    Route::get('/orders', function () {
        return view('admin.orders.index');
    })->name('orders.index');

    // Manage Users Page (Admin)
    Route::get('/users', function () {
        return view('admin.users.index');
    })->name('users.index');
});
