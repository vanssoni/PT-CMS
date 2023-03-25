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
        Schema::table('pdf_forms', function (Blueprint $table) {
           $table->boolean('is_visible_to_students')->default(1);
           $table->boolean('is_visible_to_instructors')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pdf_forms', function (Blueprint $table) {
            //
        });
    }
};
