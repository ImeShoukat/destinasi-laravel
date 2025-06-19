<div>
    <style>
        .logo-text {
            font-size: 1.5rem;
            font-weight: 800;
            background: linear-gradient(45deg, #ff6b6b, #4ecdc4, #45b7d1, #96ceb4);
            background-size: 400% 400%;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            animation: gradientShift 3s ease-in-out infinite;
            letter-spacing: -0.02em;
            line-height: 1.1;
        }
        
        @keyframes gradientShift {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }
        
        .navbar-glass {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.2);
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
        }
        
        .dropdown {
            opacity: 0;
            visibility: hidden;
            transform: translateY(-10px);
            transition: all 0.3s ease;
        }
        
        .dropdown.show {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }
        
        .profile-avatar {
            background: linear-gradient(45deg, #667eea, #764ba2);
        }
        
        .nav-link {
            position: relative;
            transition: all 0.3s ease;
        }
        
        .nav-link:hover {
            color: #667eea;
        }
        
        .nav-link::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: -5px;
            left: 50%;
            background: linear-gradient(45deg, #667eea, #764ba2);
            transition: all 0.3s ease;
            transform: translateX(-50%);
        }
        
        .nav-link:hover::after {
            width: 100%;
        }
        
        @media (max-width: 768px) {
            .logo-text {
                font-size: 1.2rem;
            }
        }
    </style>

    <!-- Navbar -->
    <nav class="navbar-glass fixed top-0 left-0 right-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <!-- Logo -->
                <div class="flex items-center">
                    <a href="{{ route('home') }}" class="flex items-center space-x-2 hover:opacity-80 transition-opacity">
                        <div class="w-10 h-10 bg-gradient-to-br from-indigo-500 to-purple-600 rounded-lg flex items-center justify-center">
                            <span class="text-white font-bold text-lg">PI</span>
                        </div>
                        <span class="logo-text hidden sm:block">PESONANYA<br>INDONESIA</span>
                    </a>
                </div>

                <!-- Desktop Navigation -->
                <div class="hidden md:flex items-center space-x-8">
                    <!-- Home Link -->
                    <a href="{{ route('home') }}" class="nav-link text-gray-700 hover:text-indigo-600 font-medium">
                        Home
                    </a>
                    
                    <!-- Destinasi Link -->
                    <a href="{{ route('destinasi') }}" class="nav-link text-gray-700 hover:text-indigo-600 font-medium">
                        Destinasi
                    </a>
                    
                    <!-- Kategori Link -->
                    <a href="{{ route('kategori') }}" class="nav-link text-gray-700 hover:text-indigo-600 font-medium">
                        Kategori
                    </a>
                    
                    <!-- Profile Section -->
                    <div class="relative">
                        @auth
                            <!-- Logged In User -->
                            <div>
                                <button wire:click="toggleDropdown" class="flex items-center space-x-2 bg-white rounded-full p-1 shadow-md hover:shadow-lg transition-all duration-200">
                                    <div class="profile-avatar w-8 h-8 rounded-full flex items-center justify-center">
                                        <span class="text-white font-semibold text-sm">{{ substr(Auth::user()->name, 0, 1) }}</span>
                                    </div>
                                    <span class="text-gray-700 font-medium px-2">{{ Auth::user()->name }}</span>
                                    <svg class="w-4 h-4 text-gray-600 transition-transform duration-200 {{ $showDropdown ? 'rotate-180' : '' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </button>
                                
                                <!-- Dropdown Menu -->
                                <div class="dropdown absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg border border-gray-200 py-1 {{ $showDropdown ? 'show' : '' }}">
                                    <a href="{{ route('profile') }}" class="flex items-center px-4 py-2 text-gray-700 hover:bg-gray-50 transition-colors">
                                        <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                        </svg>
                                        Profile
                                    </a>
                                    <a href="{{ route('settings') }}" class="flex items-center px-4 py-2 text-gray-700 hover:bg-gray-50 transition-colors">
                                        <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        </svg>
                                        Settings
                                    </a>
                                    <hr class="my-1">
                                    <button wire:click="logout" class="flex items-center w-full px-4 py-2 text-red-600 hover:bg-red-50 transition-colors">
                                        <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                                        </svg>
                                        Logout
                                    </button>
                                </div>
                            </div>
                        @else
                            <!-- Guest User -->
                            <div class="flex items-center space-x-3">
                                <a href="{{ route('login') }}" class="text-gray-700 hover:text-indigo-600 font-medium transition-colors">
                                    Login
                                </a>
                                <a href="{{ route('register') }}" class="bg-gradient-to-r from-indigo-500 to-purple-600 text-white px-4 py-2 rounded-lg font-medium hover:from-indigo-600 hover:to-purple-700 transition-all duration-200 shadow-md hover:shadow-lg">
                                    Register
                                </a>
                            </div>
                        @endauth
                    </div>
                </div>

                <!-- Mobile menu button -->
                <div class="md:hidden">
                    <button wire:click="toggleMobileMenu" class="text-gray-700 hover:text-indigo-600 transition-colors">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            @if($showMobileMenu)
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            @else
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                            @endif
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Navigation Menu -->
        <div class="md:hidden {{ $showMobileMenu ? '' : 'hidden' }} bg-white border-t border-gray-200">
            <div class="px-4 py-3 space-y-3">
                <a href="{{ route('home') }}" class="block text-gray-700 hover:text-indigo-600 font-medium transition-colors">
                    Home
                </a>
                <a href="{{ route('destinasi') }}" class="block text-gray-700 hover:text-indigo-600 font-medium transition-colors">
                    Destinasi
                </a>
                <a href="{{ route('kategori') }}" class="block text-gray-700 hover:text-indigo-600 font-medium transition-colors">
                    Kategori
                </a>
                
                <!-- Mobile Profile Section -->
                @auth
                    <div class="border-t pt-3">
                        <div class="flex items-center space-x-3 mb-3">
                            <div class="profile-avatar w-8 h-8 rounded-full flex items-center justify-center">
                                <span class="text-white font-semibold text-sm">{{ substr(Auth::user()->name, 0, 1) }}</span>
                            </div>
                            <span class="text-gray-700 font-medium">{{ Auth::user()->name }}</span>
                        </div>
                        <a href="{{ route('profile') }}" class="block text-gray-700 hover:text-indigo-600 py-2 transition-colors">Profile</a>
                        <a href="{{ route('settings') }}" class="block text-gray-700 hover:text-indigo-600 py-2 transition-colors">Settings</a>
                        <button wire:click="logout" class="block w-full text-left text-red-600 hover:text-red-700 py-2 transition-colors">
                            Logout
                        </button>
                    </div>
                @else
                    <div class="border-t pt-3 space-y-2">
                        <a href="{{ route('login') }}" class="block text-gray-700 hover:text-indigo-600 font-medium transition-colors">
                            Login
                        </a>
                        <a href="{{ route('register') }}" class="block bg-gradient-to-r from-indigo-500 to-purple-600 text-white px-4 py-2 rounded-lg font-medium text-center hover:from-indigo-600 hover:to-purple-700 transition-all duration-200">
                            Register
                        </a>
                    </div>
                @endauth
            </div>
        </div>
    </nav>

    <!-- Click outside to close dropdown -->
    <div wire:click="$set('showDropdown', false)" class="{{ $showDropdown ? 'fixed inset-0 z-40' : 'hidden' }}"></div>
</div>