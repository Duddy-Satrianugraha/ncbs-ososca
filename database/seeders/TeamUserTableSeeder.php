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
            8 =>
            array (
                'id' => 9,
                'team_id' => 1,
                'user_id' => 14,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            9 =>
            array (
                'id' => 10,
                'team_id' => 2,
                'user_id' => 15,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            10 =>
            array (
                'id' => 11,
                'team_id' => 3,
                'user_id' => 16,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            11 =>
            array (
                'id' => 12,
                'team_id' => 4,
                'user_id' => 17,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            12 =>
            array (
                'id' => 13,
                'team_id' => 4,
                'user_id' => 18,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));


    }
}
