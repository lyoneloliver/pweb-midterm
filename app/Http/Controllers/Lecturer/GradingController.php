<?php

namespace App\Http\Controllers\Lecturer;

use App\Http\Controllers\Controller;
use App\Models\Enrollments;
use Illuminate\Http\Request;

class GradingController extends Controller
{
    public function index()
    {
        $enrollments = Enrollments::with('student.user', 'classSection.course')->get();
        return view('lecturer.grading.index', compact('enrollments'));
    }

    public function updateGrades(Request $request, Enrollments $enrollment)
    {
        $enrollment->update($request->only(['mid_score', 'final_score', 'assignment_score', 'grade', 'grade_point']));
        return back()->with('success', 'Grades updated');
    }
}
