<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Enrollments;
use App\Models\Courses;
use App\Models\Students;

class DashboardController extends Controller
{
    public function index()
{
    if (!Auth::check()) {
        return redirect()->route('login');
    }

    $student = Students::where('user_id', Auth::id())->first();

    if (!$student) {
        return redirect()->route('student.profile')->with('error', 'Data mahasiswa belum ditemukan.');
    }

    return view('student.dashboard', compact('student'));
}

}
