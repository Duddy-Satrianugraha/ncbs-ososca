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
        Schema::create('pbl_bas', function (Blueprint $table) {
            $table->id();
            $table-> foreignId('keg_id');
            $table->foreignId('sk_id');
            $table->foreignId('kelompok_id');
            $table->string('pertemuan');
            $table->string('jml_peserta');
            $table->foreignId('tutor_id');
            $table->longText('ba');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pbl_bas');
    }
};
