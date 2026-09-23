<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class OsesisTableSeeder extends Seeder
{
    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {

        \DB::table('osesis')->delete();

        \DB::table('osesis')->insert([
            0 => [
                'id' => 32,
                'oujian_id' => 5,
                'urutan' => 1,
                'otemplate_id' => 16,
                'created_at' => '2025-10-30 07:48:32',
                'updated_at' => '2025-10-31 05:31:36',
            ],
            1 => [
                'id' => 33,
                'oujian_id' => 5,
                'urutan' => 2,
                'otemplate_id' => 21,
                'created_at' => '2025-10-30 07:48:32',
                'updated_at' => '2025-10-31 05:31:36',
            ],
            2 => [
                'id' => 34,
                'oujian_id' => 5,
                'urutan' => 3,
                'otemplate_id' => 25,
                'created_at' => '2025-10-30 07:48:32',
                'updated_at' => '2025-10-31 05:31:36',
            ],
            3 => [
                'id' => 35,
                'oujian_id' => 5,
                'urutan' => 4,
                'otemplate_id' => 17,
                'created_at' => '2025-10-30 07:48:32',
                'updated_at' => '2025-10-31 05:31:36',
            ],
            4 => [
                'id' => 36,
                'oujian_id' => 5,
                'urutan' => 5,
                'otemplate_id' => 15,
                'created_at' => '2025-10-30 07:48:32',
                'updated_at' => '2025-10-31 05:31:36',
            ],
            5 => [
                'id' => 37,
                'oujian_id' => 5,
                'urutan' => 6,
                'otemplate_id' => 20,
                'created_at' => '2025-10-30 07:48:32',
                'updated_at' => '2025-10-31 05:31:36',
            ],
            6 => [
                'id' => 38,
                'oujian_id' => 5,
                'urutan' => 7,
                'otemplate_id' => 22,
                'created_at' => '2025-10-30 07:48:32',
                'updated_at' => '2025-10-31 05:31:36',
            ],
            7 => [
                'id' => 39,
                'oujian_id' => 5,
                'urutan' => 8,
                'otemplate_id' => 24,
                'created_at' => '2025-10-30 07:48:32',
                'updated_at' => '2025-10-31 05:31:36',
            ],
            8 => [
                'id' => 40,
                'oujian_id' => 5,
                'urutan' => 9,
                'otemplate_id' => 23,
                'created_at' => '2025-10-30 07:48:32',
                'updated_at' => '2025-10-31 05:31:36',
            ],
            9 => [
                'id' => 41,
                'oujian_id' => 5,
                'urutan' => 10,
                'otemplate_id' => 19,
                'created_at' => '2025-10-30 07:48:32',
                'updated_at' => '2025-10-31 05:31:36',
            ],
            10 => [
                'id' => 42,
                'oujian_id' => 5,
                'urutan' => 11,
                'otemplate_id' => 18,
                'created_at' => '2025-10-30 07:48:32',
                'updated_at' => '2025-10-31 05:31:36',
            ],
            11 => [
                'id' => 64,
                'oujian_id' => 15,
                'urutan' => 1,
                'otemplate_id' => 16,
                'created_at' => '2025-11-06 03:50:40',
                'updated_at' => '2025-12-17 04:50:58',
            ],
            12 => [
                'id' => 65,
                'oujian_id' => 15,
                'urutan' => 2,
                'otemplate_id' => 18,
                'created_at' => '2025-11-06 03:50:40',
                'updated_at' => '2025-12-17 04:50:58',
            ],
            13 => [
                'id' => 66,
                'oujian_id' => 15,
                'urutan' => 3,
                'otemplate_id' => null,
                'created_at' => '2025-12-17 05:06:20',
                'updated_at' => '2025-12-17 05:06:20',
            ],
            14 => [
                'id' => 67,
                'oujian_id' => 15,
                'urutan' => 4,
                'otemplate_id' => null,
                'created_at' => '2025-12-17 05:06:20',
                'updated_at' => '2025-12-17 05:06:20',
            ],
        ]);

    }
}
