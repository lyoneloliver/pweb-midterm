@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Halo, {{ $student->user->name }} 👋</h3>
    <p>Selamat datang di sistem FRS.</p>

    <div class="row mt-4">
        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-body text-center">
                    <h5>Total Mata Kuliah</h5>
                    <h3>{{ $totalCourses??0 }}</h3>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-body text-center">
                    <h5>IPK Saat Ini</h5>
                    <h3>{{ $gpa??0 }}</h3>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
