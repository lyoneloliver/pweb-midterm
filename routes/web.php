<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\{
    LoginController,
    RegisterController,
    LogoutController
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

use App\Http\Controllers\Lecturer\{
    // DashboardController as LecturerDashboardController,
    // ClassController,
    // AttendanceController,
    GradingController
};

// =================== AUTH =================== //
Route::middleware('guest')->group(function () {
    // Halaman login
    Route::get('/', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login'])->name('login.post');

    // Halaman register (mahasiswa baru)
    Route::get('/register', [RegisterController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [RegisterController::class, 'register'])->name('register.post');
});

// Logout (hanya untuk user login)
Route::post('/logout', [LogoutController::class, 'logout'])->name('logout')->middleware('auth');

// =================== ADMIN =================== //
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {

    // Dashboard
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

    // User Management
    Route::resource('users', UserController::class);

    // Department
    Route::resource('departments', DepartmentController::class);

    // Course
    Route::resource('courses', CourseController::class);

    // Class Section
    Route::resource('class-sections', ClassSectionController::class);

    // Academic Year
    Route::resource('academic-years', AcademicYearController::class);

    // Approval Management
    Route::get('/approvals', [ApprovalController::class, 'index'])->name('approvals.index');
    Route::post('/approvals/{id}/approve', [ApprovalController::class, 'approve'])->name('approvals.approve');
    Route::post('/approvals/{id}/reject', [ApprovalController::class, 'reject'])->name('approvals.reject');

    // Report
    Route::get('/reports', [ReportController::class, 'index'])->name('reports.index');
    Route::get('/reports/export', [ReportController::class, 'export'])->name('reports.export');
});

// =================== STUDENT =================== //
use App\Http\Controllers\Student\DashboardController as StudentDashboardController;
use App\Http\Controllers\Student\ProfileController as StudentProfileController;
use App\Http\Controllers\Student\GradeController as StudentGradeController;
use App\Http\Controllers\Student\EnrollmentController as StudentEnrollmentController;

Route::middleware(['auth', 'role:student'])->prefix('student')->name('student.')->group(function () {
    Route::get('/dashboard', [\App\Http\Controllers\Student\DashboardController::class, 'index'])->name('dashboard');
    Route::get('/profile', [\App\Http\Controllers\Student\ProfileController::class, 'index'])->name('profile');
    Route::post('/profile', [\App\Http\Controllers\Student\ProfileController::class, 'update'])->name('profile.update');
    Route::get('/grades', [\App\Http\Controllers\Student\GradeController::class, 'index'])->name('grades');

    
    Route::get('/enrollment', [StudentEnrollmentController::class, 'index'])->name('enrollment.index');
    Route::post('/enrollment', [StudentEnrollmentController::class, 'store'])->name('enrollment.store');
    Route::delete('/enrollment/{id}', [StudentEnrollmentController::class, 'destroy'])->name('enrollment.destroy');
});

// =================== LECTURER =================== //
Route::middleware(['auth', 'role:lecturer'])->prefix('lecturer')->name('lecturer.')->group(function () {

    // Dashboard
    Route::get('/dashboard', [LecturerDashboardController::class, 'index'])->name('dashboard');

    // Class Management
    Route::get('/classes', [ClassController::class, 'index'])->name('classes.index');
    Route::get('/classes/{id}', [ClassController::class, 'show'])->name('classes.show');

    // Attendance
    Route::get('/attendance/{class_id}', [AttendanceController::class, 'index'])->name('attendance.index');
    Route::post('/attendance/{class_id}', [AttendanceController::class, 'store'])->name('attendance.store');

    // Grading
    Route::get('/grading/{class_id}', [GradingController::class, 'index'])->name('grading.index');
    Route::post('/grading/{class_id}', [GradingController::class, 'store'])->name('grading.store');
});
