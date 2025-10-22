<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ITSr Portal - Reset Password</title>
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
                <h2>Reset Your Password</h2>
                <p>Enter your new password below.</p>
            </div>

            @error('email')
                <div class="alert alert-error">{{ $message }}</div>
            @enderror
            @error('password')
                <div class="alert alert-error">{{ $message }}</div>
            @enderror

            <form method="POST" action="{{ route('password.update') }}">
                @csrf
                <input type="hidden" name="token" value="{{ $token }}">

                <div class="input-group">
                    <label for="email" class="sr-only">Email Address</label>
                    <div class="input-with-icon">
                         <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon-input"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
                        <input type="email" name="email" id="email" class="form-control" 
                               placeholder="Email Address" value="{{ $email ?? old('email') }}" required autofocus>
                    </div>
                </div>

                <div class="input-group">
                    <label for="password" class="sr-only">New Password</label>
                    <div class="input-with-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon-input"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>
                        <input type="password" name="password" id="password" class="form-control" 
                               placeholder="New Password" required>
                    </div>
                </div>

                <div class="input-group">
                    <label for="password_confirmation" class="sr-only">Confirm New Password</label>
                    <div class="input-with-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon-input"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>
                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" 
                               placeholder="Confirm New Password" required>
                    </div>
                </div>

                <button type="submit" class="btn-login">Reset Password</button>
            </form>
        </div>
    </div>
</body>
</html>