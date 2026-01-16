<?php

namespace App\Http\Controllers\pbl;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PblNilai;
use App\Models\PblPeserta;
use App\Models\PblMininote;

class PblNilaiController extends Controller
{
    public function rekapKegiatan(int $keg)
        {
            $kegId = $keg;

            // ambil skenario untuk kegiatan ini
            $skenarios = \App\Models\PblMininote::query()
                ->where('keg_id', $kegId)
                ->orderBy('id')
                ->get(['id', 'judul_sk']);

            // ambil pertemuan yang tersedia (dinamis)
            $pertemuans = \App\Models\PblNilai::query()
                ->where('keg_id', $kegId)
                ->distinct()
                ->orderBy('pertemuan')
                ->pluck('pertemuan')
                ->values()
                ->all();

            if (count($pertemuans) === 0) {
                $pertemuans = [1, 2]; // fallback
            }

            // ambil peserta + kelompok (hanya berdasarkan keg)
            $pesertas = \App\Models\PblPeserta::query()
                ->select(
                    'pbl_pesertas.id',
                    'pbl_pesertas.name',
                    'pbl_pesertas.npm',
                    'pbl_kelompoks.nama_kelompok'
                )
                ->join('pbl_nilais', 'pbl_nilais.peserta_id', '=', 'pbl_pesertas.id')
                ->leftJoin('pbl_kelompoks', 'pbl_kelompoks.id', '=', 'pbl_nilais.kelompok_id')
                ->where('pbl_nilais.keg_id', $kegId)
                ->distinct()
                ->orderBy('pbl_kelompoks.nama_kelompok')
                ->orderBy('pbl_pesertas.name')
                ->get();

            // ambil nilai
            $nilais = \App\Models\PblNilai::query()
                ->select('peserta_id', 'skenario_id', 'pertemuan', 'hadir', 'total')
                ->where('keg_id', $kegId)
                ->get();

            // pivot matrix
            $matrix = [];
            foreach ($nilais as $n) {
                $matrix[$n->peserta_id][$n->skenario_id][$n->pertemuan] =
                    $n->hadir ? (int)$n->total : 'Tidak hadir';
            }

            // rerata per peserta
            $rerata = [];
            foreach ($pesertas as $p) {
                $sum = 0;
                $count = 0;

                foreach ($skenarios as $s) {
                    foreach ($pertemuans as $pt) {
                        $val = $matrix[$p->id][$s->id][$pt] ?? null;
                        if (is_int($val)) {
                            $sum += $val;
                            $count++;
                        }
                    }
                }

                $rerata[$p->id] = $count > 0 ? round($sum / $count, 2) : null;
            }

            return view('pbl.keg.nilailist', compact(
                'kegId',
                'skenarios',
                'pertemuans',
                'pesertas',
                'matrix',
                'rerata'
            ));
        }


}
