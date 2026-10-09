<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   public function up(): void
    {
        Schema::create('pbl_kelompoks', function (Blueprint $table) {
            $table->id();

            $table->foreignId('keg_id')
                ->constrained('pbl_kegs')
                ->cascadeOnDelete();

            $table->unsignedBigInteger('idkel');
            $table->unique(['keg_id', 'idkel']);

            $table->string('nama_kelompok');
            $table->unsignedInteger('jml_peserta')->default(0);

            $table->string('qr_kelompok');
            $table->timestamps();

            $table->index(['keg_id', 'nama_kelompok']); // opsional, bantu pencarian kelompok
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pbl_kelompoks');
    }

};
