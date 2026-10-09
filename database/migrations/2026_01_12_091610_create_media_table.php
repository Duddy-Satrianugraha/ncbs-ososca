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
            $table->id();
            $table->unsignedBigInteger('paket_id')->nullable();
            $table->string('tipe', 100);
            $table->unsignedBigInteger('order')->nullable();
            $table->string('token')->unique();
            $table->string('disk')->default('private');
            $table->string('path');          // contoh: media/abc.webp
            $table->string('original_name'); // nama file asli
            $table->string('mime', 100);
            $table->unsignedBigInteger('size'); // bytes
            $table->timestamps();
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
