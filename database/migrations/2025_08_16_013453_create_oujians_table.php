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
        Schema::create('oujians', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('ta');
             $table->string('jml_station');
             $table->string('jml_sesi');
             $table->string('tgl_ujian');
             $table->foreignId('user_id');
             $table->boolean('remedial')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('oujians');
    }
};
