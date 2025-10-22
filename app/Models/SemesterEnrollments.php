<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class SemesterEnrollments extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'student_id', 'academic_year_id', 'status', 
        'total_credits', 'max_credits', 'semester_gpa', 'notes'
    ];

    public function student()
    {
        return $this->belongsTo(Students::class);
    }

    public function academicYear()
    {
        return $this->belongsTo(AcademicYears::class);
    }

    public function enrollments()
    {
        return $this->hasMany(Enrollments::class);
    }
}
