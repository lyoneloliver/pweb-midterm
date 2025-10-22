<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Courses extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'code', 'name', 'credits', 'description',
        'department_id', 'semester_offered', 'is_active'
    ];

    public function department()
    {
        return $this->belongsTo(Departments::class);
    }

    public function prerequisites()
    {
        return $this->hasMany(Prerequisites::class, 'course_id');
    }

    public function classSections()
    {
        return $this->hasMany(ClassSections::class);
    }
}
