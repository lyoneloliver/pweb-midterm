<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Jalankan semua seeder.
     */
    public function run(): void
    {
        $this->call([
            UsersSeeder::class,
            DepartmentsSeeder::class,
            // CoursesSeeder::class,
            // AcademicYearsSeeder::class,
            // ClassSectionsSeeder::class,
            // GradingScalesSeeder::class,
        ]);
    }
}
