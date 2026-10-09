<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
 public function up(): void
{
    Schema::create('pbl_pesertas', function (Blueprint $table) {
        $table->id();

        $table->foreignId('keg_id')
            ->constrained('pbl_kegs')
            ->cascadeOnDelete();

        $table->foreignId('kelompok_id')
            ->nullable()
            ->constrained('pbl_kelompoks')
            ->nullOnDelete();

        $table->string('name');
        $table->string('npm');      // bisa string(9) kalau mau ketat
        $table->string('qrpeserta');

        // Kolom lama (sementara dipertahankan)
        $table->unsignedBigInteger('kelompok')->nullable(); // dulu idkel
        $table->string('nama_kelompok')->nullable();

        $table->string('avatar')->nullable();
        $table->boolean('status')->default(false);

        $table->timestamps();

        // index bantu performa
        $table->index(['keg_id', 'kelompok_id']);
        $table->index(['keg_id', 'npm']);
    });
}

public function down(): void
{
    Schema::dropIfExists('pbl_pesertas');
}

};
