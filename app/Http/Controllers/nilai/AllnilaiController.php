<?php

namespace App\Http\Controllers\nilai;

use App\Http\Controllers\Controller;
use App\Models\Allnilai;
use App\Models\AlldetailNilai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpSpreadsheet\IOFactory;


class AllnilaiController extends Controller
{
    public function index(Request $request)
    {
      $search = $request->query('search');

        // Ambil 1 team pertama milik user (atau null)
        $team = Auth::user()?->teams()->first();

        // Ambil daftar user id dalam team tsb (Collection kosong jika null)
        $userIds = $team?->users()->pluck('users.id') ?? collect();

        $keg = Allnilai::query()
            ->when($search, function ($q, $s) {
                return $q->where('nama', 'like', "%{$s}%")->orWhere('blok', 'like', "%{$s}%");
            })
            ->when($userIds->isNotEmpty(), function ($q) use ($userIds) {
                return $q->whereIn('user_id', $userIds);
            })->orderBy('id', 'desc')
            ->paginate(10);

      return view('allnilai.list', compact('keg', 'search'));
    }
    public function show(string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }


    public function create_praktikum(){
        return view('allnilai.ipraktikum');
    }
    public function store_praktikum(Request $request)
    {
        $request->validate([
            'nama'           => ['required', 'string', 'max:255'],
            'jenis_nilai'    => ['required', 'string', 'max:255'],
            'blok'           => ['required', 'string', 'max:255'],
            'tahun_akademik' => ['required', 'string', 'max:255'],
            'file'           => ['required', 'file', 'mimes:xlsx,xls,csv', 'max:51200'],
        ]);

        DB::beginTransaction();

        try {
            $allnilai = Allnilai::create([
                'nama'           => $request->nama,
                'jenis_nilai'    => $request->jenis_nilai,
                'blok'           => $request->blok,
                'tahun_akademik' => $request->tahun_akademik,
                'input_by'       => Auth::user()->id,
                'lastupdated_by' => Auth::user()->id,
            ]);

            $file = $request->file('file');
            $spreadsheet = IOFactory::load($file->getRealPath());
            $sheet = $spreadsheet->getActiveSheet();
            $rows = $sheet->toArray(null, true, true, true);

            // Validasi header sederhana
            $header = $rows[1] ?? [];

            if (
                strtolower(trim($header['B'] ?? '')) !== 'nama' ||
                strtolower(trim($header['C'] ?? '')) !== 'npm'
            ) {
                DB::rollBack();

                return back()->with([
                    'msg' => 'danger-Format Excel tidak sesuai. Pastikan kolom B = Nama dan kolom C = NPM.'
                ])->withInput();
            }

            $insertData = [];

            foreach ($rows as $index => $row) {
                // Lewati header
                if ($index == 1) {
                    continue;
                }

                $namaMhs = trim($row['B'] ?? '');
                $npm     = trim($row['C'] ?? '');

                // Lewati baris kosong
                if ($namaMhs === '' && $npm === '') {
                    continue;
                }

                // Lewati jika nama atau npm kosong
                if ($namaMhs === '' || $npm === '') {
                    continue;
                }

                $insertData[] = [
                    'allnilai_id' => $allnilai->id,
                    'nama_mhs'    => $namaMhs,
                    'npm'         => $npm,
                    'pretest'     => $this->nullIfEmpty($row['D'] ?? null),
                    'posttest'    => $this->nullIfEmpty($row['E'] ?? null),
                    'laporan'     => $this->nullIfEmpty($row['F'] ?? null),
                    'ujian_prax'  => $this->nullIfEmpty($row['G'] ?? null),
                    'nilai_akhir' => $this->nullIfEmpty($row['H'] ?? null),
                    'input_by'       => Auth::user()->id,
                    'lastupdated_by' => Auth::user()->id,
                    'created_at'  => now(),
                    'updated_at'  => now(),
                ];
            }

            if (empty($insertData)) {
                DB::rollBack();

                return back()->with([
                    'msg' => 'warning-Tidak ada data mahasiswa yang bisa diimport.'
                ])->withInput();
            }

            AlldetailNilai::insert($insertData);

            DB::commit();

            return redirect()->back()->with([
                'msg' => 'success-Data nilai praktikum berhasil diupload.'
            ]);

        } catch (\Throwable $e) {
            DB::rollBack();

            return back()->with([
                'msg' => 'danger-Gagal upload nilai: ' . $e->getMessage()
            ])->withInput();
        }
    }

    private function nullIfEmpty($value)
    {
        if ($value === null || trim((string) $value) === '') {
            return null;
        }

        return $value;
    }




}
