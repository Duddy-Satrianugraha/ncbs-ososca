<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class OujiansTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('oujians')->delete();
        
        \DB::table('oujians')->insert(array (
            0 => 
            array (
                'id' => 5,
                'name' => 'OSOCA SEMESTER 5',
                'ta' => '2025',
                'jml_station' => '16',
                'jml_sesi' => '11',
                'tgl_ujian' => '2025-11-04',
                'user_id' => 6,
                'remedial' => 0,
                'created_at' => '2025-10-30 07:48:32',
                'updated_at' => '2025-10-30 07:48:32',
            ),
            1 => 
            array (
                'id' => 15,
                'name' => 'Ujian Osce semester 3',
                'ta' => '2025/2026',
                'jml_station' => '2',
                'jml_sesi' => '4',
                'tgl_ujian' => '2025-11-30',
                'user_id' => 5,
                'remedial' => 1,
                'created_at' => '2025-11-06 03:50:40',
                'updated_at' => '2025-12-17 05:06:20',
            ),
        ));
        
        
    }
}