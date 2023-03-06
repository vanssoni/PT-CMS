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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')
            ->references('id')->on('users')->onDelete('cascade');
            $table->dateTime('dob')->nullable();
            $table->longText('address')->nullable();
            $table->string('phone')->nullable();
            $table->string('emergency_phone')->nullable();
            $table->string('emergency_contact_number')->nullable();
            $table->string('dl')->nullable();
            $table->dateTime('expiry')->nullable();
            $table->string('sin')->nullable();
            $table->string('status')->nullable();
            $table->string('organization_name')->nullable();
            $table->longText('employer_address')->nullable();
            $table->string('supervisor_name')->nullable();
            $table->string('supervisor_phone')->nullable();
            $table->string('ext')->nullable();
            $table->dateTime('registration_date')->nullable();
            $table->string('deposit')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
