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
        Schema::create('pbl_mininotes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('keg_id');
            $table->foreignId('user_id');
            $table->string('nomor_sk');
            $table->string('judul_sk')->nullable();
            $table->longText('skenario')->nullable();
            $table->longText('mininotes')->nullable();
            $table->text('dafpus')->nullable();
            


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pbl_mininotes');
    }
};
