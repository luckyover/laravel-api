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
        Schema::create('products', function (Blueprint $table) {
            $table->unsignedBigInteger('product_id')->autoIncrement();
            $table->unsignedBigInteger('category_id');
            $table->string('product_nm')->nullable();
            $table->text('description')->nullable();
            $table->decimal('price', 10, 2)->nullable();
            $table->decimal('price_sub', 10, 2)->nullable();
            $table->integer('qty_sell')->nullable();
            $table->integer('rating')->nullable();
            $table->string('img')->nullable();
            $table->string('alt_img')->nullable();
            $table->string('brand_id')->nullable();
            $table->string('s_title')->nullable();
            $table->text('m_description')->nullable();
            $table->string('s_slug')->nullable();
            $table->timestamps();
            $table->integer('del_flg')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
