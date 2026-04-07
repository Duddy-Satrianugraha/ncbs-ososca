<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Alignment;

class PblNilaiExport implements FromView, WithEvents
{
    protected $pbl;
    protected $kegId;
    protected $skenarios;
    protected $pertemuans;
    protected $pesertas;
    protected $matrix;
    protected $rerata;

    public function __construct($pbl, $kegId, $skenarios, $pertemuans, $pesertas, $matrix, $rerata)
    {
        $this->pbl = $pbl;
        $this->kegId = $kegId;
        $this->skenarios = $skenarios;
        $this->pertemuans = $pertemuans;
        $this->pesertas = $pesertas;
        $this->matrix = $matrix;
        $this->rerata = $rerata;
    }

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

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $sheet = $event->sheet->getDelegate();

                $jumlahKolom = 4 + (count($this->pertemuans) * $this->skenarios->count()) + 1;
                $lastColumn = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($jumlahKolom);
                $lastRow = 3 + $this->pesertas->count();

                // rata tengah semua header
                $sheet->getStyle("A1:{$lastColumn}3")->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
                $sheet->getStyle("A1:{$lastColumn}3")->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);

                // bold header
                $sheet->getStyle("A1:{$lastColumn}3")->getFont()->setBold(true);

                // warna header
                $sheet->getStyle("A1:{$lastColumn}3")->getFill()->setFillType(Fill::FILL_SOLID);
                $sheet->getStyle("A1:{$lastColumn}3")->getFill()->getStartColor()->setARGB('D9EAF7');

                // merge title baris 1
                $sheet->mergeCells("A1:D1");
                $sheet->mergeCells("E1:{$lastColumn}1");

                // merge rowspan header baris 2-3
                $sheet->mergeCells("A2:A3");
                $sheet->mergeCells("B2:B3");
                $sheet->mergeCells("C2:C3");
                $sheet->mergeCells("D2:D3");
                $sheet->mergeCells("{$lastColumn}2:{$lastColumn}3");

                // merge header skenario
                $colIndex = 5; // kolom E
                foreach ($this->skenarios as $s) {
                    $start = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($colIndex);
                    $end = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($colIndex + count($this->pertemuans) - 1);
                    $sheet->mergeCells("{$start}2:{$end}2");
                    $colIndex += count($this->pertemuans);
                }

                // border seluruh tabel
                $sheet->getStyle("A1:{$lastColumn}{$lastRow}")
                    ->getBorders()
                    ->getAllBorders()
                    ->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);

                // alignment kolom tertentu
                $sheet->getStyle("A4:A{$lastRow}")->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
                $sheet->getStyle("C4:D{$lastRow}")->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
                $sheet->getStyle("E4:{$lastColumn}{$lastRow}")->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

                // auto size
                foreach (range(1, $jumlahKolom) as $i) {
                    $column = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($i);
                    $sheet->getColumnDimension($column)->setAutoSize(true);
                }

                // warnai cell TH jadi merah
                for ($row = 4; $row <= $lastRow; $row++) {
                    for ($col = 5; $col <= $jumlahKolom - 1; $col++) { // kolom nilai saja, tanpa rerata
                        $columnLetter = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($col);
                        $cell = $columnLetter . $row;
                        $value = $sheet->getCell($cell)->getValue();

                        if ($value === 'TH') {
                            $sheet->getStyle($cell)->getFill()->setFillType(Fill::FILL_SOLID);
                            $sheet->getStyle($cell)->getFill()->getStartColor()->setARGB('FF0000');

                            $sheet->getStyle($cell)->getFont()->getColor()->setARGB('FFFFFF');
                            $sheet->getStyle($cell)->getFont()->setBold(true);
                        }
                    }
                }
            },
        ];
    }
}
