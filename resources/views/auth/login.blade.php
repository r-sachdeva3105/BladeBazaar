@extends('layouts.app')

@section('content')
<div class="flex justify-center items-center py-16">
    <div class="w-full max-w-md p-8 rounded-lg shadow-lg bg-white">
        <h2 class="text-3xl font-semibold text-center text-gray-700 mb-6">Login</h2>
        
        <!-- Login Form -->
        <form action="{{ route('login.perform') }}" method="POST">
            @csrf

            <!-- Email Address -->
            <div class="mb-4">
                <label for="email" class="block text-gray-700 font-medium mb-2">Email address</label>
                <input 
                    type="email" 
                    id="email" 
                    name="email" 
                    class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Enter your email" 
                    required autofocus>
                @error('email')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Password -->
            <div class="mb-6">
                <label for="password" class="block text-gray-700 font-medium mb-2">Password</label>
                <input 
                    type="password" 
                    id="password" 
                    name="password" 
                    class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Enter your password" 
                    required>
                @error('password')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Remember Me -->
            <div class="flex items-center justify-between mb-6">
                <div class="flex items-center">
                    <input 
                        type="checkbox" 
                        id="remember" 
                        name="remember" 
                        class="mr-2" 
                        {{ old('remember') ? 'checked' : '' }}>
                    <label for="remember" class="text-gray-600">Remember me</label>
                </div>
                <a href="/reset" class="text-sm text-blue-500 hover:text-blue-700">Forgot password?</a>
            </div>

            <!-- Submit Button -->
            <button 
                type="submit" 
                class="w-full py-3 bg-blue-500 text-white font-semibold rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-300">
                Login
            </button>
        </form>
        
        <!-- Register Redirect -->
        <p class="text-center text-sm text-gray-600 mt-4">
            Don't have an account? <a href="{{ route('register') }}" class="text-blue-500 hover:text-blue-700">Register here</a>
        </p>
    </div>
</div>
@endsection
