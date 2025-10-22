<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Enrollments;
use App\Models\ClassSections;
use App\Models\AcademicYears;

class EnrollmentController extends Controller
{
    /**
     * Menampilkan daftar KRS mahasiswa
     */
    public function index()
    {
        $student = Auth::user()->student;

        $academicYear = AcademicYears::where('is_active', true)->first();
        $availableClasses = ClassSections::with('course')
            ->where('academic_year_id', $academicYear?->id)
            ->get();

        $enrollments = Enrollments::with('classSection.course')
            ->where('student_id', $student->id)
            ->get();

        return view('student.enrollment.index', [
            'title' => 'KRS Mahasiswa',
            'student' => $student,
            'academicYear' => $academicYear,
            'availableClasses' => $availableClasses,
            'enrollments' => $enrollments,
        ]);
    }

    /**
     * Menyimpan mata kuliah yang diambil mahasiswa
     */
    public function store(Request $request)
    {
        $request->validate([
            'class_section_id' => 'required|exists:class_sections,id',
        ]);

        $student = Auth::user()->student;

        // Cek apakah sudah mengambil kelas ini
        $exists = Enrollments::where('student_id', $student->id)
            ->where('class_section_id', $request->class_section_id)
            ->exists();

        if ($exists) {
            return back()->with('error', 'Anda sudah mengambil kelas ini.');
        }

        Enrollments::create([
            'student_id' => $student->id,
            'class_section_id' => $request->class_section_id,
            'status' => 'pending',
        ]);

        return back()->with('success', 'Mata kuliah berhasil ditambahkan ke KRS Anda.');
    }

    /**
     * Menghapus mata kuliah dari KRS
     */
    public function destroy($id)
    {
        $student = Auth::user()->student;
        $enrollment = Enrollments::where('id', $id)
            ->where('student_id', $student->id)
            ->first();

        if (!$enrollment) {
            return back()->with('error', 'Data KRS tidak ditemukan.');
        }

        $enrollment->delete();

        return back()->with('success', 'Mata kuliah berhasil dibatalkan.');
    }
}
