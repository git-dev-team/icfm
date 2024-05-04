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
        Schema::create('tbl_transaction', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('course_id');
            $table->integer('course_mode_id');
            $table->integer('installment_type')->nullable();
            $table->integer('installment_id')->nullable();
            $table->string('txn_id');
            $table->string('razorpay_id')->nullable();
            $table->string('coupon_code')->nullable();
            $table->string('payment_method');
            $table->string('amount');
            $table->string('discount')->nullable();
            $table->string('course_fees')->nullable();
            $table->integer('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_transaction');
    }
};
