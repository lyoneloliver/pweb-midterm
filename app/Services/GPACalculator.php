<?php

namespace App\Services;

use App\Models\Enrollments;
use App\Models\SemesterEnrollments;
use Illuminate\Support\Facades\DB;

class GpaCalculator
{
    /**
     * Hitung IP semester
     */
    public function calculateSemesterGPA(int $semesterEnrollmentId): float
    {
        $enrollments = Enrollments::where('semester_enrollment_id', $semesterEnrollmentId)
            ->whereNotNull('grade_point')
            ->get();

        if ($enrollments->isEmpty()) {
            return 0.0;
        }

        $totalWeighted = $enrollments->sum(fn($e) => $e->grade_point * $e->classSection->course->credits);
        $totalCredits = $enrollments->sum(fn($e) => $e->classSection->course->credits);

        $gpa = round($totalWeighted / max($totalCredits, 1), 2);

        SemesterEnrollments::where('id', $semesterEnrollmentId)
            ->update([
                'semester_gpa' => $gpa,
                'total_credits' => $totalCredits,
            ]);

        return $gpa;
    }

    /**
     * Hitung IPK kumulatif mahasiswa
     */
    public function calculateCumulativeGPA(int $studentId): float
    {
        $enrollments = Enrollments::where('student_id', $studentId)
            ->whereNotNull('grade_point')
            ->with('classSection.course')
            ->get();

        if ($enrollments->isEmpty()) {
            return 0.0;
        }

        $totalWeighted = $enrollments->sum(fn($e) => $e->grade_point * $e->classSection->course->credits);
        $totalCredits = $enrollments->sum(fn($e) => $e->classSection->course->credits);

        $gpa = round($totalWeighted / max($totalCredits, 1), 2);

        DB::table('students')->where('id', $studentId)->update(['cumulative_gpa' => $gpa]);

        return $gpa;
    }
}
