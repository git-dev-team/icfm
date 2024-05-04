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
        Schema::create('tbl_banner', function (Blueprint $table) {
            $table->id();
            $table->string('category')->nullable();
            $table->string('b_link');
            $table->string('url_slug');
            $table->string('title');
            $table->string('image');
            $table->text('description');
            $table->string('alt_tag')->nullable();
            $table->integer('status');
            $table->integer('priority');
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_banner');
    }
};
