<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Panggil seeder untuk data master terlebih dahulu
        $this->call([
            DepartmentSeeder::class,    // Data Jurusan
            AcademicYearSeeder::class,  // Data Tahun Ajaran
        ]);

        // Panggil seeder untuk membuat user dengan peran (roles)
        $this->call([
            AdminUserSeeder::class,     // Membuat 1 user Admin
            LecturerUserSeeder::class,  // Membuat 1 user Dosen (beserta profil dosen)
            StudentUserSeeder::class,   // Membuat 1 user Mahasiswa (beserta profil mahasiswa)
        ]);
        
        // Panggil seeder untuk data transaksional (opsional tapi bagus untuk testing)
        $this->call([
            CourseSeeder::class,        // Data Mata Kuliah
            ClassSectionSeeder::class,  // Data Kelas (menghubungkan Matkul, Dosen, T.A.)
            // EnrollmentSeeder::class, // (Opsional) Seeder untuk data mahasiswa mengambil kelas
        ]);
    }
}