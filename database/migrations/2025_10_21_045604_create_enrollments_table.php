<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('enrollments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('semester_enrollment_id')->constrained('semester_enrollments')->onDelete('cascade');
            $table->foreignId('class_section_id')->constrained('class_sections')->onDelete('restrict');
            $table->foreignId('student_id')->constrained('students')->onDelete('cascade');
            
            $table->enum('status', ['pending', 'approved', 'rejected', 'dropped'])->default('pending');
            $table->date('enrollment_date');
            
            // Grading
            $table->decimal('mid_score', 5, 2)->nullable();
            $table->decimal('final_score', 5, 2)->nullable();
            $table->decimal('assignment_score', 5, 2)->nullable();
            $table->decimal('total_score', 5, 2)->nullable();
            $table->char('grade', 2)->nullable(); // A, A-, B+, B, B-, C+, C, D, E
            $table->decimal('grade_point', 3, 2)->nullable(); // 4.00, 3.75, 3.50, etc.
            
            $table->text('notes')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->index(['student_id', 'semester_enrollment_id']);
            $table->index('status');
            $table->unique(['semester_enrollment_id', 'class_section_id'], 'unique_enrollment');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('enrollments');
    }
};
