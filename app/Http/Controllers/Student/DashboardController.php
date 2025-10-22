<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Enrollments;
use App\Models\Courses;

class DashboardController extends Controller
{
    public function index()
    {
        $student = Auth::user()->student;

        $totalCourses = Enrollments::where('student_id', $student->id)->count();
        $gpa = $student->gpa ?? '-';

        return view('student.dashboard', [
            'title' => 'Dashboard Mahasiswa',
            'student' => $student,
            'totalCourses' => $totalCourses,
            'gpa' => $gpa,
        ]);
    }
}
