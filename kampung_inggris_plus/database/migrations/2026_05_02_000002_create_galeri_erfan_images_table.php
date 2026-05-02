<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('galeri_erfan_images', function (Blueprint $table) {
            $table->id();
            $table->foreignId('galeri_erfan_id')->constrained('galeri_erfans')->onDelete('cascade');
            $table->string('image_path');
            $table->enum('file_type', ['image', 'video'])->default('image');
            $table->string('caption')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('galeri_erfan_images');
    }
};
