<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Users;
use App\Models\Students;
use App\Models\Lecturers;

class UsersSeeder extends Seeder
{
    public function run(): void
    {
        // Admin
        $admin = Users::create([
            'name' => 'Admin FRS',
            'email' => 'admin@frs.test',
            'password' => Hash::make('admin123'),
            'role' => 'admin',
            'is_active' => true,
        ]);

        // Lecturer
        $lecturerUser = Users::create([
            'name' => 'Dr. Budi Santoso',
            'email' => 'budi@frs.test',
            'password' => Hash::make('lecturer123'),
            'role' => 'lecturer',
        ]);

        $lecturer = Lecturers::create([
            'user_id' => $lecturerUser->id,
            'department_id' => 1,
            'lecturer_id_number' => 'L001',
            'academic_title' => 'Dr.',
            'specialization' => 'Computer Science',
        ]);

        // Student
        $studentUser = Users::create([
            'name' => 'Abid Alfaridzi',
            'email' => 'abid@student.test',
            'password' => Hash::make('student123'),
            'role' => 'student',
        ]);

        Students::create([
            'user_id' => $studentUser->id,
            'department_id' => 1,
            'student_id_number' => 'S001',
            'admission_year' => 2024,
            'current_semester' => 1,
        ]);
    }
}
