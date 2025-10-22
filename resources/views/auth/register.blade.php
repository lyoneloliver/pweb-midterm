@extends('layouts.auth')

@section('title', 'Register - FRS System')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-lg rounded-4 border-0">
                <div class="card-body p-4">
                    <h3 class="text-center mb-4">Registrasi Akun Mahasiswa</h3>

                    {{-- Tampilkan pesan sukses atau error --}}
                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    @if (session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif

                    <form method="POST" action="{{ route('register.post') }}">
                        @csrf

                        {{-- Nama Lengkap --}}
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama Lengkap</label>
                            <input type="text" id="name" name="name"
                                   class="form-control @error('name') is-invalid @enderror"
                                   value="{{ old('name') }}" required autofocus>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Email --}}
                        <div class="mb-3">
                            <label for="email" class="form-label">Alamat Email</label>
                            <input type="email" id="email" name="email"
                                   class="form-control @error('email') is-invalid @enderror"
                                   value="{{ old('email') }}" required>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Jurusan --}}
                        <div class="mb-3">
                            <label for="department_id" class="form-label">Jurusan</label>
                            <select id="department_id" name="department_id"
                                    class="form-select @error('department_id') is-invalid @enderror" required>
                                <option value="">-- Pilih Jurusan --</option>
                                @foreach ($departments as $dept)
                                    <option value="{{ $dept->id }}" {{ old('department_id') == $dept->id ? 'selected' : '' }}>
                                        {{ $dept->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('department_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Password --}}
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" id="password" name="password"
                                   class="form-control @error('password') is-invalid @enderror" required>
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Konfirmasi Password --}}
                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                            <input type="password" id="password_confirmation" name="password_confirmation"
                                   class="form-control" required>
                        </div>

                        {{-- Tombol Submit --}}
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary btn-lg">Daftar Sekarang</button>
                        </div>
                    </form>

                    <div class="text-center mt-4">
                        <p class="mb-0">Sudah punya akun? 
                            <a href="{{ route('login') }}" class="text-decoration-none">Login di sini</a>
                        </p>
                    </div>
                </div>
            </div>

            <p class="text-center text-muted mt-3 small">
                &copy; {{ date('Y') }} FRS System. All Rights Reserved.
            </p>
        </div>
    </div>
</div>
@endsection
