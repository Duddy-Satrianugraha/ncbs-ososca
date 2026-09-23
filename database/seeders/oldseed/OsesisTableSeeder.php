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
                'id' => 15,
                'oujian_id' => 3,
                'urutan' => 1,
                'otemplate_id' => 1,
                'created_at' => '2025-08-27 01:14:55',
                'updated_at' => '2025-08-27 01:15:15',
            ],
            1 => [
                'id' => 16,
                'oujian_id' => 3,
                'urutan' => 2,
                'otemplate_id' => 7,
                'created_at' => '2025-08-27 01:14:55',
                'updated_at' => '2025-08-27 03:18:46',
            ],
            2 => [
                'id' => 17,
                'oujian_id' => 3,
                'urutan' => 3,
                'otemplate_id' => 8,
                'created_at' => '2025-08-27 01:14:55',
                'updated_at' => '2025-08-27 03:18:46',
            ],
            3 => [
                'id' => 18,
                'oujian_id' => 3,
                'urutan' => 4,
                'otemplate_id' => 9,
                'created_at' => '2025-08-27 01:14:55',
                'updated_at' => '2025-08-27 03:18:46',
            ],
            4 => [
                'id' => 19,
                'oujian_id' => 3,
                'urutan' => 5,
                'otemplate_id' => 10,
                'created_at' => '2025-08-27 01:14:55',
                'updated_at' => '2025-08-27 03:18:46',
            ],
            5 => [
                'id' => 20,
                'oujian_id' => 3,
                'urutan' => 6,
                'otemplate_id' => 11,
                'created_at' => '2025-08-27 01:14:55',
                'updated_at' => '2025-08-27 03:18:46',
            ],
        ]);

    }
}
