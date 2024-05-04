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
        Schema::create('tbl_company', function (Blueprint $table) {
            $table->id();
            $table->string('company_name');
            $table->string('company_code');
            $table->integer('state');
            $table->integer('city');
            $table->integer('pincode');
            $table->integer('status');
            $table->integer('deleted_at')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_company');
    }
};
