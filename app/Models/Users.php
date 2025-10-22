<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Users extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes;

    protected $fillable = [
        'name', 'email', 'password', 'role', 'phone', 'address', 'is_active'
    ];

    protected $hidden = ['password', 'remember_token'];

    protected $casts = [
        'is_active' => 'boolean',
        'email_verified_at' => 'datetime',
    ];

    // Relasi
    public function student()
    {
        return $this->hasOne(Students::class);
    }

    public function lecturer()
    {
        return $this->hasOne(Lecturers::class);
    }

    public function activityLogs()
    {
        return $this->hasMany(ActivityLogs::class);
    }

    public function notifications()
    {
        return $this->hasMany(Notifications::class);
    }
}
