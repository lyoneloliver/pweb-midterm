<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ClassSchedules extends Model
{
    use HasFactory;

    protected $fillable = [
        'class_section_id', 'day', 'start_time', 'end_time', 'room'
    ];

    public function classSection()
    {
        return $this->belongsTo(ClassSections::class);
    }
}
