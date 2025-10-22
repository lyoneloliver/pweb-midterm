<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User; // Sesuaikan dengan nama model Anda (User atau Users)
use App\Models\Students; // Sesuaikan dengan nama model Anda
use Illuminate\Support\Facades\Hash;

class StudentUserSeeder extends Seeder
{
    public function run(): void
    {
        $studentUser = User::create([
            'name' => 'Mahasiswa Uji Coba',
            'email' => 'student@itsr.ac.id',
            'password' => Hash::make('password'),
            'role' => 'student',
        ]);

        Students::create([
            'user_id' => $studentUser->id,
            'department_id' => 1, // Pastikan ID 1 ada dari DepartmentSeeder
            'student_id_number' => 'S1001', // ID Mahasiswa unik
            'admission_year' => date('Y'),
        ]);
    }
}