<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User; // Sesuaikan dengan nama model Anda
use App\Models\Lecturer; // **ASUMSI NAMA MODEL**
use Illuminate\Support\Facades\Hash;

class LecturerUserSeeder extends Seeder
{
    public function run(): void
    {
        $lecturerUser = User::create([
            'name' => 'Dosen Uji Coba',
            'email' => 'lecturer@itsr.ac.id',
            'password' => Hash::make('password'),
            'role' => 'lecturer',
        ]);

        // **ASUMSI:** Anda perlu membuat model dan migrasi untuk 'lecturers'
        // Jika belum ada, Anda bisa skip bagian ini, tapi user dosen tidak akan punya profil
        Lecturer::create([
            'user_id' => $lecturerUser->id,
            'department_id' => 1, // Pastikan ID 1 ada
            'lecturer_id_number' => 'D1001', // NIDN atau ID Dosen unik
        ]);
    }
}