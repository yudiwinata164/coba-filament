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
        Schema::create('postcategories', function (Blueprint $table) {
            $table->id();
            $table->string('category');
            $table->string('url');
            $table->string('language', 2);
            $table->string('status');
            $table->string('keyword');
            $table->string('description', 160);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('postcategories');
    }
};
