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
        Schema::create('teachers_tbl', function (Blueprint $table) {
            $table->increments('teachers_id');
            $table->string('teachers_name');
            $table->string('teachers_phone');
            $table->string('teachers_address');
            $table->string('teachers_department');
            $table->string('teachers_image');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teachers_tbl');
    }
};
