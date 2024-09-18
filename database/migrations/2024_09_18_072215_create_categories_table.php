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
            $table->id(); // This creates an auto-incrementing ID field
            $table->string('name', 100); // VARCHAR(100) for the 'name' column
            $table->text('description'); // TEXT for the 'description' column
            $table->timestamps(); // Adds 'created_at' and 'updated_at' timestamps
            $table->integer('del_flg');
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
