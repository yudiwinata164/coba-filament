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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string("title");
            $table->string("url");
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('postcategories')->onDelete('cascade');
            $table->string("status");
            $table->string("language", 2);
            $table->text("content");
            $table->string("featured_image");
            $table->string("keyword");
            $table->string("description", 160);
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
