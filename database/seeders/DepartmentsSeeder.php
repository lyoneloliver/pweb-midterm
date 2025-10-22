<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Departments;

class DepartmentsSeeder extends Seeder
{
    public function run(): void
    {
        Departments::create([
            'code' => 'TI',
            'name' => 'Teknologi Informasi',
            'description' => 'Departemen Teknologi Informasi',
            'head_of_department' => 'Dr. Budi Santoso',
            'is_active' => true,
        ]);

        Departments::create([
            'code' => 'SI',
            'name' => 'Sistem Informasi',
            'description' => 'Departemen Sistem Informasi',
            'head_of_department' => 'Dr. Siti Aminah',
            'is_active' => true,
        ]);
    }
}
