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

        \DB::table('team_user')->insert([
            0 => [
                'id' => 1,
                'team_id' => 3,
                'user_id' => 6,
                'created_at' => null,
                'updated_at' => null,
            ],
            1 => [
                'id' => 2,
                'team_id' => 3,
                'user_id' => 7,
                'created_at' => null,
                'updated_at' => null,
            ],
            2 => [
                'id' => 3,
                'team_id' => 1,
                'user_id' => 8,
                'created_at' => null,
                'updated_at' => null,
            ],
            3 => [
                'id' => 4,
                'team_id' => 1,
                'user_id' => 9,
                'created_at' => null,
                'updated_at' => null,
            ],
            4 => [
                'id' => 5,
                'team_id' => 2,
                'user_id' => 10,
                'created_at' => null,
                'updated_at' => null,
            ],
            5 => [
                'id' => 6,
                'team_id' => 2,
                'user_id' => 11,
                'created_at' => null,
                'updated_at' => null,
            ],
            6 => [
                'id' => 7,
                'team_id' => 4,
                'user_id' => 12,
                'created_at' => null,
                'updated_at' => null,
            ],
            7 => [
                'id' => 8,
                'team_id' => 4,
                'user_id' => 13,
                'created_at' => null,
                'updated_at' => null,
            ],
            8 => [
                'id' => 9,
                'team_id' => 1,
                'user_id' => 14,
                'created_at' => null,
                'updated_at' => null,
            ],
            9 => [
                'id' => 10,
                'team_id' => 2,
                'user_id' => 15,
                'created_at' => null,
                'updated_at' => null,
            ],
            10 => [
                'id' => 11,
                'team_id' => 3,
                'user_id' => 16,
                'created_at' => null,
                'updated_at' => null,
            ],
            11 => [
                'id' => 12,
                'team_id' => 4,
                'user_id' => 17,
                'created_at' => null,
                'updated_at' => null,
            ],
            12 => [
                'id' => 13,
                'team_id' => 4,
                'user_id' => 18,
                'created_at' => null,
                'updated_at' => null,
            ],
        ]);

    }
}
