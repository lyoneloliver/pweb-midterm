<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('code', 20)->unique();
            $table->string('name');
            $table->integer('credits');
            $table->text('description')->nullable();
            $table->foreignId('department_id')->constrained('departments')->onDelete('restrict');
            $table->integer('semester_offered')->nullable(); // 1-8
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            $table->softDeletes();

            $table->index('code');
            $table->index('department_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
