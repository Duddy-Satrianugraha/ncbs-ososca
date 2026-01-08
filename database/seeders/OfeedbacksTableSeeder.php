<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class OfeedbacksTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('ofeedbacks')->delete();
        
        \DB::table('ofeedbacks')->insert(array (
            0 => 
            array (
                'id' => 1,
                'oujian_id' => 5,
                'station_id' => 41,
                'peserta_id' => 106,
                'qrpeserta' => 'f2424f9aee6478138ed80afe0823f1f5',
                'nama' => 'Abelia Destiyadi',
                'npm' => '122170001',
                'feedback' => 'Kelebihan :
Percaya diri dan terstruktur

Kekurangan :
-Soal 1: Tepat namun tidak lengkap
-Soal 2: Tepat dan lengkap

Masukan:
Belajar lagi',
                'is_sent' => 1,
                'created_at' => '2025-11-04 01:43:14',
                'updated_at' => '2025-11-04 05:20:09',
            ),
            1 => 
            array (
                'id' => 2,
                'oujian_id' => 5,
                'station_id' => 45,
                'peserta_id' => 148,
                'qrpeserta' => '4c5d015162312cb959272e8372127595',
                'nama' => 'Avghan Denzan Nanzira',
                'npm' => '122170023',
                'feedback' => 'Kelebihan :

Kekurangan :
1. menjawab tidak sesuai kasus secara detil
2. tidak sesuai tugas


Masukan:
belajar lagi',
                'is_sent' => 1,
                'created_at' => '2025-11-04 01:46:15',
                'updated_at' => '2025-11-04 05:20:09',
            ),
            2 => 
            array (
                'id' => 3,
                'oujian_id' => 5,
                'station_id' => 49,
                'peserta_id' => 191,
                'qrpeserta' => '5a3efc2c4727f424d0106ece3145787a',
                'nama' => 'Al Jihan Nur Assyfa',
                'npm' => '123170008',
                'feedback' => 'Kelebihan : Cukup jelas dalam menjelaskan patomekanisme dan faktor risiko

Kekurangan : kurang lengkap dalam menjelaskan dosis dan jenis obat

Masukan: pertahankan konsistensi penjelasan patomekanisme, belajar lagi mengenai dosis obat',
                'is_sent' => 1,
                'created_at' => '2025-11-04 01:47:07',
                'updated_at' => '2025-11-04 05:20:09',
            ),
            3 => 
            array (
                'id' => 4,
                'oujian_id' => 5,
                'station_id' => 46,
                'peserta_id' => 159,
                'qrpeserta' => '2e09d1fc81638785911da12d7cee8a3e',
                'nama' => 'Shafira Rizkita Nabila',
                'npm' => '122170164',
                'feedback' => 'Kelebihan :


Kekurangan :
patfis tidak lengkap
mekanisme obat tidak lengkap

Masukan: belajar lagi',
                'is_sent' => 1,
                'created_at' => '2025-11-04 01:47:08',
                'updated_at' => '2025-11-04 05:20:09',
            ),
            4 => 
            array (
                'id' => 5,
                'oujian_id' => 5,
                'station_id' => 36,
                'peserta_id' => 55,
                'qrpeserta' => '991f39f2737335294e6cc452d9965c19',
                'nama' => 'Muhammad Alma Syakri Faiz Sabirin',
                'npm' => '122170116',
                'feedback' => 'Kelebihan :
- mekanisme obat cukup baik
Kekurangan :
- faktor risiko sesuai kasus (tidak hanya konsumsi lemak) belum dikaitkan ke patomekanisme
- dosis dan pemberian obat salah
Masukan:',
                'is_sent' => 1,
                'created_at' => '2025-11-04 01:47:16',
                'updated_at' => '2025-11-04 05:20:09',
            ),
            5 => 
            array (
                'id' => 6,
                'oujian_id' => 5,
                'station_id' => 43,
                'peserta_id' => 127,
                'qrpeserta' => '88da1a44ebcc158417232782ef140178',
                'nama' => 'Nazib Mohamad Yassir',
                'npm' => '120170142',
                'feedback' => 'Kelebihan :

Kekurangan :
patomekanisme masih kurang lengkap
mekanisme kerja otugas kedua masih belum lengkap

Masukan:
banyak belajar lagi dan baca lagi ya.. semangat terus',
                'is_sent' => 1,
                'created_at' => '2025-11-04 01:47:17',
                'updated_at' => '2025-11-04 05:20:09',
            ),
            6 => 
            array (
                'id' => 7,
                'oujian_id' => 5,
                'station_id' => 38,
                'peserta_id' => 75,
                'qrpeserta' => '35cae6712ca10d1af244407fb776c7f3',
                'nama' => 'Fahrudin Qurbani',
                'npm' => '122170055',
                'feedback' => 'Kelebihan: Manajemen Waktu baik

Kekurangan:
⦁	Tugas 1: dapat menjawab dengan tepat namun tidak lengkap, faktor risiko tidak muncul semua (yang Utama tidak muncul), terkait detail mekanisme belum muncul point-point pentingnya.
⦁	Tugas 2: dapat menjawab dengan tepat namun kurang lengkap terkait mekanisme obat.

Masukan:
⦁	Belajar lagi terkait patomekanisme dan farmakologi yang lebih detail dan terkait kasus.
⦁	Lebih teliti dalam menganalisis kasus.',
                'is_sent' => 1,
                'created_at' => '2025-11-04 01:47:21',
                'updated_at' => '2025-11-04 05:20:09',
            ),
            7 => 
            array (
                'id' => 8,
                'oujian_id' => 5,
                'station_id' => 40,
                'peserta_id' => 96,
                'qrpeserta' => '7537b3b49dca02c71a3be6aedd020e2d',
                'nama' => 'Ainun Azkiya Fitriati',
                'npm' => '122170008',
                'feedback' => 'Kelebihan :
menuliskan mind map di papan tulis untul menjelaskan 
bisa menilai faktor risiko dari data anamnesis, PF dan pemeriksaan penunjang
Kekurangan :
bingung menjelaskan patomekanisme
patomekanisme dijelaskan dengan tidak tepat
terapi menyebutkan atorvastatin saja dan dosis kurang tepat
Masukan:
belajar lagi',
                'is_sent' => 1,
                'created_at' => '2025-11-04 01:47:25',
                'updated_at' => '2025-11-04 05:20:09',
            ),
            8 => 
            array (
                'id' => 9,
                'oujian_id' => 5,
                'station_id' => 34,
                'peserta_id' => 33,
                'qrpeserta' => 'c2044ec88f198aeedba08bfd6bd47627',
                'nama' => 'Syifa Siti Nurjanah',
                'npm' => '122170174',
                'feedback' => 'Kelebihan : Tatalaksana dan mekanisme kerja obat sudah baik

Kekurangan : Tugas satu penjelasan patomekanisme dikaitkan dengan risiko pada pasien belum tepat dan tidak sistematis lihat lagi dari pF atau antropometrinya serta Pemeriksaan penunjang (profile lipid) FR utamanya apa pada pasien tersebut?

Masukan: Baca soal lebih lengkap dan detail ya',
                'is_sent' => 1,
                'created_at' => '2025-11-04 01:47:27',
                'updated_at' => '2025-11-04 05:20:09',
            ),
            9 => 
            array (
                'id' => 10,
                'oujian_id' => 5,
                'station_id' => 39,
                'peserta_id' => 85,
                'qrpeserta' => '2a258f583cd11601b21ffcc07ea5a7c9',
                'nama' => 'Dwi Ayu Wulandari',
                'npm' => '121170037',
                'feedback' => 'Kelebihan:
sudah menjawab FR dan Patomekanisme


Kekurangan:
belum menjawab secara lengkap FR dan patomekanisme
tidak mampu menyebutkan obat dan mekanisme kerjanya

Saran:
pelajari dan perbaiki yang masih kurang',
                'is_sent' => 1,
                'created_at' => '2025-11-04 01:47:31',
                'updated_at' => '2025-11-04 05:20:09',
            ),
            10 => 
            array (
                'id' => 11,
                'oujian_id' => 5,
                'station_id' => 48,
                'peserta_id' => 180,
                'qrpeserta' => 'd93ad986f9833a66f540b04ba8211f4f',
                'nama' => 'Muhammad Dhimas Sahputra',
                'npm' => '122170118',
                'feedback' => 'Kelebihan :

Kekurangan :
penjelasan kurang terarah dan tidak spesifik, 
faktor resiko tidak sesuai kasus skenario
pasiennya teh diagnosisnya teh apa coba? kalo udah jelas, baru kamu jelasin satu per satu sampai manifestasi muncul...sampai mucul diagnosis
cara kerja obatnya jangan ngarang ah

Masukan:
baca baik-baik tugasnya.',
                'is_sent' => 1,
                'created_at' => '2025-11-04 01:47:47',
                'updated_at' => '2025-11-04 05:20:09',
            ),
            11 => 
            array (
                'id' => 12,
                'oujian_id' => 5,
                'station_id' => 35,
                'peserta_id' => 45,
                'qrpeserta' => 'dbf0ddb8dfb3f013fc1649fba976cee3',
                'nama' => 'Adella Putri Mirela',
                'npm' => '123170001',
                'feedback' => 'Kelebihan :
penjelasan mengenai patomekanisme sudah cukup lengkap 

Kekurangan :
mekanisme kerja obat masih kurang lengkap 

Masukan:',
                'is_sent' => 1,
                'created_at' => '2025-11-04 01:47:51',
                'updated_at' => '2025-11-04 05:20:09',
            ),
            12 => 
            array (
                'id' => 13,
                'oujian_id' => 5,
                'station_id' => 37,
                'peserta_id' => 65,
                'qrpeserta' => 'c07b1ed6a19d1d22fb39a6ce4f84b1ba',
                'nama' => 'Andi Mirelle Besse Amirah',
                'npm' => '122170017',
                'feedback' => 'Kelebihan : paham mengenai kasus nya 

Kekurangan : mekanisme dilengkapi lagi ya, tatalaksana nya disesuaikan dengan kasus 

Masukan: Belajar yang rajin ya',
                'is_sent' => 1,
                'created_at' => '2025-11-04 01:48:05',
                'updated_at' => '2025-11-04 05:20:09',
            ),
            13 => 
            array (
                'id' => 14,
                'oujian_id' => 5,
                'station_id' => 47,
                'peserta_id' => 169,
                'qrpeserta' => 'cc3d37f15b639764fd5052538cc069fb',
                'nama' => 'Gastricia Syahla Supriyadi',
                'npm' => '122170066',
                'feedback' => 'Kelebihan :
-

Kekurangan :
- Mahasiswa tidak mampu menjelaskan scr sistematis patomekanisme diagnosis kerja dari faktor resiko
- Patomekanisme --> Nyeri kepala karena dislipidemia krn aterosklerosis; oksigen kurang shg penumpukan asam laktat; plak aliran darah menyebabkan penyakit jantung (??)
- Faktor resiko: sering makan berlemak
- Tidak menjawab Tatalaksana farmakologi dengan tepat dan mekanisme kerja obat

Masukan:
- Pelajari dgn baik untuk soal dan bagaimana mengkaitkan patomekanisme penyakit dengan faktor resiko yang ada',
                'is_sent' => 1,
                'created_at' => '2025-11-04 01:48:16',
                'updated_at' => '2025-11-04 05:20:09',
            ),
            14 => 
            array (
                'id' => 15,
                'oujian_id' => 5,
                'station_id' => 42,
                'peserta_id' => 116,
                'qrpeserta' => 'f9da9a1582752a709eb19ea04c85a165',
                'nama' => 'Alfina',
                'npm' => '120170011',
                'feedback' => 'Kelebihan :

Kekurangan :
patomekanisme dihubungkan dengan faktor risiko kurang tepat
tatalaksana: Jenis obat yang dipilih kurang sesuai dengan kasus
Mekanisme kerja obat: belum dapat ,menjelaskan


Masukan:',
                'is_sent' => 1,
                'created_at' => '2025-11-04 01:48:40',
                'updated_at' => '2025-11-04 05:20:09',
            ),
            15 => 
            array (
                'id' => 16,
                'oujian_id' => 5,
                'station_id' => 45,
                'peserta_id' => 149,
                'qrpeserta' => '9e7027536815ae64bf390c5395cdc433',
                'nama' => 'Faiq Ihsanudin Habibie',
                'npm' => '121170048',
                'feedback' => 'Kelebihan :

Kekurangan :
1. tidak dapat menyebutkan diagnosis secara tepat, dasar diagnosis tidak disebutkan
2. tidak dapat menjawab patof sesuai kasus

Masukan:',
                'is_sent' => 1,
                'created_at' => '2025-11-04 02:00:35',
                'updated_at' => '2025-11-04 05:20:09',
            ),
            16 => 
            array (
                'id' => 17,
                'oujian_id' => 5,
                'station_id' => 49,
                'peserta_id' => 192,
                'qrpeserta' => 'b001da58c92429a6f7efc336356f1c1c',
                'nama' => 'Alawi Muhammad Al-anshori',
                'npm' => '123170010',
                'feedback' => 'Kelebihan : cukup jelas menjelaskan dasar diagnosis dan diagnosis kerja, patomekanisme lengkap

Kekurangan : dasar diagnosis sedikit tidak lengkap, 

Masukan: Baca lagi mengenai dasar diagnosis Pemeriksaan penunjang,',
                'is_sent' => 1,
                'created_at' => '2025-11-04 02:02:44',
                'updated_at' => '2025-11-04 05:20:09',
            ),
            17 => 
            array (
                'id' => 18,
                'oujian_id' => 5,
                'station_id' => 46,
                'peserta_id' => 160,
                'qrpeserta' => '6b40c553cfab1dd3eb4cfa1925366f20',
                'nama' => 'Dwi Vita Aulia',
                'npm' => '123170036',
                'feedback' => 'Kelebihan :

Kekurangan :
dx tidak tepat

Masukan: belajar lagi dan perhatikan kasusnya',
                'is_sent' => 1,
                'created_at' => '2025-11-04 02:02:47',
                'updated_at' => '2025-11-04 05:20:09',
            ),
            18 => 
            array (
                'id' => 19,
                'oujian_id' => 5,
                'station_id' => 48,
                'peserta_id' => 181,
                'qrpeserta' => '62cf6e4e1da4e37764f71a0cefd69a13',
                'nama' => 'Ahmad Alif Faturrohman',
                'npm' => '123170004',
                'feedback' => 'Kelebihan :

Kekurangan :
Tugas 1:
diagnosis tidak lengkap
dasar diagnosis tidak lengkap, dr mana hipokrom?

Tugas 2:
penyebab bisa terjadi manifestasi itu apa si?? kl udah tau baru jelaskan ya.
penjelasan tidak tepat dan tidak lengkap. mau jelasin bagian yg mana? jangan lompat2 ya penjelasannya. 

Masukan:
Belajar lagi ya!',
                'is_sent' => 1,
                'created_at' => '2025-11-04 02:02:48',
                'updated_at' => '2025-11-04 05:20:09',
            ),
            19 => 
            array (
                'id' => 20,
                'oujian_id' => 5,
                'station_id' => 47,
                'peserta_id' => 170,
                'qrpeserta' => '5a479744aaca19af29182fabfda58a18',
                'nama' => 'Ardi Fajryandi',
                'npm' => '123170022',
                'feedback' => 'Kelebihan :
- Mahasiswa mampu menentukan diagnosis kerja
- Mahasiswa mampu menentukan dasar diagnosis yang tepat dan lengkap meliputi anamnesis, PF dan PP
- Penentuan etiologi
- Manifestasi klinis diagnosis kerja

Kekurangan :
- Penentuan interpretasi dari apusan darah tepi masih kurang tepat
- Penentuan patomekanisme tidak lengkap

Masukan:
- Interpretasi pem penunjang
- Pelajari kembali patomekanisme yang lengkap terutama dalam poin memicu aktivasi sistem imun berlebih',
                'is_sent' => 1,
                'created_at' => '2025-11-04 02:02:48',
                'updated_at' => '2025-11-04 05:20:09',
            ),
            20 => 
            array (
                'id' => 21,
                'oujian_id' => 5,
                'station_id' => 36,
                'peserta_id' => 56,
                'qrpeserta' => 'd837ec109bee7dadfb748cf5313aa607',
                'nama' => 'Lugina Maeranti Utami',
                'npm' => '123170081',
                'feedback' => 'Kelebihan :

Kekurangan :
- diagnosis tidak tepat sehingga patomekanisme ikut tidak tepat
- soal 1 yg ditanya penegakan diagnosis ( dasar diagnosis) bukan mekanisme keluhannya
Masukan:
- pahami kasus dan intruksi kasus',
                'is_sent' => 1,
                'created_at' => '2025-11-04 02:02:49',
                'updated_at' => '2025-11-04 05:20:09',
            ),
            21 => 
            array (
                'id' => 22,
                'oujian_id' => 5,
                'station_id' => 34,
                'peserta_id' => 34,
                'qrpeserta' => '651369b1f2c0c3f352dc119ac325df5c',
                'nama' => 'Bintang Pamungkas',
                'npm' => '122170032',
                'feedback' => 'Kelebihan :

Kekurangan : Diagnosis tidak tepat, dengan dasar diagnosis tidak relevan dengan diagnosis kerja yang dijawab, hail pmerisaan fisik tidak tepat dan tidak lengkap utuk mendukung iagnsis yang dijawab. Interpretasi dari PP tidak tepat, tidak lengkap. penjelasan patfis nya juga tidak tepat karena diagnosis yang jawab salah. (sudah revisi diagnosis jg blm tepat)

Masukan: Baca baik2 kasus, belajar lagi ya....
kalau ada demam ya brrti ada infeksi dong...nah, kaitkan semua hasil yang tercantum dalam skenario dengan hal tersebut (demam)',
                'is_sent' => 1,
                'created_at' => '2025-11-04 02:03:04',
                'updated_at' => '2025-11-04 05:20:09',
            ),
            22 => 
            array (
                'id' => 23,
                'oujian_id' => 5,
                'station_id' => 38,
                'peserta_id' => 76,
                'qrpeserta' => '30098aea026ffc8dbfe1d85f1a7e13e5',
                'nama' => '\'amru Syauqi',
                'npm' => '123170017',
                'feedback' => 'Kelebihan: 
⦁	Manajemen Waktu baik
⦁	Tugas 1: dapat menjawab dengan tepat dan lengkap

Kekurangan:
⦁	Tugas 2: dapat menjawab dengan tepat namun sedikit kurang lengkap terkait jalur mekanisme manifestasi klinis dan hasil lab. 

Masukan:
⦁	Belajar lagi terkait patomekanisme yang lebih detail.
⦁	Lebih teliti dalam menganalisis kasus.',
                'is_sent' => 1,
                'created_at' => '2025-11-04 02:03:05',
                'updated_at' => '2025-11-04 05:20:09',
            ),
            23 => 
            array (
                'id' => 24,
                'oujian_id' => 5,
                'station_id' => 40,
                'peserta_id' => 97,
                'qrpeserta' => '8da7d0929aa541fcfc0c13eef8c52313',
                'nama' => 'Eva Meutia',
                'npm' => '123170041',
                'feedback' => 'Kelebihan :
-
Kekurangan :
diagnosis kurang tepat, anemia penyakit kronis. Jenis anemianya yang mana?
sempat blocking saat ujian
tidak menyebutkan dasar diagnosis secara lengkap
patomekanisme yang dijelaskan kurang lengkap
manifestasi klinis yang dijelaskan juga kurang lengkap
Masukan:
belajar lagi ya,,',
                'is_sent' => 1,
                'created_at' => '2025-11-04 02:03:09',
                'updated_at' => '2025-11-04 05:20:09',
            ),
            24 => 
            array (
                'id' => 25,
                'oujian_id' => 5,
                'station_id' => 42,
                'peserta_id' => 117,
                'qrpeserta' => 'b0c75b5c464017021540fc889492f42b',
                'nama' => 'Alik Dwi Rencani',
                'npm' => '123170012',
                'feedback' => 'Kelebihan :

Kekurangan :
Diagnosis kerja belum tepat
Patomekanisme tidak sesuai dengan kasus

Masukan:',
                'is_sent' => 1,
                'created_at' => '2025-11-04 02:03:11',
                'updated_at' => '2025-11-04 05:20:09',
            ),
            25 => 
            array (
                'id' => 26,
                'oujian_id' => 5,
                'station_id' => 39,
                'peserta_id' => 86,
                'qrpeserta' => 'c7fdbc1022ee1badc998cf6a2ee626e5',
                'nama' => 'Dendy Andrian Firdaus',
                'npm' => '123170031',
                'feedback' => 'Kelebihan:
sudah menjawab dx tepat dan lengkap, dengan dasar anamnesis, pf, dan pp lengkap
mampu menjelaskan cara menyingirkan dd
sudah menjawab patomekanisme tepat dan lengkap bahkan dapatkan memaparkan aspek molekuler, dan dilengkapi dengan etiologi dan manifestasi klinis

Kekurangan:
belum menjawab secara lengkap FR dan patomekanisme


Saran:
Good job! pertahankan persiapan ujian dengan belajar mandiri yang baik 
pelajari dan perbaiki yang masih kurang',
                'is_sent' => 1,
                'created_at' => '2025-11-04 02:03:11',
                'updated_at' => '2025-11-04 05:20:09',
            ),
            26 => 
            array (
                'id' => 27,
                'oujian_id' => 5,
                'station_id' => 41,
                'peserta_id' => 107,
                'qrpeserta' => 'df062475c6ac0e94b21fbb4c04ad60e1',
                'nama' => 'Torik Dzulkifli Mahpudin',
                'npm' => '122170180',
                'feedback' => 'Kelebihan :
Percaya diri dan terstruktur

Kekurangan :
-Soal 1: Tidak tepat
-Soal 2: Tidak tepat

Masukan:
Belajar lagi',
                'is_sent' => 1,
                'created_at' => '2025-11-04 02:03:14',
                'updated_at' => '2025-11-04 05:20:09',
            ),
            27 => 
            array (
                'id' => 28,
                'oujian_id' => 5,
                'station_id' => 43,
                'peserta_id' => 128,
                'qrpeserta' => '869b781d0f97352a1407ceed7ac7087a',
                'nama' => 'Alzena Salma Harmani',
                'npm' => '123170016',
                'feedback' => 'Kelebihan :

Kekurangan :
penentuan tugas 1 dan patomekanisme masih belum  lengkap

Masukan:
banyak belajar lagi ya.. baca dan semangat selalu',
                'is_sent' => 1,
                'created_at' => '2025-11-04 02:03:32',
                'updated_at' => '2025-11-04 05:20:09',
            ),
            28 => 
            array (
                'id' => 29,
                'oujian_id' => 5,
                'station_id' => 35,
                'peserta_id' => 46,
                'qrpeserta' => 'e1cdb216a0bfd191925992381fe803f2',
                'nama' => 'Aghi Ghifari Pratama',
                'npm' => '123170003',
                'feedback' => 'Kelebihan :
penegakan diagn osis  dan patomekanisme tidak lengkap 
Kekurangan :

Masukan:',
                'is_sent' => 1,
                'created_at' => '2025-11-04 02:03:36',
                'updated_at' => '2025-11-04 05:20:09',
            ),
            29 => 
            array (
                'id' => 30,
                'oujian_id' => 5,
                'station_id' => 37,
                'peserta_id' => 66,
                'qrpeserta' => '40c940cda0afb528657553f68565c952',
                'nama' => 'Alex Febrian Seninha',
                'npm' => '123170011',
                'feedback' => 'Kelebihan : paham mengenai kasus 

Kekurangan : Mekanisme disesuaikan dengan diagnosis 

Masukan:
Belajar yang rajin ya',
                'is_sent' => 1,
                'created_at' => '2025-11-04 02:03:49',
                'updated_at' => '2025-11-04 05:20:09',
            ),
            30 => 
            array (
                'id' => 31,
                'oujian_id' => 5,
                'station_id' => 36,
                'peserta_id' => 57,
                'qrpeserta' => 'cc08bc38abdb155ef03639a697b9aeac',
                'nama' => 'M. Hibban Raiisa Abdurrosyiid Ardifansyah',
                'npm' => '123170083',
                'feedback' => 'Kelebihan :

Kekurangan :
- diagnosis tidak lengkap
- patomekanisme kurang lengkap
Masukan:',
                'is_sent' => 1,
                'created_at' => '2025-11-04 02:14:22',
                'updated_at' => '2025-11-04 05:20:09',
            ),
            31 => 
            array (
                'id' => 32,
                'oujian_id' => 5,
                'station_id' => 45,
                'peserta_id' => 150,
                'qrpeserta' => 'd2ca8e1645737a9242c2f671581a540a',
                'nama' => 'Christy Lintang Destiara',
                'npm' => '123170028',
                'feedback' => 'Kelebihan :
cukup baik, lengkap

Kekurangan :
patof ada sedikit terlewat

Masukan:
hebattt',
                'is_sent' => 1,
                'created_at' => '2025-11-04 02:15:34',
                'updated_at' => '2025-11-04 05:20:09',
            ),
            32 => 
            array (
                'id' => 33,
                'oujian_id' => 5,
                'station_id' => 48,
                'peserta_id' => 182,
                'qrpeserta' => 'c5d404829aa85749e092339b4e34f24c',
                'nama' => 'Aila Zahra Putri Saefuloh',
                'npm' => '123170006',
                'feedback' => 'Kelebihan :
Tugas 1:
cukup baik, namun yg nirmal2 ga usah di sebutin semua, yg khas ditemukan di kasus saja,

Tugas 2:
cukup baik


Kekurangan :
Tugas 1:
-
Tugas 2:
-
Masukan:
Belajar lagi!',
                'is_sent' => 1,
                'created_at' => '2025-11-04 02:17:13',
                'updated_at' => '2025-11-04 05:20:09',
            ),
            33 => 
            array (
                'id' => 34,
                'oujian_id' => 5,
                'station_id' => 46,
                'peserta_id' => 161,
                'qrpeserta' => '1f695992978694d732c7d30b9457fd68',
                'nama' => 'Eris Widia Kersa',
                'npm' => '123170038',
                'feedback' => 'Kelebihan :
sudah berusaha menghubungkan paftis tapi dx belum lengkap

Kekurangan :
dx tidak lengkap

Masukan:
belajar lagi, lebih teliti lagi',
                'is_sent' => 1,
                'created_at' => '2025-11-04 02:18:23',
                'updated_at' => '2025-11-04 05:20:09',
            ),
            34 => 
            array (
                'id' => 35,
                'oujian_id' => 5,
                'station_id' => 49,
                'peserta_id' => 193,
                'qrpeserta' => 'cc5cefd1f76bb8426e62765d5de5ee01',
                'nama' => 'Fakhri Fawwaz Syabani',
                'npm' => '123170046',
                'feedback' => 'Kelebihan : cukup menyentuh diagnosis kerja, dasar diagnosis agak lengkap. Patomekanisme cukup lengkap

Kekurangan : diagnosis kerja tidak lengkap

Masukan: baca lagi mengenai dasar diagnosis dan diagnosis kerja detail kasus tersebut secara rinci',
                'is_sent' => 1,
                'created_at' => '2025-11-04 02:18:24',
                'updated_at' => '2025-11-04 05:20:09',
            ),
            35 => 
            array (
                'id' => 36,
                'oujian_id' => 5,
                'station_id' => 35,
                'peserta_id' => 47,
                'qrpeserta' => '01cd52b3ddbcadfb8e8a72168e730a1d',
                'nama' => 'Choirunnisa Bella Alifiyanti',
                'npm' => '123170027',
                'feedback' => 'Kelebihan :

Kekurangan :
diagnosa tidak lengkap 
patomeknisme tidak tepat. 

Masukan:
belajar lagi, jangan asal menjelaskan ya',
                'is_sent' => 1,
                'created_at' => '2025-11-04 02:18:25',
                'updated_at' => '2025-11-04 05:20:09',
            ),
            36 => 
            array (
                'id' => 37,
                'oujian_id' => 5,
                'station_id' => 34,
                'peserta_id' => 35,
                'qrpeserta' => '8cef02c8aa47382b4e97efb535968952',
                'nama' => 'Akbar Wicaksono',
                'npm' => '123170007',
                'feedback' => 'Kelebihan : Diagnosis kerja sudah tepat dengan dasar diagnosis yang lengkap

Kekurangan : Patomekanisme sudah baik dijelaskan tetapi mutase gen (Alel Alpha) nya yang tidak tepat sesuai dengan diagnosis kerjanya.

Masukan:langsung saja ke diagnosis kerjanya dan interpretasi hasil PP nya jangan menjelaskan lagi masing2 kriteria nilai (MCV), jangan menjawab tentang step menentukan diagnosis...(apakah ada ini, itu dll)',
                'is_sent' => 1,
                'created_at' => '2025-11-04 02:18:26',
                'updated_at' => '2025-11-04 05:20:09',
            ),
            37 => 
            array (
                'id' => 38,
                'oujian_id' => 5,
                'station_id' => 40,
                'peserta_id' => 98,
                'qrpeserta' => '8714689a554000380940873b91e0ba55',
                'nama' => 'Fadhil Zuleika',
                'npm' => '123170043',
                'feedback' => 'Kelebihan :
menuliskan hal-hal penting di white board agar mudah menjelaskan
diagnosis disebutkan dengan tepat
Kekurangan :
dasar pemeriksaan penunjang kurang lengkap disebutkan
patomekanisme yang dijelaskan kurang lengkap
Masukan:
belajar lagi yaaa..',
                'is_sent' => 1,
                'created_at' => '2025-11-04 02:18:26',
                'updated_at' => '2025-11-04 05:20:09',
            ),
            38 => 
            array (
                'id' => 39,
                'oujian_id' => 5,
                'station_id' => 37,
                'peserta_id' => 67,
                'qrpeserta' => '9469a0abcd7cf150bf5f27e86dd4b6f2',
                'nama' => 'Almanda Regina',
                'npm' => '123170015',
                'feedback' => 'Kelebihan :

Kekurangan :
Mekanisme disesuaikan dengan diagnosis 

Masukan:
Belajar yang rajin ya',
                'is_sent' => 1,
                'created_at' => '2025-11-04 02:18:29',
                'updated_at' => '2025-11-04 05:20:09',
            ),
            39 => 
            array (
                'id' => 40,
                'oujian_id' => 5,
                'station_id' => 41,
                'peserta_id' => 108,
                'qrpeserta' => '12dbf138368af8c550ab9ae25cbd8b2f',
                'nama' => 'Hana Aulyazahra Putri Anggini',
                'npm' => '123170063',
                'feedback' => 'Kelebihan :
Percaya diri dan terstruktur

Kekurangan :
-Soal 1: Tepat namun tidak lengkap
-Soal 2: Tepat namun sedikit belum lengkap

Masukan:
Belajar lagi',
                'is_sent' => 1,
                'created_at' => '2025-11-04 02:18:32',
                'updated_at' => '2025-11-04 05:20:09',
            ),
            40 => 
            array (
                'id' => 41,
                'oujian_id' => 5,
                'station_id' => 43,
                'peserta_id' => 129,
                'qrpeserta' => '66ac1e73ae398b7e53d4c5860c17e8ce',
                'nama' => 'Angel Prisila',
                'npm' => '123170018',
                'feedback' => 'Kelebihan :

Kekurangan :
penentuan tugas 1 dan tugas 2 masih belum tepat dan lengkap.

Masukan:
banyak belajar lagi ya.. baca dan semangat selalu',
                'is_sent' => 1,
                'created_at' => '2025-11-04 02:18:37',
                'updated_at' => '2025-11-04 05:20:09',
            ),
            41 => 
            array (
                'id' => 42,
                'oujian_id' => 5,
                'station_id' => 47,
                'peserta_id' => 171,
                'qrpeserta' => 'dc5a3b00f932a343d3743ffe6decd9f3',
                'nama' => 'Brilian Atalia Ardiningrum',
                'npm' => '123170026',
                'feedback' => 'Kelebihan :
- menentukan diagnosis kerja disertai dengan dasar diagnosis Thalasemia B mayor
- penentuan dasar diagnosis: anamnesis dan pem fisik

Kekurangan :
- Penentuan dasar diagnosis tidak lengkap
- Tidak menginterpretasi pem penunjang dengan lengkap: seperti Anemia hipokrom mikrositer, SADT : Target cell (+), HbF dominan : β-thalasemmia mayor
- Etiologi tidak sesuai
- Patomekanisme tidak sesuai: oksigen menurun shg sirkulasi menurun (?); hepatosplenomegali penumpukan bilirubin menjadi sklera ikterik (?)

Masukan:
- Pelajari kembali dalam interpretasi hasil penunjang
- Patomekanisme thalassemia dipelajari kembali',
                'is_sent' => 1,
                'created_at' => '2025-11-04 02:18:46',
                'updated_at' => '2025-11-04 05:20:09',
            ),
            42 => 
            array (
                'id' => 43,
                'oujian_id' => 5,
                'station_id' => 39,
                'peserta_id' => 87,
                'qrpeserta' => '849e43443844897dbf3032af23cf8dbf',
                'nama' => 'Erlangga Dwi Febrian',
                'npm' => '123170039',
                'feedback' => 'Kelebihan:
sudah menjawab dx 
sudah mencoba menjawab patomekanisme secara umum
sudah mencoba menyingkirkan dd

Kekurangan:
menyebutkan seluruh anamnesis pf, pp dalam skenario sehingga dapat menyita Waktu, dan tidak ditegaskan mana temuan interpretasi yang terkait dengan  diagnosis
dx yang disebutkan kurang lengkap
interpretasi lab darah saat menjelaskan patomekanisme ada yang keliru
tidak memahami &tdk menjelaskan patomekanisme diagnosis spesifik',
                'is_sent' => 1,
                'created_at' => '2025-11-04 02:18:51',
                'updated_at' => '2025-11-04 05:20:09',
            ),
            43 => 
            array (
                'id' => 44,
                'oujian_id' => 5,
                'station_id' => 42,
                'peserta_id' => 118,
                'qrpeserta' => '3c89e2543d020d58eaa03da0afdccbe6',
                'nama' => 'Alisya Frisca Fadhilah',
                'npm' => '123170014',
                'feedback' => 'Kelebihan :

Kekurangan :
Diagnosis kerja belum tepat
Patomekanisme tidak sesuai dengan kasus



Masukan:
Jika melakukan presentasi, menghadap ke audiens, bukan menghadap whiteboard',
                'is_sent' => 1,
                'created_at' => '2025-11-04 02:19:11',
                'updated_at' => '2025-11-04 05:20:09',
            ),
            44 => 
            array (
                'id' => 45,
                'oujian_id' => 5,
                'station_id' => 38,
                'peserta_id' => 77,
                'qrpeserta' => 'b8ebdf35adc9585f5f316d36e418708c',
                'nama' => 'Angelica Yuliani Agian',
                'npm' => '123170019',
                'feedback' => 'Kelebihan: 
⦁	Manajemen Waktu baik
⦁	Tugas 1: dapat menjawab dengan tepat dan lengkap

Kekurangan:
⦁	Tugas 2: dapat menjawab dengan tepat namun tidak lengkap terkait mekanisme manifestasi klinis yang muncul pada kasus. 

Masukan:
⦁	Belajar lagi terkait patomekanisme yang lebih detail.
⦁	Lebih teliti dan hati-hati dalam menganalisis kasus.',
                'is_sent' => 1,
                'created_at' => '2025-11-04 02:19:12',
                'updated_at' => '2025-11-04 05:20:09',
            ),
            45 => 
            array (
                'id' => 46,
                'oujian_id' => 5,
                'station_id' => 41,
                'peserta_id' => 109,
                'qrpeserta' => '36026fefcd604af6fe6bbc7015a17536',
                'nama' => 'Muh. Ihza Azhari Attamy',
                'npm' => '123170093',
                'feedback' => 'Kelebihan :
Percaya diri dan terstruktur

Kekurangan :
-Soal 1: Tepat dan lengkap
-Soal 2: Tepat dan lengkap

Masukan:
tetap belajar',
                'is_sent' => 1,
                'created_at' => '2025-11-04 02:31:22',
                'updated_at' => '2025-11-04 05:20:09',
            ),
            46 => 
            array (
                'id' => 47,
                'oujian_id' => 5,
                'station_id' => 45,
                'peserta_id' => 151,
                'qrpeserta' => 'f929208926210e10714ff7e06e2ba3ce',
                'nama' => 'Dimas Syehwanul Arifin',
                'npm' => '123170034',
                'feedback' => 'Kelebihan :

Kekurangan :
kurang detil tapi sudah baik

Masukan:
fokus lagi melihat kasus',
                'is_sent' => 1,
                'created_at' => '2025-11-04 02:33:36',
                'updated_at' => '2025-11-04 05:20:09',
            ),
            47 => 
            array (
                'id' => 48,
                'oujian_id' => 5,
                'station_id' => 49,
                'peserta_id' => 194,
                'qrpeserta' => '0faa3203e8701b8b1fb2ef6f32cced46',
                'nama' => 'Faraditha Putri Salsabila',
                'npm' => '123170048',
                'feedback' => 'Kelebihan : Patomekanisme cukup lengkap

Kekurangan : Tatalaksana farmakoterapi tidak lengkap

Masukan: baca rinci dan detail mengenai patomekanisme dan tatalaksana farmakoterapi',
                'is_sent' => 1,
                'created_at' => '2025-11-04 02:34:00',
                'updated_at' => '2025-11-04 05:20:09',
            ),
            48 => 
            array (
                'id' => 49,
                'oujian_id' => 5,
                'station_id' => 36,
                'peserta_id' => 58,
                'qrpeserta' => 'a334496d20dd99618d4e3a336e18d0ad',
                'nama' => 'Graselda Sinka Prameswari',
                'npm' => '123170061',
                'feedback' => 'Kelebihan :
patomekanisme sudah bagus
Kekurangan :
- tatalaksana kurang lengkap
Masukan:',
                'is_sent' => 1,
                'created_at' => '2025-11-04 02:34:01',
                'updated_at' => '2025-11-04 05:20:09',
            ),
            49 => 
            array (
                'id' => 50,
                'oujian_id' => 5,
                'station_id' => 46,
                'peserta_id' => 162,
                'qrpeserta' => '54b43135ed37b24c2cce8e8f99e6785f',
                'nama' => 'M. Alfi Hasan Humaedi',
                'npm' => '123170082',
                'feedback' => 'Kelebihan :
bisa menjelaskan patomekanisme

Kekurangan :
kurang teliti membaca kasus, dx kurang lengkap

Masukan: 
belajar lagi, lebih teliti baca kasusnya',
                'is_sent' => 1,
                'created_at' => '2025-11-04 02:34:03',
                'updated_at' => '2025-11-04 05:20:09',
            ),
            50 => 
            array (
                'id' => 51,
                'oujian_id' => 5,
                'station_id' => 40,
                'peserta_id' => 99,
                'qrpeserta' => 'efc64f9a2f024ff06d8b15a930d2496c',
                'nama' => 'Firman Fahmi Diwani',
                'npm' => '123170055',
                'feedback' => 'Kelebihan :
menuliskan hal hal yang dijelaskan di papan tulis
menjelaskan patomekanisme sesuai kasus
Kekurangan :
patomekanisme yang dijelaskan kurang lengkap
pemilihan obat kurang tepat sehingga patomekanisme juga kurang tepat
Masukan:
belajar lagi',
                'is_sent' => 1,
                'created_at' => '2025-11-04 02:34:04',
                'updated_at' => '2025-11-04 05:20:09',
            ),
            51 => 
            array (
                'id' => 52,
                'oujian_id' => 5,
                'station_id' => 37,
                'peserta_id' => 68,
                'qrpeserta' => 'eab71cd7764abf6e9b1d3ed46caf6df4',
                'nama' => 'Fanisa Hasna Aulia',
                'npm' => '123170047',
                'feedback' => 'Kelebihan :
sudah memahami kasus nya 

Kekurangan :
Mekanisme dilengkapi

Masukan:
Belajar yang rajin ya',
                'is_sent' => 1,
                'created_at' => '2025-11-04 02:34:04',
                'updated_at' => '2025-11-04 05:20:09',
            ),
            52 => 
            array (
                'id' => 53,
                'oujian_id' => 5,
                'station_id' => 43,
                'peserta_id' => 130,
                'qrpeserta' => '5b11e825a67fdb86242bfb6ff91dd78a',
                'nama' => 'Grania Febriani Ginanjar',
                'npm' => '123170060',
                'feedback' => 'Kelebihan : tugas 1 cukup

Kekurangan :
tugas 2 masih belum lengkap pembahasannya

Masukan:
banyak belajar lagi ya.. baca dan semangat selalu',
                'is_sent' => 1,
                'created_at' => '2025-11-04 02:34:05',
                'updated_at' => '2025-11-04 05:20:09',
            ),
            53 => 
            array (
                'id' => 54,
                'oujian_id' => 5,
                'station_id' => 39,
                'peserta_id' => 88,
                'qrpeserta' => 'f67556bd4e7847675c4d20048e76c1f3',
                'nama' => 'Fatuh Hanin Nasywa',
                'npm' => '123170051',
                'feedback' => 'Kelebihan:
sudah menjawab patomekanisme 
sudah menjawab terapi dan mekanisme

Kekurangan:
patomekanisme yang hendak dijelaskan terlalu luas bahkan di luar kasus spesifik kenario, sehingga penjelasan belum tuntas sampai aspek molekuler karena keterbatasan waktu
dosis kurang sesuai, mekanisme obat kurang lengkap, dan obat yang disebutkan hanya 1 saja tanpa ada kombinasi

Saran:
pelajari dan perbaiki yang masih kurang
manajemen Waktu, utamakan sampaikan poin penting agar bisa tuntasdan spesifik dan jelaskan aspek molekulernya sesuai temuan pada skenario saja',
                'is_sent' => 1,
                'created_at' => '2025-11-04 02:34:08',
                'updated_at' => '2025-11-04 05:20:09',
            ),
            54 => 
            array (
                'id' => 55,
                'oujian_id' => 5,
                'station_id' => 34,
                'peserta_id' => 36,
                'qrpeserta' => '15e9a0e1b3869f89c2c34137d5899053',
                'nama' => 'Annisa Azahra Tazkia',
                'npm' => '123170021',
                'feedback' => 'Kelebihan :

Kekurangan : Patomekanisme sudah cukup baik namun terkait penyebab HT pada pasien blm melibatkan aktivasi RAAS atau angiotensin II tanpa harus menjelaskan pemecahan cholesterol atau metabolism kholesterol. opilihan terapi obat belum tepat perhatikan pada kasus adalah pasien mengalami HT dan profil lipidnya masuk kmn terapi yang akan d berikan?bukan hanya simvas sj ya.

Masukan:',
                'is_sent' => 1,
                'created_at' => '2025-11-04 02:34:14',
                'updated_at' => '2025-11-04 05:20:09',
            ),
            55 => 
            array (
                'id' => 56,
                'oujian_id' => 5,
                'station_id' => 48,
                'peserta_id' => 183,
                'qrpeserta' => '4e97412cb50f408de5ab974ff12338eb',
                'nama' => 'Meuthia Intan Nur Annisa',
                'npm' => '123170090',
                'feedback' => 'Kelebihan :
Tugas 1:

Tugas 2:


Kekurangan :
Tugas 1:
patomekanisme kurang tepat dan kurang lengkap. (yg dimintya tugasnya apa to? bukan penegakan diagnosis ya.) kenapa jadi ke energi? ko ujug2 dari energi ke kilomikron ? ini jelasin penyerapan?


Tugas 2:
tatalaksana tidak sesuai.

Masukan:
Belajar lagi!',
                'is_sent' => 1,
                'created_at' => '2025-11-04 02:34:31',
                'updated_at' => '2025-11-04 05:20:09',
            ),
            56 => 
            array (
                'id' => 57,
                'oujian_id' => 5,
                'station_id' => 47,
                'peserta_id' => 172,
                'qrpeserta' => '70ff8a65346312cd9a8b5a0c297fb232',
                'nama' => 'Evan Adiyatma',
                'npm' => '123170042',
                'feedback' => 'Kelebihan :

Kekurangan :
- Mahasiswa tidak mampu menjelaskan secara tepat dan lengkap patomekanisme diagnosis kerja
- Mahasiswa tidak mampu menentukan tatalaksana farmakologi : statin (?), kombinasi 2 obat CCB dan ACEi

Masukan:
- Pelajari kembali terkait patomekanisme Dislipidemia - HT
- Pelajari tatalaksana dan cara kerja obat',
                'is_sent' => 1,
                'created_at' => '2025-11-04 02:34:35',
                'updated_at' => '2025-11-04 05:20:09',
            ),
            57 => 
            array (
                'id' => 58,
                'oujian_id' => 5,
                'station_id' => 35,
                'peserta_id' => 48,
                'qrpeserta' => 'ad9d0aa3e6082d3c1f1f3f029b3b7d05',
                'nama' => 'Darrell Athhar Dermawan',
                'npm' => '123170029',
                'feedback' => 'Kelebihan :

Kekurangan :
patomekanisme kurang tepat, baca lagi kasusnya dengan cermat 
obat hipertensi hanya menyebutkan satu saja 
Masukan:',
                'is_sent' => 1,
                'created_at' => '2025-11-04 02:34:42',
                'updated_at' => '2025-11-04 05:20:09',
            ),
            58 => 
            array (
                'id' => 59,
                'oujian_id' => 5,
                'station_id' => 38,
                'peserta_id' => 78,
                'qrpeserta' => 'b8de1c1abfcb9f7006fa66ebc826322e',
                'nama' => 'Marina Pasma Helsinki',
                'npm' => '123170085',
                'feedback' => 'Kelebihan: 
⦁	Manajemen Waktu baik

Kekurangan:
⦁	Tugas 1: dapat menjawab dengan tepat namun tidak lengkap terkait mekanisme manifestasi klinis yang muncul pada kasus.
⦁	Tugas 2: tidak dapat menjawab dengan tepat

Masukan:
⦁	Lebih teliti dan hati-hati dalam menganalisis kasus. Awalnya tidak tepat utk diagnosis kerja, ditengah diganti namun masih belum bisa menjelaskan secara runut dan detial. Jika analisis salah maka yang lain pun akan salah.
⦁	Belajar lagi terkait patomekanisme dan farmakologi yang lebih detail.',
                'is_sent' => 1,
                'created_at' => '2025-11-04 02:34:46',
                'updated_at' => '2025-11-04 05:20:09',
            ),
            59 => 
            array (
                'id' => 60,
                'oujian_id' => 5,
                'station_id' => 42,
                'peserta_id' => 119,
                'qrpeserta' => 'b8a9a64d13c15a9f6d9666546cda6246',
                'nama' => 'Fitri Noviyanti',
                'npm' => '123170056',
                'feedback' => 'Kelebihan :
Menjelaskan patomekanisme dislipidemia

Kekurangan :
Patomekanisme tidak sesuai dengan kasus


Masukan:',
                'is_sent' => 1,
                'created_at' => '2025-11-04 02:34:58',
                'updated_at' => '2025-11-04 05:20:09',
            ),
            60 => 
            array (
                'id' => 61,
                'oujian_id' => 5,
                'station_id' => 36,
                'peserta_id' => 59,
                'qrpeserta' => 'f95ea94a4c4294b63706dfe5887b19fa',
                'nama' => 'Nizar Rheivani Ramadhina Supriadi',
                'npm' => '123170125',
                'feedback' => 'Kelebihan :

Kekurangan :
- patomekanisme kurang tepat 
- mekanisme kerja obat kurang lengkap
Masukan:
- pemberian fibrat punya syarat',
                'is_sent' => 1,
                'created_at' => '2025-11-04 02:45:23',
                'updated_at' => '2025-11-04 05:20:09',
            ),
            61 => 
            array (
                'id' => 62,
                'oujian_id' => 5,
                'station_id' => 41,
                'peserta_id' => 110,
                'qrpeserta' => '5e9a17260fa277dd60341f8b593798cd',
                'nama' => 'Muhamad Daffaa An-najwan',
                'npm' => '123170095',
                'feedback' => 'Kelebihan :
Percaya diri dan terstruktur

Kekurangan :
-Soal 1: Tepat dan lengkap
-Soal 2: Tepat namun sedikit kurang lengkap

Masukan:
tetap belajar',
                'is_sent' => 1,
                'created_at' => '2025-11-04 02:47:43',
                'updated_at' => '2025-11-04 05:20:09',
            ),
            62 => 
            array (
                'id' => 63,
                'oujian_id' => 5,
                'station_id' => 45,
                'peserta_id' => 152,
                'qrpeserta' => '5dbc674a6edb5070f844d0c7aa5c8804',
                'nama' => 'Kanahaya Akrama Ramadhani Zuldekra',
                'npm' => '123170074',
                'feedback' => 'Kelebihan :

Kekurangan :
1. patof tidak dapat dijelaskan dengan lengkap
2. tepat tidak lengkap tidak disertai mekanisme
Masukan:
belajar lagi ya',
                'is_sent' => 1,
                'created_at' => '2025-11-04 02:47:48',
                'updated_at' => '2025-11-04 05:20:09',
            ),
            63 => 
            array (
                'id' => 64,
                'oujian_id' => 5,
                'station_id' => 49,
                'peserta_id' => 195,
                'qrpeserta' => '5686f4891af659bce596f1f12c67f6df',
                'nama' => 'Muhamad Diaz Nurraiz',
                'npm' => '123170096',
                'feedback' => 'Kelebihan : Faktor risiko dan patomekanisme cukup lengkap

Kekurangan : Tatalaksana tidak lengkap

Masukan: Baca lagi mengenai tatalaksana kasus tersebut !',
                'is_sent' => 1,
                'created_at' => '2025-11-04 02:49:38',
                'updated_at' => '2025-11-04 05:20:09',
            ),
            64 => 
            array (
                'id' => 65,
                'oujian_id' => 5,
                'station_id' => 43,
                'peserta_id' => 131,
                'qrpeserta' => '21e2b727bcb4b3a9e9497d0abb992631',
                'nama' => 'Hafizh Achmad Fauzan',
                'npm' => '123170062',
                'feedback' => 'Kelebihan :
tugas 1 cukup 

Kekurangan :
tugas 2 masih belum lengkap

Masukan:
banyak belajar lagi ya.. baca dan semangat selalu',
                'is_sent' => 1,
                'created_at' => '2025-11-04 02:49:39',
                'updated_at' => '2025-11-04 05:20:09',
            ),
            65 => 
            array (
                'id' => 66,
                'oujian_id' => 5,
                'station_id' => 38,
                'peserta_id' => 79,
                'qrpeserta' => 'dbb2d494cbcfd6472a250060fbc0a02d',
                'nama' => 'Nabil Febriansyah',
                'npm' => '123170113',
                'feedback' => 'Kelebihan: 
⦁	Manajemen Waktu baik
⦁	Tugas 1: dapat menjawab dengan tepat dan lengkap.

Kekurangan:
⦁	Tugas 2: dapat menjawab dengan tepat golongan obat, namun kurang tepat untuk dosis dan sediaan serta kurang lengkap untuk mekanisme kerja.

Masukan:
⦁	Belajar lagi terkait patomekanisme yang lebih detail.
⦁	Belajar lagi terkait farmakologi yang lebih detail.',
                'is_sent' => 1,
                'created_at' => '2025-11-04 02:49:44',
                'updated_at' => '2025-11-04 05:20:09',
            ),
            66 => 
            array (
                'id' => 67,
                'oujian_id' => 5,
                'station_id' => 42,
                'peserta_id' => 120,
                'qrpeserta' => '92585413a4a388c3769475a5a8989aae',
                'nama' => 'Gina Nabila',
                'npm' => '123170058',
                'feedback' => 'Kelebihan :
Mengidentifikasi FR
golongan obat

Kekurangan :
Patomekanisme belum tepat
dosis dan cara pemberian belum sesuai
belum menjelaskan mekanisme kerja obat

Masukan:',
                'is_sent' => 1,
                'created_at' => '2025-11-04 02:49:44',
                'updated_at' => '2025-11-04 05:20:09',
            ),
            67 => 
            array (
                'id' => 68,
                'oujian_id' => 5,
                'station_id' => 46,
                'peserta_id' => 163,
                'qrpeserta' => 'cdd3846e52774963ecb4900487201ef7',
                'nama' => 'Maharani Ayu Kusuma Dewi',
                'npm' => '123170084',
                'feedback' => 'Kelebihan :
sudah bisa menghubungkan patomekanisme

Kekurangan :
belum bisa menjelaskan tatalaksana dan dosis

Masukan:
belajar lagi',
                'is_sent' => 1,
                'created_at' => '2025-11-04 02:49:47',
                'updated_at' => '2025-11-04 05:20:09',
            ),
            68 => 
            array (
                'id' => 69,
                'oujian_id' => 5,
                'station_id' => 37,
                'peserta_id' => 69,
                'qrpeserta' => '23066e31757a77abf8b327e5ae0139ae',
                'nama' => 'Fasya Nugraha',
                'npm' => '123170049',
                'feedback' => 'Kelebihan :

Kekurangan :
Mekanisme dipelajari lagi 

Masukan:
Belajar yang rajin ya',
                'is_sent' => 1,
                'created_at' => '2025-11-04 02:49:49',
                'updated_at' => '2025-11-04 05:20:09',
            ),
            69 => 
            array (
                'id' => 70,
                'oujian_id' => 5,
                'station_id' => 35,
                'peserta_id' => 49,
                'qrpeserta' => '4a785d12eef876493131abc7a1adf341',
                'nama' => 'Dwita Ameliya Rahman Sapoetri',
                'npm' => '123170037',
                'feedback' => 'Kelebihan :
penjelasan patomekanisme sudah cukup baik 
Kekurangan :
pemilihan obat tepat namun dosis kurang tepat 
penjelasan mekanisme kerja obatnya belum lengkap 
Masukan:',
                'is_sent' => 1,
                'created_at' => '2025-11-04 02:49:58',
                'updated_at' => '2025-11-04 05:20:09',
            ),
            70 => 
            array (
                'id' => 71,
                'oujian_id' => 5,
                'station_id' => 40,
                'peserta_id' => 100,
                'qrpeserta' => '22cec383f29e047dca2b6c0d757b8259',
                'nama' => 'Rakhananta Wafdan Pramudityo',
                'npm' => '123170141',
                'feedback' => 'Kelebihan :
menuliskan hal-hal yang akan dijleaskan ke white board
bisa menjelaskan faktor risiko pada kasus
menyebutkan terapi simvaststin meskipun dosisnya bingung
Kekurangan :
patomekanisme yang dijelaskan kurang tepat
tidak menjelaskan mekansime obat
Masukan:',
                'is_sent' => 1,
                'created_at' => '2025-11-04 02:50:02',
                'updated_at' => '2025-11-04 05:20:09',
            ),
            71 => 
            array (
                'id' => 72,
                'oujian_id' => 5,
                'station_id' => 34,
                'peserta_id' => 37,
                'qrpeserta' => 'f1045e2b02c5dba8597e6f2ab9b38154',
                'nama' => 'Ariza Adhwa Azzikra',
                'npm' => '123170023',
                'feedback' => 'Kelebihan : Tugas 1 sudah baik dalam menentukan FR dan patomekanisme, tugas 2 obat dosis nya ya

Kekurangan :

Masukan:',
                'is_sent' => 1,
                'created_at' => '2025-11-04 02:50:17',
                'updated_at' => '2025-11-04 05:20:09',
            ),
            72 => 
            array (
                'id' => 73,
                'oujian_id' => 5,
                'station_id' => 39,
                'peserta_id' => 89,
                'qrpeserta' => '75c1eea4e49a73cbef038a9407b9e36a',
                'nama' => 'Fika Triana Ramadhani',
                'npm' => '123170053',
                'feedback' => 'Kelebihan:
sudah menjawab FR dan patomekanisme lengkap
sudah menjawab terapi dan mekanisme

Kekurangan:
golongan obat tidak ingat, dosis kurang sesuai, mekanisme obat kurang lengkap, dan obat yang disebutkan hanya 1 saja tanpa ada kombinasi

Saran:
pelajari dan perbaiki yang masih kurang',
                'is_sent' => 1,
                'created_at' => '2025-11-04 02:50:20',
                'updated_at' => '2025-11-04 05:20:09',
            ),
            73 => 
            array (
                'id' => 74,
                'oujian_id' => 5,
                'station_id' => 48,
                'peserta_id' => 184,
                'qrpeserta' => 'd9f96a4b15033416de1d22c361039d6a',
                'nama' => 'Muhamad Alfarel Chandra Pratama',
                'npm' => '123170094',
                'feedback' => 'Kelebihan :
Tugas 1:
baik

Tugas 2:
baik

Kekurangan :
Tugas 1:



Tugas 2:


Masukan:
Belajar lagi!',
                'is_sent' => 1,
                'created_at' => '2025-11-04 02:50:23',
                'updated_at' => '2025-11-04 05:20:09',
            ),
            74 => 
            array (
                'id' => 75,
                'oujian_id' => 5,
                'station_id' => 47,
                'peserta_id' => 173,
                'qrpeserta' => 'e92026a054ff7aeb048603da4edd191a',
                'nama' => 'Fahira Sifa Az Zahra',
                'npm' => '123170044',
                'feedback' => 'Kelebihan :
- Menentukan Faktor Risiko: Asupan lemak berlebih, jarang olahraga

Kekurangan :
- Mahasiswa tidak mampu menjelaskan  patomekanisme diagnosis kerja dengan lengkap: Asupan lemak berlebih - Penyerapan di usus > diangkut sebagai kilomikron ke hepar ; Kurangnya aktivitas fisik - HDL menurun, trigliserida meningkat - sumbatan - asam laktat pada otot
- Tidak menjelaskan tatalaksana

Masukan:
- Pelajari kembali patomekanisme dasar diagnosis 
- Pelajari tatalaksana',
                'is_sent' => 1,
                'created_at' => '2025-11-04 02:51:15',
                'updated_at' => '2025-11-04 05:20:09',
            ),
            75 => 
            array (
                'id' => 76,
                'oujian_id' => 5,
                'station_id' => 42,
                'peserta_id' => 121,
                'qrpeserta' => '16fee61883567701b9b3632d66149966',
                'nama' => 'Hening Ageng Maes',
                'npm' => '123170068',
                'feedback' => 'Kelebihan :
Diagnosis kerja yang tepat
Dasar diagnosis yang lengkap 
Patomekanisme yang mendasari 4-5 manisfestasi klinis

Kekurangan :
Patomekanisme kurang lengkap

Masukan:',
                'is_sent' => 1,
                'created_at' => '2025-11-04 03:01:32',
                'updated_at' => '2025-11-04 05:20:09',
            ),
            76 => 
            array (
                'id' => 77,
                'oujian_id' => 5,
                'station_id' => 41,
                'peserta_id' => 111,
                'qrpeserta' => 'f206c19790559aac7a74e0ff1fbe2093',
                'nama' => 'Pujawati Yulia Sari',
                'npm' => '123170133',
                'feedback' => 'Kelebihan :
Percaya diri dan terstruktur

Kekurangan :
-Soal 1: Tepat namun sedikit tidak lengkap
-Soal 2: Tepat dan lengkap

Masukan:
Belajar lagi',
                'is_sent' => 1,
                'created_at' => '2025-11-04 03:05:15',
                'updated_at' => '2025-11-04 05:20:09',
            ),
            77 => 
            array (
                'id' => 78,
                'oujian_id' => 5,
                'station_id' => 36,
                'peserta_id' => 60,
                'qrpeserta' => '1438475564729946d2518139017a0aa4',
                'nama' => 'Nur Ibnu Syinna',
                'npm' => '123170127',
                'feedback' => 'Kelebihan :

Kekurangan :
- diagnosis tidak tepat maka patomekanisme tidak tepat
Masukan:',
                'is_sent' => 1,
                'created_at' => '2025-11-04 03:05:20',
                'updated_at' => '2025-11-04 05:20:09',
            ),
            78 => 
            array (
                'id' => 79,
                'oujian_id' => 5,
                'station_id' => 46,
                'peserta_id' => 164,
                'qrpeserta' => 'acc586130217b347d5204c3afcef26d4',
                'nama' => 'Shafa Alya Salsabila',
                'npm' => '123170164',
                'feedback' => 'Kelebihan :
bisa menjelaskan hubungan patomekanisme 

Kekurangan :
tidak menyebutkan dx dengan lengkap

Masukan:
belajar lagi, lebih teliti saat membaca soal',
                'is_sent' => 1,
                'created_at' => '2025-11-04 03:05:22',
                'updated_at' => '2025-11-04 05:20:09',
            ),
            79 => 
            array (
                'id' => 80,
                'oujian_id' => 5,
                'station_id' => 43,
                'peserta_id' => 132,
                'qrpeserta' => 'cd8101586210e986223312b55570f487',
                'nama' => 'Isnandita Zakia Halimar Fajri',
                'npm' => '123170070',
                'feedback' => 'Kelebihan :

Kekurangan :
penentuan tugas 1 masih belum lengkap dan tepat
penentuan tugas 2 masih belum lengkap

Masukan:
banyak belajar lagi ya.. baca dan semangat selalu',
                'is_sent' => 1,
                'created_at' => '2025-11-04 03:05:23',
                'updated_at' => '2025-11-04 05:20:09',
            ),
            80 => 
            array (
                'id' => 81,
                'oujian_id' => 5,
                'station_id' => 34,
                'peserta_id' => 38,
                'qrpeserta' => 'dbaecbffe990e40c62f81985d7b2070e',
                'nama' => 'Muhammaad Pasha Ibrahim',
                'npm' => '123170099',
                'feedback' => 'Kelebihan :

Kekurangan : Diagnosis kerja tidak tepat dengan dasar diagnosis yang tidak mendukung, sehingga patomekanisme tidak sesuai. belum dapat menentukan etiologi dari kasus, feedback negative hormone mechanism tidak dijelaskan di patofisiologi atau patomekanisme

Masukan:',
                'is_sent' => 1,
                'created_at' => '2025-11-04 03:05:25',
                'updated_at' => '2025-11-04 05:20:09',
            ),
            81 => 
            array (
                'id' => 82,
                'oujian_id' => 5,
                'station_id' => 45,
                'peserta_id' => 153,
                'qrpeserta' => '3d6511adc69af86c2445720e3c15afb1',
                'nama' => 'Krisna Maulana',
                'npm' => '123170078',
                'feedback' => 'Kelebihan :

Kekurangan :
1. diagnosis tidak tepat
2.mekanisme tidak lengkap

Masukan:',
                'is_sent' => 1,
                'created_at' => '2025-11-04 03:05:25',
                'updated_at' => '2025-11-04 05:20:09',
            ),
            82 => 
            array (
                'id' => 83,
                'oujian_id' => 5,
                'station_id' => 47,
                'peserta_id' => 174,
                'qrpeserta' => '5c0d955068a5ebd0d01df572da139d96',
                'nama' => 'Maulana Galih Shandika',
                'npm' => '123170086',
                'feedback' => 'Kelebihan :
- Mampu menentukan diagnosis kerja disertai dengan dasar diagnosis 
- Penentuan diagnosis Wayne\'s scoring
- Penentuan dasar diagnosis meliputi anamnesis, Pem fisik, Pem penunjang
- Mampu menjelaskan patomekanisme: mutasi genetik,  Produksi hormon tiroid otonom, Peningkatan hormon tiroid → umpan balik negatif ke hipofisis, Akibat kelebihan hormon tiroid → peningkatan metabolisme basal, peningkatan proses sinaps

Kekurangan :
- Pem penunjang seperti USG belum disebutkan
- Patomekanisme yang belum lengkap spt penurunan TSH menyebabkan jaringan tiroid normal di sekitarnya menjadi inaktif, tapi nodul tetap aktif (“hot nodule”)

Masukan:
- Pelajari kembali terkait patomekanisme yang lengkap',
                'is_sent' => 1,
                'created_at' => '2025-11-04 03:05:26',
                'updated_at' => '2025-11-04 05:20:09',
            ),
            83 => 
            array (
                'id' => 84,
                'oujian_id' => 5,
                'station_id' => 49,
                'peserta_id' => 196,
                'qrpeserta' => '6884307ac7e1da429b1c1097d3ca8e43',
                'nama' => 'Muhamad Raihan Alif Fikri',
                'npm' => '123170098',
                'feedback' => 'Kelebihan : Patomenisme sedikit dijabarkan.

Kekurangan : Patomekanisme tidak lengkap, diagnosis tidak benar

Masukan: Belajar lebih lengkap mengenai diagnosis kerja dan patomekanisme',
                'is_sent' => 1,
                'created_at' => '2025-11-04 03:05:29',
                'updated_at' => '2025-11-04 05:20:09',
            ),
            84 => 
            array (
                'id' => 85,
                'oujian_id' => 5,
                'station_id' => 35,
                'peserta_id' => 50,
                'qrpeserta' => 'fbd890717933de328f4c1cc628b40b55',
                'nama' => 'Rizki Akbar Prayoga',
                'npm' => '123170153',
                'feedback' => 'Kelebihan :

Kekurangan :
diagnosis kurang tepat 
penjelasan patomekanisme tidak lengkap 

Masukan:
belajar lagi',
                'is_sent' => 1,
                'created_at' => '2025-11-04 03:05:30',
                'updated_at' => '2025-11-04 05:20:09',
            ),
            85 => 
            array (
                'id' => 86,
                'oujian_id' => 5,
                'station_id' => 40,
                'peserta_id' => 101,
                'qrpeserta' => '973192e38dc34139ddd6fce62371a2ad',
                'nama' => 'Tri Nur Anisa',
                'npm' => '123170177',
                'feedback' => 'Kelebihan :
menuliskan di white board apa yang akan dijelakan
Kekurangan :
diagnosis kurang tepat
patomekanisme yang dijelaskan cukup baik tapi kurang lengkap dikit
Masukan:
belajar lagi',
                'is_sent' => 1,
                'created_at' => '2025-11-04 03:05:34',
                'updated_at' => '2025-11-04 05:20:09',
            ),
            86 => 
            array (
                'id' => 87,
                'oujian_id' => 5,
                'station_id' => 38,
                'peserta_id' => 80,
                'qrpeserta' => '7d95760ec96a06b315687ad2c0ed7e77',
                'nama' => 'Salma Mumtaz',
                'npm' => '123170161',
                'feedback' => 'Kelebihan: 
⦁	Manajemen Waktu baik

Kekurangan:
⦁	Tugas 1: tidak dapat menjawab dengan tepat dan lengkap. Diagnosis kerja tidak tepat, maka dasar diagnosis pun tidak tepat.
⦁	Tugas 2: tidak dapat menjawab dengan tepat patomekanisme, karena diagnosis tidak tepat.

Masukan:
⦁	Hati-hati dalam analisis kasus, jika salah analisis maka penjelasan lain pun akan salah/ tidak tepat.',
                'is_sent' => 1,
                'created_at' => '2025-11-04 03:05:34',
                'updated_at' => '2025-11-04 05:20:09',
            ),
            87 => 
            array (
                'id' => 88,
                'oujian_id' => 5,
                'station_id' => 39,
                'peserta_id' => 90,
                'qrpeserta' => 'dc0d4262b28180d45839ba7a29536a44',
                'nama' => 'Tya Kencana Wulan',
                'npm' => '123170179',
                'feedback' => 'Kelebihan:
sudah menjawab dx 
sudah menjawab patomekanisme dan mengaitkan dengan manifestasi klinis

Kekurangan:
menyebutkan seluruh anamnesis pf, pp dalam skenario sehingga dapat menyita Waktu, dan tidak ditegaskan mana temuan interpretasi yang terkait dengan  diagnosis
dx yang disebutkan kurang lengkap
patomekanisme dan menifestasi klinis kurang lengkap

Saran:
pelajari dan perbaiki yang masih kurang
manajemen Waktu, utamakan sampaikan poin penting dalam temuan anamnesis, pf, pp dari scenario yang mendukung penegakan dx saja',
                'is_sent' => 1,
                'created_at' => '2025-11-04 03:05:51',
                'updated_at' => '2025-11-04 05:20:09',
            ),
            88 => 
            array (
                'id' => 89,
                'oujian_id' => 5,
                'station_id' => 48,
                'peserta_id' => 185,
                'qrpeserta' => 'e97f497216efff053e78d808206a7526',
                'nama' => 'Muhammad Alfi Syahrin',
                'npm' => '123170100',
                'feedback' => 'Kelebihan :
Tugas 1:

Tugas 2:


Kekurangan :
Tugas 1:
dxnya salah, cek di PFnya ada yang khas untuk membedakan dgn diagnosis lainnya (diagnosis yg kamu tentukan).

Tugas 2:
kurang tepat dan kurang lengkap

Masukan:
Belajar lagi!',
                'is_sent' => 1,
                'created_at' => '2025-11-04 03:06:03',
                'updated_at' => '2025-11-04 05:20:09',
            ),
            89 => 
            array (
                'id' => 90,
                'oujian_id' => 5,
                'station_id' => 37,
                'peserta_id' => 70,
                'qrpeserta' => '4703a7e0a0a9b19a1dfec97a1f66dc63',
                'nama' => 'Glory Elmasyiakh Kharisma Phang',
                'npm' => '123170059',
                'feedback' => 'Kelebihan :

Kekurangan :
mekanisme disesuaikan dengan diagnosis 

Masukan:
Belajar yang rajin ya',
                'is_sent' => 1,
                'created_at' => '2025-11-04 03:06:18',
                'updated_at' => '2025-11-04 05:20:09',
            ),
            90 => 
            array (
                'id' => 91,
                'oujian_id' => 5,
                'station_id' => 45,
                'peserta_id' => 154,
                'qrpeserta' => '8174a6250fad1de8e4e786933c65c7a0',
                'nama' => 'Raditia Molana Majid',
                'npm' => '123170136',
                'feedback' => 'Kelebihan :

Kekurangan :
1. tepat
2. patof tepat tapi tidak lengkap kurang detil

Masukan:
good job radit',
                'is_sent' => 1,
                'created_at' => '2025-11-04 03:17:03',
                'updated_at' => '2025-11-04 05:20:09',
            ),
            91 => 
            array (
                'id' => 92,
                'oujian_id' => 5,
                'station_id' => 41,
                'peserta_id' => 112,
                'qrpeserta' => 'eb7f80abc4f62d63254b7977e221268a',
                'nama' => 'Muhammad Rafli Rahman',
                'npm' => '123170107',
                'feedback' => 'Kelebihan :
Percaya diri dan terstruktur

Kekurangan :
-Soal 1: Tepat namun sedikit kurang lengkap
-Soal 2: Tepat namun sedikit kurang lengkap

Masukan:
Belajar lagi',
                'is_sent' => 1,
                'created_at' => '2025-11-04 03:17:33',
                'updated_at' => '2025-11-04 05:20:09',
            ),
            92 => 
            array (
                'id' => 93,
                'oujian_id' => 5,
                'station_id' => 36,
                'peserta_id' => 61,
                'qrpeserta' => '8945ec9d6440ce8a0d9f1408d3eee1e0',
                'nama' => 'Sabilly Herlambang',
                'npm' => '123170155',
                'feedback' => 'Kelebihan :

Kekurangan :
- diagnosis tidak tepat makan patomekanisme tidak tepat
Masukan:',
                'is_sent' => 1,
                'created_at' => '2025-11-04 03:19:35',
                'updated_at' => '2025-11-04 05:20:09',
            ),
            93 => 
            array (
                'id' => 94,
                'oujian_id' => 5,
                'station_id' => 49,
                'peserta_id' => 197,
                'qrpeserta' => '49ae4a38808ff5be02c815ffd44a5fb8',
                'nama' => 'Muhammad Fikri Rizal Aryanto',
                'npm' => '123170104',
                'feedback' => 'Kelebihan : Patomekanisme sedikit benar

Kekurangan : Diagnosis kerja tidak tepat, dasar diagnosis tidak tepat, patomekanisme kurang lengkap

Masukan: Baca lagi mengenai dasar diagnosis dan diagnosis kerja kasus dan patomekanisme!',
                'is_sent' => 1,
                'created_at' => '2025-11-04 03:20:58',
                'updated_at' => '2025-11-04 05:20:09',
            ),
            94 => 
            array (
                'id' => 95,
                'oujian_id' => 5,
                'station_id' => 43,
                'peserta_id' => 133,
                'qrpeserta' => '6b0eae96785f2eeec415928dc40bc0c2',
                'nama' => 'Nabil Muhammad Faiq Abiyyu',
                'npm' => '123170114',
                'feedback' => 'Kelebihan :
penjelasan tugas 1 cukup 

Kekurangan :
penjelasan tugas 2 masih belum lengkap

Masukan:
banyak belajar lagi ya..banyak baca dan semangat selalu yaaa..',
                'is_sent' => 1,
                'created_at' => '2025-11-04 03:20:59',
                'updated_at' => '2025-11-04 05:20:09',
            ),
            95 => 
            array (
                'id' => 96,
                'oujian_id' => 5,
                'station_id' => 34,
                'peserta_id' => 39,
                'qrpeserta' => '2b1908565b790b38196c9e3f7dd925cc',
                'nama' => 'Syaima Najiha Kurniawati',
                'npm' => '123170171',
                'feedback' => 'Kelebihan :

Kekurangan : Diagnosis tidak tepat, dasar diagnosis tidak tepat dan tidak lengkap, tidak mampu menginterpretasikan data dari hasil pemeriksaan penunjang
Patomekanisme yang disampaikan tidak tepat
Masukan:',
                'is_sent' => 1,
                'created_at' => '2025-11-04 03:20:59',
                'updated_at' => '2025-11-04 05:20:09',
            ),
            96 => 
            array (
                'id' => 97,
                'oujian_id' => 5,
                'station_id' => 38,
                'peserta_id' => 81,
                'qrpeserta' => 'e7935f73f80f96ad21e7bbd1b715660a',
                'nama' => 'Sherly Eva Avelia',
                'npm' => '123170165',
                'feedback' => 'Kelebihan: 
⦁	Manajemen Waktu baik

Kekurangan:
⦁	Tugas 1: dapat menjawab dengan tepat namun tidak lengkap.  diagnosis dan dasar diagnosis kurang lengkap .
⦁	Tugas 2: tidak dapat menjawab dengan tepat.

Masukan:
⦁	Hati-hati dalam analisis kasus, jika salah analisis maka penjelasan lain pun akan salah/ tidak tepat. 
⦁	Belajar lagi terkait patomekanisme yang sesuai dengan kasus.',
                'is_sent' => 1,
                'created_at' => '2025-11-04 03:21:00',
                'updated_at' => '2025-11-04 05:20:09',
            ),
            97 => 
            array (
                'id' => 98,
                'oujian_id' => 5,
                'station_id' => 42,
                'peserta_id' => 122,
                'qrpeserta' => 'a8451f16b03c4337f7a1e360572b4e60',
                'nama' => 'Jihan Suci Musyaffa',
                'npm' => '123170072',
                'feedback' => 'Kelebihan :

Kekurangan :
Diagnosis kerja belum tepat
Patomekanisme tidak sesuai dengan kasus



Masukan:',
                'is_sent' => 1,
                'created_at' => '2025-11-04 03:21:00',
                'updated_at' => '2025-11-04 05:20:09',
            ),
            98 => 
            array (
                'id' => 99,
                'oujian_id' => 5,
                'station_id' => 37,
                'peserta_id' => 71,
                'qrpeserta' => '793f2a21d4b88c2d77e958522201a56b',
                'nama' => 'Vicky Gea Erlangga',
                'npm' => '123170181',
                'feedback' => 'Kelebihan :
sudah memahami kasus 

Kekurangan :
mekanisme dilengkapi 

Masukan:
Belajar yang rajin ya',
                'is_sent' => 1,
                'created_at' => '2025-11-04 03:21:01',
                'updated_at' => '2025-11-04 05:20:09',
            ),
            99 => 
            array (
                'id' => 100,
                'oujian_id' => 5,
                'station_id' => 46,
                'peserta_id' => 165,
                'qrpeserta' => '5a945f7ddc7c4022126f751fd92a347e',
                'nama' => 'Sigmund Sheehane Divandra',
                'npm' => '123170166',
                'feedback' => 'Kelebihan :
bisa menjelaskan patfis

Kekurangan :
dx tidak lengkap disebutkan

Masukan:
belajar lagi, lebih teliti lagi baca kasusnya. cara menjelaskan bagus tapi dxnya tidak tepat',
                'is_sent' => 1,
                'created_at' => '2025-11-04 03:21:02',
                'updated_at' => '2025-11-04 05:20:09',
            ),
            100 => 
            array (
                'id' => 101,
                'oujian_id' => 5,
                'station_id' => 35,
                'peserta_id' => 51,
                'qrpeserta' => '0eecf33fd5a4f0af0d67522bea68c52d',
                'nama' => 'Rika Siony Maria Sitanggang',
                'npm' => '123170147',
                'feedback' => 'Kelebihan :

Kekurangan :
diagnosis kerja tidak tepat 
patomekanisme yang dijelaskan tidak tepat, tidak sesuai kasus 

Masukan:
baca kasus dengan baik dan hati-hati',
                'is_sent' => 1,
                'created_at' => '2025-11-04 03:21:07',
                'updated_at' => '2025-11-04 05:20:09',
            ),
            101 => 
            array (
                'id' => 102,
                'oujian_id' => 5,
                'station_id' => 40,
                'peserta_id' => 102,
                'qrpeserta' => '52aa66935bd6e6658023743c0228c97e',
                'nama' => 'Sabrina Aurelia Ramadani',
                'npm' => '123170157',
                'feedback' => 'Kelebihan :
-
Kekurangan :
blocking tidak menjelaskan apa yang ditugaskan saat bel pertama berbunyi
Masukan:
belajar lagi ya..',
                'is_sent' => 1,
                'created_at' => '2025-11-04 03:21:07',
                'updated_at' => '2025-11-04 05:20:09',
            ),
            102 => 
            array (
                'id' => 103,
                'oujian_id' => 5,
                'station_id' => 47,
                'peserta_id' => 175,
                'qrpeserta' => 'f6e3ec4d258338d64db56cb3e59f07bb',
                'nama' => 'Maya Fahira Handayani',
                'npm' => '123170088',
                'feedback' => 'Kelebihan :
- Mampu menentukan diagnosis kerja anemia karena penyakit kronis
- Mampu menentukan dasar diagnosis : anamnesis dan pemeriksaan fisik

Kekurangan :
- Penentuan dasar diagnosis pada pem penunjang tidak disebutkan dengan lengkap, yang disebutkan Hb rendah
- Tidak bisa menginterpretasikan hasil pem penunjang
- Faktor Risiko : gangguan ginjal (dasar diagnosis?)
- Tidak lengkap menjelaskan patomekanisme diagnosis kerja dihubungkan dengan manifestasi klinis seperti bengkak, sesak nafas, tekanan darah tinggi, Hb menurun, konjungtiva pucat, ureum kreat meningkat

Masukan:
- Pelajari kembali bagaimana menginterpretasikan hasil pemeriksaan penunjang
- Pelajari kembali patomekanisme yang benar',
                'is_sent' => 1,
                'created_at' => '2025-11-04 03:21:16',
                'updated_at' => '2025-11-04 05:20:09',
            ),
            103 => 
            array (
                'id' => 104,
                'oujian_id' => 5,
                'station_id' => 48,
                'peserta_id' => 186,
                'qrpeserta' => '7f3305acd0b222dab5808ee88b1d0b6e',
                'nama' => 'Muhammad Arya Sejati',
                'npm' => '123170102',
                'feedback' => 'Kelebihan :
Tugas 1:
cukup baik
Tugas 2:


Kekurangan :
Tugas 1:
dasar diagnosis: PPkurang tepat

Tugas 2:
kurang lengkap


Masukan:
Belajar lagi!',
                'is_sent' => 1,
                'created_at' => '2025-11-04 03:21:25',
                'updated_at' => '2025-11-04 05:20:09',
            ),
            104 => 
            array (
                'id' => 105,
                'oujian_id' => 5,
                'station_id' => 39,
                'peserta_id' => 91,
                'qrpeserta' => '892bb53d33295c5cf67d28e00225d5be',
                'nama' => 'Virna Prihadiyanti',
                'npm' => '123170183',
                'feedback' => 'Kelebihan:
sudah menjawab dx lengkap
sudah menjawab patomekanisme dan mengaitkan dengan manifestasi klinis

Kekurangan:
menyebutkan seluruh anamnesis pf, pp dalam skenario sehingga dapat menyita Waktu, dan tidak ditegaskan mana temuan interpretasi yang terkait dengan  diagnosis
dx yang disebutkan sempat keliru, kemudian direvisi, hanya saja anamnesis pf dan pp yang mendukung diagnosis tidak dijabarkan
patomekanisme dan menifestasi klinis kurang lengkap

Saran:
pelajari dan perbaiki yang masih kurang
manajemen Waktu, utamakan sampaikan poin penting dalam temuan anamnesis, pf, pp dari skenario yang mendukung penegakan dx saja
lebih teliti saat membaca skenario',
                'is_sent' => 1,
                'created_at' => '2025-11-04 03:21:26',
                'updated_at' => '2025-11-04 05:20:09',
            ),
            105 => 
            array (
                'id' => 106,
                'oujian_id' => 5,
                'station_id' => 36,
                'peserta_id' => 62,
                'qrpeserta' => 'e649756b6ef4c230ec8314383e52bd00',
                'nama' => 'Riyana Wulan Miranti',
                'npm' => '123170151',
                'feedback' => 'Kelebihan :
sudah bagus
Kekurangan :

Masukan:',
                'is_sent' => 1,
                'created_at' => '2025-11-04 03:32:22',
                'updated_at' => '2025-11-04 05:20:09',
            ),
            106 => 
            array (
                'id' => 107,
                'oujian_id' => 5,
                'station_id' => 34,
                'peserta_id' => 40,
                'qrpeserta' => '6f44da1fcfba4e3e666a0744545dfccc',
                'nama' => 'Syifa Tiara Putri Syalsabila',
                'npm' => '123170175',
                'feedback' => 'Kelebihan : tugas satu dan dua sudah baik dijelaskan

Kekurangan :

Masukan:',
                'is_sent' => 1,
                'created_at' => '2025-11-04 03:32:27',
                'updated_at' => '2025-11-04 05:20:09',
            ),
            107 => 
            array (
                'id' => 108,
                'oujian_id' => 5,
                'station_id' => 41,
                'peserta_id' => 113,
                'qrpeserta' => '3ff4d2bec0a2e0a8ef47848117139f4c',
                'nama' => 'Muhammad Zidan Putra Al-fachri',
                'npm' => '123170109',
                'feedback' => 'Kelebihan :
Percaya diri dan terstruktur

Kekurangan :
-Soal 1: Tepat dan lengkap
-Soal 2: Tepat namun kurang lengkap

Masukan:
Belajar lagi',
                'is_sent' => 1,
                'created_at' => '2025-11-04 03:32:39',
                'updated_at' => '2025-11-04 05:20:09',
            ),
            108 => 
            array (
                'id' => 109,
                'oujian_id' => 5,
                'station_id' => 49,
                'peserta_id' => 198,
                'qrpeserta' => '41aef77fe469793ba69ddd69f8fd32f1',
                'nama' => 'Zahra Julia',
                'npm' => '123170190',
                'feedback' => 'Kelebihan : dasar diagnosis dan penjelasan carcinogenesis cukup benar,

Kekurangan : Diagnosis kerja tidak lengkap

Masukan: Baca lagi mengenai diagnosis kerja kasus yang lengkap',
                'is_sent' => 1,
                'created_at' => '2025-11-04 03:36:36',
                'updated_at' => '2025-11-04 05:20:09',
            ),
            109 => 
            array (
                'id' => 110,
                'oujian_id' => 5,
                'station_id' => 35,
                'peserta_id' => 52,
                'qrpeserta' => 'dcbdffdbb15f773aa72b2d0956f3b24b',
                'nama' => 'Riska Gusteresa Lestari',
                'npm' => '123170149',
                'feedback' => 'Kelebihan :

Kekurangan :
diagnosis tepat tapi tidak lengkap 
penjelasan carciogenesis kurang lengkap 

Masukan:',
                'is_sent' => 1,
                'created_at' => '2025-11-04 03:36:36',
                'updated_at' => '2025-11-04 05:20:09',
            ),
            110 => 
            array (
                'id' => 111,
                'oujian_id' => 5,
                'station_id' => 42,
                'peserta_id' => 123,
                'qrpeserta' => '8e1f248252a6a4e6593c88d1ba2ea87b',
                'nama' => 'Muhammad Rakha Habibie',
                'npm' => '123170108',
                'feedback' => 'Kelebihan :
diagnosis kerja
dasar diagnosis (anamnesis, PF, PP)
Prinsip dasar staging M
Patomekanisme

Kekurangan :
Diagnosis kerja belum lengkap
dasar diagnosis belum lengkap
Prinsip dasar staging belum lengkap
Carcinogenesis belum lengkap


Masukan:',
                'is_sent' => 1,
                'created_at' => '2025-11-04 03:36:36',
                'updated_at' => '2025-11-04 05:20:09',
            ),
            111 => 
            array (
                'id' => 112,
                'oujian_id' => 5,
                'station_id' => 46,
                'peserta_id' => 166,
                'qrpeserta' => '5b726fff5475c5a310b72d14038a4726',
                'nama' => 'Syalaisha Attaya Frahnaz Tafael',
                'npm' => '123170172',
                'feedback' => 'Kelebihan :
bisa menghubungkan walau belum lengkap

Kekurangan :
dx tidak lengkap

Masukan:
belajar lagi, lebih teliti lagi',
                'is_sent' => 1,
                'created_at' => '2025-11-04 03:36:37',
                'updated_at' => '2025-11-04 05:20:09',
            ),
            112 => 
            array (
                'id' => 113,
                'oujian_id' => 5,
                'station_id' => 47,
                'peserta_id' => 176,
                'qrpeserta' => '779a201db76dffde250e6e4f800b0046',
                'nama' => 'Suci Anjelina',
                'npm' => '123170168',
                'feedback' => 'Kelebihan :
- Mhsw menentukan diagnosis kerja
- Mhsw mampu menentukan dasar diagnosis : Anam, PF, PP
- Menjelaskan TNM
- Mahasiswa mampu menjelaskan carcinogenesis dikaitkan dengan manifestasi klinis: Carcinogenic agent (rokok); menjelaskan Acquisition Hallmarks of Cancer 

Kekurangan :
- Pemeriksaan penunjang dalam menunjang diagnosis kerja: rontgen, USG, histoPA

Masukan:
- Suara dan intonasi cukup baik, jelas dan meyakinkan
- Tahapan carcinogenesis : inisiasi dan promosi',
                'is_sent' => 1,
                'created_at' => '2025-11-04 03:36:37',
                'updated_at' => '2025-11-04 05:20:09',
            ),
            113 => 
            array (
                'id' => 114,
                'oujian_id' => 5,
                'station_id' => 43,
                'peserta_id' => 134,
                'qrpeserta' => '0d0501e5b63fea31a12a73433ce725fd',
                'nama' => 'Nasywa Rizkia Nurrachmy',
                'npm' => '123170116',
                'feedback' => 'Kelebihan :

Kekurangan :
penjelasan tugas 2 masih belum tepat dan lengkap
penjelasan tugas 1 masih belum lengkap

Masukan:
banyak belajar lagi ya.. baca dan semangat selalu',
                'is_sent' => 1,
                'created_at' => '2025-11-04 03:36:37',
                'updated_at' => '2025-11-04 05:20:09',
            ),
            114 => 
            array (
                'id' => 115,
                'oujian_id' => 5,
                'station_id' => 48,
                'peserta_id' => 187,
                'qrpeserta' => '093e17806913802f9860460b82e69e8b',
                'nama' => 'Vallentino',
                'npm' => '123170180',
                'feedback' => 'Kelebihan :
Tugas 1:
cukup baik
Tugas 2:


Kekurangan :
Tugas 1:


Tugas 2:
kurang lengkap dan krg sistematis


Masukan:
!',
                'is_sent' => 1,
                'created_at' => '2025-11-04 03:36:41',
                'updated_at' => '2025-11-04 05:20:09',
            ),
            115 => 
            array (
                'id' => 116,
                'oujian_id' => 5,
                'station_id' => 37,
                'peserta_id' => 72,
                'qrpeserta' => 'e8feac2c99f9e227ba86a0c5087095fa',
                'nama' => 'Widi\'ah',
                'npm' => '123170185',
                'feedback' => 'Kelebihan :
sudah memahami kasus 

Kekurangan :
dasar diagnosis dilengkapi lagi 

Masukan:
Belajar yang rajin',
                'is_sent' => 1,
                'created_at' => '2025-11-04 03:36:54',
                'updated_at' => '2025-11-04 05:20:09',
            ),
            116 => 
            array (
                'id' => 117,
                'oujian_id' => 5,
                'station_id' => 38,
                'peserta_id' => 82,
                'qrpeserta' => '93ef08667ef521faab563e5212266a6d',
                'nama' => 'Siti Sopiyani',
                'npm' => '123170167',
                'feedback' => 'Kelebihan: 
⦁	Manajemen Waktu baik
⦁	Tugas 1: dapat menjawab dengan tepat dengan lengkap

Kekurangan:
⦁	Tugas 2: dapat menjawab dengan tepat namun tidak lengkap tiap proses mekanismenya dan kurang sistematis.

Masukan:
⦁	Hati-hati dalam analisis kasus,harus lebih teliti.
⦁	Belajar lagi terkait patomekanisme yang lebih detail.',
                'is_sent' => 1,
                'created_at' => '2025-11-04 03:36:59',
                'updated_at' => '2025-11-04 05:20:09',
            ),
            117 => 
            array (
                'id' => 118,
                'oujian_id' => 5,
                'station_id' => 40,
                'peserta_id' => 103,
                'qrpeserta' => 'd24df8a33beb14f7971565ae2bab7647',
                'nama' => 'Helga Amelia Andinti',
                'npm' => '123170067',
                'feedback' => 'Kelebihan :
membuat mindmap untuk menjelaskan
Kekurangan :
diagnosis kurang tepat

Masukan:
belajar lagi yaaa',
                'is_sent' => 1,
                'created_at' => '2025-11-04 03:37:06',
                'updated_at' => '2025-11-04 05:20:09',
            ),
            118 => 
            array (
                'id' => 119,
                'oujian_id' => 5,
                'station_id' => 45,
                'peserta_id' => 155,
                'qrpeserta' => 'c6e7b2ae598685f5c52346f6a545caee',
                'nama' => 'Rafi Putra Prasetyo',
                'npm' => '123170138',
                'feedback' => 'Kelebihan :
sangat detil

Kekurangan :


Masukan:
good job rafi',
                'is_sent' => 1,
                'created_at' => '2025-11-04 03:37:08',
                'updated_at' => '2025-11-04 05:20:09',
            ),
            119 => 
            array (
                'id' => 120,
                'oujian_id' => 5,
                'station_id' => 39,
                'peserta_id' => 92,
                'qrpeserta' => 'a9a9731ec49d51c00cd7bf2efa4b5bf4',
                'nama' => 'Zian Fadilah',
                'npm' => '123170195',
                'feedback' => 'Kelebihan:
sudah menjawab dx 
sudah menjawab mekanisme dan teori yang menunjang penyakit

Kekurangan:
menyebutkan seluruh anamnesis pf, pp dalam skenario sehingga dapat menyita Waktu, dan tidak ditegaskan mana temuan interpretasi yang terkait dengan  diagnosis
dx yang disebutkan keliru, kemudian direvisi masih kurang tepat pada katahubungnya
mekanisme dan teori yang menunjang penyakit
kurang lengkap

Saran:
pelajari dan perbaiki yang masih kurang
manajemen Waktu, utamakan sampaikan poin penting dalam temuan anamnesis, pf, pp dari skenario yang mendukung penegakan dx saja
pelajari penggunaan terminology kedokteran et causa',
                'is_sent' => 1,
                'created_at' => '2025-11-04 03:37:27',
                'updated_at' => '2025-11-04 05:20:09',
            ),
            120 => 
            array (
                'id' => 121,
                'oujian_id' => 5,
                'station_id' => 36,
                'peserta_id' => 63,
                'qrpeserta' => '35b03142345654544f4e2dd8621e5dc8',
                'nama' => 'Muhammad Arsil Raykhan Firdaus',
                'npm' => '123170101',
                'feedback' => 'Kelebihan :

Kekurangan :
- dasar diagnosis tidak lengkap

Masukan:',
                'is_sent' => 1,
                'created_at' => '2025-11-04 03:47:03',
                'updated_at' => '2025-11-04 05:20:09',
            ),
            121 => 
            array (
                'id' => 122,
                'oujian_id' => 5,
                'station_id' => 34,
                'peserta_id' => 41,
                'qrpeserta' => '277a5c861ce3f06d0e2e13c824dd4295',
                'nama' => 'Rania Ananda Maulidya Salsabila',
                'npm' => '123170143',
                'feedback' => 'Kelebihan : Tugas 1 dan 2 sudah baik dijawab

Kekurangan :

Masukan:',
                'is_sent' => 1,
                'created_at' => '2025-11-04 03:49:47',
                'updated_at' => '2025-11-04 05:20:09',
            ),
            122 => 
            array (
                'id' => 123,
                'oujian_id' => 5,
                'station_id' => 38,
                'peserta_id' => 83,
                'qrpeserta' => '5edb1339070e2db8dd2c348c95fe1d2e',
                'nama' => 'Zaki Abdul Fayedh',
                'npm' => '123170193',
                'feedback' => 'Kelebihan: 
⦁	Manajemen Waktu baik
⦁	Tugas 1: dapat menjawab dengan tepat dengan lengkap

Kekurangan:
⦁	Tugas 2: dapat menjawab dengan tepat namun tidak lengkap tiap proses mekanismenya!

Masukan:
⦁	Hati-hati dalam analisis kasus,harus lebih teliti.
⦁	Belajar lagi terkait patomekanisme yang lebih detail.',
                'is_sent' => 1,
                'created_at' => '2025-11-04 03:52:12',
                'updated_at' => '2025-11-04 05:20:09',
            ),
            123 => 
            array (
                'id' => 124,
                'oujian_id' => 5,
                'station_id' => 49,
                'peserta_id' => 199,
                'qrpeserta' => 'bd642f2bccfdce508f8a57c528466c64',
                'nama' => 'Ramadiy Rafi\'uddin',
                'npm' => '123170142',
                'feedback' => 'Kelebihan : Penjelasan hallmarks cancer cukup lengkap

Kekurangan : Diagnosis kerja tidak lengkap

Masukan: Baca lagi mengenai diagnosis kerja kasus tersebut !',
                'is_sent' => 1,
                'created_at' => '2025-11-04 03:52:12',
                'updated_at' => '2025-11-04 05:20:09',
            ),
            124 => 
            array (
                'id' => 125,
                'oujian_id' => 5,
                'station_id' => 46,
                'peserta_id' => 167,
                'qrpeserta' => 'ca11894f1e4ec27dd7db0c11ab66a7d9',
                'nama' => 'Tia Angelista',
                'npm' => '123170176',
                'feedback' => 'Kelebihan :

Kekurangan :
dx tidak lengkap, patomekanisme belum lengkap

Masukan:
belajar lagi',
                'is_sent' => 1,
                'created_at' => '2025-11-04 03:52:13',
                'updated_at' => '2025-11-04 05:20:09',
            ),
            125 => 
            array (
                'id' => 126,
                'oujian_id' => 5,
                'station_id' => 41,
                'peserta_id' => 114,
                'qrpeserta' => '90cbe79c1748effbec6054de5da60420',
                'nama' => 'Raihaan Indra Kusumah',
                'npm' => '123170139',
                'feedback' => 'Kelebihan :
Percaya diri dan terstruktur

Kekurangan :
-Soal 1: Tepat namun tidak lengkap
-Soal 2: tidak lengkap

Masukan:
Belajar lagi',
                'is_sent' => 1,
                'created_at' => '2025-11-04 03:52:14',
                'updated_at' => '2025-11-04 05:20:09',
            ),
            126 => 
            array (
                'id' => 127,
                'oujian_id' => 5,
                'station_id' => 35,
                'peserta_id' => 53,
                'qrpeserta' => '272059b9f3c0ab68b0e63976eed298b0',
                'nama' => 'Laela Safitri',
                'npm' => '123170079',
                'feedback' => 'Kelebihan :

Kekurangan :
diagnosis kerja kurang lengkap 
patomekanisme tidak dijelaskan 

Masukan:
belajar lagi mengenai patomekanisme pada kasus ini',
                'is_sent' => 1,
                'created_at' => '2025-11-04 03:52:15',
                'updated_at' => '2025-11-04 05:20:09',
            ),
            127 => 
            array (
                'id' => 128,
                'oujian_id' => 5,
                'station_id' => 40,
                'peserta_id' => 104,
                'qrpeserta' => '22c98be3a21d8be42513c7f8073f6213',
                'nama' => 'Kafin Maulida Tinalibranta',
                'npm' => '123170073',
                'feedback' => 'Kelebihan :
menuliskan mind map agar dapat dijelaskan 
diagnosis cukup baik
Kekurangan :
diagnosis kurang lengkap
patomekanisme yang dijelaskan kurang lengkap
Masukan:
belajar lagi yaaa..',
                'is_sent' => 1,
                'created_at' => '2025-11-04 03:52:16',
                'updated_at' => '2025-11-04 05:20:09',
            ),
            128 => 
            array (
                'id' => 129,
                'oujian_id' => 5,
                'station_id' => 42,
                'peserta_id' => 124,
                'qrpeserta' => '7165e6b51533a4e6bae9983679a8b138',
                'nama' => 'Mutiara Nurhapipah',
                'npm' => '123170112',
                'feedback' => 'Kelebihan :

Kekurangan :
Diagnosis kerja belum tepat
dasar diagnosis tidak sesuai dengan diagnosis yang ditentukan
belum menjelaskan staging sesuai kasus
belum dapat menjelaskan patomekanisme hallmarks of cancer yang sesuai dengan kasus


Masukan:',
                'is_sent' => 1,
                'created_at' => '2025-11-04 03:52:17',
                'updated_at' => '2025-11-04 05:20:09',
            ),
            129 => 
            array (
                'id' => 130,
                'oujian_id' => 5,
                'station_id' => 45,
                'peserta_id' => 156,
                'qrpeserta' => '8821c45b45867f38c01b5e64a9a7a4a1',
                'nama' => 'Zaki Ihsan Nugroho',
                'npm' => '123170194',
                'feedback' => 'Kelebihan :

Kekurangan :
1. tidak lengkap
2. sesuaikan dengan hall marknya
Masukan:
jelaskan harus terstruktur',
                'is_sent' => 1,
                'created_at' => '2025-11-04 03:52:29',
                'updated_at' => '2025-11-04 05:20:09',
            ),
            130 => 
            array (
                'id' => 131,
                'oujian_id' => 5,
                'station_id' => 43,
                'peserta_id' => 135,
                'qrpeserta' => 'e08bf52d29a47ecfe722b9cc5e4d3ca3',
                'nama' => 'Nizar Athaillah Rophaaisyi',
                'npm' => '123170124',
                'feedback' => 'Kelebihan :

Kekurangan :

penjelasan tugas 2 masih belum tepat dan lengkap

Masukan:
banyak belajar lagi ya.. baca dan semangat selalu',
                'is_sent' => 1,
                'created_at' => '2025-11-04 03:52:32',
                'updated_at' => '2025-11-04 05:20:09',
            ),
            131 => 
            array (
                'id' => 132,
                'oujian_id' => 5,
                'station_id' => 48,
                'peserta_id' => 188,
                'qrpeserta' => '74b975a1bc382324a65178b8e0a5529a',
                'nama' => 'Yufian Hamdu',
                'npm' => '123170188',
                'feedback' => 'Kelebihan :
Tugas 1:
cukup baik
Tugas 2:


Kekurangan :
Tugas 1:


Tugas 2:
kurang lengkap


Masukan:
!',
                'is_sent' => 1,
                'created_at' => '2025-11-04 03:52:39',
                'updated_at' => '2025-11-04 05:20:09',
            ),
            132 => 
            array (
                'id' => 133,
                'oujian_id' => 5,
                'station_id' => 37,
                'peserta_id' => 73,
                'qrpeserta' => '4b16ebc863cefdcbe0276b85d66f55ed',
                'nama' => 'Zahra Sinta Dewi',
                'npm' => '123170191',
                'feedback' => 'Kelebihan :

Kekurangan :
mekanisme dilengkapi 

Masukan:
Belajar yang rajin ya',
                'is_sent' => 1,
                'created_at' => '2025-11-04 03:52:42',
                'updated_at' => '2025-11-04 05:20:09',
            ),
            133 => 
            array (
                'id' => 134,
                'oujian_id' => 5,
                'station_id' => 47,
                'peserta_id' => 177,
                'qrpeserta' => '3aeebd2349c05eab9c176bf286803d57',
                'nama' => 'Syafana Delviana Pritama Syahrani',
                'npm' => '123170170',
                'feedback' => 'Kelebihan :
- Mahasiswa mampu menentukan diagnosis kerja 
- Menentukan dasar diagnosis tidak lengkap

Kekurangan :
- Penentuan dasar diagnosis yang menunjang diagnosis tidak lengkap dan kurang tepat: anamnesis, pemeriksaan thorak 
- Pemeriksaan penunjang yang tdk disebutkan dgn lengkap spt USG, PSA, biopsi, bone scan
- Interpretasi TNM
- Patomekanisme : p53 sustaining proliferative, supresi p53, apoptosis

Masukan:
- Baca kembali soal dengan baik sehingga tidak terlewat dalam penentuan dasar diagnosis menunjang adeno ca prostat, seperti Anamnesis: sering BAK malam hari, pancaran lemah, tidak lampias; Pemeriksaan fisik : DRE Prostat keras, nodular, batas tidak tegas, dst
- Patomekanisme hallmarks of cancer (invasi dan metastase) pelajari kembali',
                'is_sent' => 1,
                'created_at' => '2025-11-04 03:52:52',
                'updated_at' => '2025-11-04 05:20:09',
            ),
            134 => 
            array (
                'id' => 135,
                'oujian_id' => 5,
                'station_id' => 39,
                'peserta_id' => 93,
                'qrpeserta' => '0cc860c83e80103bf6de95d8237fbaab',
                'nama' => 'Reihana Assyfa Rahma',
                'npm' => '123170145',
                'feedback' => '3/1
Kelebihan:
sudah menjawab dx lengkap
memahami derajat pada penyakit tsb
sudah menjawab mekanisme dan teori yang menunjang penyakit

Kekurangan:
menyebutkan seluruh anamnesis pf, pp dalam skenario sehingga dapat menyita Waktu, dan tidak ditegaskan mana temuan interpretasi yang terkait dengan  diagnosis
dx yang disebutkan awalnya keliru, kemudian direvisi 
mekanisme dan teori yang menunjang penyakit
disebutkan terlalu luas di luar perinah soal speifik, sehingga yang diminta dijelaskan kurang lengkap

Saran:
pelajari dan perbaiki yang masih kurang
manajemen Waktu, utamakan sampaikan poin penting dalam temuan anamnesis, pf, pp dari skenario yang mendukung penegakan dx saja dan jelaskan spesifik yang diminta soal saja',
                'is_sent' => 1,
                'created_at' => '2025-11-04 03:53:00',
                'updated_at' => '2025-11-04 05:20:09',
            ),
            135 => 
            array (
                'id' => 136,
                'oujian_id' => 5,
                'station_id' => 41,
                'peserta_id' => 115,
                'qrpeserta' => '9c7639a96a590f0b64285e44b6c6e783',
                'nama' => 'Oom Lasidah',
                'npm' => '123170131',
                'feedback' => 'Kelebihan :
Percaya diri dan terstruktur

Kekurangan :
-Soal 1: Tepat dan lengkap
-Soal 2: Tepat dan lengkap

Masukan:
tetap belajar',
                'is_sent' => 1,
                'created_at' => '2025-11-04 04:04:48',
                'updated_at' => '2025-11-04 05:20:09',
            ),
            136 => 
            array (
                'id' => 137,
                'oujian_id' => 5,
                'station_id' => 36,
                'peserta_id' => 64,
                'qrpeserta' => '3826d5d0f45fd43cc93afdeb73b95908',
                'nama' => 'Dinda Ayu Afriliyani',
                'npm' => '122170046',
                'feedback' => 'Kelebihan :

Kekurangan :

- patomekanisme tidak lengkap
Masukan:',
                'is_sent' => 1,
                'created_at' => '2025-11-04 04:05:59',
                'updated_at' => '2025-11-04 05:20:09',
            ),
            137 => 
            array (
                'id' => 138,
                'oujian_id' => 5,
                'station_id' => 42,
                'peserta_id' => 125,
                'qrpeserta' => '3131a0f396ed44bb2d6a625887fdce7f',
                'nama' => 'Nisa Minuri',
                'npm' => '123170122',
                'feedback' => 'Kelebihan :
diagnosis kerja
dasar diagnosis (anamnesis, PF)
patomekanisme dihubungkan dengan etiologi, manifestasi klinis 2

Kekurangan :
dasar diagnosis kurang lengkap (PP)
patomekanisme belum lengkap, mekanisme klinis belum lengkap


Masukan:',
                'is_sent' => 1,
                'created_at' => '2025-11-04 04:06:36',
                'updated_at' => '2025-11-04 05:20:09',
            ),
            138 => 
            array (
                'id' => 139,
                'oujian_id' => 5,
                'station_id' => 38,
                'peserta_id' => 84,
                'qrpeserta' => 'c88af5172f5d847ef7c80ae08e1deb92',
                'nama' => 'Wanda Sri Utami',
                'npm' => '122170188',
                'feedback' => 'Kelebihan: 
⦁	Manajemen Waktu baik
⦁	Tugas 1: dapat menjawab dengan tepat, namun dasar diagnosis sedikit kurang lengkap.

Kekurangan:
⦁	Tugas 2: dapat menjawab dengan tepat namun tidak lengkap tiap proses mekanismenya secara detail.

Masukan:
⦁	Hati-hati dalam analisis kasus,harus lebih teliti dan hati-hati dalam interpretasi hasil pf dan pp.
⦁	Belajar lagi terkait patomekanisme yang lebih detail ditiap tahapan',
                'is_sent' => 1,
                'created_at' => '2025-11-04 04:07:35',
                'updated_at' => '2025-11-04 05:20:09',
            ),
            139 => 
            array (
                'id' => 140,
                'oujian_id' => 5,
                'station_id' => 49,
                'peserta_id' => 200,
                'qrpeserta' => 'dd40bd03e8b587871a7e58a1da1721cd',
                'nama' => 'Rozaanah Aliya Prawoto',
                'npm' => '123170154',
                'feedback' => 'Kelebihan : dasar diagnosis dan diagnosis kerja cukup lengkap

Kekurangan : Paatomekanisme kurang rinci dan menyeluruh

Masukan: Baca lagi mengenai dasar dasar diagnosis, terutama patokemanisme yang lengkap',
                'is_sent' => 1,
                'created_at' => '2025-11-04 04:07:51',
                'updated_at' => '2025-11-04 05:20:09',
            ),
            140 => 
            array (
                'id' => 141,
                'oujian_id' => 5,
                'station_id' => 46,
                'peserta_id' => 168,
                'qrpeserta' => '82f89c7c5bfde238351574f67396392a',
                'nama' => 'Sahira Nurgustini Salsabila',
                'npm' => '123170158',
                'feedback' => 'Kelebihan :
mampu mendiagnosis

Kekurangan :
penjelasan dasar dx masih kurang lengkap
penjelasan patomekanisme masih kurang

Masukan:
belajar lagi',
                'is_sent' => 1,
                'created_at' => '2025-11-04 04:07:58',
                'updated_at' => '2025-11-04 05:20:09',
            ),
            141 => 
            array (
                'id' => 142,
                'oujian_id' => 5,
                'station_id' => 37,
                'peserta_id' => 74,
                'qrpeserta' => '7498615126a1ec1f0cf1fc987bcd5b38',
                'nama' => 'Muhammad Daffa Ashshiddiq',
                'npm' => '123170103',
                'feedback' => 'Kelebihan :
sudah memahami kasus 

Kekurangan :
Mekanisme dilengkapi 

Masukan:
Belajar yang rajin ya',
                'is_sent' => 1,
                'created_at' => '2025-11-04 04:07:59',
                'updated_at' => '2025-11-04 05:20:09',
            ),
            142 => 
            array (
                'id' => 143,
                'oujian_id' => 5,
                'station_id' => 48,
                'peserta_id' => 189,
                'qrpeserta' => '1ffcfce07e04d3ce340cf1785efd5626',
                'nama' => 'Raihanah Jinan Ulya Ramadhani',
                'npm' => '123170140',
                'feedback' => 'Kelebihan :
Tugas 1:

Tugas 2:


Kekurangan :
Tugas 1:
diagnosis salah, penegakan diagnosis tidak sesuai dgn dx

Tugas 2:
diagnosis salah >>> patomekanisme nya salah.  
apa hubungan diagnosis kamu dengan penurunan eritrosiiiiiiittt???emang pasiennya anemia?????? cuma gara-gara lemess??? 


Masukan:
belajar lagi yaa!!',
                'is_sent' => 1,
                'created_at' => '2025-11-04 04:08:00',
                'updated_at' => '2025-11-04 05:20:09',
            ),
            143 => 
            array (
                'id' => 144,
                'oujian_id' => 5,
                'station_id' => 35,
                'peserta_id' => 54,
                'qrpeserta' => 'ec3f4bf1644ec0b50c55b9fb78ad56a3',
                'nama' => 'Qonita Qotrunnada Mulyana',
                'npm' => '123170135',
                'feedback' => 'Kelebihan :

Kekurangan :

Masukan:
sudah cukup baik',
                'is_sent' => 1,
                'created_at' => '2025-11-04 04:08:08',
                'updated_at' => '2025-11-04 05:20:09',
            ),
            144 => 
            array (
                'id' => 145,
                'oujian_id' => 5,
                'station_id' => 43,
                'peserta_id' => 136,
                'qrpeserta' => 'f521d0e1eb227023d4e506868dfc28c6',
                'nama' => 'Nur Annisa Barkah',
                'npm' => '123170126',
                'feedback' => 'Kelebihan :

Kekurangan : 
tugas 1 dan 2 masih belum lengkap


Masukan:
banyak belajar lagi ya.. baca dan semangat selalu',
                'is_sent' => 1,
                'created_at' => '2025-11-04 04:08:13',
                'updated_at' => '2025-11-04 05:20:09',
            ),
            145 => 
            array (
                'id' => 146,
                'oujian_id' => 5,
                'station_id' => 45,
                'peserta_id' => 157,
                'qrpeserta' => 'e4d0fccc02ec04c25eb28bb6db65ceff',
                'nama' => 'Wafi Fajri Muharram',
                'npm' => '123170184',
                'feedback' => 'Kelebihan :

Kekurangan :
1. dasar diagnosis harus spesifik dan tepat
2. kebalik patofnya

Masukan:
belajar lagi jhon',
                'is_sent' => 1,
                'created_at' => '2025-11-04 04:08:16',
                'updated_at' => '2025-11-04 05:20:09',
            ),
            146 => 
            array (
                'id' => 147,
                'oujian_id' => 5,
                'station_id' => 40,
                'peserta_id' => 105,
                'qrpeserta' => '605581b9cbe24db5f033d2bc8f7bd306',
                'nama' => 'Najmi Ashfilia Azzahro',
                'npm' => '123170115',
                'feedback' => 'Kelebihan :
menuliskan hal-hal yang akan dijelaskan di whiteboard
diagnosis cukup baik
Kekurangan :
dasar diagnosis kurang lengkap
manifestasi klinis juga kurang lengkap
Masukan:',
                'is_sent' => 1,
                'created_at' => '2025-11-04 04:08:30',
                'updated_at' => '2025-11-04 05:20:09',
            ),
            147 => 
            array (
                'id' => 148,
                'oujian_id' => 5,
                'station_id' => 34,
                'peserta_id' => 42,
                'qrpeserta' => '167091088e48ff175762e8eb22f51852',
                'nama' => 'Karissa Elvina Suhaedi',
                'npm' => '123170075',
                'feedback' => 'Kelebihan :

Kekurangan : Diagnosis kerja belum lengkap, termasuk dasar diagnosis blm lengkap (pemeriksaan penunjang belum mampu menginterpretasikan dengan tepat)

Masukan:',
                'is_sent' => 1,
                'created_at' => '2025-11-04 04:08:30',
                'updated_at' => '2025-11-04 05:20:09',
            ),
            148 => 
            array (
                'id' => 149,
                'oujian_id' => 5,
                'station_id' => 47,
                'peserta_id' => 178,
                'qrpeserta' => '985041791f473e8608f089b7b555d2ac',
                'nama' => 'Tri Rahayu Prihatiningsih',
                'npm' => '123170178',
                'feedback' => 'Kelebihan :
- Penentuan diagnosis kerja: Hipotiroid susp GAKY
- Mampu menentukan dasar diagnosis: anamnesis

Kekurangan:
- Menentukan pem fisik yang tidak sesuai dalam menunjang penentuan diagnosis
- Interpretasi pem penunjang tidak lengkap
- Tidak mampu menjelaskan patomekanisme diagnosis kerja 

Masukan:
- Penentuan dasar diagnosis yang menunjang diagnosis dari anam, PF, PP
- Pelajari kembali patomekanisme dari penyakit, dimulai dr etiologi sampai dikaitkan dengan manifestasi klinis',
                'is_sent' => 1,
                'created_at' => '2025-11-04 04:08:41',
                'updated_at' => '2025-11-04 05:20:09',
            ),
            149 => 
            array (
                'id' => 150,
                'oujian_id' => 5,
                'station_id' => 39,
                'peserta_id' => 94,
                'qrpeserta' => '0b8a0edfa737b52d35ce1c86a24f9fd7',
                'nama' => 'Maysi Adzizah',
                'npm' => '123170089',
                'feedback' => 'Kelebihan:
sudah menjawab dx lengkap
sudah menjawab patomekanisme dan mengaitkan dengan manifestasi klinis lengkap

Kekurangan:
dx dan interpretasi ekg yang disebutkan sempat kurang lengkap kemudian direvis

Saran:
pelajari dan perbaiki yang masih kurang',
                'is_sent' => 1,
                'created_at' => '2025-11-04 04:08:42',
                'updated_at' => '2025-11-04 05:20:09',
            ),
            150 => 
            array (
                'id' => 151,
                'oujian_id' => 5,
                'station_id' => 42,
                'peserta_id' => 126,
                'qrpeserta' => '2befbd7b6f10414cb299138e776f9673',
                'nama' => 'Rasti Ambar Nurfadilah',
                'npm' => '123170144',
                'feedback' => 'Kelebihan : 
patomekanisme dihubungkan dengan 1 FR
menentukan jenis obat, dosis, mekanisme kerja

Kekurangan :
penjelasan patomekanisme dihubungkan dengan FR yang disebutkan, kurang lengkap
mekanisme kerja obat kurang lengkap

Masukan:',
                'is_sent' => 1,
                'created_at' => '2025-11-04 04:22:38',
                'updated_at' => '2025-11-04 05:20:09',
            ),
            151 => 
            array (
                'id' => 152,
                'oujian_id' => 5,
                'station_id' => 43,
                'peserta_id' => 137,
                'qrpeserta' => '253b9838c62350a5e3fa998589219dcd',
                'nama' => 'Risa Naziziyah',
                'npm' => '123170148',
                'feedback' => 'Kelebihan :

Kekurangan :
penjelasan tugas 2 masih belum lengkap dan tepat

Masukan:
banyak belajar lagi ya.. baca dan semangat selalu',
                'is_sent' => 1,
                'created_at' => '2025-11-04 04:23:29',
                'updated_at' => '2025-11-04 05:20:09',
            ),
            152 => 
            array (
                'id' => 153,
                'oujian_id' => 5,
                'station_id' => 34,
                'peserta_id' => 43,
                'qrpeserta' => '69628c7f35c23b1e6f9fe9281a2ac92f',
                'nama' => 'Mauliano Hastien',
                'npm' => '123170087',
                'feedback' => 'Kelebihan : tugas 1 dan 2 sudah baik di jawab

Kekurangan :

Masukan:',
                'is_sent' => 1,
                'created_at' => '2025-11-04 04:23:33',
                'updated_at' => '2025-11-04 05:20:09',
            ),
            153 => 
            array (
                'id' => 154,
                'oujian_id' => 5,
                'station_id' => 45,
                'peserta_id' => 158,
                'qrpeserta' => '9a2b63e6d4c04fe350ff8cceb8ba0003',
                'nama' => 'Sabrina Aulia Pramesti',
                'npm' => '123170156',
                'feedback' => 'Kelebihan :

Kekurangan :
ngeblank?
Masukan:',
                'is_sent' => 1,
                'created_at' => '2025-11-04 04:23:53',
                'updated_at' => '2025-11-04 05:20:09',
            ),
            154 => 
            array (
                'id' => 155,
                'oujian_id' => 5,
                'station_id' => 47,
                'peserta_id' => 179,
                'qrpeserta' => 'a8dba5ad6ebf5e4f89abaa67802295f1',
                'nama' => 'Sefi Eka Putri',
                'npm' => '123170162',
                'feedback' => 'Kelebihan :
- Mampu menjelaskan patomekanisme diagnosis kerja dari faktor resiko 
- Patomekanisme mudah lapar, mudah lelah, dikaitkan dgn Faktor Resiko: Pola Makan, Aktivitas, obesitas
- Menentukan tatalaksana farmakologi gol sulfonilurea

Kekurangan :
- Patomekanisme tidak lengkap, belum muncul resistensi insulin
- Tatalaksana obat gol statin (??), sulfonilurea tidak disebutkan metformin namun sediaan dan dosis tidak benar
- Mekanisme kerja obat metformin disebutkan hanya 1

Masukan:
- Pelajari kembali terkait patomekanisme dr penyakit tersebut
- Pelajari tatalaksana farmakologi dari nama obat, sediaan, dosis dan cara kerja',
                'is_sent' => 1,
                'created_at' => '2025-11-04 04:23:56',
                'updated_at' => '2025-11-04 05:20:09',
            ),
            155 => 
            array (
                'id' => 156,
                'oujian_id' => 5,
                'station_id' => 48,
                'peserta_id' => 190,
                'qrpeserta' => 'a2470f2e3741691e7af897243ef8547f',
                'nama' => 'Riyardi Jaya Bimantoro',
                'npm' => '123170152',
                'feedback' => 'Kelebihan :
Tugas 1:
cukup
Tugas 2:
cukup

Kekurangan :
Tugas 1:
patomekanisme kurang lengkap

Tugas 2:
kurang 1 mekanisme lagi


Masukan:
belajar lagi yaa!',
                'is_sent' => 1,
                'created_at' => '2025-11-04 04:24:14',
                'updated_at' => '2025-11-04 05:20:09',
            ),
            156 => 
            array (
                'id' => 157,
                'oujian_id' => 5,
                'station_id' => 39,
                'peserta_id' => 95,
                'qrpeserta' => 'b0206601eea24a87abfa960f9a9988d2',
                'nama' => 'Yuda Nugraha',
                'npm' => '122170194',
                'feedback' => 'Kelebihan:
sudah menjawab FR dan patomekanisme lengkap
sudah menjawab terapi dan mekanisme

Kekurangan:
perlu dipancing beberapa pertanyaan spesifik namun dapat menjawab dan menjelaskan dengan lengkap
tidak ingat dosis dan sediaan obat, tidak memahami mekanisme kerja obat secara detail

Saran:
pelajari dan perbaiki yang masih kurang',
                'is_sent' => 1,
                'created_at' => '2025-11-04 04:24:37',
                'updated_at' => '2025-11-04 05:20:09',
            ),
            157 => 
            array (
                'id' => 158,
                'oujian_id' => 5,
                'station_id' => 34,
                'peserta_id' => 33,
                'qrpeserta' => 'c2044ec88f198aeedba08bfd6bd47627',
                'nama' => 'Syifa Siti Nurjanah',
                'npm' => '122170174',
                'feedback' => 'Kelebihan :

Kekurangan :

Masukan:',
                'is_sent' => 0,
                'created_at' => '2025-11-05 01:50:17',
                'updated_at' => '2025-11-05 01:50:17',
            ),
            158 => 
            array (
                'id' => 159,
                'oujian_id' => 5,
                'station_id' => 34,
                'peserta_id' => 34,
                'qrpeserta' => '651369b1f2c0c3f352dc119ac325df5c',
                'nama' => 'Bintang Pamungkas',
                'npm' => '122170032',
                'feedback' => 'Kelebihan :

Kekurangan :

Masukan:',
                'is_sent' => 0,
                'created_at' => '2025-11-05 01:52:07',
                'updated_at' => '2025-11-05 01:52:07',
            ),
            159 => 
            array (
                'id' => 160,
                'oujian_id' => 5,
                'station_id' => 34,
                'peserta_id' => 38,
                'qrpeserta' => 'dbaecbffe990e40c62f81985d7b2070e',
                'nama' => 'Muhammaad Pasha Ibrahim',
                'npm' => '123170099',
                'feedback' => 'Kelebihan :

Kekurangan :

Masukan:',
                'is_sent' => 0,
                'created_at' => '2025-12-02 04:41:42',
                'updated_at' => '2025-12-02 04:41:42',
            ),
            160 => 
            array (
                'id' => 161,
                'oujian_id' => 5,
                'station_id' => 34,
                'peserta_id' => 35,
                'qrpeserta' => '8cef02c8aa47382b4e97efb535968952',
                'nama' => 'Akbar Wicaksono',
                'npm' => '123170007',
                'feedback' => 'Kelebihan :

Kekurangan :

Masukan:',
                'is_sent' => 0,
                'created_at' => '2025-12-02 04:51:15',
                'updated_at' => '2025-12-02 04:51:15',
            ),
            161 => 
            array (
                'id' => 162,
                'oujian_id' => 5,
                'station_id' => 34,
                'peserta_id' => 36,
                'qrpeserta' => '15e9a0e1b3869f89c2c34137d5899053',
                'nama' => 'Annisa Azahra Tazkia',
                'npm' => '123170021',
                'feedback' => 'Kelebihan :

Kekurangan :

Masukan:',
                'is_sent' => 0,
                'created_at' => '2025-12-02 04:55:38',
                'updated_at' => '2025-12-02 04:55:38',
            ),
            162 => 
            array (
                'id' => 163,
                'oujian_id' => 5,
                'station_id' => 34,
                'peserta_id' => 37,
                'qrpeserta' => 'f1045e2b02c5dba8597e6f2ab9b38154',
                'nama' => 'Ariza Adhwa Azzikra',
                'npm' => '123170023',
                'feedback' => 'Kelebihan :

Kekurangan :

Masukan:',
                'is_sent' => 0,
                'created_at' => '2025-12-02 05:18:00',
                'updated_at' => '2025-12-02 05:18:00',
            ),
            163 => 
            array (
                'id' => 164,
                'oujian_id' => 5,
                'station_id' => 34,
                'peserta_id' => 39,
                'qrpeserta' => '2b1908565b790b38196c9e3f7dd925cc',
                'nama' => 'Syaima Najiha Kurniawati',
                'npm' => '123170171',
                'feedback' => 'Kelebihan :

Kekurangan :

Masukan:',
                'is_sent' => 0,
                'created_at' => '2025-12-02 05:21:10',
                'updated_at' => '2025-12-02 05:21:10',
            ),
            164 => 
            array (
                'id' => 165,
                'oujian_id' => 5,
                'station_id' => 34,
                'peserta_id' => 40,
                'qrpeserta' => '6f44da1fcfba4e3e666a0744545dfccc',
                'nama' => 'Syifa Tiara Putri Syalsabila',
                'npm' => '123170175',
                'feedback' => 'Kelebihan :

Kekurangan :

Masukan:',
                'is_sent' => 0,
                'created_at' => '2025-12-02 05:37:57',
                'updated_at' => '2025-12-02 05:37:57',
            ),
            165 => 
            array (
                'id' => 166,
                'oujian_id' => 5,
                'station_id' => 34,
                'peserta_id' => 42,
                'qrpeserta' => '167091088e48ff175762e8eb22f51852',
                'nama' => 'Karissa Elvina Suhaedi',
                'npm' => '123170075',
                'feedback' => 'Kelebihan :

Kekurangan :

Masukan:',
                'is_sent' => 0,
                'created_at' => '2025-12-02 05:40:53',
                'updated_at' => '2025-12-02 05:40:53',
            ),
            166 => 
            array (
                'id' => 167,
                'oujian_id' => 5,
                'station_id' => 34,
                'peserta_id' => 43,
                'qrpeserta' => '69628c7f35c23b1e6f9fe9281a2ac92f',
                'nama' => 'Mauliano Hastien',
                'npm' => '123170087',
                'feedback' => 'Kelebihan :

Kekurangan :

Masukan:',
                'is_sent' => 0,
                'created_at' => '2025-12-02 05:41:33',
                'updated_at' => '2025-12-02 05:41:33',
            ),
            167 => 
            array (
                'id' => 168,
                'oujian_id' => 5,
                'station_id' => 35,
                'peserta_id' => 44,
                'qrpeserta' => '60bbf49de5d7b05fff9f70f184db23fe',
                'nama' => 'Hammett Kahfi Fergie Rajiv Afghani',
                'npm' => '122170076',
                'feedback' => 'Kelebihan :

Kekurangan :

Masukan:',
                'is_sent' => 0,
                'created_at' => '2025-12-02 06:02:20',
                'updated_at' => '2025-12-02 06:02:20',
            ),
            168 => 
            array (
                'id' => 169,
                'oujian_id' => 5,
                'station_id' => 35,
                'peserta_id' => 44,
                'qrpeserta' => '60bbf49de5d7b05fff9f70f184db23fe',
                'nama' => 'Hammett Kahfi Fergie Rajiv Afghani',
                'npm' => '122170076',
                'feedback' => 'Kelebihan :

Kekurangan :

Masukan:',
                'is_sent' => 0,
                'created_at' => '2025-12-02 06:10:32',
                'updated_at' => '2025-12-02 06:10:32',
            ),
            169 => 
            array (
                'id' => 170,
                'oujian_id' => 5,
                'station_id' => 35,
                'peserta_id' => 45,
                'qrpeserta' => 'dbf0ddb8dfb3f013fc1649fba976cee3',
                'nama' => 'Adella Putri Mirela',
                'npm' => '123170001',
                'feedback' => 'Kelebihan :

Kekurangan :

Masukan:',
                'is_sent' => 0,
                'created_at' => '2025-12-02 06:10:59',
                'updated_at' => '2025-12-02 06:10:59',
            ),
        ));
        
        
    }
}