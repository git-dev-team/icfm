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
        Schema::create('tbl_course_discount', function (Blueprint $table) {
            $table->id();
            $table->integer('admin_id');
            $table->integer('course_id');
            $table->integer('discount');
            $table->integer('total_coupon');
            $table->datetime('valid_upto');
            $table->string('coupon_code');
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
        Schema::dropIfExists('tbl_course_discount');
    }
};
