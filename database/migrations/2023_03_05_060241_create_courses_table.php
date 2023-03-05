<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('program_id');
            $table->enum('course_type',['vocational', 'non-vocational'])->nullable();
            $table->enum('course_time_type',['ft', 'pt'])->nullable();
            $table->decimal('hours', 10,2)->nullable();
            $table->integer('weeks')->nullable();
            $table->integer('months')->nullable();
            $table->enum('practice',['yes', 'no'])->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
