<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ITSr Portal - Register New Account</title>

    {{-- Link to your custom CSS --}}
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    
    {{-- Google Fonts: Inter (for modern, clean look) --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body class="login-body"> {{-- Menggunakan class body yang sama untuk background --}}

    <div class="login-wrapper">

        <div class="login-container">
            <img src="{{ asset('logo.png') }}" alt="ITSr Logo" class="login-logo">
            
            <div class="login-header">
                <h2>Create Your ITSr Account</h2>
                <p>Register to access your personalized portal.</p>
            </div>

            {{-- Display flash messages (success from previous redirect) --}}
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            {{-- Display validation errors --}}
            @if ($errors->any())
                <div class="alert alert-error">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('register.post') }}">
                @csrf

                <div class="input-group">
                    <label for="name" class="sr-only">Full Name</label>
                    <div class="input-with-icon">
                        {{-- Icon for name (e.g., user icon) --}}
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon-input"><path d="M12 2a5 5 0 1 0 0 10 5 5 0 0 0 0-10z"></path><path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"></path></svg>
                        <input type="text" name="name" id="name" class="form-control" 
                               placeholder="Full Name" value="{{ old('name') }}" required autofocus>
                    </div>
                </div>

                <div class="input-group">
                    <label for="email" class="sr-only">Email Address</label>
                    <div class="input-with-icon">
                        {{-- Icon for email --}}
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon-input"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
                        <input type="email" name="email" id="email" class="form-control" 
                               placeholder="Email Address" value="{{ old('email') }}" required>
                    </div>
                </div>

                <div class="input-group">
                    <label for="password" class="sr-only">Password</label>
                    <div class="input-with-icon">
                        {{-- Icon for password --}}
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon-input"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>
                        <input type="password" name="password" id="password" class="form-control" 
                               placeholder="Password" required>
                    </div>
                </div>

                <div class="input-group">
                    <label for="password_confirmation" class="sr-only">Confirm Password</label>
                    <div class="input-with-icon">
                        {{-- Icon for confirm password --}}
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon-input"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>
                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" 
                               placeholder="Confirm Password" required>
                    </div>
                </div>

                {{-- You might add other fields here if needed, e.g., role selection --}}
                {{-- Example:
                <div class="input-group">
                    <label for="role" class="sr-only">Role</label>
                    <div class="input-with-icon">
                        <svg ... icon for role ...></svg>
                        <select name="role" id="role" class="form-control" required>
                            <option value="">Select Role</option>
                            <option value="student" {{ old('role') == 'student' ? 'selected' : '' }}>Student</option>
                            <option value="lecturer" {{ old('role') == 'lecturer' ? 'selected' : '' }}>Lecturer</option>
                        </select>
                    </div>
                </div>
                --}}

                <button type="submit" class="btn-login">Register Account</button>

                <p class="register-link">
                    Already have an account? 
                    <a href="{{ route('login') }}">Sign In Here</a>
                </p>
            </form>
        </div>
    </div>

</body>
</html>