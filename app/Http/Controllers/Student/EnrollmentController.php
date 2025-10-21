<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Http\Requests\EnrollmentRequest;
use App\Services\EnrollmentService;
use Illuminate\Support\Facades\Auth;

class EnrollmentController extends Controller
{
    protected $enrollmentService;

    public function __construct(EnrollmentService $enrollmentService)
    {
        $this->enrollmentService = $enrollmentService;
    }

    public function index()
    {
        $enrollments = $this->enrollmentService->getStudentEnrollments(Auth::id());
        return view('student.enrollment.index', compact('enrollments'));
    }

    public function store(EnrollmentRequest $request)
    {
        $this->enrollmentService->createEnrollment(Auth::id(), $request->validated());
        return back()->with('success', 'Enrollment added');
    }
}
