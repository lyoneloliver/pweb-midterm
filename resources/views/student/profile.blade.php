@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Profil Mahasiswa</h3>

    <form method="POST" action="{{ route('student.profile.update') }}" class="mt-4">
        @csrf
        <div class="mb-3">
            <label>Nama Lengkap</label>
            <input type="text" class="form-control" value="{{ $student->user->name }}" disabled>
        </div>
        <div class="mb-3">
            <label>Email</label>
            <input type="email" class="form-control" value="{{ $student->user->email }}" disabled>
        </div>
        <div class="mb-3">
            <label>No. Telepon</label>
            <input type="text" name="phone" class="form-control" value="{{ old('phone', $student->phone) }}">
        </div>
        <div class="mb-3">
            <label>Alamat</label>
            <textarea name="address" class="form-control">{{ old('address', $student->address) }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
    </form>
</div>
@endsection
