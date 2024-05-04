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
        Schema::create('tbl_course', function (Blueprint $table) {
            $table->id();
            $table->string('course_code');
            $table->string('title');
            $table->string('url_slug');
            $table->text('short_description')->nullable();
            $table->text('description');
            $table->text('course_duration');
            $table->string('tags');
            $table->string('equipment');
            $table->string('image');
            $table->string('video');
            $table->integer('priority');
            $table->integer('total_fees');
            $table->integer('special_fees');
            // $table->string('course_mode');
            $table->integer('course_director');
            $table->integer('course_manger');
            $table->string('created_by');
            $table->integer('status');
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_course');
    }
};
