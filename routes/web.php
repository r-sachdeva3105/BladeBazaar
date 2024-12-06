<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\DashboardController;

$mockData = include base_path('routes/mockData.php');

// Home Page Route
Route::get('/', function () {
    $mockData = include base_path('routes/mockData.php');

    // Fetch a mix of random products (e.g., 2 from each category)
    $popularProducts = array_merge(
        array_slice($mockData['men'], 0, 2),
        array_slice($mockData['women'], 0, 2),
        array_slice($mockData['kids'], 0, 2)
    );

    return view('home.index', ['popularProducts' => $popularProducts]);
})->name('home');


// Login Page - GET
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

// Login Form Submission - Mock Data
Route::post('/login', function (Request $request) {
    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    $mockDataPath = storage_path('mock_users.json');
    if (!File::exists($mockDataPath)) {
        return back()->withErrors(['email' => 'No registered users found.']);
    }

    $mockUsers = json_decode(File::get($mockDataPath), true);
    $user = collect($mockUsers)->firstWhere('email', $credentials['email']);

    if (!$user || !Hash::check($credentials['password'], $user['password'])) {
        return back()->withErrors(['email' => 'The provided credentials are incorrect.']);
    }

    Session::put('user', [
        'name' => $user['name'],
        'email' => $user['email'],
    ]);

    return redirect()->route('home')->with('success', 'You are now logged in.');
})->name('login.perform');

// Logout Route
Route::post('/logout', function () {
    Session::forget('user');
    return redirect('/')->with('success', 'You have been logged out.');
})->name('logout');

// Register Page - GET
Route::get('/register', function () {
    return view('auth.register');
})->name('register');

// Register Form Submission - Mock Data
Route::post('/register', function (Request $request) {
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email',
        'password' => 'required|confirmed|min:6',
    ]);

    $mockDataPath = storage_path('mock_users.json');
    $mockUsers = File::exists($mockDataPath) ? json_decode(File::get($mockDataPath), true) : [];

    foreach ($mockUsers as $user) {
        if ($user['email'] === $validated['email']) {
            return back()->withErrors(['email' => 'The email address is already registered.']);
        }
    }

    $mockUsers[] = [
        'name' => $validated['name'],
        'email' => $validated['email'],
        'password' => Hash::make($validated['password']),
    ];

    File::put($mockDataPath, json_encode($mockUsers, JSON_PRETTY_PRINT));

    return redirect()->route('login')->with('success', 'Account created successfully. Please log in.');
})->name('register.perform');

// Cart Routes
Route::get('/cart', function () {
    $cart = Session::get('cart', []);
    return view('products.cart', ['cart' => $cart]);
})->name('cart');

Route::post('/cart/add', function (Request $request) use ($mockData) {
    $productId = $request->input('product_id');
    $allProducts = array_merge($mockData['men'], $mockData['women'], $mockData['kids']);
    $product = collect($allProducts)->firstWhere('id', $productId);

    if (!$product) {
        return redirect()->route('cart')->with('error', 'Product not found.');
    }

    $cart = Session::get('cart', []);

    // Check if product is already in the cart
    if (isset($cart[$productId])) {
        $cart[$productId]['quantity'] += 1; // Increment quantity
    } else {
        $product['quantity'] = 1;
        $cart[$productId] = $product; // Store product using product ID as key
    }

    Session::put('cart', $cart);

    return redirect()->route('cart')->with('success', 'Product added to cart.');
})->name('cart.add');


Route::post('/cart/update', function (Request $request) {
    $cart = Session::get('cart', []);
    $productId = $request->input('product_id');
    $quantity = (int) $request->input('quantity');

    if (isset($cart[$productId])) {
        if ($quantity > 0) {
            $cart[$productId]['quantity'] = $quantity; // Update quantity
        } else {
            unset($cart[$productId]); // Remove item if quantity is 0
        }
    }

    Session::put('cart', $cart);

    return redirect()->route('cart')->with('success', 'Cart updated successfully!');
})->name('cart.update');


Route::post('/cart/remove', function (Request $request) {
    $cart = Session::get('cart', []);
    $productId = $request->input('product_id');

    if (isset($cart[$productId])) {
        unset($cart[$productId]); // Remove product from cart
    }

    Session::put('cart', $cart);

    return redirect()->route('cart')->with('success', 'Product removed from cart.');
})->name('cart.remove');



// Product Details
Route::delete('/admin/products/{id}', [ProductController::class, 'destroy'])->name('admin.products.destroy');



Route::get('/product/{id}', function ($id) {
    $mockData = include base_path('routes/mockData.php');
    $allProducts = array_merge(
        $mockData['men'],
        $mockData['women'],
        $mockData['kids']
    );

    $product = collect($allProducts)->firstWhere('id', $id);

    if (!$product) {
        abort(404, 'Product not found');
    }

    return view('products.show', ['product' => $product]);
})->name('product.show');

// Categories
Route::get('/men', function () {
    $mockData = include base_path('routes/mockData.php');
    return view('products.men', ['products' => $mockData['men']]);
})->name('products.men');

Route::get('/women', function () {
    $mockData = include base_path('routes/mockData.php');
    return view('products.women', ['products' => $mockData['women']]);
})->name('women');

Route::get('/kids', function () {
    $mockData = include base_path('routes/mockData.php');
    return view('products.kids', ['products' => $mockData['kids']]);
})->name('kids');

Route::get('/products', function () {
    return view('products.index');
})->name('products');


// About Us Page Route
Route::get('/about', function () {
    return view('about.index');
})->name('about');

// Contact Us Page Route
Route::get('/contact', function () {
    return view('contact.index');
})->name('contact');

// Checkout Page Route
Route::get('/checkout', function () {
    $cart = Session::get('cart', []);
    if (empty($cart)) {
        return redirect()->route('cart')->with('error', 'Your cart is empty.');
    }

    return view('products.checkout', ['cart' => $cart]); // Load the checkout page
})->name('checkout');

// Perform Checkout (Mock Process)
Route::post('/checkout', function (Request $request) {
    $cart = Session::get('cart', []);

    if (empty($cart)) {
        return redirect()->route('checkout')->with('error', 'Your cart is empty.');
    }

    // Validate payment details (mock validation)
    $request->validate([
        'card_number' => 'required|digits:16',
        'expiry_date' => 'required',
        'cvv' => 'required|digits:3',
    ]);

    // Clear the cart after checkout
    Session::forget('cart');

    return redirect()->route('home')->with('success', 'Your order has been placed successfully!');
})->name('checkout.perform');


//----------------------------------------ADMIN---------------------------------------------------------------------------------------------------------//

// Admin Routes
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Categories CRUD
    Route::resource('categories', CategoryController::class);

    // Products CRUD
    Route::resource('products', ProductController::class);

    // Orders CRUD
    Route::resource('orders', OrderController::class);

    // Users CRUD
    Route::resource('users', UserController::class);
});