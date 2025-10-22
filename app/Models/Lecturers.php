<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lecturers extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id', 'department_id', 'lecturer_id_number', 
        'academic_title', 'specialization', 'is_active'
    ];

    public function user()
    {
        return $this->belongsTo(Users::class);
    }

    public function department()
    {
        return $this->belongsTo(Departments::class);
    }

    public function classSections()
    {
        return $this->hasMany(ClassSections::class);
    }
}
