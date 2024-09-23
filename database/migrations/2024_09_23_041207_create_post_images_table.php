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
        Schema::create('post_images', function (Blueprint $table) {
            $table->unsignedBigInteger('post_image_id')->autoIncrement();
            $table->integer('post_id');
            $table->integer('position')->nullable();
            $table->string('image_url')->nullable();
            $table->string('seo_image_alt')->nullable();
            $table->timestamps();
            $table->integer('del_flg')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('post_images');
    }
};