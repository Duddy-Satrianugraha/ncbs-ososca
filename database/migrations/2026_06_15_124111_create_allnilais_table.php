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
        Schema::create('allnilais', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('jenis_nilai');
            $table->string('blok');
            $table->string('tahun_akademik');
            $table->string('status')->default(0);
            $table->string('input_by')->nullable();
            $table->string('checked_by')->nullable();
            $table->string('approved_by')->nullable();
            $table->string('published_by')->nullable();
            $table->string('lastupdated_by')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('allnilais');
    }
};
