<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TeamsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('teams')->delete();
        
        \DB::table('teams')->insert(array (
            0 => 
            array (
                'id' => 1,
                'tu_id' => '1',
                'team' => 'tahap1',
                'name' => 'Semester 1 dan 2',
                'created_at' => '2025-10-28 02:26:34',
                'updated_at' => '2025-10-28 02:26:34',
            ),
            1 => 
            array (
                'id' => 2,
                'tu_id' => '2',
                'team' => 'tahap2',
                'name' => 'Semester 3 dan 4',
                'created_at' => '2025-10-28 02:26:34',
                'updated_at' => '2025-10-28 02:26:34',
            ),
            2 => 
            array (
                'id' => 3,
                'tu_id' => '3',
                'team' => 'tahap3',
                'name' => 'semester 5 dan 6',
                'created_at' => '2025-10-28 02:26:34',
                'updated_at' => '2025-10-28 02:26:34',
            ),
            3 => 
            array (
                'id' => 4,
                'tu_id' => '4',
                'team' => 'tahap4',
                'name' => 'Semester 7 dan 8',
                'created_at' => '2025-10-28 02:26:34',
                'updated_at' => '2025-10-28 02:26:34',
            ),
        ));
        
        
    }
}