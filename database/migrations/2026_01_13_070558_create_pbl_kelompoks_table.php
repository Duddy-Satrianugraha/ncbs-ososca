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
        Schema::create('pbl_kelompoks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('keg_id');
            $table->unsignedBigInteger("idkel");
            $table->unique(['keg_id','idkel']);
            $table->string('nama_kelompok');
            $table->integer('jml_peserta');
            $table->string('qr_kelompok');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pbl_kelompoks');
    }
};
