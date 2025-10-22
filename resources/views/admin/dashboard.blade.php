@extends('layouts.app')

@section('title', 'Admin Dashboard - ITSr Portal')

@section('content')
    <h1>Admin Dashboard</h1>
    <p>Welcome to the administration panel, {{ Auth::user()->name }}!</p>

    {{-- Contoh kartu atau statistik --}}
    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 1.5rem; margin-top: 2rem;">
        <div style="background-color: var(--card-bg); padding: 1.5rem; border-radius: 8px; box-shadow: 0 4px 15px rgba(0,0,0,0.05);">
            <h3>Total Users</h3>
            <p style="font-size: 2rem; font-weight: 700; color: var(--primary-color);">1200</p>
        </div>
        <div style="background-color: var(--card-bg); padding: 1.5rem; border-radius: 8px; box-shadow: 0 4px 15px rgba(0,0,0,0.05);">
            <h3>Active Courses</h3>
            <p style="font-size: 2rem; font-weight: 700; color: var(--secondary-color);">55</p>
        </div>
        <div style="background-color: var(--card-bg); padding: 1.5rem; border-radius: 8px; box-shadow: 0 4px 15px rgba(0,0,0,0.05);">
            <h3>Pending Approvals</h3>
            <p style="font-size: 2rem; font-weight: 700; color: var(--alert-error);">12</p>
        </div>
    </div>

    <h2 style="margin-top: 3rem;">Quick Links</h2>
    <ul style="list-style: none; padding: 0;">
        <li style="margin-bottom: 0.8rem;"><a href="{{ route('admin.users.index') }}" style="color: var(--primary-color); text-decoration: none; font-weight: 500;">Manage Users</a></li>
        <li style="margin-bottom: 0.8rem;"><a href="{{ route('admin.departments.index') }}" style="color: var(--primary-color); text-decoration: none; font-weight: 500;">Manage Departments</a></li>
        <li style="margin-bottom: 0.8rem;"><a href="{{ route('admin.courses.index') }}" style="color: var(--primary-color); text-decoration: none; font-weight: 500;">Manage Courses</a></li>
        <li style="margin-bottom: 0.8rem;"><a href="{{ route('admin.approvals.index') }}" style="color: var(--primary-color); text-decoration: none; font-weight: 500;">View Approvals</a></li>
        <li style="margin-bottom: 0.8rem;"><a href="{{ route('admin.reports.index') }}" style="color: var(--primary-color); text-decoration: none; font-weight: 500;">Generate Reports</a></li>
    </ul>
@endsection