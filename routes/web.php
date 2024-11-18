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

//Categories [Women]
Route::get('/women', function () {
    return view('products.women');
})->name('women');

//Categories [Kids]
Route::get('/kids', function () {
    return view('products.kids');
})->name('kids');



Route::get('/product/{id}', function ($id) {
    // Combine all product data into one array
    $products = [
        // Women's Products
        1 => ['image' => 'assets/products/product_1.png', 'title' => 'Fur Jacket', 'description' => 'A luxurious fur jacket for winter.', 'price' => '$99.99'],
        2 => ['image' => 'assets/products/product_2.png', 'title' => 'Pink Top', 'description' => 'A stylish pink top for casual wear.', 'price' => '$39.99'],
        3 => ['image' => 'assets/products/product_3.png', 'title' => 'Sports Tank Top', 'description' => 'A comfortable sports tank top.', 'price' => '$29.99'],
        4 => ['image' => 'assets/products/product_4.png', 'title' => 'Knit Top', 'description' => 'A cozy knit top for autumn.', 'price' => '$49.99'],
        5 => ['image' => 'assets/products/product_5.png', 'title' => 'Evening Blouse', 'description' => 'An elegant blouse for evening events.', 'price' => '$59.99'],
        6 => ['image' => 'assets/products/product_6.png', 'title' => 'Modest Wear', 'description' => 'Stylish and modest wear.', 'price' => '$69.99'],

        // Men's Products
        15 => ['image' => 'assets/products/product_15.png', 'title' => 'Men\'s Jacket', 'description' => 'A stylish and durable men\'s jacket. Perfect for all seasons.', 'price' => '$79.99'],
        13 => ['image' => 'assets/products/product_13.png', 'title' => 'Hoodie', 'description' => 'A comfortable and trendy hoodie. Perfect for casual wear.', 'price' => '$49.99'],
        14 => ['image' => 'assets/products/product_14.png', 'title' => 'Men\'s Coat', 'description' => 'A formal men\'s coat for office and events.', 'price' => '$89.99'],

        // Kids' Products
        25 => ['image' => 'assets/products/product_25.png', 'title' => 'Kids Lemon Hoodie', 'description' => 'A cute lemon-themed hoodie for kids, perfect for cool weather.', 'price' => '$14.99'],
        26 => ['image' => 'assets/products/product_26.png', 'title' => 'Soccer Print Hoodie', 'description' => 'A trendy soccer-print hoodie for young football enthusiasts.', 'price' => '$24.99'],
        27 => ['image' => 'assets/products/product_27.png', 'title' => 'Striped Hoodie', 'description' => 'A stylish and comfortable striped hoodie for all occasions.', 'price' => '$29.99'],
        28 => ['image' => 'assets/products/product_28.png', 'title' => 'Dino Sweatshirt', 'description' => 'A cozy sweatshirt with a dinosaur print, perfect for fun days.', 'price' => '$9.99'],
        29 => ['image' => 'assets/products/product_29.png', 'title' => 'Kids Track Jacket', 'description' => 'A lightweight and durable track jacket for active kids.', 'price' => '$12.99'],
        30 => ['image' => 'assets/products/product_30.png', 'title' => 'Quilted Winter Jacket', 'description' => 'A warm quilted jacket for keeping kids cozy during winter.', 'price' => '$19.99'],
    ];

    // Validate if the product ID exists
    if (!array_key_exists($id, $products)) {
        abort(404, 'Product not found');
    }

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
