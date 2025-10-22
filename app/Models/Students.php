<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Students extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id', 'department_id', 'student_id_number', 
        'admission_year', 'current_semester', 'cumulative_gpa', 'status'
    ];

    public function user()
    {
        return $this->belongsTo(Users::class);
    }

    public function department()
    {
        return $this->belongsTo(Departments::class);
    }

    public function semesterEnrollments()
    {
        return $this->hasMany(SemesterEnrollments::class);
    }

    public function enrollments()
    {
        return $this->hasMany(Enrollments::class);
    }
}
