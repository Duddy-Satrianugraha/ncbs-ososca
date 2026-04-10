<?php
if (!function_exists('generate_captcha')) {
    function generate_captcha()
    {
        $a = rand(1, 10);
        $b = rand(1, 10);
        $operator = rand(0, 1) ? '+' : '-';

        // Pastikan hasil pengurangan tidak negatif
        if ($operator === '-' && $a < $b) {
            [$a, $b] = [$b, $a]; // tukar posisi
        }

        $angka = [
            0 => 'nol',
            1 => 'satu',
            2 => 'dua',
            3 => 'tiga',
            4 => 'empat',
            5 => 'lima',
            6 => 'enam',
            7 => 'tujuh',
            8 => 'delapan',
            9 => 'sembilan',
            10 => 'sepuluh'
        ];

        $kataOperator = $operator === '+' ? 'ditambah' : 'dikurang';

        // Simpan jawaban di session
        $jawaban = $operator === '+' ? ($a + $b) : ($a - $b);
        session(['osce_captcha' => $jawaban]);

        return "Berapa hasil dari " . $angka[$a] . " $kataOperator " . $angka[$b] ." ?";
    }
}

if (!function_exists('verify_captcha')) {
    function verify_captcha($input)
    {
        return session('osce_captcha') == $input;
    }
}

if (!function_exists('tgl_indo')) {
    // Format tanggal indonesia pakai hari {{ tanggal_indo('2025-01-20', true) }}
    function tgl_indo($tanggal, $denganHari = false)
    {
        if (!$tanggal) {
            return ''; // aman jika null atau kosong
        }

        $namaHari = [
            'Sunday' => 'Minggu',
            'Monday' => 'Senin',
            'Tuesday' => 'Selasa',
            'Wednesday' => 'Rabu',
            'Thursday' => 'Kamis',
            'Friday' => 'Jumat',
            'Saturday' => 'Sabtu',
        ];

        $namaBulan = [
            1 => 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
            'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
        ];

        $timestamp = strtotime($tanggal);
        if (!$timestamp) {
            return ''; // aman jika format tanggal invalid
        }

        $hari = $namaHari[date('l', $timestamp)];
        $tgl = date('j', $timestamp);
        $bln = (int) date('n', $timestamp);
        $thn = date('Y', $timestamp);

        $hasil = "$tgl " . $namaBulan[$bln] . " $thn";
        return $denganHari ? "$hari, $hasil" : $hasil;
    }
    }

    if (!function_exists('tgl_indox')) {
    /**
     * Helper format tanggal Indonesia + opsi potongan.
     *
     * Contoh:
     * tgl_indo('2025-01-20')                  => "20 Januari 2025"
     * tgl_indo('2025-01-20', true)            => "Senin, 20 Januari 2025"
     * tgl_indo('2025-01-20', false, 'ho')     => "Senin"
     * tgl_indo('2025-01-20', false, 'bo')     => "Januari"
     * tgl_indo('2025-01-20', false, 'to')     => "2025"
     * tgl_indo('2025-01-20 14:35', false,'jo')=> "14:35"
     * tgl_indo('2025-01-20', false, 'tto')    => "20 Januari 2025"
     */
    function tgl_indox($tanggal, $denganHari = false, $opsi = null, $formatJam = 'H:i')
    {
        if (!$tanggal) return '';

        $namaHari = [
            'Sunday' => 'Minggu',
            'Monday' => 'Senin',
            'Tuesday' => 'Selasa',
            'Wednesday' => 'Rabu',
            'Thursday' => 'Kamis',
            'Friday' => 'Jumat',
            'Saturday' => 'Sabtu',
        ];

        $namaBulan = [
            1 => 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
            'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
        ];

        $timestamp = strtotime($tanggal);
        if (!$timestamp) return '';

        $hariEng = date('l', $timestamp);
        $hari = $namaHari[$hariEng] ?? '';
        $tgl  = date('j', $timestamp);
        $bln  = (int) date('n', $timestamp);
        $thn  = date('Y', $timestamp);
        $jam  = date($formatJam, $timestamp);

        $tanggalIndo = $tgl . ' ' . ($namaBulan[$bln] ?? '') . ' ' . $thn;

        // Normalisasi opsi
        $opsi = $opsi ? strtolower(trim($opsi)) : null;

        // Mode opsi khusus
        if ($opsi === 'ho') return $hari;                 // hari saja
        if ($opsi === 'bo') return $namaBulan[$bln] ?? ''; // bulan saja
        if ($opsi === 'to') return $thn;                  // tahun saja
        if ($opsi === 'jo') return $jam;                  // jam saja
        if ($opsi === 'tto') return $tanggalIndo;         // tanggal indo saja

        // Default behavior (seperti sebelumnya)
        return $denganHari ? "{$hari}, {$tanggalIndo}" : $tanggalIndo;
    }
}


    if (!function_exists('wrap_range')) {
        function wrap_range($start, $max) {
            $result = [];

            // Dari start ke max
            for ($i = $start; $i <= $max; $i++) {
                $result[] = $i;
            }

            // Dari 1 ke sebelum start
            for ($i = 1; $i < $start; $i++) {
                $result[] = $i;
            }

            return $result;
        }
    }

    if (!function_exists('utc_to_wib')) {
    function utc_to_wib($datetime, $format = 'Y-m-d H:i:s')
    {
        if (!$datetime) return null;

        try {
            // kalau dari Eloquent (Carbon)
            if ($datetime instanceof \Carbon\CarbonInterface) {
                // ambil string mentah TANPA timezone Laravel
                $datetime = $datetime->format('Y-m-d H:i:s');
            }

            // paksa dianggap UTC → convert ke WIB
            return \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $datetime, 'UTC')
                ->setTimezone('Asia/Jakarta')
                ->format($format);

        } catch (\Exception $e) {
            return null;
        }
    }
}
    if (!function_exists('jam_sesi')) {
    /**
     * Jika timestamp masuk ke rentang A (acuan), maka return rentang B (custom).
     *
     * Contoh mapping:
     * 08:00-10:00 (acuan) -> 08:00-09:40 (output)
     */
    function jam_sesi($datetime)
    {
        if (!$datetime) return '';

        $timestamp = strtotime($datetime);
        if (!$timestamp) return '';

        $menit = (int) date('H', $timestamp) * 60 + (int) date('i', $timestamp);

        // [acuan_mulai, acuan_selesai, output_mulai, output_selesai]
        $maps = [
            ['08:00', '10:00', '08:00', '09:40'],
            ['10:00', '12:00', '10:00', '11:40'], // <- contoh, silakan ubah
            ['13:00', '15:00', '13:00', '14:40'], // <- contoh, silakan ubah
            ['15:00', '17:00', '15:00', '16:40'], // <- contoh, silakan ubah
        ];

        foreach ($maps as [$aMulai, $aSelesai, $oMulai, $oSelesai]) {
            [$mh, $mm] = array_map('intval', explode(':', $aMulai));
            [$sh, $sm] = array_map('intval', explode(':', $aSelesai));

            $start = $mh * 60 + $mm;
            $end   = $sh * 60 + $sm;

            // interval kiri tertutup, kanan terbuka
            if ($menit >= $start && $menit < $end) {
                return str_replace(':', '.', $oMulai)
                    . ' - '
                    . str_replace(':', '.', $oSelesai);
            }
        }

        return 'Di luar sesi';
    }
}


    if (!function_exists('wrap_range_reverse')) {
        function wrap_range_reverse($start, $max) {
            $result = [];

            // Dari start turun ke 1
            for ($i = $start; $i >= 1; $i--) {
                $result[] = $i;
            }

            // Dari max turun ke start+1
            for ($i = $max; $i > $start; $i--) {
                $result[] = $i;
            }

            return $result;
        }
    }
if (!function_exists('numran')) {
     function numran(int $length = 10): string
            {
                $characters = '0123456789';
                $charactersLength = strlen($characters);
                $randomString = '';
                for ($i = 0; $i < $length; $i++) {
                    $randomString .= $characters[mt_rand(0, $charactersLength - 1)];
                }
                return $randomString;
            }
        }

if (!function_exists('salam')) {
        /**
         * Mengembalikan salam sesuai waktu sekarang atau waktu tertentu
         *
         * @param  \DateTime|string|null $time
         * @return string
         */
        function salam($time = null)
            {
                $time = $time ? \Carbon\Carbon::parse($time) : now();
                $hour = $time->format('H');

                if ($hour >= 5 && $hour < 11) {
                    return "Selamat Pagi";
                } elseif ($hour >= 11 && $hour < 15) {
                    return "Selamat Siang";
                } elseif ($hour >= 15 && $hour < 18) {
                    return "Selamat Sore";
                } else {
                    return "Selamat Malam";
                }
            }
        }

if (!function_exists('feedparser')){
            function feedparser($text){

            // Bikin default hasil kosong
            $result = [
                'kelebihan' => '',
                'kekurangan' => '',
                'saran' => '',
            ];

            // Normalize line breaks
            $text = str_replace(["\r\n", "\r"], "\n", $text);

            // Gunakan regex untuk ambil bagian-bagian
            preg_match('/Kelebihan\s*:\s*(.*?)\n(?=Kekurangan)/s', $text, $match1);
            preg_match('/Kekurangan\s*:\s*(.*?)\n(?=Masukan|Saran)/s', $text, $match2);
            preg_match('/(?:Masukan|Saran)\s*:\s*(.*)/s', $text, $match3);

            $result['kelebihan'] = trim($match1[1] ?? '');
            $result['kekurangan'] = trim($match2[1] ?? '');
            $result['saran'] = trim($match3[1] ?? '');

            return $result;
        }
        }


    if (!function_exists('normKel')) {
        function normKel($s) {
            $s = trim((string)$s);
            $s = preg_replace('/\s+/', ' ', $s); // rapikan spasi
            return strtoupper($s);              // samakan kapital
        };
    }

