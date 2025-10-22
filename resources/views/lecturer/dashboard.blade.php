@extends('layouts.app')

@section('title', 'Lecturer Dashboard - ITSr Portal')

@section('content')
    <h1>Lecturer Dashboard</h1>
    <p>Welcome, {{ Auth::user()->name }}! Here's an overview of your teaching activities.</p>

    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 1.5rem; margin-top: 2rem;">
        <div style="background-color: var(--card-bg); padding: 1.5rem; border-radius: 8px; box-shadow: 0 4px 15px rgba(0,0,0,0.05);">
            <h3>Active Classes</h3>
            <p style="font-size: 2rem; font-weight: 700; color: var(--primary-color);">3</p>
        </div>
        <div style="background-color: var(--card-bg); padding: 1.5rem; border-radius: 8px; box-shadow: 0 4px 15px rgba(0,0,0,0.05);">
            <h3>Students Taught</h3>
            <p style="font-size: 2rem; font-weight: 700; color: var(--secondary-color);">120</p>
        </div>
        <div style="background-color: var(--card-bg); padding: 1.5rem; border-radius: 8px; box-shadow: 0 4px 15px rgba(0,0,0,0.05);">
            <h3>Grading Due</h3>
            <p style="font-size: 2rem; font-weight: 700; color: var(--alert-error);">4</p>
        </div>
    </div>

    <h2 style="margin-top: 3rem;">My Classes</h2>
    <ul style="list-style: none; padding: 0;">
        <li style="margin-bottom: 0.8rem;"><a href="{{ route('lecturer.classes.index') }}" style="color: var(--primary-color); text-decoration: none; font-weight: 500;">View All Classes</a></li>
        {{-- Anda bisa iterasi di sini untuk menampilkan daftar kelas --}}
        {{-- @foreach($classes as $class)
            <li><a href="{{ route('lecturer.classes.show', $class->id) }}">{{ $class->name }}</a></li>
        @endforeach --}}
    </ul>
@endsection