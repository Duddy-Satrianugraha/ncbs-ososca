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
        Schema::create('pbl_pesertas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('keg_id');
            $table->string('name');
            $table->string('npm');
            $table->string('qrpeserta');
            $table->integer('kelompok');
            $table->string('nama_kelompok')->nullable();
            $table->string('avatar')->nullable();
            $table->boolean('status')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pbl_pesertas');
    }
};
