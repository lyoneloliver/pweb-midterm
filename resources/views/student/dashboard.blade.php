@extends('layouts.app')

@section('title', 'Student Dashboard - ITSr Portal')

@section('content')
    <h1>Student Dashboard</h1>
    <p>Welcome, {{ Auth::user()->name }}! Here's an overview of your academic progress.</p>

    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 1.5rem; margin-top: 2rem;">
        <div style="background-color: var(--card-bg); padding: 1.5rem; border-radius: 8px; box-shadow: 0 4px 15px rgba(0,0,0,0.05);">
            <h3>Current GPA</h3>
            <p style="font-size: 2rem; font-weight: 700; color: var(--primary-color);">3.75</p>
        </div>
        <div style="background-color: var(--card-bg); padding: 1.5rem; border-radius: 8px; box-shadow: 0 4px 15px rgba(0,0,0,0.05);">
            <h3>Enrolled Courses</h3>
            <p style="font-size: 2rem; font-weight: 700; color: var(--secondary-color);">5</p>
        </div>
        <div style="background-color: var(--card-bg); padding: 1.5rem; border-radius: 8px; box-shadow: 0 4px 15px rgba(0,0,0,0.05);">
            <h3>Upcoming Deadlines</h3>
            <p style="font-size: 2rem; font-weight: 700; color: var(--alert-error);">2</p>
        </div>
    </div>

    <h2 style="margin-top: 3rem;">My Links</h2>
    <ul style="list-style: none; padding: 0;">
        <li style="margin-bottom: 0.8rem;"><a href="{{ route('student.enrollment.index') }}" style="color: var(--primary-color); text-decoration: none; font-weight: 500;">Course Enrollment (FRS)</a></li>
        <li style="margin-bottom: 0.8rem;"><a href="{{ route('student.grades') }}" style="color: var(--primary-color); text-decoration: none; font-weight: 500;">View Grades</a></li>
        <li style="margin-bottom: 0.8rem;"><a href="{{ route('student.profile') }}" style="color: var(--primary-color); text-decoration: none; font-weight: 500;">My Profile</a></li>
    </ul>
@endsection