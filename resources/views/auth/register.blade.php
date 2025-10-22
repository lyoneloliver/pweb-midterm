<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ITSr Portal - Register</title>
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
                <h2>Create Your Account</h2>
                <p>Register to access the ITSr Portal.</p>
            </div>

            @if (session('error'))
                <div class="alert alert-error">{{ session('error') }}</div>
            @endif
            @if (session('status'))
                <div class="alert alert-success">{{ session('status') }}</div>
            @endif
            @error('name')
                <div class="alert alert-error">{{ $message }}</div>
            @enderror
            @error('email')
                <div class="alert alert-error">{{ $message }}</div>
            @enderror
            @error('password')
                <div class="alert alert-error">{{ $message }}</div>
            @enderror
            @error('role')
                <div class="alert alert-error">{{ $message }}</div>
            @enderror

            <form method="POST" action="{{ route('register.post') }}">
                @csrf

                <div class="input-group">
                    <label for="name" class="sr-only">Name</label>
                    <div class="input-with-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon-input"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                        <input type="text" name="name" id="name" class="form-control" 
                               placeholder="Your Name" value="{{ old('name') }}" required autofocus>
                    </div>
                </div>

                <div class="input-group">
                    <label for="email" class="sr-only">Email Address</label>
                    <div class="input-with-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon-input"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
                        <input type="email" name="email" id="email" class="form-control" 
                               placeholder="Email Address" value="{{ old('email') }}" required>
                    </div>
                </div>

                <div class="input-group">
                    <label for="password" class="sr-only">Password</label>
                    <div class="input-with-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon-input"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>
                        <input type="password" name="password" id="password" class="form-control" 
                               placeholder="Password" required>
                    </div>
                </div>

                <div class="input-group">
                    <label for="password_confirmation" class="sr-only">Confirm Password</label>
                    <div class="input-with-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon-input"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>
                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" 
                               placeholder="Confirm Password" required>
                    </div>
                </div>

                {{-- Pilihan Role saat Register (Hanya contoh, mungkin Anda ingin admin yang assign role) --}}
                <div class="input-group">
                    <label for="role" class="sr-only">Register As</label>
                    <div class="input-with-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon-input"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 14c-2.76 0-5-2.24-5-5h2c0 1.66 1.34 3 3 3s3-1.34 3-3h2c0 2.76-2.24 5-5 5zm-3-5V7h6v4H9z"></path></svg>
                        <select name="role" id="role" class="form-control" required>
                            <option value="">Select Role</option>
                            <option value="student" {{ old('role') == 'student' ? 'selected' : '' }}>Student</option>
                            <option value="lecturer" {{ old('role') == 'lecturer' ? 'selected' : '' }}>Lecturer</option>
                            {{-- Role 'admin' mungkin tidak boleh dipilih di sini --}}
                        </select>
                    </div>
                </div>


                <button type="submit" class="btn-login">Register</button>

                <p class="register-link">
                    Already have an account? 
                    <a href="{{ route('login') }}">Sign In</a>
                </p>
            </form>
        </div>
    </div>
</body>
</html>