<?php

namespace App\Services;

use App\Models\Enrollments;
use App\Models\SemesterEnrollments;
use App\Models\ClassSections;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Exception;

class EnrollmentService
{
    /**
     * Ambil seluruh data FRS mahasiswa aktif
     */
    public function getStudentEnrollments(int $userId)
    {
        return Enrollments::with(['classSection.course', 'semesterEnrollment.academicYear'])
            ->where('student_id', function($query) use ($userId) {
                $query->select('id')->from('students')->where('user_id', $userId);
            })
            ->get();
    }

    /**
     * Tambah mata kuliah ke FRS
     */
    public function createEnrollment(int $userId, array $data)
    {
        try {
            return DB::transaction(function () use ($userId, $data) {
                $studentId = DB::table('students')->where('user_id', $userId)->value('id');
                $semesterId = $data['semester_enrollment_id'];

                // Cek kuota kelas
                $class = ClassSections::withCount('enrollments')->findOrFail($data['class_section_id']);
                if ($class->enrollments_count >= $class->max_students) {
                    throw new Exception('Kuota kelas sudah penuh.');
                }

                // Cek duplikasi
                $exists = Enrollments::where('class_section_id', $data['class_section_id'])
                    ->where('student_id', $studentId)
                    ->exists();

                if ($exists) {
                    throw new Exception('Anda sudah mengambil kelas ini.');
                }

                // Tambah data FRS
                return Enrollments::create([
                    'semester_enrollment_id' => $semesterId,
                    'class_section_id' => $data['class_section_id'],
                    'student_id' => $studentId,
                    'status' => 'pending',
                    'enrollment_date' => now(),
                ]);
            });
        } catch (Exception $e) {
            Log::error('Enrollment gagal: ' . $e->getMessage());
            throw $e;
        }
    }

    /**
     * Hapus mata kuliah dari FRS (hanya sebelum disetujui)
     */
    public function dropEnrollment(int $enrollmentId)
    {
        $enrollment = Enrollments::findOrFail($enrollmentId);
        if ($enrollment->status !== 'pending') {
            throw new Exception('FRS tidak dapat dihapus setelah disetujui.');
        }
        return $enrollment->delete();
    }
}
