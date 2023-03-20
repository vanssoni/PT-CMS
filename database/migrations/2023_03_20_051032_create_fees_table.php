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
        Schema::create('fees', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('course_id');
            $table->foreign('course_id')
            ->references('id')->on('courses')->onDelete('cascade');
            $table->unsignedBigInteger('student_id');
            $table->foreign('student_id')
            ->references('id')->on('students')->onDelete('cascade');
            $table->date('date');
            $table->float('amount',20,2);
            $table->string('payment_mode');
            $table->unsignedBigInteger('received_by');
            $table->longText('message')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fees');
    }
};
