<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Enrollments;

class GradeController extends Controller
{
    public function index()
    {
        $student = Auth::user()->student;
        $grades = Enrollments::with(['classSection.course'])
            ->where('student_id', $student->id)
            ->whereNotNull('final_grade')
            ->get();

        return view('student.grades', [
            'title' => 'Nilai Akademik',
            'grades' => $grades,
        ]);
    }
}
