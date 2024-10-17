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

        Schema::create('categories', function (Blueprint $table) {
            $table->id(); // ID tự động tăng
            $table->string('name', 100); // Tên danh mục, giới hạn 100 ký tự
            $table->string('slug')->nullable(); // Slug duy nhất cho URL thân thiện SEO
            $table->string('seo_title', 70)->nullable(); // Tiêu đề SEO
            $table->string('meta_description', 160)->nullable(); // Meta description cho SEO
            $table->timestamps(); // Thêm created_at và updated_at
            $table->integer('del_flg')->nullable();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
