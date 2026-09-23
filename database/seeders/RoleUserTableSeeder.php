<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RoleUserTableSeeder extends Seeder
{
    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {

        \DB::table('role_user')->delete();

        \DB::table('role_user')->insert([
            0 => [
                'id' => 1,
                'role_id' => 1,
                'user_id' => 1,
                'created_at' => null,
                'updated_at' => null,
            ],
            1 => [
                'id' => 2,
                'role_id' => 2,
                'user_id' => 2,
                'created_at' => null,
                'updated_at' => null,
            ],
            2 => [
                'id' => 3,
                'role_id' => 3,
                'user_id' => 3,
                'created_at' => null,
                'updated_at' => null,
            ],
            3 => [
                'id' => 4,
                'role_id' => 4,
                'user_id' => 4,
                'created_at' => null,
                'updated_at' => null,
            ],
            4 => [
                'id' => 5,
                'role_id' => 5,
                'user_id' => 5,
                'created_at' => null,
                'updated_at' => null,
            ],
            5 => [
                'id' => 6,
                'role_id' => 5,
                'user_id' => 6,
                'created_at' => null,
                'updated_at' => null,
            ],
            6 => [
                'id' => 7,
                'role_id' => 5,
                'user_id' => 7,
                'created_at' => null,
                'updated_at' => null,
            ],
            7 => [
                'id' => 8,
                'role_id' => 5,
                'user_id' => 8,
                'created_at' => null,
                'updated_at' => null,
            ],
            8 => [
                'id' => 9,
                'role_id' => 5,
                'user_id' => 9,
                'created_at' => null,
                'updated_at' => null,
            ],
            9 => [
                'id' => 10,
                'role_id' => 5,
                'user_id' => 10,
                'created_at' => null,
                'updated_at' => null,
            ],
            10 => [
                'id' => 11,
                'role_id' => 5,
                'user_id' => 11,
                'created_at' => null,
                'updated_at' => null,
            ],
            11 => [
                'id' => 12,
                'role_id' => 5,
                'user_id' => 12,
                'created_at' => null,
                'updated_at' => null,
            ],
            12 => [
                'id' => 13,
                'role_id' => 5,
                'user_id' => 13,
                'created_at' => null,
                'updated_at' => null,
            ],
            13 => [
                'id' => 14,
                'role_id' => 6,
                'user_id' => 14,
                'created_at' => null,
                'updated_at' => null,
            ],
            14 => [
                'id' => 15,
                'role_id' => 6,
                'user_id' => 15,
                'created_at' => null,
                'updated_at' => null,
            ],
            15 => [
                'id' => 16,
                'role_id' => 6,
                'user_id' => 16,
                'created_at' => null,
                'updated_at' => null,
            ],
            16 => [
                'id' => 17,
                'role_id' => 6,
                'user_id' => 17,
                'created_at' => null,
                'updated_at' => null,
            ],
            17 => [
                'id' => 18,
                'role_id' => 6,
                'user_id' => 18,
                'created_at' => null,
                'updated_at' => null,
            ],
        ]);

    }
}
