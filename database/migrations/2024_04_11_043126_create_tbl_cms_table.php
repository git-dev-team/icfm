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
        Schema::create('tbl_cms', function (Blueprint $table) {
            $table->id();
            $table->string('post_name');
            $table->string('post_url');
            $table->string('title');
            $table->string('image');
            $table->text('short_content');
            $table->text('content');
            $table->string('meta_title');
            $table->string('meta_tag');
            $table->string('meta_description');
            $table->string('meta_keyword');
            $table->integer('infront')->default(0);
            $table->string('priority');
            $table->text('schema_script');
            $table->integer('status');
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_cms');
    }
};
