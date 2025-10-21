<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('department_id')->constrained('departments')->onDelete('restrict');
            $table->string('student_id_number', 20)->unique();
            $table->integer('admission_year');
            $table->integer('current_semester')->default(1);
            $table->decimal('cumulative_gpa', 3, 2)->default(0);
            $table->enum('status', ['active', 'inactive', 'graduated', 'dropped'])->default('active');
            $table->timestamps();
            $table->softDeletes();

            $table->index('student_id_number');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
