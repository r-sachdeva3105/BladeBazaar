<header class="bg-gray-900 text-white shadow-lg">
    <!-- Top Row - Brand and Contact Information -->
    <div class="max-w-7xl mx-auto px-6 lg:px-8 py-3 flex justify-between items-center border-b border-gray-700">
        <!-- Left Section - Company Name -->
        <div class="text-3xl font-extrabold tracking-tight">
            <a href="/" class="hover:text-gray-400 flex items-center"><img src="{{ asset('assets/logo.png') }}" width="50" alt="BladeBazaar">BladeBazaar</a>
        </div>

        <!-- Center Section - Contact Info -->
        <div class="hidden md:flex space-x-6 text-lg text-gray-300">
            <div class="flex items-center">
                <i class="fa-solid fa-headset mr-2 text-orange-600"></i>
                <span>+1 (234) 567-8900</span>
            </div>
            <div class="flex items-center">
                <i class="fas fa-envelope mr-2 text-orange-600"></i>
                <span>info@bladebazaar.com</span>
            </div>
        </div>
    </div>

    <!-- Bottom Row - Navigation and Search Bar -->
    <div class="max-w-7xl mx-auto px-6 lg:px-8 py-4 flex justify-between items-center">
        <!-- Search Bar -->
        <div class="flex-grow max-w-md">
            <div class="relative">
                <input
                    type="text"
                    placeholder="Search Products..."
                    class="w-full px-3 py-2 rounded-lg bg-gray-600 text-gray-200 focus:outline-none focus:ring-2 focus:ring-orange-500">
                <button class="absolute right-0 top-0 px-3 py-2 bg-orange-600 text-white rounded-r-lg hover:bg-orange-600">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </button>
            </div>
        </div>

        <!-- Right Section - Navigation and Cart Icon -->
        <div class="flex items-center space-x-8">
            <!-- Navigation -->
            <nav class="hidden md:flex space-x-8 text-lg">
                <ul class="flex space-x-8">
                    <li><a href="/" class="hover:text-gray-400">Home</a></li>

                    <!-- Dropdown Menu for Categories -->
                    <li class="relative">
                        <button class="hover:text-gray-400 focus:outline-none" id="category">Categories</button>
                        <div class="absolute left-0 hidden mt-2 space-y-2 bg-gray-800 text-white shadow-lg rounded-lg w-48 z-1" id="category-menu">
                            <a href="/men" class="block px-4 py-2 hover:bg-gray-700">Men</a>
                            <a href="/women" class="block px-4 py-2 hover:bg-gray-700">Women</a>
                            <a href="/kids" class="block px-4 py-2 hover:bg-gray-700">Kids</a>
                        </div>
                    </li>

                    <!-- Conditional Links -->
                    @if (Session::has('user'))
                        <li><a href="{{ route('user.profile') }}" class="hover:text-gray-400">Welcome, {{ Session::get('user.name') }}</a></li>
                        <li>
                            <form action="{{ route('logout') }}" method="POST" class="inline">
                                @csrf
                                <button type="submit" class="hover:text-gray-400">Logout</button>
                            </form>
                        </li>
                    @else
                        <li><a href="{{ route('login') }}" class="hover:text-gray-400">Login</a></li>
                        <li><a href="{{ route('register') }}" class="hover:text-gray-400">Register</a></li>
                    @endif


                    <li><a href="/cart" class="hover:text-gray-400">
                            <!-- Cart Icon -->
                            <i class="fas fa-shopping-cart text-xl"></i>
                        </a>
                    </li>
                </ul>
            </nav>

            <!-- Mobile Menu Toggle Button -->
            <button
                class="md:hidden flex items-center text-gray-400 hover:text-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-500"
                id="mobile-menu-toggle">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                </svg>
            </button>
        </div>
    </div>

    <!-- Mobile Menu -->
    <nav id="mobile-menu" class="md:hidden bg-gray-900 text-gray-300 hidden px-6 py-4">
        <ul class="space-y-4 text-lg">
            <li><a href="/" class="block hover:text-gray-400">Home</a></li>
            <li><a href="/men" class="block hover:text-gray-400">Men</a></li>
            <li><a href="/women" class="block hover:text-gray-400">Women</a></li>
            <li><a href="/kids" class="block hover:text-gray-400">Kids</a></li>
            @if (Session::has('user'))
                <li>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="block hover:text-gray-400">Logout</button>
                    </form>
                </li>
            @else
                <li><a href="{{ route('login') }}" class="block hover:text-gray-400">Login</a></li>
                <li><a href="{{ route('register') }}" class="block hover:text-gray-400">Register</a></li>
            @endif
            <li><a href="/cart" class="block hover:text-gray-400">Cart</a></li>
        </ul>
    </nav>

    <script>
        const mobileMenuToggle = document.getElementById('mobile-menu-toggle');
        const mobileMenu = document.getElementById('mobile-menu');
        const dropdownButton = document.getElementById('category');
        const dropdownMenu = document.getElementById('category-menu');

        mobileMenuToggle.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });

        dropdownButton.addEventListener('click', () => {
            dropdownMenu.classList.toggle('hidden');
        });
    </script>
</header>
