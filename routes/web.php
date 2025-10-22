<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\{
    LoginController, RegisterController, LogoutController
};
use App\Http\Controllers\Admin\{
    DashboardController as AdminDashboardController,
    UserController, DepartmentController, CourseController,
    ClassSectionController, AcademicYearController,
    ApprovalController, ReportController
};
use App\Http\Controllers\Student\{
    DashboardController as StudentDashboardController,
    EnrollmentController, ProfileController, GradeController
};
use App\Http\Controllers\Lecturer\{
    DashboardController as LecturerDashboardController,
    ClassController, AttendanceController, GradingController
};

// ============ AUTH ============
Route::middleware('guest')->group(function () {
    Route::get('/', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login'])->name('login.post');
    // PERUBAHAN DI SINI: showRegisterForm menjadi showRegistrationForm
    Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register'); 
    Route::post('/register', [RegisterController::class, 'register'])->name('register.post');
});
Route::post('/logout', [LogoutController::class, 'logout'])->name('logout')->middleware('auth');

// ============ ADMIN ============
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

// ============ STUDENT ============
Route::middleware(['auth', 'role:student'])->prefix('student')->name('student.')->group(function () {
    Route::get('/dashboard', [StudentDashboardController::class, 'index'])->name('dashboard');
    Route::get('/enrollment', [EnrollmentController::class, 'index'])->name('enrollment.index');
    Route::post('/enrollment/store', [EnrollmentController::class, 'store'])->name('enrollment.store');
    Route::delete('/enrollment/{id}', [EnrollmentController::class, 'destroy'])->name('enrollment.destroy');
    Route::get('/grades', [GradeController::class, 'index'])->name('grades');
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
});

// ============ LECTURER ============
Route::middleware(['auth', 'role:lecturer'])->prefix('lecturer')->name('lecturer.')->group(function () {
    Route::get('/dashboard', [LecturerDashboardController::class, 'index'])->name('dashboard');
    Route::get('/classes', [ClassController::class, 'index'])->name('classes.index');
    Route::get('/classes/{id}', [ClassController::class, 'show'])->name('classes.show');
    Route::get('/attendance/{class_id}', [AttendanceController::class, 'index'])->name('attendance.index');
    Route::post('/attendance/{class_id}', [AttendanceController::class, 'store'])->name('attendance.store');
    Route::get('/grading/{class_id}', [GradingController::class, 'index'])->name('grading.index');
    Route::post('/grading/{class_id}', [GradingController::class, 'store'])->name('grading.store');
});