<nav class="navbar navbar-expand-lg bg-navbar shadow-sm">
    <div class="container">
        <img src="" alt="logo" height="40" class="me-3">
        <a class="navbar-brand fw-bold" href="{{ url('welcome') }}">BIMS</a>


        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent"
            aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>


        <div class="collapse navbar-collapse" id="navbarContent">
            <ul class="navbar-nav ms-auto  mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link {{request()->urlIs('welcome') ? 'active' : '' }}" aria-current="page"
                        href="{{ url('welcome') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->urlIs('guest.rooms.index') || request()->urlIs('guest.rooms.show') ? 'active' : '' }}"
                        href="{{ url('guest.rooms.index') }}">Rooms</a>
                </li>
                <li class="nav-item">
                    <a type="button" class="nav-link" data-bs-toggle="modal" data-bs-target="#comingSoonModal">
                        Landlords
                    </a>
                </li>
                <li class="nav-item">
                    <a type="button" class="nav-link" data-bs-toggle="modal" data-bs-target="#comingSoonModal">Contact
                        Us</a>
                </li>
                <li class="nav-item">
                    <a type="button" class="nav-link" data-bs-toggle="modal"
                        data-bs-target="#comingSoonModal">Reviews</a>
                </li>
                <li class="nav-item">
                    <a type="button" class="nav-link" href="{{ url('guest.about-us') }}">About us</a>
                </li>
            </ul>
        </div>
    </div>
</nav>