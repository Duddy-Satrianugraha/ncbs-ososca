<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TeamUserTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('team_user')->delete();
        
        \DB::table('team_user')->insert(array (
            0 => 
            array (
                'id' => 1,
                'team_id' => 3,
                'user_id' => 6,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'team_id' => 3,
                'user_id' => 7,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'team_id' => 1,
                'user_id' => 8,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'team_id' => 1,
                'user_id' => 9,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'team_id' => 2,
                'user_id' => 10,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'team_id' => 2,
                'user_id' => 11,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            6 => 
            array (
                'id' => 7,
                'team_id' => 4,
                'user_id' => 12,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            7 => 
            array (
                'id' => 8,
                'team_id' => 4,
                'user_id' => 13,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}