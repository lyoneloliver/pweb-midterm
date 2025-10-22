<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class GradingScales extends Model
{
    use HasFactory;

    protected $fillable = [
        'grade', 'min_score', 'max_score', 'grade_point', 'description'
    ];
}
