<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Enrollments extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'semester_enrollment_id', 'class_section_id', 'student_id',
        'status', 'enrollment_date', 'mid_score', 'final_score',
        'assignment_score', 'total_score', 'grade', 'grade_point', 'notes'
    ];

    public function semesterEnrollment()
    {
        return $this->belongsTo(SemesterEnrollments::class);
    }

    public function classSection()
    {
        return $this->belongsTo(ClassSections::class);
    }

    public function student()
    {
        return $this->belongsTo(Students::class);
    }

    public function attendances()
    {
        return $this->hasMany(Attendances::class);
    }

    public function approvalLogs()
    {
        return $this->hasMany(ApprovalLogs::class);
    }
}
