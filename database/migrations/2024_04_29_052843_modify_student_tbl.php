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
        Schema::table('student_tbl', function (Blueprint $table) {
            $table->string('student_image', 255)->default('default.jpg')->change();
        });
        //
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::table('student_tbl', function (Blueprint $table) {
            // If necessary, define a rollback logic here
            // For reverting the changes made in the 'up' method
        });
    }
};
