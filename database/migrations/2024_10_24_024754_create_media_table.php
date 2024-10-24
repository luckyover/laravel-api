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
        Schema::create('media', function (Blueprint $table) {
            $table->unsignedBigInteger('media_id')->autoIncrement();
            $table->unsignedBigInteger('product_id');
            $table->integer('media_type')->nullable();
            $table->string('media_url')->nullable();
            $table->string('alt_text')->nullable();
            $table->string('disp_order')->nullable();
            $table->timestamps();
            $table->integer('del_flg')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('media');
    }
};
