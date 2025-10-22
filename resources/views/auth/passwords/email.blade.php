<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ITSr Portal - Forgot Password</title>
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body class="login-body">
    <div class="login-wrapper">
        <div class="login-container">
            <img src="{{ asset('logo.png') }}" alt="ITSr Logo" class="login-logo">
            <div class="login-header">
                <h2>Forgot Your Password?</h2>
                <p>Enter your email address and we'll send you a link to reset your password.</p>
            </div>

            @if (session('status'))
                <div class="alert alert-success">{{ session('status') }}</div>
            @endif
            @error('email')
                <div class="alert alert-error">{{ $message }}</div>
            @enderror

            <form method="POST" action="{{ route('password.email') }}">
                @csrf
                <div class="input-group">
                    <label for="email" class="sr-only">Email Address</label>
                    <div class="input-with-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon-input"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
                        <input type="email" name="email" id="email" class="form-control" 
                               placeholder="Enter your email address" value="{{ old('email') }}" required autofocus>
                    </div>
                </div>
                <button type="submit" class="btn-login">Send Password Reset Link</button>
                <p class="register-link">
                    Remember your password? <a href="{{ route('login') }}">Sign In</a>
                </p>
            </form>
        </div>
    </div>
</body>
</html>