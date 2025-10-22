@extends('layouts.app')

@section('title', 'My Profile - ITSr Portal')

@section('content')
    <h1>My Profile</h1>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if ($errors->any())
        <div class="alert alert-error">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Tampilkan detail user dan student --}}
    {{-- Asumsi $user dan $student di-pass dari ProfileController --}}
    <h2>User Details</h2>
    <p><strong>Name:</strong> {{ $user->name ?? 'N/A' }}</p>
    <p><strong>Email:</strong> {{ $user->email ?? 'N/A' }}</p>
    <p><strong>Role:</strong> {{ ucfirst($user->role ?? 'N/A') }}</p>
    
    @if(isset($student)) {{-- Pastikan objek $student ada --}}
        <h2>Student Information</h2>
        <p><strong>Student ID:</strong> {{ $student->student_id_number ?? 'N/A' }}</p>
        <p><strong>Department:</strong> {{ $student->department->name ?? 'N/A' }}</p> {{-- Asumsi relasi 'department' ada --}}
        <p><strong>Admission Year:</strong> {{ $student->admission_year ?? 'N/A' }}</p>
    @else
        <div class="alert alert-error">Student details not found. Please contact support.</div>
    @endif

    <hr style="margin: 2rem 0; border-color: var(--card-border);">

    <h2>Update Profile</h2>
    <form method="POST" action="{{ route('student.profile.update') }}">
        @csrf
        {{-- Laravel biasanya menggunakan PUT/PATCH untuk update, tapi POST bisa disimulasikan --}}
        {{-- @method('PUT') --}} 

        <div class="input-group" style="max-width: 400px;">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $user->name ?? '') }}" required>
        </div>
        
        <div class="input-group" style="max-width: 400px;">
            <label for="email">Email (Can't be changed):</label>
            <input type="email" id="email" name="email" class="form-control" value="{{ old('email', $user->email ?? '') }}" disabled>
        </div>

        <div class="input-group" style="max-width: 400px;">
            <label for="password">New Password (optional):</label>
            <input type="password" id="password" name="password" class="form-control" placeholder="Leave blank to keep current password">
        </div>

        <div class="input-group" style="max-width: 400px;">
            <label for="password_confirmation">Confirm New Password:</label>
            <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" placeholder="Confirm new password if changing">
        </div>

        <button type="submit" class="btn-login" style="width: auto; padding: 0.8rem 1.5rem; margin-top: 1rem;">Update Profile</button>
    </form>

@endsection

@push('styles')
<style>
    /* Tambahkan sedikit style untuk form profile agar lebih rapi */
    .input-group label {
        display: block;
        margin-bottom: 0.5rem;
        font-weight: 500;
        color: var(--primary-text-dark);
    }
    .input-group {
        margin-bottom: 1.5rem; /* Beri jarak antar input group */
    }
</style>
@endpush