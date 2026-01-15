<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pbl_nilais', function (Blueprint $table) {
            $table->id();

            // ====== Scope / Identitas penilaian ======
            // blok = id dari pbl_kegs
            $table->foreignId('keg_id')
                ->constrained('pbl_kegs')
                ->cascadeOnDelete();

            // kelompok = id dari pbl_kelompoks
            $table->foreignId('kelompok_id')
                ->constrained('pbl_kelompoks')
                ->cascadeOnDelete();

            // skenario = id dari pbl_mininotes
            $table->foreignId('skenario_id')
                ->constrained('pbl_mininotes')
                ->cascadeOnDelete();

            // pertemuan = 1/2/... (bukan FK)
            $table->unsignedTinyInteger('pertemuan');

            // tutor = id dari opengujis
            $table->foreignId('tutor_id')
            ->nullable()
                ->constrained('opengujis')
                ->nullOnDelete();

            // peserta yang dinilai
            $table->foreignId('peserta_id')
                ->constrained('pbl_pesertas')
                ->cascadeOnDelete();

            // ====== Nilai ======
            $table->boolean('hadir')->default(false);

            $table->unsignedTinyInteger('sharing')->default(0);      // 0..10
            $table->unsignedTinyInteger('argumentasi')->default(0);  // 0..10
            $table->unsignedTinyInteger('keaktifan')->default(0);    // 0..10
            $table->tinyInteger('dominasi')->default(0);             // -5..0
            $table->unsignedTinyInteger('kolaborasi')->default(0);   // 0..10
            $table->tinyInteger('disiplin')->default(0);             // -5..0
            $table->unsignedTinyInteger('komunikasi')->default(0);   // 0..10
            $table->tinyInteger('sopan')->default(0);                // 0,-3,-5 (signed)

            $table->smallInteger('total')->default(0);

            $table->timestamps();

            // ====== Indexing ======
            // cepat untuk rekap/filter
            $table->index(
                ['keg_id', 'kelompok_id', 'skenario_id', 'pertemuan', 'tutor_id'],
                'idx_nilais_scope'
            );

            // cegah double input untuk scope yang sama
            $table->unique([
                'keg_id',
                'kelompok_id',
                'skenario_id',
                'pertemuan',
                'tutor_id',
                'peserta_id',
            ], 'pbl_nilais_scope_unique');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pbl_nilais');
    }
};
