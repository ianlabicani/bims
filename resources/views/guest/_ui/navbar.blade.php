<nav class="bg-blue-600 shadow-lg">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex items-center">
                <a class="text-xl font-bold text-white hover:text-blue-200" href="{{ route('guest.welcome') }}">BIMS</a>
            </div>

            <!-- Mobile menu button -->
            <div class="md:hidden flex items-center">
                <button type="button" class="text-white hover:text-blue-200 focus:outline-none focus:text-blue-200"
                    onclick="toggleMobileMenu()">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>

            <!-- Desktop menu -->
            <div class="hidden md:flex md:items-center md:space-x-4">
                @auth
                    @if (Auth::user()->hasRole('admin'))
                        <a class="px-3 py-2 text-sm font-medium {{ request()->routeIs('admin.dashboard') ? 'text-blue-200 bg-blue-700 rounded' : 'text-white hover:text-blue-200' }}"
                            href="{{ route('admin.dashboard') }}">Dashboard</a>
                    @elseif (Auth::user()->hasRole('campus'))
                        <a class="px-3 py-2 text-sm font-medium {{ request()->routeIs('campus.dashboard') ? 'text-blue-200 bg-blue-700 rounded' : 'text-white hover:text-blue-200' }}"
                            href="{{ route('campus.dashboard') }}">Dashboard</a>
                    @endif
                @else
                    <a class="px-3 py-2 text-sm font-medium text-white hover:text-blue-200"
                        href="{{ route('guest.welcome') }}">Home</a>
                    <div class="flex items-center space-x-2">
                        <a href="{{ route('login') }}"
                            class="px-4 py-2 text-sm font-medium text-blue-600 bg-white border border-transparent rounded-md hover:bg-blue-50 transition duration-150 ease-in-out">Log
                            in</a>
                        <a href="{{ route('register') }}"
                            class="px-4 py-2 text-sm font-medium text-white border border-white rounded-md hover:bg-blue-700 transition duration-150 ease-in-out">Register</a>
                    </div>
                @endauth
            </div>
        </div>

        <!-- Mobile menu -->
        <div id="mobile-menu" class="md:hidden hidden">
            <div class="px-2 pt-2 pb-3 space-y-1 border-t border-blue-500">
                @auth
                    @if (Auth::user()->hasRole('admin'))
                        <a class="block px-3 py-2 text-base font-medium {{ request()->routeIs('admin.dashboard') ? 'text-blue-200 bg-blue-700 rounded' : 'text-white hover:text-blue-200 hover:bg-blue-700 rounded' }}"
                            href="{{ route('admin.dashboard') }}">Dashboard</a>
                    @elseif (Auth::user()->hasRole('campus'))
                        <a class="block px-3 py-2 text-base font-medium {{ request()->routeIs('campus.dashboard') ? 'text-blue-200 bg-blue-700 rounded' : 'text-white hover:text-blue-200 hover:bg-blue-700 rounded' }}"
                            href="{{ route('campus.dashboard') }}">Dashboard</a>
                    @endif
                @else
                    <a class="block px-3 py-2 text-base font-medium text-white hover:text-blue-200 hover:bg-blue-700 rounded"
                        href="{{ route('guest.welcome') }}">Home</a>
                    <div class="pt-4 pb-3 border-t border-blue-500">
                        <div class="flex flex-col space-y-2">
                            <a href="{{ route('login') }}"
                                class="px-3 py-2 text-sm font-medium text-blue-600 bg-white border border-transparent rounded-md hover:bg-blue-50">Log
                                in</a>
                            <a href="{{ route('register') }}"
                                class="px-3 py-2 text-sm font-medium text-white border border-white rounded-md hover:bg-blue-700">Register</a>
                        </div>
                    </div>
                @endauth
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