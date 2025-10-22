<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth; // Tambahkan ini untuk Auth::user() di closure

// ==========================================================
// IMPORT CONTROLLERS
// ==========================================================

// Auth Controllers
use App\Http\Controllers\Auth\{
    LoginController,
    RegisterController,
    LogoutController,
    ForgotPasswordController,
    ResetPasswordController
};

// Admin Controllers
use App\Http\Controllers\Admin\{
    DashboardController as AdminDashboardController,
    UserController,
    DepartmentController,
    CourseController,
    ClassSectionController,
    AcademicYearController,
    ApprovalController,
    ReportController
};

// Student Controllers
use App\Http\Controllers\Student\{
    DashboardController as StudentDashboardController,
    EnrollmentController,
    ProfileController,
    GradeController
};

// Lecturer Controllers
use App\Http\Controllers\Lecturer\{
    DashboardController as LecturerDashboardController,
    ClassController,
    AttendanceController,
    GradingController
};

// ==========================================================
// ROUTES
// ==========================================================

// Route Default Dashboard (untuk setelah login atau saat mengakses /dashboard)
Route::get('/dashboard', function () {
    if (Auth::check()) { // Pastikan user sudah login
        if (Auth::user()->role === 'admin') {
            return redirect()->route('admin.dashboard');
        } elseif (Auth::user()->role === 'student') {
            return redirect()->route('student.dashboard');
        } elseif (Auth::user()->role === 'lecturer') {
            return redirect()->route('lecturer.dashboard');
        }
    }
    // Fallback jika tidak ada role yang cocok atau belum login (jarang tercapai)
    return redirect()->route('login');
})->middleware(['auth'])->name('dashboard');


// ============ AUTHENTICATION ROUTES ============
Route::middleware('guest')->group(function () {
    // Login
    Route::get('/', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login'])->name('login.post');

    // Register
    Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [RegisterController::class, 'register'])->name('register.post');

    // Password Reset Routes
    Route::get('forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
    Route::post('forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
    Route::get('reset-password/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
    Route::post('reset-password', [ResetPasswordController::class, 'reset'])->name('password.update');
});

// Logout Route (membutuhkan user yang sudah login)
Route::post('/logout', [LogoutController::class, 'logout'])->name('logout')->middleware('auth');


// ============ ADMIN ROUTES ============
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
    Route::resource('users', UserController::class);
    Route::resource('departments', DepartmentController::class);
    Route::resource('courses', CourseController::class);
    Route::resource('class-sections', ClassSectionController::class);
    Route::resource('academic-years', AcademicYearController::class);
    Route::get('/approvals', [ApprovalController::class, 'index'])->name('approvals.index');
    Route::post('/approvals/{id}/approve', [ApprovalController::class, 'approve'])->name('approvals.approve');
    Route::post('/approvals/{id}/reject', [ApprovalController::class, 'reject'])->name('approvals.reject');
    Route::get('/reports', [ReportController::class, 'index'])->name('reports.index');
});

// ============ STUDENT ROUTES ============
Route::middleware(['auth', 'role:student'])->prefix('student')->name('student.')->group(function () {
    Route::get('/dashboard', [StudentDashboardController::class, 'index'])->name('dashboard');
    Route::get('/enrollment', [EnrollmentController::class, 'index'])->name('enrollment.index');
    Route::post('/enrollment/store', [EnrollmentController::class, 'store'])->name('enrollment.store');
    Route::delete('/enrollment/{id}', [EnrollmentController::class, 'destroy'])->name('enrollment.destroy');
    Route::get('/grades', [GradeController::class, 'index'])->name('grades');
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
});

// ============ LECTURER ROUTES ============
Route::middleware(['auth', 'role:lecturer'])->prefix('lecturer')->name('lecturer.')->group(function () {
    Route::get('/dashboard', [LecturerDashboardController::class, 'index'])->name('dashboard');
    Route::get('/classes', [ClassController::class, 'index'])->name('classes.index');
    Route::get('/classes/{id}', [ClassController::class, 'show'])->name('classes.show');
    Route::get('/attendance/{class_id}', [AttendanceController::class, 'index'])->name('attendance.index');
    Route::post('/attendance/{class_id}', [AttendanceController::class, 'store'])->name('attendance.store');
    Route::get('/grading/{class_id}', [GradingController::class, 'index'])->name('grading.index');
    Route::post('/grading/{class_id}', [GradingController::class, 'store'])->name('grading.store');
});