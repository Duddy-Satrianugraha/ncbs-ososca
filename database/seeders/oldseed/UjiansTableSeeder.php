<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UjiansTableSeeder extends Seeder
{
    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {

        \DB::table('ujians')->delete();

        \DB::table('ujians')->insert([
            0 => [
                'id' => 1,
                'name' => 'Osce semester 3',
                'ta' => '2024/2025',
                'quesioner' => null,
                'created_at' => '2025-04-09 15:46:01',
                'updated_at' => '2025-04-09 15:46:01',
            ],
        ]);

    }
}
