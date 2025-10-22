<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class AcademicYears extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'year', 'semester', 'start_date', 'end_date', 
        'enrollment_start_date', 'enrollment_end_date',
        'is_enrollment_open', 'is_active'
    ];

    public function classSections()
    {
        return $this->hasMany(ClassSections::class);
    }

    public function semesterEnrollments()
    {
        return $this->hasMany(SemesterEnrollments::class);
    }
}
