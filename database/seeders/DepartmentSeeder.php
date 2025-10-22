<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Department; // Pastikan Anda import model Department

class DepartmentSeeder extends Seeder
{
    public function run(): void
    {
        Department::create(['name' => 'Teknik Informatika']);
        Department::create(['name' => 'Sistem Informasi']);
        Department::create(['name' => 'Manajemen Bisnis']);
    }
}