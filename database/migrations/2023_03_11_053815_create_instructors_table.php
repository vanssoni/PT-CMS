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
        Schema::create('instructors', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')
            ->references('id')->on('users')->onDelete('cascade');
            $table->date('dob')->nullable();
            $table->string('driver_licence_number')->nullable();
            $table->date('driver_licence_expiry')->nullable();
            $table->string('driver_licence_class')->nullable();
            $table->date('driver_history')->nullable();
            $table->date('driver_abstract')->nullable();
            $table->string('demerit_points')->nullable();
            $table->string('experience')->nullable();
            $table->string('course_name')->nullable();
            $table->string('provider')->nullable();
            $table->date('certification_date')->nullable();
            $table->enum('recertification',['yes', 'no'])->nullable();
            $table->date('recertification_date')->nullable();
            $table->enum('authorized_by_lead_instructor',['yes', 'no'])->nullable();
            $table->string('lead_instructer_name')->nullable();
            $table->date('date_signed_off')->nullable();
            $table->string('contact_number')->nullable();
            $table->date('employment_date')->nullable();
            $table->enum('status', ['active', 'in-active'])->default('active');
            $table->longText('address')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('instructors');
    }
};
