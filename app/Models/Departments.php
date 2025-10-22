<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Departments extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'code', 'name', 'description', 'head_of_department', 'is_active'
    ];

    public function students()
    {
        return $this->hasMany(Students::class);
    }

    public function lecturers()
    {
        return $this->hasMany(Lecturers::class);
    }

    public function courses()
    {
        return $this->hasMany(Courses::class);
    }
}
