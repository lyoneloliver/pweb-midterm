<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\{
    LoginController,
    RegisterController,
    // LogoutController
};

use App\Http\Controllers\Admin\{
    // DashboardController as AdminDashboardController,
    UserController,
    // DepartmentController,
    CourseController,
    // ClassSectionController,
    // AcademicYearController,
    ApprovalController,
    // ReportController
};

use App\Http\Controllers\Student\{
    // DashboardController as StudentDashboardController,
    EnrollmentController,
    // ProfileController,
    // GradeController
};

use App\Http\Controllers\Lecturer\{
    // DashboardController as LecturerDashboardController,
    // ClassController,
    // AttendanceController,
    GradingController
};
