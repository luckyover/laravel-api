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
        Schema::create('tags', function (Blueprint $table) {
            $table->unsignedBigInteger('tag_id')->autoIncrement();
            $table->string('tag_nm')->nullable();
            $table->string('tag_div')->nullable();  // 0 product - 1 blog
            $table->timestamps();
            $table->integer('del_flg')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tags');
    }
};
