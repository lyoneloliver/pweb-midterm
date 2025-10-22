<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
    <div class="container-fluid">
        {{-- Brand --}}
        <a class="navbar-brand fw-bold text-uppercase" href="#">
            FRS System
        </a>

        {{-- Toggle button (for mobile) --}}
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMain">
            <span class="navbar-toggler-icon"></span>
        </button>

        {{-- Navbar content --}}
        <div class="collapse navbar-collapse justify-content-end" id="navbarMain">
            <ul class="navbar-nav mb-2 mb-lg-0 align-items-center">

                {{-- Nama dan Role User --}}
                @auth
                    <li class="nav-item me-3">
                        <span class="text-light">
                            <i class="bi bi-person-circle"></i>
                            {{ Auth::user()->name }}
                            <small class="text-secondary">({{ ucfirst(Auth::user()->role) }})</small>
                        </span>
                    </li>

                    {{-- Tombol Logout --}}
                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-outline-light btn-sm">
                                <i class="bi bi-box-arrow-right"></i> Logout
                            </button>
                        </form>
                    </li>
                @endauth

                @guest
                    <li class="nav-item">
                        <a href="{{ route('login') }}" class="btn btn-outline-light btn-sm">
                            <i class="bi bi-box-arrow-in-right"></i> Login
                        </a>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
