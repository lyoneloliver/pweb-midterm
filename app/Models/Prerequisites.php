<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Prerequisites extends Model
{
    use HasFactory;

    protected $fillable = [
        'course_id', 'prerequisite_course_id', 'min_grade'
    ];

    public function course()
    {
        return $this->belongsTo(Courses::class, 'course_id');
    }

    public function prerequisite()
    {
        return $this->belongsTo(Courses::class, 'prerequisite_course_id');
    }
}
