<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class PblNilaiExport implements FromView, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function __construct(
                public $pbl,
               public $kegId,
               public $skenarios,
               public $pertemuans,
               public $pesertas,
               public $matrix,
               public $rerata,
    ) {}

    public function view(): View
    {
        return view('export.pblnilai', [
                'pbl' => $this->pbl,
                'kegId' => $this->kegId,
                'skenarios' => $this->skenarios,
                'pertemuans' => $this->pertemuans,
                'pesertas' => $this->pesertas,
                'matrix' => $this->matrix,
                'rerata' => $this->rerata,
        ]);
    }
}
