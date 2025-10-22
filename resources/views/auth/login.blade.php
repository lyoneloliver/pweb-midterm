@extends('layouts.auth')

@section('content')
<h4 class="mb-3 text-center">Login</h4>
<form method="POST" action="{{ route('login.post') }}">
    @csrf
    <div class="mb-3">
        <label>Email</label>
        <input type="email" name="email" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Password</label>
        <input type="password" name="password" class="form-control" required>
    </div>
    <button class="btn btn-primary w-100">Login</button>
</form>
<p class="mt-3 text-center">
    Belum punya akun? <a href="{{ route('register') }}">Daftar</a>
</p>
@endsection
