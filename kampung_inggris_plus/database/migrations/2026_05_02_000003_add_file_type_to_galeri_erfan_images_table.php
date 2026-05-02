<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasTable('galeri_erfan_images') && !Schema::hasColumn('galeri_erfan_images', 'file_type')) {
            Schema::table('galeri_erfan_images', function (Blueprint $table) {
                $table->enum('file_type', ['image', 'video'])->default('image')->after('image_path');
            });
        }
    }

    public function down(): void
    {
        if (Schema::hasColumn('galeri_erfan_images', 'file_type')) {
            Schema::table('galeri_erfan_images', function (Blueprint $table) {
                $table->dropColumn('file_type');
            });
        }
    }
};
