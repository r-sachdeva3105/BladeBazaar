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

// Password Reset Page Route
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

// Admin Routes
Route::prefix('admin')->name('admin.')->group(function () {

    // Admin Dashboard Route
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    // Manage Categories Page
    Route::get('/categories', function () {
        return view('admin.categories');
    })->name('categories');  

    // Manage Orders Page
    Route::get('/orders', function () {
        return view('admin.orders');
    })->name('orders');

    // Manage Products Page
    Route::get('/products', function () {
        return view('admin.products');
    })->name('products');

    // Manage Users Page
    Route::get('/users', function () {
        return view('admin.users');
    })->name('users');
});
