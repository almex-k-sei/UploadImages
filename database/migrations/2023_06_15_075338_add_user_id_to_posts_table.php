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
        Schema::table('upload_images', function (Blueprint $table) {
            $table->foreignId('images_id')
            ->nullable()
            ->default(null)
            ->constrained('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('upload_images', function (Blueprint $table) {
            $table->dropColumn('images_id');
        });
    }
};
