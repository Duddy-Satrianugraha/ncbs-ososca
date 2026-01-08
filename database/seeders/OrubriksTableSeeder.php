<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class OrubriksTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('orubriks')->delete();
        
        \DB::table('orubriks')->insert(array (
            0 => 
            array (
                'id' => 1,
                'otemplate_id' => 1,
                'urutan' => 1,
                'name' => 'Penjelasan pathogenesis dan manifestasi klinis yang muncul',
                'Nilai_0' => '<p>Mahasiswa tidak mampu<br>menjelaskan pathogenesis penyakit<br>dan manifestasi klinis yang muncul.</p>',
            'Nilai_1' => '<p>Mahasiswa menjelaskan pathogenesis<br>penyakit dan manifestasi klinis yang<br>muncul dengan tepat</p><ol><li>Lalat simulium (mengandung<br>mikrofilaria)<br></li><li>Larva stadium 3 masuk<br>kedalam jaringa kulit<br></li><li>Cacing betina berada di bawah<br>kulit dan menghasilkan<br>mikrofilaria<br></li><li>Menyebar ke kulit dan mata<br></li><li>Manifestasi klinis (1-2)</li></ol>',
            'Nilai_2' => '<p>Mahasiswa mampu menjelaskan<br>pathogenesis penyakit dan manifestasi<br>klinis yang muncul dengan tepat</p><ol><li>Lalat simulium (mengandung<br>mikrofilaria)<br></li><li>Larva stadium 3 masuk<br>kedalam jaringa kulit<br></li><li>Cacing betina berada di bawah<br>kulit dan menghasilkan<br>mikrofilaria<br></li><li>Menyebar ke kulit dan mata<br></li><li>Manifestasi klinis (3-4)</li></ol>',
            'Nilai_3' => '<p>Mahasiswa mampu menjelaskan<br>pathogenesis penyakit dan manifestasi<br>klinis yang muncul dengan tepat dan<br>lengkap</p><ol><li>Lalat simulium (mengandung<br>mikrofilaria)<br></li><li>Larva stadium 3 masuk<br>kedalam jaringa kulit<br></li><li>Cacing betina berada di bawah<br>kulit dan menghasilkan<br>mikrofilaria<br></li><li>Menyebar ke kulit dan mata<br></li><li>Manifestasi klinis (1-2)</li></ol><ul><li><ul><li>Hilangnya kejernihan kornea<br></li><li>Kehilangan pigmen kulit<br>(kulit macan tutul)<br></li><li>Pembesaran KGB</li><li> Eosinophilia<br></li><li>Leukositosis</li></ul></li></ul>',
                'aktif0' => 1,
                'aktif1' => 1,
                'aktif2' => 1,
                'aktif3' => 1,
                'bobot' => 1,
                'created_at' => '2025-08-15 03:57:01',
                'updated_at' => '2025-08-15 06:54:33',
            ),
            1 => 
            array (
                'id' => 2,
                'otemplate_id' => 1,
                'urutan' => 2,
                'name' => 'Penjelasan hubungan trias epidemiologi yang sesuai',
                'Nilai_0' => '<p>Mahasiswa tidak mampu<br>menjelaskan hubungan trias<br>epidemiologi</p>',
                'Nilai_1' => '<p>Mahasiswa mampu menjelaskan<br>hubungan 1 komponen trias<br>epidemiologi dengan tepat</p>',
                'Nilai_2' => '<p>Mahasiswa mampu menjelaskan<br>hubungan 2 komponen trias<br>epidemiologi dengan tepat</p>',
                'Nilai_3' => '<p>Mahasiswa mampu menjelaskan hubungan<br>3 komponen trias epidemiologi dengan<br>tepat dan lengkap.</p><ul><li>Faktor Agent</li><li>Faktor Host</li><li>Faktor Lingkungan</li></ul>',
                'aktif0' => 1,
                'aktif1' => 1,
                'aktif2' => 1,
                'aktif3' => 1,
                'bobot' => 1,
                'created_at' => '2025-08-15 03:57:01',
                'updated_at' => '2025-08-15 06:54:33',
            ),
            2 => 
            array (
                'id' => 3,
                'otemplate_id' => 7,
                'urutan' => 1,
                'name' => 'Penjelasan pathogenesis dan manifestasi klinis yang muncul',
                'Nilai_0' => '<p>Mahasiswa tidak mampu<br>menjelaskan pathogenesis penyakit<br>dan manifestasi klinis yang muncul.</p>',
            'Nilai_1' => '<p>Mahasiswa menjelaskan pathogenesis<br>penyakit dan manifestasi klinis yang<br>muncul dengan tepat</p><ol><li>Lalat simulium (mengandung<br>mikrofilaria)<br></li><li>Larva stadium 3 masuk<br>kedalam jaringa kulit<br></li><li>Cacing betina berada di bawah<br>kulit dan menghasilkan<br>mikrofilaria<br></li><li>Menyebar ke kulit dan mata<br></li><li>Manifestasi klinis (1-2)</li></ol>',
            'Nilai_2' => '<p>Mahasiswa mampu menjelaskan<br>pathogenesis penyakit dan manifestasi<br>klinis yang muncul dengan tepat</p><ol><li>Lalat simulium (mengandung<br>mikrofilaria)<br></li><li>Larva stadium 3 masuk<br>kedalam jaringa kulit<br></li><li>Cacing betina berada di bawah<br>kulit dan menghasilkan<br>mikrofilaria<br></li><li>Menyebar ke kulit dan mata<br></li><li>Manifestasi klinis (3-4)</li></ol>',
            'Nilai_3' => '<p>Mahasiswa mampu menjelaskan<br>pathogenesis penyakit dan manifestasi<br>klinis yang muncul dengan tepat dan<br>lengkap</p><ol><li>Lalat simulium (mengandung<br>mikrofilaria)<br></li><li>Larva stadium 3 masuk<br>kedalam jaringa kulit<br></li><li>Cacing betina berada di bawah<br>kulit dan menghasilkan<br>mikrofilaria<br></li><li>Menyebar ke kulit dan mata<br></li><li>Manifestasi klinis (1-2)</li></ol><ul><li><ul><li>Hilangnya kejernihan kornea<br></li><li>Kehilangan pigmen kulit<br>(kulit macan tutul)<br></li><li>Pembesaran KGB</li><li> Eosinophilia<br></li><li>Leukositosis</li></ul></li></ul>',
                'aktif0' => 1,
                'aktif1' => 1,
                'aktif2' => 1,
                'aktif3' => 1,
                'bobot' => 1,
                'created_at' => '2025-08-27 03:14:53',
                'updated_at' => '2025-08-27 03:14:53',
            ),
            3 => 
            array (
                'id' => 4,
                'otemplate_id' => 7,
                'urutan' => 2,
                'name' => 'Penjelasan hubungan trias epidemiologi yang sesuai',
                'Nilai_0' => '<p>Mahasiswa tidak mampu<br>menjelaskan hubungan trias<br>epidemiologi</p>',
                'Nilai_1' => '<p>Mahasiswa mampu menjelaskan<br>hubungan 1 komponen trias<br>epidemiologi dengan tepat</p>',
                'Nilai_2' => '<p>Mahasiswa mampu menjelaskan<br>hubungan 2 komponen trias<br>epidemiologi dengan tepat</p>',
                'Nilai_3' => '<p>Mahasiswa mampu menjelaskan hubungan<br>3 komponen trias epidemiologi dengan<br>tepat dan lengkap.</p><ul><li>Faktor Agent</li><li>Faktor Host</li><li>Faktor Lingkungan</li></ul>',
                'aktif0' => 1,
                'aktif1' => 1,
                'aktif2' => 1,
                'aktif3' => 1,
                'bobot' => 1,
                'created_at' => '2025-08-27 03:14:53',
                'updated_at' => '2025-08-27 03:14:53',
            ),
            4 => 
            array (
                'id' => 5,
                'otemplate_id' => 8,
                'urutan' => 1,
                'name' => 'Penjelasan pathogenesis dan manifestasi klinis yang muncul',
                'Nilai_0' => '<p>Mahasiswa tidak mampu<br>menjelaskan pathogenesis penyakit<br>dan manifestasi klinis yang muncul.</p>',
            'Nilai_1' => '<p>Mahasiswa menjelaskan pathogenesis<br>penyakit dan manifestasi klinis yang<br>muncul dengan tepat</p><ol><li>Lalat simulium (mengandung<br>mikrofilaria)<br></li><li>Larva stadium 3 masuk<br>kedalam jaringa kulit<br></li><li>Cacing betina berada di bawah<br>kulit dan menghasilkan<br>mikrofilaria<br></li><li>Menyebar ke kulit dan mata<br></li><li>Manifestasi klinis (1-2)</li></ol>',
            'Nilai_2' => '<p>Mahasiswa mampu menjelaskan<br>pathogenesis penyakit dan manifestasi<br>klinis yang muncul dengan tepat</p><ol><li>Lalat simulium (mengandung<br>mikrofilaria)<br></li><li>Larva stadium 3 masuk<br>kedalam jaringa kulit<br></li><li>Cacing betina berada di bawah<br>kulit dan menghasilkan<br>mikrofilaria<br></li><li>Menyebar ke kulit dan mata<br></li><li>Manifestasi klinis (3-4)</li></ol>',
            'Nilai_3' => '<p>Mahasiswa mampu menjelaskan<br>pathogenesis penyakit dan manifestasi<br>klinis yang muncul dengan tepat dan<br>lengkap</p><ol><li>Lalat simulium (mengandung<br>mikrofilaria)<br></li><li>Larva stadium 3 masuk<br>kedalam jaringa kulit<br></li><li>Cacing betina berada di bawah<br>kulit dan menghasilkan<br>mikrofilaria<br></li><li>Menyebar ke kulit dan mata<br></li><li>Manifestasi klinis (1-2)</li></ol><ul><li><ul><li>Hilangnya kejernihan kornea<br></li><li>Kehilangan pigmen kulit<br>(kulit macan tutul)<br></li><li>Pembesaran KGB</li><li> Eosinophilia<br></li><li>Leukositosis</li></ul></li></ul>',
                'aktif0' => 1,
                'aktif1' => 1,
                'aktif2' => 1,
                'aktif3' => 1,
                'bobot' => 1,
                'created_at' => '2025-08-27 03:15:13',
                'updated_at' => '2025-08-27 03:15:13',
            ),
            5 => 
            array (
                'id' => 6,
                'otemplate_id' => 8,
                'urutan' => 2,
                'name' => 'Penjelasan hubungan trias epidemiologi yang sesuai',
                'Nilai_0' => '<p>Mahasiswa tidak mampu<br>menjelaskan hubungan trias<br>epidemiologi</p>',
                'Nilai_1' => '<p>Mahasiswa mampu menjelaskan<br>hubungan 1 komponen trias<br>epidemiologi dengan tepat</p>',
                'Nilai_2' => '<p>Mahasiswa mampu menjelaskan<br>hubungan 2 komponen trias<br>epidemiologi dengan tepat</p>',
                'Nilai_3' => '<p>Mahasiswa mampu menjelaskan hubungan<br>3 komponen trias epidemiologi dengan<br>tepat dan lengkap.</p><ul><li>Faktor Agent</li><li>Faktor Host</li><li>Faktor Lingkungan</li></ul>',
                'aktif0' => 1,
                'aktif1' => 1,
                'aktif2' => 1,
                'aktif3' => 1,
                'bobot' => 1,
                'created_at' => '2025-08-27 03:15:13',
                'updated_at' => '2025-08-27 03:15:13',
            ),
            6 => 
            array (
                'id' => 7,
                'otemplate_id' => 9,
                'urutan' => 1,
                'name' => 'Penjelasan pathogenesis dan manifestasi klinis yang muncul',
                'Nilai_0' => '<p>Mahasiswa tidak mampu<br>menjelaskan pathogenesis penyakit<br>dan manifestasi klinis yang muncul.</p>',
            'Nilai_1' => '<p>Mahasiswa menjelaskan pathogenesis<br>penyakit dan manifestasi klinis yang<br>muncul dengan tepat</p><ol><li>Lalat simulium (mengandung<br>mikrofilaria)<br></li><li>Larva stadium 3 masuk<br>kedalam jaringa kulit<br></li><li>Cacing betina berada di bawah<br>kulit dan menghasilkan<br>mikrofilaria<br></li><li>Menyebar ke kulit dan mata<br></li><li>Manifestasi klinis (1-2)</li></ol>',
            'Nilai_2' => '<p>Mahasiswa mampu menjelaskan<br>pathogenesis penyakit dan manifestasi<br>klinis yang muncul dengan tepat</p><ol><li>Lalat simulium (mengandung<br>mikrofilaria)<br></li><li>Larva stadium 3 masuk<br>kedalam jaringa kulit<br></li><li>Cacing betina berada di bawah<br>kulit dan menghasilkan<br>mikrofilaria<br></li><li>Menyebar ke kulit dan mata<br></li><li>Manifestasi klinis (3-4)</li></ol>',
            'Nilai_3' => '<p>Mahasiswa mampu menjelaskan<br>pathogenesis penyakit dan manifestasi<br>klinis yang muncul dengan tepat dan<br>lengkap</p><ol><li>Lalat simulium (mengandung<br>mikrofilaria)<br></li><li>Larva stadium 3 masuk<br>kedalam jaringa kulit<br></li><li>Cacing betina berada di bawah<br>kulit dan menghasilkan<br>mikrofilaria<br></li><li>Menyebar ke kulit dan mata<br></li><li>Manifestasi klinis (1-2)</li></ol><ul><li><ul><li>Hilangnya kejernihan kornea<br></li><li>Kehilangan pigmen kulit<br>(kulit macan tutul)<br></li><li>Pembesaran KGB</li><li> Eosinophilia<br></li><li>Leukositosis</li></ul></li></ul>',
                'aktif0' => 1,
                'aktif1' => 1,
                'aktif2' => 1,
                'aktif3' => 1,
                'bobot' => 1,
                'created_at' => '2025-08-27 03:15:33',
                'updated_at' => '2025-08-27 03:15:33',
            ),
            7 => 
            array (
                'id' => 8,
                'otemplate_id' => 9,
                'urutan' => 2,
                'name' => 'Penjelasan hubungan trias epidemiologi yang sesuai',
                'Nilai_0' => '<p>Mahasiswa tidak mampu<br>menjelaskan hubungan trias<br>epidemiologi</p>',
                'Nilai_1' => '<p>Mahasiswa mampu menjelaskan<br>hubungan 1 komponen trias<br>epidemiologi dengan tepat</p>',
                'Nilai_2' => '<p>Mahasiswa mampu menjelaskan<br>hubungan 2 komponen trias<br>epidemiologi dengan tepat</p>',
                'Nilai_3' => '<p>Mahasiswa mampu menjelaskan hubungan<br>3 komponen trias epidemiologi dengan<br>tepat dan lengkap.</p><ul><li>Faktor Agent</li><li>Faktor Host</li><li>Faktor Lingkungan</li></ul>',
                'aktif0' => 1,
                'aktif1' => 1,
                'aktif2' => 1,
                'aktif3' => 1,
                'bobot' => 1,
                'created_at' => '2025-08-27 03:15:33',
                'updated_at' => '2025-08-27 03:15:33',
            ),
            8 => 
            array (
                'id' => 9,
                'otemplate_id' => 10,
                'urutan' => 1,
                'name' => 'Penjelasan pathogenesis dan manifestasi klinis yang muncul',
                'Nilai_0' => '<p>Mahasiswa tidak mampu<br>menjelaskan pathogenesis penyakit<br>dan manifestasi klinis yang muncul.</p>',
            'Nilai_1' => '<p>Mahasiswa menjelaskan pathogenesis<br>penyakit dan manifestasi klinis yang<br>muncul dengan tepat</p><ol><li>Lalat simulium (mengandung<br>mikrofilaria)<br></li><li>Larva stadium 3 masuk<br>kedalam jaringa kulit<br></li><li>Cacing betina berada di bawah<br>kulit dan menghasilkan<br>mikrofilaria<br></li><li>Menyebar ke kulit dan mata<br></li><li>Manifestasi klinis (1-2)</li></ol>',
            'Nilai_2' => '<p>Mahasiswa mampu menjelaskan<br>pathogenesis penyakit dan manifestasi<br>klinis yang muncul dengan tepat</p><ol><li>Lalat simulium (mengandung<br>mikrofilaria)<br></li><li>Larva stadium 3 masuk<br>kedalam jaringa kulit<br></li><li>Cacing betina berada di bawah<br>kulit dan menghasilkan<br>mikrofilaria<br></li><li>Menyebar ke kulit dan mata<br></li><li>Manifestasi klinis (3-4)</li></ol>',
            'Nilai_3' => '<p>Mahasiswa mampu menjelaskan<br>pathogenesis penyakit dan manifestasi<br>klinis yang muncul dengan tepat dan<br>lengkap</p><ol><li>Lalat simulium (mengandung<br>mikrofilaria)<br></li><li>Larva stadium 3 masuk<br>kedalam jaringa kulit<br></li><li>Cacing betina berada di bawah<br>kulit dan menghasilkan<br>mikrofilaria<br></li><li>Menyebar ke kulit dan mata<br></li><li>Manifestasi klinis (1-2)</li></ol><ul><li><ul><li>Hilangnya kejernihan kornea<br></li><li>Kehilangan pigmen kulit<br>(kulit macan tutul)<br></li><li>Pembesaran KGB</li><li> Eosinophilia<br></li><li>Leukositosis</li></ul></li></ul>',
                'aktif0' => 1,
                'aktif1' => 1,
                'aktif2' => 1,
                'aktif3' => 1,
                'bobot' => 1,
                'created_at' => '2025-08-27 03:15:39',
                'updated_at' => '2025-08-27 03:15:39',
            ),
            9 => 
            array (
                'id' => 10,
                'otemplate_id' => 10,
                'urutan' => 2,
                'name' => 'Penjelasan hubungan trias epidemiologi yang sesuai',
                'Nilai_0' => '<p>Mahasiswa tidak mampu<br>menjelaskan hubungan trias<br>epidemiologi</p>',
                'Nilai_1' => '<p>Mahasiswa mampu menjelaskan<br>hubungan 1 komponen trias<br>epidemiologi dengan tepat</p>',
                'Nilai_2' => '<p>Mahasiswa mampu menjelaskan<br>hubungan 2 komponen trias<br>epidemiologi dengan tepat</p>',
                'Nilai_3' => '<p>Mahasiswa mampu menjelaskan hubungan<br>3 komponen trias epidemiologi dengan<br>tepat dan lengkap.</p><ul><li>Faktor Agent</li><li>Faktor Host</li><li>Faktor Lingkungan</li></ul>',
                'aktif0' => 1,
                'aktif1' => 1,
                'aktif2' => 1,
                'aktif3' => 1,
                'bobot' => 1,
                'created_at' => '2025-08-27 03:15:39',
                'updated_at' => '2025-08-27 03:15:39',
            ),
            10 => 
            array (
                'id' => 11,
                'otemplate_id' => 11,
                'urutan' => 1,
                'name' => 'Penjelasan pathogenesis dan manifestasi klinis yang muncul',
                'Nilai_0' => '<p>Mahasiswa tidak mampu<br>menjelaskan pathogenesis penyakit<br>dan manifestasi klinis yang muncul.</p>',
            'Nilai_1' => '<p>Mahasiswa menjelaskan pathogenesis<br>penyakit dan manifestasi klinis yang<br>muncul dengan tepat</p><ol><li>Lalat simulium (mengandung<br>mikrofilaria)<br></li><li>Larva stadium 3 masuk<br>kedalam jaringa kulit<br></li><li>Cacing betina berada di bawah<br>kulit dan menghasilkan<br>mikrofilaria<br></li><li>Menyebar ke kulit dan mata<br></li><li>Manifestasi klinis (1-2)</li></ol>',
            'Nilai_2' => '<p>Mahasiswa mampu menjelaskan<br>pathogenesis penyakit dan manifestasi<br>klinis yang muncul dengan tepat</p><ol><li>Lalat simulium (mengandung<br>mikrofilaria)<br></li><li>Larva stadium 3 masuk<br>kedalam jaringa kulit<br></li><li>Cacing betina berada di bawah<br>kulit dan menghasilkan<br>mikrofilaria<br></li><li>Menyebar ke kulit dan mata<br></li><li>Manifestasi klinis (3-4)</li></ol>',
            'Nilai_3' => '<p>Mahasiswa mampu menjelaskan<br>pathogenesis penyakit dan manifestasi<br>klinis yang muncul dengan tepat dan<br>lengkap</p><ol><li>Lalat simulium (mengandung<br>mikrofilaria)<br></li><li>Larva stadium 3 masuk<br>kedalam jaringa kulit<br></li><li>Cacing betina berada di bawah<br>kulit dan menghasilkan<br>mikrofilaria<br></li><li>Menyebar ke kulit dan mata<br></li><li>Manifestasi klinis (1-2)</li></ol><ul><li><ul><li>Hilangnya kejernihan kornea<br></li><li>Kehilangan pigmen kulit<br>(kulit macan tutul)<br></li><li>Pembesaran KGB</li><li> Eosinophilia<br></li><li>Leukositosis</li></ul></li></ul>',
                'aktif0' => 1,
                'aktif1' => 1,
                'aktif2' => 1,
                'aktif3' => 1,
                'bobot' => 1,
                'created_at' => '2025-08-27 03:15:47',
                'updated_at' => '2025-08-27 03:15:47',
            ),
            11 => 
            array (
                'id' => 12,
                'otemplate_id' => 11,
                'urutan' => 2,
                'name' => 'Penjelasan hubungan trias epidemiologi yang sesuai',
                'Nilai_0' => '<p>Mahasiswa tidak mampu<br>menjelaskan hubungan trias<br>epidemiologi</p>',
                'Nilai_1' => '<p>Mahasiswa mampu menjelaskan<br>hubungan 1 komponen trias<br>epidemiologi dengan tepat</p>',
                'Nilai_2' => '<p>Mahasiswa mampu menjelaskan<br>hubungan 2 komponen trias<br>epidemiologi dengan tepat</p>',
                'Nilai_3' => '<p>Mahasiswa mampu menjelaskan hubungan<br>3 komponen trias epidemiologi dengan<br>tepat dan lengkap.</p><ul><li>Faktor Agent</li><li>Faktor Host</li><li>Faktor Lingkungan</li></ul>',
                'aktif0' => 1,
                'aktif1' => 1,
                'aktif2' => 1,
                'aktif3' => 1,
                'bobot' => 1,
                'created_at' => '2025-08-27 03:15:47',
                'updated_at' => '2025-08-27 03:15:47',
            ),
            12 => 
            array (
                'id' => 21,
                'otemplate_id' => 15,
                'urutan' => 1,
                'name' => 'Penjelasan Patomekanisme',
                'Nilai_0' => '<p>Mahasiswa tidak  mampu menjelaskan patomekanisme Diagnosis kerja&nbsp;</p>',
                'Nilai_1' => '<p>Mahasiswa mampu menjelaskan secara <b>tepat</b> patomekanisme diagnosis kerja meliputi : 
</p><p><b>A.	Faktor Risiko (salah satu)
</b></p><p><b>B.	Patomekanisme (salah satu)
</b></p><p><br></p>',
                'Nilai_2' => '<p>Mahasiswa mampu menjelaskan secara <b>tepat</b> patomekanisme diagnosis kerja meliputi :
</p><p><b>A.	Faktor Risiko 
</b></p><p>-	Asupan lemak berlebih
</p><p>-	Kurang aktivitas fisik
</p><p><b>B.	Patomekanisme 
</b></p><p>1)	Asupan lemak berlebih 
</p><p>Penyerapan di usus (intake) dan obesitas visceral &gt; peningkatan sintesis VLDL di hepar &gt; LDL sirkulasi meningkat &gt; kolesterol plasma meningkat &gt; menghambat pembentukan HDL
</p><p>2)	Kurangnya aktivitas fisik &gt; aktivitas lipoprotein lipase menurun &gt; HDL menurun, trigliserida meningkat
</p><p><br></p>',
        'Nilai_3' => '<p>Mahasiswa mampu menjelaskan secara<b> tepat dan lengkap</b> patomekanisme diagnosis kerja, meliputi :
</p><p><b>A.	Faktor Risiko
</b></p><p>-	Asupan lemak berlebih
</p><p>-	Kurang aktivitas fisik
</p><p><b>B.	Patomekanisme
</b></p><p>1)	Asupan lemak berlebih 
</p><p>A.	Penyerapan di usus &gt; diangkut sebagai kilomikron ke hepar &gt; peningkatan sintesis VLDL di hepar &gt; LDL di sirkulasi  &gt; kolesterol plasma meningkat &gt; menghambat pembentukan HDL &gt; HDL turun
</p><p>B.	Obesitas visceral &gt; jaringan lemak visceral banyak &gt; FFA meningkat &gt; peningkatan sintesis VLDL di hepar &gt; LDL di sirkulasi  &gt; kolesterol plasma meningkat &gt; menghambat pembentukan HDL &gt; HDL turun
</p><p>2)	Kurangnya aktivitas fisik &gt; aktivitas lipoprotein lipase menurun &gt; HDL menurun, trigliserida meningkat
</p><p><br></p>',
'aktif0' => 1,
'aktif1' => 1,
'aktif2' => 1,
'aktif3' => 1,
'bobot' => 1,
'created_at' => '2025-10-31 02:12:31',
'updated_at' => '2025-10-31 05:33:46',
),
13 => 
array (
'id' => 22,
'otemplate_id' => 15,
'urutan' => 2,
'name' => 'Penentuan Tatalaksana Farmakologi',
'Nilai_0' => '<p>Mahasiswa tidak  mampu menentukan obat yang tepat</p>',
'Nilai_1' => '<p>Mahasiswa mampu menentukan  tatalaksana farmakologi secara <b>tidak lengkap</b>, namun <b>tetap meliputi</b> :
</p><p>
</p><p><b>1.	Jenis obat
</b></p><p><b>2.	Mekanisme kerja obat
</b></p><p><br></p>',
'Nilai_2' => '<p>Mahasiswa mampu menentukan  obat secara <b>tepat</b>, namun <b>tidak lengkap</b> :
</p><p>
</p><p>
</p><p><b>1.	Jenis obat dan dosis
</b></p><p><b>2.	Mekanisme kerja obat
</b></p><p>
</p><p>Penghambatan kompetitif HmGCoA reduktase &gt; penurunan produksi mevalonate 
</p><p>A.	Penurunan sintesis VLDL &gt; Penurunan TG
</p><p>B.	Peningkatan produksi apoA1 &gt; Peningkatan HDL
</p><p>C.	Penurunan konsentrasi kolesterol di hepar &gt; penurunan LDL
</p><p><br></p>',
'Nilai_3' => '<p>Mahasiswa mampu menentukan  tatalaksana farmakologi secara <b>tepat dan lengkap</b>, meliputi indikasi dan dosis, yaitu :</p><p><b>1. Jenis obat dan dosis</b></p><p><b>2. Mekanisme kerja obat</b></p><p>
</p><p>Penghambatan kompetitif HmGCoA reduktase &gt; penurunan produksi mevalonate 
</p><p>A.	Penurunan produksi apolipoprotein B-100 &gt; penurunan sintesis VLDL &gt; Penurunan TG
</p><p>B.	Peningkatan produksi apoA1 &gt; Peningkatan HDL
</p><p>C.	Penurunan kolesterol di hepar &gt; peningkatan ekspresi reseptor LDL di hepar &gt; penurunan LDL
</p><p><br></p>',
'aktif0' => 1,
'aktif1' => 1,
'aktif2' => 1,
'aktif3' => 1,
'bobot' => 1,
'created_at' => '2025-10-31 02:12:31',
'updated_at' => '2025-10-31 05:33:46',
),
14 => 
array (
'id' => 23,
'otemplate_id' => 16,
'urutan' => 1,
'name' => 'Penjelasan Patomekanisme',
'Nilai_0' => '<p>Mahasiswa tidak&nbsp; mampu menjelaskan patomekanisme diagnosis kerja&nbsp;</p>',
'Nilai_1' => 'Mahasiswa mampu menjelaskan patomekanisme diagnosis kerja dari faktor resiko secara tepat namun tidak lengkap<p><br></p>',
'Nilai_2' => 'Mahasiswa mampu menjelaskan patomekanisme diagnosis kerja dari faktor resiko secara tepat namun tidak lengkap&nbsp;<br><br>A.&nbsp; &nbsp; Faktor resiko : Obesitas&nbsp;<br>B.&nbsp; &nbsp; Patomekanisme&nbsp;<br>1.&nbsp; &nbsp; Obesity&nbsp;&nbsp;<br>2.&nbsp; &nbsp; Resisten insulin &gt; lipolysis pada jaringan adiposa &gt;&nbsp; asam lemak bebas ke aliran darah&nbsp;<br>3.&nbsp; &nbsp; Masuknya asam lemak bebas ke liver &gt; sintesis TG dan VLDL meningkat &gt; dislipidemia.&nbsp;<br><br>',
'Nilai_3' => '<p>Mahasiswa mampu menjelaskan secara tepat, lengkap dan sistematis patomekanisme diagnosis kerja dari faktor resiko :<br>A.&nbsp; &nbsp; Faktor Resiko&nbsp;<br>-&nbsp; &nbsp; Usia&nbsp;<br>-&nbsp; &nbsp; Obesitas&nbsp;<br>-&nbsp; &nbsp; Hipertensi&nbsp;<br><br>B.&nbsp; &nbsp; Patomekanisme&nbsp;<br>1.&nbsp; &nbsp; Obesity &gt; Pro Inflammatory TN-a, IL6, NCV1 &gt; adinopektin&nbsp;<br>2.&nbsp; &nbsp; Resisten insulin &gt; lipolysis pada jaringan adiposa &gt; asam lemak bebas ke aliran darah&nbsp;<br>3.&nbsp; &nbsp; Masuknya asam lemak bebas ke liver &gt; sintesis TG dan VLDL meningkat &gt; dislipidemia.&nbsp;<br><br></p>',
'aktif0' => 1,
'aktif1' => 1,
'aktif2' => 1,
'aktif3' => 1,
'bobot' => 1,
'created_at' => '2025-10-31 02:34:23',
'updated_at' => '2025-10-31 02:52:31',
),
15 => 
array (
'id' => 24,
'otemplate_id' => 16,
'urutan' => 2,
'name' => 'Penentuan Tatalaksana Farmakologi',
'Nilai_0' => '<p>Mahasiswa tidak&nbsp; mampu menjelaskan tatalaksana farmakologi</p>',
'Nilai_1' => 'Mahasiswa mampu menentukan tatalaksana farmakologi dengan tepat dan tidak lengkap meliputi :<br>1.&nbsp; &nbsp; Jenis obat<br>2.&nbsp; &nbsp; &nbsp;mekanisme kerja obat<br><br><p><br></p>',
'Nilai_2' => 'Mahasiswa mampu menentukan tatalaksana farmakologi dengan tidak lengkap meliputi:<br><br>A.&nbsp; &nbsp; Jenis obat dan dosis&nbsp;<br>Atorvastatin 1x40mg atau&nbsp;<br>Rosuvastatin 1x20mg&nbsp;<br>B.&nbsp; &nbsp; Mekanisme kerja obat:&nbsp;<br>Penghambatan kompetitif reductase HMG-Coa &gt;<br>1.&nbsp; &nbsp; penurunan sintesis VLDL &gt; penurunan TG&nbsp;&nbsp;<br>2.&nbsp; &nbsp; &nbsp;peningkatan produksi apoA1 &gt; peningkatan HDL<br>3.&nbsp; &nbsp; penurunan konsentrasi kolesterol di hepar &gt;penurunan LDL&nbsp;<br><br>',
'Nilai_3' => 'Mahasiswa mampu menentukan tatalaksana farmakologi dengan tepat dan lengkap meliputi:<br><br>A.&nbsp; &nbsp; Jenis obat dan dosis&nbsp;<br>Atorvastatin 1x40mg atau&nbsp;<br>Rosuvastatin 1x20mg&nbsp;<br>B.&nbsp; &nbsp; Mekanisme kerja obat: Penghambatan kompetitif reductase HMG-Coa &gt; penurunan produksi mevalonate :<br>1.&nbsp; &nbsp; penurunan produksi apolipoprotein B-100 &gt; penurunan sintesis VLDL &gt;penurunan TG&nbsp;&nbsp;<br>2.&nbsp; &nbsp; &nbsp;peningkatan produksi apoA1 &gt; peningkatan HDL&nbsp;<br>3.&nbsp; &nbsp; &nbsp;penurunan konsentrasi kolesterol di hepar &gt; peningkatan ekspresi reseptor LCL di hepar &gt; penurunan LDL&nbsp;',
'aktif0' => 1,
'aktif1' => 1,
'aktif2' => 1,
'aktif3' => 1,
'bobot' => 1,
'created_at' => '2025-10-31 02:34:23',
'updated_at' => '2025-10-31 02:52:31',
),
16 => 
array (
'id' => 25,
'otemplate_id' => 17,
'urutan' => 1,
'name' => 'Penjelasan Patomekanisme',
'Nilai_0' => '<p>Mahasiswa tidak  mampu menjelaskan patomekanisme Diagnosis kerja&nbsp;</p>',
'Nilai_1' => '<p>Mahasiswa mampu menjelaskan patomekanisme diagnosis kerja secara <b>tidak lengkap&nbsp;</b></p>',
'Nilai_2' => '<p>Mahasiswa mampu menjelaskan secara <b>tepat </b>patomekanisme diagnosis kerja meliputi :
</p><p>
</p><p>Dislipidemia &gt; LDL masuk ke pembuluh dinding pembuluh darah &gt; teroksidasi jadi ox-LDL &gt; disfungsi endotel
</p><p>
</p><p>Dan salah satu dari A atau B
</p><p>
</p><p><br></p>',
'Nilai_3' => '<p>Mahasiswa mampu menjelaskan secara <b>tepat dan lengkap</b> patomekanisme diagnosis kerja, meliputi :
</p><p>Dislipidemia &gt; LDL masuk ke pembuluh dinding pembuluh darah &gt; teroksidasi jadi ox-LDL &gt; disfungsi endotel<br></p><p>A.	Aktivasi RAAS &gt; peningkatan volume darah dan tekanan arteri &amp; tahanan perifer vaskuler meningkat &gt; hipertensi 
</p><p>B.	Peningkatan endothelin-1 &amp; ROS &gt; vasokontriksi meningkat &gt; peningkatan angiotensin II &gt; peningkatan aldosteron +retensi NA &amp; H2O &gt; hipertensi
</p><p><br></p>',
'aktif0' => 1,
'aktif1' => 1,
'aktif2' => 1,
'aktif3' => 1,
'bobot' => 1,
'created_at' => '2025-10-31 02:40:04',
'updated_at' => '2025-10-31 04:55:49',
),
17 => 
array (
'id' => 26,
'otemplate_id' => 17,
'urutan' => 2,
'name' => 'Penentuan Tatalaksana Farmakologi',
'Nilai_0' => '<p>Mahasiswa tidak  mampu menentukan tatalaksana farmakologi yang tepat</p>',
'Nilai_1' => '<p>Mahasiswa hanya mampu menentukan <b>salah satu golongan obat saja.
</b></p><p>
</p><p><br></p>',
'Nilai_2' => '<p>Mahasiswa mampu menentukan  tatalaksana farmakologi secara <b>tepat</b>, <b>namun tidak lengkap</b> :
</p><p>
</p><p>1.	Kombinasi golongan obat
</p><p>2.	Mekanisme kerja obat
</p><p>(mekanisme salah satu obat yang tepat)
</p><p><br></p>',
'Nilai_3' => '<p>Mahasiswa mampu menentukan  tatalaksana farmakologi secara <b>tepat dan lengkap</b>, meliputi :
</p><p>
</p><p>1.	Kombinasi golongan obat
</p><p>2.	Mekanisme kerja obat
</p><p><br></p>',
'aktif0' => 1,
'aktif1' => 1,
'aktif2' => 1,
'aktif3' => 1,
'bobot' => 1,
'created_at' => '2025-10-31 02:40:04',
'updated_at' => '2025-10-31 04:55:49',
),
18 => 
array (
'id' => 27,
'otemplate_id' => 18,
'urutan' => 1,
'name' => 'Penjelasan Patomekanisme',
'Nilai_0' => '<p>Mahasiswa tidak&nbsp; mampu menjelaskan patomekanisme Diagnosis kerja&nbsp;</p>',
'Nilai_1' => 'Mahasiswa mampu menjelaskan patomekanisme diagnosis kerja dari faktor resiko secara tepat namun tidak lengkap<br><br>A.&nbsp; &nbsp; Faktor resiko (1poin)<br>B.&nbsp; &nbsp; Mekanisme kerja tidak lengkap&nbsp;<br><br><p><br></p>',
'Nilai_2' => 'Mahasiswa mampu menjelaskan patomekanisme diagnosis kerja dari faktor resiko secara tepat namun tidak lengkap, meliputi :&nbsp;<br><br>A.&nbsp; &nbsp; Faktor Resiko ( 2 poin )&nbsp;<br>B.&nbsp; &nbsp; Mekanisme kerja :<br>1.&nbsp; &nbsp; Pola makan berlebihan, obesitas, kurang aktivitas yang menyebabkan penumpukan lemak viseral&nbsp;<br>2.&nbsp; &nbsp; Peningkatan FFA dan mediator inflamasi  resistensi insulin<br>3.&nbsp; &nbsp; Resistensi insulin dalam jangka waku lama -&gt; defisiensi insulin&nbsp;<br>4.&nbsp; &nbsp; Defisiensi insulin  Hiperglikemia&nbsp;<br><br><br>',
'Nilai_3' => '<p>Mahasiswa mampu menjelaskan secara tepat, lengkap dan sistematis patomekanisme diagnosis kerja dari faktor resiko :<br>A.&nbsp; &nbsp; Faktor Resiko&nbsp;<br>-&nbsp; &nbsp; Obesitas&nbsp;<br>-&nbsp; &nbsp; Pola Makan&nbsp;<br>-&nbsp; &nbsp; Aktivitas&nbsp;<br><br>B.&nbsp; &nbsp; Mekanisme kerja&nbsp;<br>1.&nbsp; &nbsp; Pola makan berlebihan, obesitas, kurang aktivitas yang menyebabkan penumpukan lemak viseral.&nbsp;<br>2.&nbsp; &nbsp; Lemak ini melepaskan adipokin dan asam lemak bebas (FFA) serta mediator inflamasi menjadi resistensi insulin .&nbsp;<br>3.&nbsp; &nbsp; Resistensi insulin dalam jangka waku lama -&gt; defisiensi insulin relative&nbsp;<br>4.&nbsp; &nbsp; Defisiensi insulin relative  Defisit Insulin Absolut  Hiperglikemia&nbsp;<br><br><br></p>',
'aktif0' => 1,
'aktif1' => 1,
'aktif2' => 1,
'aktif3' => 1,
'bobot' => 1,
'created_at' => '2025-10-31 02:55:04',
'updated_at' => '2025-10-31 03:13:45',
),
19 => 
array (
'id' => 28,
'otemplate_id' => 18,
'urutan' => 2,
'name' => 'Penentuan Tatalaksana Farmakologi',
'Nilai_0' => '<p>Mahasiswa tidak&nbsp; mampu menjelaskan tatalaksana farmakologi&nbsp;</p>',
'Nilai_1' => 'Mahasiswa mampu menentukan tatalaksana farmakologi dengan tepat dan tidak lengkap meliputi :<br><br>A.&nbsp; &nbsp; Jenis obat dan dosis&nbsp;<br>Metformin Dosis : 3x500mg&nbsp;<br><br>B.&nbsp; &nbsp; mekanisme kerja obat&nbsp;<br>( 1 poin)<br><br><p><br></p>',
'Nilai_2' => 'Mahasiswa mampu menentukan tatalaksana dengan tepat tetapi tidak lengkap meliputi:<br>A. Jenis obat dan dosis&nbsp;<br>Metformin Dosis : 3x500mg&nbsp;<br>B. mekanisme kerja obat&nbsp;<br>(2 poin)<br><br>',
'Nilai_3' => 'Mahasiswa mampu menentukan tatalaksana farmakologi dengan tepat dan lengkap meliputi:<br>A.&nbsp; Jenis obat dan dosis&nbsp;<br>Metformin Dosis : 3x500mg&nbsp;<br>B.&nbsp; mekanisme kerja obat<br>1.&nbsp; &nbsp; Menghambat produksi glukosa di hati (glukoneogenesis)<br>2.&nbsp; &nbsp; Meningkatkan sensitivitas insulin di jaringan perifer<br>3.&nbsp; &nbsp; Menurunkan penyerapan glukosa di usus<br><br>',
'aktif0' => 1,
'aktif1' => 1,
'aktif2' => 1,
'aktif3' => 1,
'bobot' => 1,
'created_at' => '2025-10-31 02:55:04',
'updated_at' => '2025-10-31 03:13:45',
),
20 => 
array (
'id' => 29,
'otemplate_id' => 19,
'urutan' => 1,
'name' => 'Penentuan Diagnosis',
'Nilai_0' => '<p>Mahasiswa tidak mampu menentukan Diagnosis&nbsp;</p>',
'Nilai_1' => '<p>Mahasiswa hanya mampu menentukan Diagnosis kerja dengan tepat <b>tanpa disertai dasar diagnosis
</b></p><p>
</p><p><b>Diagnosis : Hipotiroid ec GAKY
</b></p><p>
</p><p><br></p>',
'Nilai_2' => '<p>Mahasiswa mampu menentukan Diagnosis kerja yang <b>tepat</b> dengan Dasar diagnosis, meliputi :
</p><p>
</p><p><b>Diagnosis : Hipotiroid ec GAKY
</b></p><p>
</p><p><b>A.	Anamnesis
</b></p><p><b>B.	Pemeriksaan Fisik
</b></p><p><b>C.	Pemeriksaan Penunjang
</b></p><p>-	TSH meningkat
</p><p>-	fT4 menurun
</p><p>-	iodium urin rendah</p>',
'Nilai_3' => '<p>Mahasiswa mampu menentukan diagnosis kerja disertai dengan dasar diagnosis yang <b>tepat</b> <b>dan</b> <b>lengkap</b> meliputi : 
</p><p>
</p><p><b>Diagnosis : Hipotiroid ec GAKY
</b></p><p>
</p><p><b>A.	Anamnesis
</b></p><p style="">-	Benjolan di leher
</p><p style="">-	Mudah lelah
</p><p style="">-	Kulit kering
</p><p style="">-	Tidak tahan dingin
</p><p style="">-	Berat badan bertambah
</p><p><b>B.	Pemeriksaan Fisik
</b></p><p>-	Bradikardi
</p><p>-	Teraba massa difus di leher yang ikut bergerak ketika menelan
</p><p>-	Kulit kering
</p><p><b>C.	Pemeriksaan Penunjang
</b></p><p>-	TSH meningkat
</p><p>-	fT4 menurun
</p><p>-	iodium urin rendah
</p><p>-	EKG : Sinus Bradikardi</p>',
'aktif0' => 1,
'aktif1' => 1,
'aktif2' => 1,
'aktif3' => 1,
'bobot' => 1,
'created_at' => '2025-10-31 02:58:57',
'updated_at' => '2025-10-31 04:58:06',
),
21 => 
array (
'id' => 30,
'otemplate_id' => 19,
'urutan' => 2,
'name' => 'Penjelasan Patomekanisme',
'Nilai_0' => '<p>Mahasiswa tidak  mampu menjelaskan patomekanisme Diagnosis kerja&nbsp;</p>',
'Nilai_1' => '<p>Mahasiswa mampu menjelaskan secara <b>tepat</b> patomekanisme diagnosis kerja dihubungkan dengan:
</p><p><b>A.	Etiologi : Defisiensi iodine
</b></p><p><b>B.	Penurunan sekresi  T4 dan T3 dari kelenjar tiroid
</b></p><p><b>C.	Manifestasi Klinis</b> <b>(1-2 poin)
</b></p><p><br></p>',
'Nilai_2' => '<p>Mahasiswa mampu menjelaskan secara <b>tepat</b> patomekanisme diagnosis kerja dihubungkan dengan:
</p><p><b>A.	Etiologi : Defisiensi iodine
</b></p><p><b>B.	Penurunan sekresi  T4 dan T3 dari kelenjar tiroid
</b></p><p><b>C.	Manifestasi Klinis (3-4 poin)</b></p>',
'Nilai_3' => '<p>Mahasiswa mampu menjelaskan secara <b>tepat</b> <b>dan</b> <b>lengkap</b> patomekanisme diagnosis kerja meliputi :
</p><p><b>A.	Etiologi : Defisiensi iodine
</b></p><p><b>B.	Penurunan sekresi  T4 dan T3 dari kelenjar tiroid
</b></p><p><b>C.	Manifestasi Klinis 
</b></p><p>1)	Benjolan di leher 
</p><p>2)	Penurunan BMR (Mudah lelah, kulit kering, tidak tahan dingin, peningkatan BB)
</p><p>3)	Bradikardi
</p><p>4)	Peningkatan TSH
</p><p>5)	Penurunan fT4
</p><p><br></p>',
'aktif0' => 1,
'aktif1' => 1,
'aktif2' => 1,
'aktif3' => 1,
'bobot' => 1,
'created_at' => '2025-10-31 02:58:57',
'updated_at' => '2025-10-31 04:58:06',
),
22 => 
array (
'id' => 31,
'otemplate_id' => 20,
'urutan' => 1,
'name' => 'Penentuan Diagnosis',
'Nilai_0' => '<p>Mahasiswa tidak mampu menentukan Diagnosis&nbsp;</p>',
'Nilai_1' => '<p>Mahasiswa hanya mampu menentukan Diagnosis kerja dengan tepat tanpa dasar diagnosis</p>',
'Nilai_2' => '<p>Mahasiswa mampu menentukan Diagnosis kerja yang tepat namun Dasar diagnosis tidak lengkap, meliputi :<br>A.&nbsp; &nbsp; Diagnosis kerja yang tepat<br>B.&nbsp; &nbsp; Dasar diagnosis yang tidak lengkap meliputi :&nbsp;<br>1.&nbsp; &nbsp; Anamnesis<br>2.&nbsp; &nbsp; Pemeriksaan Fisik<br>3.&nbsp; &nbsp; Pemeriksaan Penunjang<br>(TSH, FT4, FT3, Pemeriksaan histopatologi)&nbsp;<br><br></p>',
'Nilai_3' => '<p>Mahasiswa mampu menentukan diagnosis kerja disertai dengan dasar diagnosis yang tepat dan lengkap meliputi :&nbsp;<br>A.&nbsp; &nbsp; Diagnosis kerja yang tepat<br>B.&nbsp; &nbsp; Dasar diagnosis yang lengkap&nbsp;<br>meliputi :&nbsp;<br>1.&nbsp; &nbsp; Anamnesis<br>2.&nbsp; &nbsp; Pemeriksaan Fisik<br>3.&nbsp; &nbsp; Pemeriksaan Penunjang<br>(TSH, FT4, FT3, Pemeriksaan histopatologi, USG, Skintigrafi)&nbsp;</p>',
'aktif0' => 1,
'aktif1' => 1,
'aktif2' => 1,
'aktif3' => 1,
'bobot' => 1,
'created_at' => '2025-10-31 03:20:51',
'updated_at' => '2025-10-31 03:34:11',
),
23 => 
array (
'id' => 32,
'otemplate_id' => 20,
'urutan' => 2,
'name' => 'Penjelasan Patomekanisme',
'Nilai_0' => '<p>Mahasiswa tidak&nbsp; mampu menjelaskan patomekanisme Diagnosis kerja&nbsp;</p>',
'Nilai_1' => '<p>Mahasiswa mampu menjelaskan patomekanisme sesuai dengan Diagnosis kerja dengan tepat meliputi salah satu:<br>A.&nbsp; &nbsp; Patomekanisme<br>B.&nbsp; &nbsp; Manifestasi Klinis 1-3<br><br></p>',
'Nilai_2' => '<p>Mahasiswa mampu menjelaskan secara tepat namun tidak lengkap patomekanisme diagnosis kerja dihubungkan dengan:<br>A.&nbsp; &nbsp; Patomekanisme<br>B.&nbsp; &nbsp; Manifestasi Klinis 4-5<br><br></p>',
'Nilai_3' => '<p>Mahasiswa mampu menjelaskan secara tepat dan lengkap patomekanisme diagnosis kerja:&nbsp;<br>A.&nbsp; &nbsp; Patomekanisme :&nbsp;<br>1.&nbsp; &nbsp; mutasi gen reseptor TSH (TSHR)<br>2.&nbsp; &nbsp; Sel folikuler tiroid menjadi hiperaktif dan proliferatif secara otonom<br>3.&nbsp; &nbsp; Umpan balik negatif ke hipofisis → penurunan TSH.<br>4.&nbsp; &nbsp; Penurunan TSH menyebabkan jaringan tiroid normal di sekitarnya menjadi inaktif, tapi nodul tetap aktif (“hot nodule”).<br><br>B.&nbsp; &nbsp; Manifestasi Klinis<br>1.&nbsp; &nbsp; Takikardi<br>2.&nbsp; &nbsp; Berat badan turun<br>3.&nbsp; &nbsp; Intoleransi panas<br>4.&nbsp; &nbsp; Berkeringat berlebihan<br>5.&nbsp; &nbsp; Palpitasi&nbsp;<br>6.&nbsp; &nbsp; Tremor&nbsp;<br><br></p>',
'aktif0' => 1,
'aktif1' => 1,
'aktif2' => 1,
'aktif3' => 1,
'bobot' => 1,
'created_at' => '2025-10-31 03:20:51',
'updated_at' => '2025-10-31 03:34:11',
),
24 => 
array (
'id' => 33,
'otemplate_id' => 21,
'urutan' => 1,
'name' => 'Penentuan DIagnosis',
'Nilai_0' => '<p>Mahasiswa tidak mampu menentukan Diagnosis&nbsp;</p>',
'Nilai_1' => '<p>Mahasiswa hanya mampu menentukan Diagnosis kerja dengan tepat <b>tanpa disertai dasar diagnosis.
</b></p><p>
</p><p><b>Diagnosis : Anemia hemolitik ec malarial infection
</b></p><p><b><br></b></p><p><b>Atau</b> anemia hemolitik saja
</p><p>
</p><p><br></p>',
'Nilai_2' => '<p>Mahasiswa mampu menentukan Diagnosis kerja yang <b>tepat</b> dengan Dasar diagnosis, meliputi :
</p><p><b>Diagnosis : Anemia hemolitik ec malarial infection
</b></p><p><b>A.	Anamnesis 
</b></p><p><b>B.	Pemeriksaan Fisik
</b></p><p>1.	Sklera dan kulit ikterik
</p><p>2.	Hepatosplenomegali
</p><p><b>C.	Pemeriksaan Penunjang 
</b></p><p>1.	Anemia normositik normokrom 
</p><p>2.	Peningkatan bilirubin indirek (prehepatik).
</p><p>3.	Urinalisis tampak urin gelap, hemoglobinuria +
</p><p>4.	ADT tampak tropozoit muda berbentuk cincin tipis dan gametosit berbentuk sabit.
</p><p><br></p>',
'Nilai_3' => '<p>Mahasiswa mampu menentukan diagnosis kerja disertai dengan dasar diagnosis yang <b>tepat</b> <b>dan</b> <b>lengkap</b> meliputi : 
</p><p><b>Diagnosis : Anemia hemolitik ec malarial infection
</b></p><p><b>A.	Anamnesis
</b></p><p>1.	Lemas, pucat yang merupakan gejala klinis anemia. 
</p><p>2.	Demam naik turun, diawali menggigil, lalu berkeringat setelah demam turun  trias malaria
</p><p>3.	Urin gelap pekat seperti air teh
</p><p><b>B.	Pemeriksaan fisik
</b></p><p>1.	Kulit pucat
</p><p>2.	Konjungtiva pucat
</p><p>3.	Sklera dan kulit ikterik
</p><p>4.	Hepatosplenomegali
</p><p><b>C.	Pemeriksaan penunjang :
</b></p><p>1.	Anemia normositik normokrom 
</p><p>2.	Retikulosit meningkat 
</p><p>3.	Peningkatan bilirubin indirek (prehepatik).
</p><p>4.	Urinalisis tampak urin gelap, hemoglobinuria +
</p><p>5.	ADT tampak tropozoit muda berbentuk cincin tipis dan gametosit berbentuk sabit.
</p><p><br></p>',
'aktif0' => 1,
'aktif1' => 1,
'aktif2' => 1,
'aktif3' => 1,
'bobot' => 1,
'created_at' => '2025-10-31 03:32:01',
'updated_at' => '2025-10-31 05:03:49',
),
25 => 
array (
'id' => 34,
'otemplate_id' => 21,
'urutan' => 2,
'name' => 'Penjelasan Patomekanisme',
'Nilai_0' => '<p>Mahasiswa tidak  mampu menjelaskan patomekanisme Diagnosis kerja&nbsp;</p>',
'Nilai_1' => '<p>Mahasiswa menjelaskan patomekanisme diagnosis kerja secara tidak lengkap.
</p><p>
</p><p>A.	Etiologi : Infeksi plasmodium
</p><p>B.	Patomekanisme <b>(1 poin)
</b></p><p>C.	Manifestasi Klinis <b>(1-3 poin)
</b></p><p><br></p>',
'Nilai_2' => '<p>Mahasiswa mampu menjelaskan secara <b>tepat</b> patomekanisme diagnosis kerja dihubungkan dengan:
</p><p>
</p><p>A.	Etiologi : Infeksi plasmodium
</p><p>B.	Patomekanisme <b>(2 poin)
</b></p><p>C.	Manifestasi Klinis <b>(4-5 poin)
</b></p><p><br></p>',
'Nilai_3' => '<p>Mahasiswa mampu menjelaskan secara <b>tepat</b> <b>dan</b> <b>lengkap</b> patomekanisme diagnosis kerja meliputi :
</p><p><b>A.	Etiologi : Infeksi plasmodium
</b></p><p><b>B.	Patomekanisme :
</b></p><p>1.	Plasmodium berkembang dalam eritrosit &gt; memecah Hb menghasilkan hemozoin &gt; plasmodium matang &gt; eritrosit lisis 
</p><p>2.	Perubahan struktur membran eritrosit di sekitar &gt; rigiditas membran eritrosit menurun &gt; destruksi eritrosit di limpa
</p><p>3.	Memicu aktivasi sistem imun berlebih &gt; terbentuk antibodi nonspesifik menempel pada eritrosit sehat &gt; destruksi eritrosit oleh makrofag di limpa dan hepar
</p><p><b>C.	Manifestasi Klinis
</b></p><p>1.	Lemas, kulit pucat, konjungtiva pucat +/+
</p><p>2.	Sklera dan kulit ikterik
</p><p>3.	Hepatosplenomegali
</p><p>4.	Anemia normositik normokrom
</p><p>5.	Bilirubin indirek meningkat
</p><p>6.	Urin gelap (hemoglobinuria)</p>',
'aktif0' => 1,
'aktif1' => 1,
'aktif2' => 1,
'aktif3' => 1,
'bobot' => 1,
'created_at' => '2025-10-31 03:32:01',
'updated_at' => '2025-10-31 05:03:49',
),
26 => 
array (
'id' => 35,
'otemplate_id' => 22,
'urutan' => 1,
'name' => 'Penentuan Diagnosis',
'Nilai_0' => '<p>Mahasiswa tidak mampu menentukan Diagnosis&nbsp;</p>',
'Nilai_1' => '<p>Mahasiswa hanya mampu menentukan Diagnosis kerja dengan tepat tanpa disertai dasar diagnosis</p>',
'Nilai_2' => '<p>Mahasiswa mampu menentukan Diagnosis kerja yang tepat dengan Dasar diagnosis tidak lengkap, meliputi :<br>A.&nbsp; &nbsp; Diagnosis kerja yang tepat<br>B.&nbsp; &nbsp; Dasar diagnosis yang lengkap&nbsp;<br>meliputi :&nbsp;<br>1.&nbsp; &nbsp; Anamnesis<br>2.&nbsp; &nbsp; Pemeriksaan Fisik<br>3.&nbsp; &nbsp; Pemeriksaan penunjang (HB, MCV,MCH,MCHC)<br><br><br></p>',
'Nilai_3' => 'Mahasiswa mampu menentukan diagnosis kerja disertai dengan dasar diagnosis yang tepat dan lengkap meliputi :&nbsp;<br>A.&nbsp; &nbsp; Diagnosis kerja yang tepat<br>B.&nbsp; &nbsp; Dasar diagnosis yang lengkap&nbsp;<br>meliputi :&nbsp;<br>1.&nbsp; &nbsp; Anamnesis<br>2.&nbsp; &nbsp; Pemeriksaan Fisik<br>3.&nbsp; &nbsp; Pemeriksaan penunjang',
'aktif0' => 1,
'aktif1' => 1,
'aktif2' => 1,
'aktif3' => 1,
'bobot' => 1,
'created_at' => '2025-10-31 03:35:15',
'updated_at' => '2025-10-31 03:44:30',
),
27 => 
array (
'id' => 36,
'otemplate_id' => 22,
'urutan' => 2,
'name' => 'Penjelasan Patomekanisme',
'Nilai_0' => '<p>Mahasiswa tidak&nbsp; mampu menjelaskan patomekanisme Diagnosis kerja&nbsp;</p>',
'Nilai_1' => '<p>Mahasiswa mampu menjelaskan patomekanisme sesuai dengan Diagnosis kerja dengan tepat meliputi:<br>A.&nbsp; &nbsp; Faktor Risiko&nbsp;<br>B.&nbsp; &nbsp; Manifestasi Klinis ( 1-2 poin )<br><br></p>',
'Nilai_2' => '<p>Mahasiswa mampu menjelaskan secara tepat namun tidak lengkap patomekanisme diagnosis kerja dihubungkan dengan:<br>A.&nbsp; &nbsp; Faktor Risiko : CKD<br>B.&nbsp; &nbsp; Manifestasi Klinis (3 poin)<br><br></p>',
'Nilai_3' => '<p><br>Mahasiswa mampu menjelaskan secara tepat dan lengkap patomekanisme diagnosis kerja dihubungkan dengan:<br><br>A.&nbsp; &nbsp; Faktor Risiko : CKD&nbsp;<br>B.&nbsp; &nbsp; Manifestasi Klinis<br>1.&nbsp; &nbsp; Lemas&nbsp;<br>2.&nbsp; &nbsp; Sesak nafas<br>3.&nbsp; &nbsp; Kaki bengkak<br>4.&nbsp; &nbsp; Hb , MCV, MCH, MCHC&nbsp;</p>',
'aktif0' => 1,
'aktif1' => 1,
'aktif2' => 1,
'aktif3' => 1,
'bobot' => 1,
'created_at' => '2025-10-31 03:35:15',
'updated_at' => '2025-10-31 03:44:30',
),
28 => 
array (
'id' => 37,
'otemplate_id' => 23,
'urutan' => 1,
'name' => 'Penentuan Diagnosis',
'Nilai_0' => '<p>Mahasiswa tidak mampu menentukan Diagnosis&nbsp;</p>',
'Nilai_1' => '<p>Mahasiswa hanya mampu menentukan Diagnosis kerja secara tepat tanpa dasar diagnosis&nbsp;<br><br>Adenocarcinoma prostat&nbsp;<br>Carcinoma prostat&nbsp;<br><br></p>',
'Nilai_2' => '<p>Mahasiswa mampu menentukan Diagnosis kerja yang tepat dan Dasar diagnosis yang tidak lengkap.<br><br>A.&nbsp; &nbsp; Diagnosis kerja yang tepat<br>B.&nbsp; &nbsp; Dasar diagnosis yang lengkap meliputi :&nbsp;<br>1.&nbsp; &nbsp; Anamnesis&nbsp;<br>2.&nbsp; &nbsp; Pemeriksaan Fisik<br>3.&nbsp; &nbsp; Pemeriksaan Penunjang&nbsp;<br><br></p>',
'Nilai_3' => 'Mahasiswa mampu menentukan diagnosis kerja disertai dengan dasar diagnosis yang tepat dan lengkap meliputi :&nbsp;<br>A.&nbsp; &nbsp; Diagnosis kerja yang tepat<br>B.&nbsp; &nbsp; Dasar diagnosis yang lengkap meliputi :&nbsp;<br>1.&nbsp; &nbsp; Anamnesis&nbsp;<br>2.&nbsp; &nbsp; Pemeriksaan Fisik&nbsp;<br>3.&nbsp; &nbsp; Pemeriksaan Penunjang<br>4.&nbsp; &nbsp; Grading dan staging&nbsp;<br><br>',
'aktif0' => 1,
'aktif1' => 1,
'aktif2' => 1,
'aktif3' => 1,
'bobot' => 1,
'created_at' => '2025-10-31 03:45:16',
'updated_at' => '2025-10-31 07:09:07',
),
29 => 
array (
'id' => 38,
'otemplate_id' => 23,
'urutan' => 2,
'name' => 'Penjelasan Patomekanisme',
'Nilai_0' => '<p>Mahasiswa tidak&nbsp; mampu menjelaskan patomekanisme hallmarks of cancer&nbsp;</p>',
'Nilai_1' => '<p>Mahasiswa mampu menyebutkan secara tepat 1-2 poin patomekanisme hallmarks of cancer&nbsp;<br><br>1.&nbsp; &nbsp; Invasi basemt membran&nbsp;</p>',
'Nilai_2' => '<p>Mahasiswa mampu menyebutkan secara tepat, 3 poin patomekanisme patomekanisme hallmarks of cancer&nbsp;<br><br>1.&nbsp; &nbsp; Invasi basemt membran&nbsp;<br>2.&nbsp; &nbsp; Intravasasi ke pembuluh darah&nbsp;<br>3.&nbsp; &nbsp; Ekstravasasi ke pembuluh darah<br><br></p>',
'Nilai_3' => '<p>Mahasiswa mampu menyebutkan secara tepat&nbsp; poin patomekanisme patomekanisme hallmarks of cancer<br><br>1.&nbsp; &nbsp; Invasi basemt membran&nbsp;<br>2.&nbsp; &nbsp; Intravasasi ke pembuluh darah&nbsp;<br>3.&nbsp; &nbsp; Ekstravasasi ke pembuluh darah<br>4.&nbsp; &nbsp; Deposit membran&nbsp;<br><br><br></p>',
'aktif0' => 1,
'aktif1' => 1,
'aktif2' => 1,
'aktif3' => 1,
'bobot' => 1,
'created_at' => '2025-10-31 03:45:16',
'updated_at' => '2025-10-31 07:09:07',
),
30 => 
array (
'id' => 39,
'otemplate_id' => 24,
'urutan' => 1,
'name' => 'Penegakkan Diagnosis',
'Nilai_0' => '<p>Mahasiswa tidak mampu menentukan Diagnosis&nbsp;</p>',
'Nilai_1' => '<p>Mahasiswa hanya mampu menentukan Diagnosis kerja dengan tepat <b>tanpa dasar diagnosis
</b></p><p>
</p><p><b>Atau 
</b></p><p>
</p><p><b>Diagnosis kerja tidak lengkap </b>(adenocarcinoma paru)
</p><p><br></p>',
'Nilai_2' => '<p>Mahasiswa mampu menentukan Diagnosis kerja yang<b> tepat </b>dengan<b> Dasar diagnosis yang tidak lengkap, </b>meliputi<b> :
</b></p><p><b>Diagnosis : Adenocarcinoma paru yang telah bermetastasis ke hepar
</b></p><p><b>A.	Anamnesis
</b></p><p>1.	Batuk berdahak bercampur darah
</p><p>2.	Penurunan berat badan
</p><p><b>B.	Pemeriksaan Fisik
</b></p><p>1.	IMT kurang
</p><p>2.	Thoraks : 
</p><p>-	Fremitus menurun di lapang paru kanan bawah
</p><p>-	Suara paru dextra redup hingga pekak
</p><p><b>C.	Pemeriksaan Penunjang
</b></p><p>1.	Pemeriksaan Rontgen Thorax: bayangan opak padat berukuran 6cm, tidak tampak perbesaran kelenjar getah bening.
</p><p>2.	Pemeriksaan USG : ditemukan metastasis ke hepar
</p><p>3.	Pemeriksaan Histopatologi : adenocarcinoma paru
</p><p>
</p><p><br></p>',
'Nilai_3' => '<p>Mahasiswa mampu menentukan diagnosis kerja disertai dengan dasar diagnosis yang <b>tepat dan lengkap </b>meliputi : 
</p><p><b>Diagnosis : Adenocarcinoma paru yang telah bermetastasis ke hepar
</b></p><p><b>A.	Anamnesis
</b></p><p>1.	Batuk berdahak bercampur darah
</p><p>2.	Sesak napas
</p><p>3.	Nyeri dada kanan
</p><p>4.	Penurunan berat badan
</p><p><b>B.	Pemeriksaan Fisik
</b></p><p>1.	IMT kurang
</p><p>2.	Takikardi
</p><p>3.	Takipneu
</p><p>4.	Konjungtiva pucat (+/+)
</p><p>5.	Thoraks : 
</p><p>-	Fremitus menurun di lapang paru kanan bawah
</p><p>-	Suara paru dextra redup hingga pekak
</p><p><b>C.	Pemeriksaan Penunjang
</b></p><p>1.	Pemeriksaan Rontgen Thorax: bayangan opak padat berukuran 6cm, tidak tampak perbesaran kelenjar getah bening
</p><p>2.	Pemeriksaan USG : ditemukan metastasis ke hepar
</p><p>3.	Pemeriksaan Histopatologi : adenocarcinoma paru
</p><p><b>D.	Prinsip Dasar Staging
</b></p><p>T : terdapat massa di paru sebesar 6cm
</p><p>N : tidak tampak perbesaran KGB regional
</p><p>M : mestastasis ke hepar
</p><p><br></p><p><br></p>',
'aktif0' => 1,
'aktif1' => 1,
'aktif2' => 1,
'aktif3' => 1,
'bobot' => 1,
'created_at' => '2025-10-31 03:49:37',
'updated_at' => '2025-10-31 05:08:12',
),
31 => 
array (
'id' => 40,
'otemplate_id' => 24,
'urutan' => 2,
'name' => 'Penjelasan Carcinogenesis',
'Nilai_0' => '<p>Mahasiswa tidak mampu menjelaskan carcinogenesis</p>',
'Nilai_1' => '<p>Mahasiswa mampu menjelaskan carcinogenesis namun <b>tidak sistematis</b></p>',
'Nilai_2' => '<p>Mahasiswa mampu menjelaskan carcinogenesis secara <b>tepat dan sistematis</b> meliputi : 
</p><p>1.	Carcinogenic agent (rokok)
</p><p>2.	Inisiasi
</p><p>3.	Promosi
</p><p><br></p>',
'Nilai_3' => '<p>Mahasiswa mampu menjelaskan carcinogenesis secara <b>tepat</b>, <b>lengkap, dan sistematis</b> meliputi : 
</p><p>1.	Carcinogenic agent (rokok)
</p><p>2.	Inisiasi : terjadi DNA adduct &gt; sel terinisiasi
</p><p>3.	Promosi : sel terinisiasi &gt; proliferasi berulang &gt; terbentuk preneoplastic clone &gt; malignant clone <b>atau</b> menjelaskan Acquisition Hallmarks of Cancer dan Further Genetic Evolution
</p><p><br></p>',
'aktif0' => 1,
'aktif1' => 1,
'aktif2' => 1,
'aktif3' => 1,
'bobot' => 1,
'created_at' => '2025-10-31 03:49:37',
'updated_at' => '2025-10-31 05:08:12',
),
32 => 
array (
'id' => 41,
'otemplate_id' => 25,
'urutan' => 1,
'name' => 'Penentuan Diagnosis',
'Nilai_0' => '<p>Mahasiswa tidak mampu menentukan Diagnosis&nbsp;</p>',
'Nilai_1' => '<p>Mahasiswa hanya mampu menentukan Diagnosis kerja dengan tepat <b>tanpa disertai dasar diagnosis.
</b></p><p><b>
Diagnosis : Thalassemia mayor</b>&nbsp;</p><p>
</p><p><b>Atau</b></p><p><b>diagnosis tidak lengkap </b>(Thalassemia)
</p><p><br></p>',
'Nilai_2' => '<p>Mahasiswa mampu menentukan Diagnosis kerja yang <b>tepat </b>dengan Dasar diagnosis, meliputi :
</p><p><b>
Diagnosis : Thalassemia mayor&nbsp;</b></p><p><b>A.	Anamnesis 
</b></p><p><b>B.	Pemeriksaan fisik
</b></p><p>1.	Hepatosplenomegali
</p><p><b>C.	Pemeriksaan penunjang :
</b></p><p>1.	Anemia hipokrom mikrositer
</p><p>2.	HbF dominan : β-Thalassemia Mayor
</p><p>
</p><p>
</p><p>
</p><p><br></p>',
'Nilai_3' => '<p>Mahasiswa mampu menentukan diagnosis kerja disertai dengan dasar diagnosis yang <b>tepat dan lengkap </b>meliputi : 
</p><p><b>Diagnosis : Thalassemia mayor
</b></p><p><b>A.	Anamnesis
</b></p><p>1.	Pucat, lemas, cepat lelah 
</p><p>2.	Perut membesar
</p><p>3.	Riwayat keluhan serupa dan mendapatkan transfusi
</p><p>4.	Riwayat kakak pasien keluhan serupa (+)
</p><p>5.	Anak lebih pendek dari teman usianya
</p><p><b>B.	Pemeriksaan fisik
</b></p><p>1.	Konjungtiva pucat 
</p><p>2.	Sklera ikterik
</p><p>3.	Hepatosplenomegali 
</p><p>C.	Pemeriksaan <b>penunjang :
</b></p><p>1.	Anemia hipokrom mikrositer
</p><p>2.	Hiperbilirubinemia
</p><p>3.	SADT : Target cell (+)
</p><p>4.	HbF dominan : β-Thalassemia Mayor
</p><p><br></p>',
'aktif0' => 1,
'aktif1' => 1,
'aktif2' => 1,
'aktif3' => 1,
'bobot' => 1,
'created_at' => '2025-10-31 04:23:48',
'updated_at' => '2025-10-31 04:43:40',
),
33 => 
array (
'id' => 42,
'otemplate_id' => 25,
'urutan' => 2,
'name' => 'Penjelasan Patomekanisme',
'Nilai_0' => '<p>Mahasiswa tidak  mampu menjelaskan patomekanisme Diagnosis kerja&nbsp;</p>',
'Nilai_1' => '<p>Mahasiswa mampu menjelaskan patomekanisme diagnosis kerja secara<b> tidak lengkap.</b></p>',
'Nilai_2' => '<p>Mahasiswa mampu menjelaskan patomekanisme diagnosis kerja secara <b>tepat</b>, meliputi : 
</p><p><b>A.	Etiologi </b>: Mutasi / delesi pada gen β-globin (kromosom 11)
</p><p><b>B.	Patomekanisme </b>:
</p><p>1.	Berkurangnya atau tidak ada rantai β &gt; HbA turun drastis &gt; hipokrom mikrositer
</p><p>2.	Tubuh mengompensasi dengan meningkatkan pembentukan hemoglobin &gt; HbF dan HbA meningkat (HbF dominan)
</p><p>3.	Salah satu dari poin 3 atau 4
</p><p><br></p>',
'Nilai_3' => '<p>Mahasiswa mampu menjelaskan patomekanisme diagnosis kerja secara <b>tepat dan lengkap </b>meliputi :
</p><p><b>A.	Etiologi </b>: Mutasi / delesi pada gen β-globin (kromosom 11)
</p><p><b>B.	Patomekanisme :
</b></p><p>1.	Berkurangnya atau tidak ada rantai β &gt; HbA turun drastis &gt; hipokrom mikrositer
</p><p>2.	Tubuh mengompensasi dengan meningkatkan pembentukan hemoglobin &gt; HbF dan HbA meningkat (HbF dominan)
</p><p>3.	Rantai α berlebih mengendap di eritrosit membentuk inclusion bodies &gt; lisis eritrosit banyak  dihancurkan lien &gt; splenomegali &gt; heme yg terbentuk diubah jd bilirubin &gt; hiperbilirubinemia &gt; Sklera ikterik
</p><p>4.	Hematopoiesis meningkat di hepar dan lien &gt; hepatosplenomegali 
</p><p><br></p>',
'aktif0' => 1,
'aktif1' => 1,
'aktif2' => 1,
'aktif3' => 1,
'bobot' => 1,
'created_at' => '2025-10-31 04:23:48',
'updated_at' => '2025-10-31 04:43:40',
),
));
        
        
    }
}