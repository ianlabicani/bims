<nav class="navbar navbar-expand-lg bg-navbar shadow-sm">
    <div class="container">
        <img src="" alt="logo" height="40" class="me-3">
        <a class="navbar-brand fw-bold" href="{{ route('guest.welcome') }}">BIMS</a>


        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent"
            aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>


        <div class="collapse navbar-collapse" id="navbarContent">
            <ul class="navbar-nav ms-auto  mb-2 mb-lg-0">
                @auth
                    @if (Auth::user()->hasRole('admin'))
                        <li class="nav-item">
                            <a class="nav-link {{ request()->urlIs('admin.dashboard') ? 'active' : '' }}"
                                href="{{ url('admin.dashboard') }} ">Dashboard</a>
                        </li>
                    @elseif (Auth::user()->hasRole('landlord'))
                        <li class="nav-item">
                            <a class="nav-link {{ request()->urlIs('landlord.dashboard') ? 'active' : '' }}"
                                href="{{ url('landlord.dashboard') }}">Dashboard</a>
                        </li>
                    @elseif (Auth::user()->hasRole('renter'))
                        <li class="nav-item">
                            <a class="nav-link {{ request()->urlIs('renter.dashboard') ? 'active' : '' }}"
                                href="{{ url('renter.dashboard') }}">Dashboard</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{ route('guest.welcome') }}">Home</a>
                    </li>
                    <div class="d-inline-block mt-2 mt-lg-0">
                        <a href="{{ route('login') }}" class="btn btn-login hover-btn-login me-2">Log in</a>
                        <a href="{{ route('register') }}" class="btn btn-login-outline hover-btn-login">Register</a>
                    </div>
                @endauth
            </ul>
        </div>
    </div>
</nav>