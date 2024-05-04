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
        Schema::create('tbl_coursefees', function (Blueprint $table) {
            $table->id();
            $table->integer('course_id');
            $table->integer('course_mode_id');
            $table->integer('amount');
            $table->integer('priority');
            $table->integer('status');
            $table->integer('created_by');
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_coursefees');
    }
};
