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
                'name' => 'Blok 4.1',
                'jml_sk' => '5',
                'tahun_akademik' => '2025/2026',
                'jml_kelompok' => NULL,
                'user_id' => 16,
                'created_at' => '2026-01-09 17:57:06',
                'updated_at' => '2026-01-09 17:57:06',
            ),
        ));
        
        
    }
}