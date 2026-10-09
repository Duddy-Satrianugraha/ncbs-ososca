<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class OnilaisTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('onilais')->delete();
        
        \DB::table('onilais')->insert(array (
            0 => 
            array (
                'id' => 12,
                'oujian_id' => 5,
                'station_id' => 35,
                'sesi_id' => 32,
                'peserta_id' => 44,
                'qrpeserta' => '60bbf49de5d7b05fff9f70f184db23fe',
                'nama' => 'Hammett Kahfi Fergie Rajiv Afghani',
                'npm' => '122170076',
                'skor' => '{"23":"3","24":"2"}',
                'jumlah' => '5',
                'nilai' => '83.33',
                'created_at' => '2025-12-02 06:10:32',
                'updated_at' => '2025-12-02 06:10:32',
            ),
            1 => 
            array (
                'id' => 13,
                'oujian_id' => 5,
                'station_id' => 35,
                'sesi_id' => 33,
                'peserta_id' => 45,
                'qrpeserta' => 'dbf0ddb8dfb3f013fc1649fba976cee3',
                'nama' => 'Adella Putri Mirela',
                'npm' => '123170001',
                'skor' => '{"33":"3","34":"3"}',
                'jumlah' => '6',
                'nilai' => '100',
                'created_at' => '2025-12-02 06:10:59',
                'updated_at' => '2025-12-02 06:10:59',
            ),
        ));
        
        
    }
}