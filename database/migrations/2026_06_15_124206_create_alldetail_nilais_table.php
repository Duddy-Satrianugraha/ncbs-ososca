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
        Schema::create('alldetail_nilais', function (Blueprint $table) {
            $table->id();
            $table->foreignId('allnilai_id')->constrained()->onDelete('cascade');
            $table->string('nama_mhs');
            $table->string('npm');
            $table->string('pretest')->nullable();
            $table->string('posttest')->nullable();
            $table->string('laporan')->nullable();
            $table->string('ujian_prax')->nullable();
            $table->string('nilai_akhir');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alldetail_nilais');
    }
};
