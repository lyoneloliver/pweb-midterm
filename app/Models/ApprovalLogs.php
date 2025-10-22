<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ApprovalLogs extends Model
{
    use HasFactory;

    protected $fillable = [
        'enrollment_id', 'approved_by', 'action', 'notes', 'action_date'
    ];

    public function enrollment()
    {
        return $this->belongsTo(Enrollments::class);
    }

    public function approver()
    {
        return $this->belongsTo(Users::class, 'approved_by');
    }
}
