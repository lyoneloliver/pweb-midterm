<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Students extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'department_id',
        'student_id_number',
        'admission_year',
        // Tambahkan kolom lain di tabel 'students' jika Anda mengisinya secara massal
    ];

    public function user()
    {
        return $this->belongsTo(Users::class);
    }

    // Jika Anda memiliki relasi lain, biarkan tetap ada
    public function department()
    {
        return $this->belongsTo(Department::class);
    }
}