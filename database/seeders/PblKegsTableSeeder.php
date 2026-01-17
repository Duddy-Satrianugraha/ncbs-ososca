<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PblKegsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('pbl_kegs')->delete();
        
        \DB::table('pbl_kegs')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Blok 1.2',
                'jml_sk' => '5',
                'tahun_akademik' => '2025/2026',
                'jml_kelompok' => '18',
                'user_id' => 14,
                'sk_aktif' => NULL,
                'pertemuan' => NULL,
                'created_at' => '2026-01-17 05:02:16',
                'updated_at' => '2026-01-17 06:57:57',
            ),
        ));
        
        
    }
}