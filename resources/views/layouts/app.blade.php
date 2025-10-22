<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'ITSr Portal')</title>

    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --primary-color: #4A90E2; /* Biru cerah */
            --secondary-color: #50E3C2; /* Hijau tosca */
            --background-base: #F8F9FA; /* Off-white / light gray */
            --card-bg: #FFFFFF;
            --card-border: #E0E0E0;
            --primary-text-dark: #333333;
            --secondary-text-dark: #666666;
            --input-border-light: #CCCCCC;
            --button-hover: #3A7BBF;
            --alert-error: #FF4136;
            --alert-success: #28A745;

            /* Dots background variables */
            --dot-color: rgba(0, 0, 0, 0.05); /* Light dots */
            --dot-size: 1px;
            --dot-spacing: 20px;
            --animation-speed: 60s; /* Kecepatan animasi titik */
        }

        body.app-body {
            background-color: var(--background-base);
            position: relative;
            overflow: hidden;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            font-family: "Inter", sans-serif;
            color: var(--primary-text-dark);
        }

        body.app-body::before,
        body.app-body::after {
            content: '';
            position: fixed;
            pointer-events: none;
            z-index: -1;
        }
        body.app-body::before { /* Overlay Fading */
            top: 0; left: 0; width: 100%; height: 100%;
            background: linear-gradient(to bottom, var(--background-base) 0%, transparent 10%, transparent 90%, var(--background-base) 100%);
        }
        body.app-body::after { /* Pola Titik */
            top: -100%; left: 0; width: 100%; height: 200%;
            background-image: radial-gradient(circle at center, var(--dot-color) var(--dot-size), transparent var(--dot-size));
            background-size: var(--dot-spacing) var(--dot-spacing);
            animation: moveDotsUp var(--animation-speed) linear infinite;
        }
        @keyframes moveDotsUp { from { transform: translateY(0); } to { transform: translateY(50%); } }

        .navbar {
            background-color: var(--card-bg);
            border-bottom: 1px solid var(--card-border);
            padding: 1rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            position: sticky;
            top: 0;
            z-index: 100;
        }
        .navbar-brand img {
            height: 40px;
        }
        .navbar-links a, .navbar-links form button {
            color: var(--secondary-text-dark);
            text-decoration: none;
            margin-left: 1.5rem;
            font-weight: 500;
            transition: color 0.2s;
        }
        .navbar-links a:hover, .navbar-links form button:hover {
            color: var(--primary-color);
        }
        .navbar-links form {
            display: inline;
        }
        .navbar-links form button {
            background: none;
            border: none;
            cursor: pointer;
            padding: 0;
            font-size: inherit;
        }

        .main-content {
            flex-grow: 1;
            padding: 2rem;
            max-width: 1200px;
            width: 100%;
            margin: 0 auto;
            box-sizing: border-box;
            overflow-y: auto;
        }
        .footer {
            text-align: center;
            padding: 1rem;
            font-size: 0.9rem;
            color: var(--secondary-text-dark);
            border-top: 1px solid var(--card-border);
            margin-top: auto;
        }

        /* Generic styles for alerts, forms etc. */
        .alert {
            padding: 0.75rem 1rem;
            margin-bottom: 1rem;
            border-radius: 0.5rem;
            font-weight: 500;
        }
        .alert-error {
            background-color: #fcebeb;
            border: 1px solid var(--alert-error);
            color: var(--alert-error);
        }
        .alert-success {
            background-color: #e6ffed;
            border: 1px solid var(--alert-success);
            color: var(--alert-success);
        }
    </style>
    @stack('styles')
</head>
<body class="app-body">

    <nav class="navbar">
        <div class="navbar-brand">
            <a href="{{ route('dashboard') }}"> {{-- Link ke dashboard umum --}}
                <img src="{{ asset('logo.png') }}" alt="ITSr Logo">
            </a>
        </div>
        <div class="navbar-links">
            @auth
                <span>Welcome, {{ Auth::user()->name }}</span>
                @if(Auth::user()->role == 'admin')
                    <a href="{{ route('admin.dashboard') }}">Admin Dashboard</a>
                @elseif(Auth::user()->role == 'student')
                    <a href="{{ route('student.dashboard') }}">Student Dashboard</a>
                @elseif(Auth::user()->role == 'lecturer')
                    <a href="{{ route('lecturer.dashboard') }}">Lecturer Dashboard</a>
                @endif
                
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit">Logout</button>
                </form>
            @else
                <a href="{{ route('login') }}">Login</a>
                <a href="{{ route('register') }}">Register</a>
            @endauth
        </div>
    </nav>

    <main class="main-content">
        @yield('content')
    </main>

    <footer class="footer">
        &copy; {{ date('Y') }} ITSr Portal. All rights reserved.
    </footer>

    @stack('scripts')
</body>
</html>