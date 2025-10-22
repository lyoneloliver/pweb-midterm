<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class ClassSections extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'course_id', 'academic_year_id', 'lecturer_id', 
        'section_name', 'max_students', 'room', 'is_active'
    ];

    public function course()
    {
        return $this->belongsTo(Courses::class);
    }

    public function academicYear()
    {
        return $this->belongsTo(AcademicYears::class);
    }

    public function lecturer()
    {
        return $this->belongsTo(Lecturers::class);
    }

    public function schedules()
    {
        return $this->hasMany(ClassSchedules::class);
    }

    public function enrollments()
    {
        return $this->hasMany(Enrollments::class);
    }
}
