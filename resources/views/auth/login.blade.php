<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Sistem FRS</title>

    {{-- Link ke CSS custom --}}
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
</head>
<body class="login-body">

    <div class="login-container">
        <div class="login-card">
            <div class="login-header">
                <img src="{{ asset('logo.png') }}" alt="Logo Universitas" class="login-logo">
                <h2>Sistem FRS</h2>
                <p>Formulir Rencana Studi Mahasiswa</p>
            </div>

            @if (session('error'))
                <div class="alert alert-error">{{ session('error') }}</div>
            @endif
            @if (session('status'))
                <div class="alert alert-success">{{ session('status') }}</div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="form-group">
                    <label for="email">Alamat Email</label>
                    <input type="email" name="email" id="email" class="form-control" placeholder="contoh: abid@student.ac.id" required autofocus>
                </div>

                <div class="form-group">
                    <label for="password">Kata Sandi</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="••••••••" required>
                </div>

                <div class="form-options">
                    <label><input type="checkbox" name="remember"> Ingat saya</label>
                    <a href="#">Lupa password?</a>
                </div>

                <button type="submit" class="btn-login">Masuk</button>

                <p class="register-link">Belum punya akun?
                    <a href="{{ route('register') }}">Daftar sekarang</a>
                </p>
            </form>
        </div>
    </div>

</body>
</html>
