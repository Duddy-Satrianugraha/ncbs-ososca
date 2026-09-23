<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PendaftaransTableSeeder extends Seeder
{
    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {

        \DB::table('pendaftarans')->delete();

        \DB::table('pendaftarans')->insert([
            0 => [
                'id' => 1,
                'user_id' => 8,
                'nama_osce' => 'Osce semester 3 (2024/2025)',
                'ujian_id' => 1,
                'created_at' => '2025-04-18 07:22:34',
                'updated_at' => '2025-04-18 07:22:34',
            ],
            1 => [
                'id' => 2,
                'user_id' => 9,
                'nama_osce' => 'Osce semester 3 (2024/2025)',
                'ujian_id' => 1,
                'created_at' => '2025-04-18 07:23:12',
                'updated_at' => '2025-04-18 07:23:12',
            ],
            2 => [
                'id' => 3,
                'user_id' => 10,
                'nama_osce' => 'Osce semester 3 (2024/2025)',
                'ujian_id' => 1,
                'created_at' => '2025-04-18 07:23:44',
                'updated_at' => '2025-04-18 07:23:44',
            ],
            3 => [
                'id' => 4,
                'user_id' => 11,
                'nama_osce' => 'Osce semester 3 (2024/2025)',
                'ujian_id' => 1,
                'created_at' => '2025-04-18 07:24:24',
                'updated_at' => '2025-04-18 07:24:24',
            ],
            4 => [
                'id' => 5,
                'user_id' => 12,
                'nama_osce' => 'Osce semester 3 (2024/2025)',
                'ujian_id' => 1,
                'created_at' => '2025-04-18 07:25:00',
                'updated_at' => '2025-04-18 07:25:00',
            ],
            5 => [
                'id' => 6,
                'user_id' => 13,
                'nama_osce' => 'Osce semester 3 (2024/2025)',
                'ujian_id' => 1,
                'created_at' => '2025-04-18 07:25:42',
                'updated_at' => '2025-04-18 07:25:42',
            ],
            6 => [
                'id' => 7,
                'user_id' => 14,
                'nama_osce' => 'Osce semester 3 (2024/2025)',
                'ujian_id' => 1,
                'created_at' => '2025-04-18 07:26:24',
                'updated_at' => '2025-04-18 07:26:24',
            ],
        ]);

    }
}
