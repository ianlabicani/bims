<nav class="bg-white border-b border-gray-200 shadow-sm">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex items-center">
                <a class="text-xl font-bold text-gray-800 hover:text-gray-600" href="{{ route('guest.welcome') }}">
                    BIMS
                </a>
            </div>

            <!-- Mobile menu button -->
            <div class="md:hidden flex items-center">
                <button type="button" class="text-gray-500 hover:text-gray-600 focus:outline-none focus:text-gray-600"
                    onclick="toggleMobileMenu()">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>

            <!-- Desktop menu -->
            <div class="hidden md:flex md:items-center md:space-x-6">
                <a class="px-3 py-2 text-sm font-medium {{ request()->routeIs('campus.dashboard') ? 'text-blue-600 border-b-2 border-blue-600' : 'text-gray-700 hover:text-blue-600' }}"
                    href="{{ route('campus.dashboard') }}">
                    <i class="fas fa-tachometer-alt mr-1"></i> Dashboard
                </a>

                <div class="relative group">
                    <button
                        class="px-3 py-2 text-sm font-medium text-gray-700 hover:text-blue-600 focus:outline-none {{ request()->is('campus/buildings*') ? 'text-blue-600' : '' }}">
                        <i class="fas fa-building mr-1"></i> Buildings
                        <i class="fas fa-chevron-down ml-1 text-xs"></i>
                    </button>
                    <div
                        class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg border border-gray-200 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 z-50">
                        <div class="py-1">
                            <a class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                href="{{ route('campus.buildings.index') }}">
                                <i class="fas fa-list mr-2"></i> View All Buildings
                            </a>
                            <a class="flex items-center px-4 py-2 text-sm text-green-600 hover:bg-gray-100"
                                href="{{ route('campus.buildings.create') }}">
                                <i class="fas fa-plus-circle mr-2"></i> Add Building
                            </a>
                        </div>
                    </div>
                </div>

                <div class="relative group">
                    <button class="px-3 py-2 text-sm font-medium text-gray-700 hover:text-blue-600 focus:outline-none">
                        <i class="fas fa-user mr-1"></i> Account
                        <i class="fas fa-chevron-down ml-1 text-xs"></i>
                    </button>
                    <div
                        class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg border border-gray-200 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 z-50">
                        <div class="py-1">
                            <form method="POST" action="{{ route('logout') }}" class="block">
                                @csrf
                                <button type="submit"
                                    class="flex items-center w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-gray-100">
                                    <i class="fas fa-sign-out-alt mr-2"></i> Logout
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Mobile menu -->
        <div id="mobile-menu" class="md:hidden hidden">
            <div class="px-2 pt-2 pb-3 space-y-1 border-t border-gray-200">
                <a class="block px-3 py-2 text-base font-medium {{ request()->routeIs('campus.dashboard') ? 'text-blue-600 bg-blue-50' : 'text-gray-700 hover:text-blue-600 hover:bg-gray-50' }}"
                    href="{{ route('campus.dashboard') }}">
                    <i class="fas fa-tachometer-alt mr-2"></i> Dashboard
                </a>
                <a class="block px-3 py-2 text-base font-medium text-gray-700 hover:text-blue-600 hover:bg-gray-50"
                    href="{{ route('campus.buildings.index') }}">
                    <i class="fas fa-list mr-2"></i> View All Buildings
                </a>
                <a class="block px-3 py-2 text-base font-medium text-green-600 hover:bg-gray-50"
                    href="{{ route('campus.buildings.create') }}">
                    <i class="fas fa-plus-circle mr-2"></i> Add Building
                </a>
                <form method="POST" action="{{ route('logout') }}" class="block">
                    @csrf
                    <button type="submit"
                        class="block w-full text-left px-3 py-2 text-base font-medium text-red-600 hover:bg-gray-50">
                        <i class="fas fa-sign-out-alt mr-2"></i> Logout
                    </button>
                </form>
            </div>
        </div>
    </div>
</nav>

<script>
    function toggleMobileMenu() {
        const menu = document.getElementById('mobile-menu');
        menu.classList.toggle('hidden');
    }
</script>