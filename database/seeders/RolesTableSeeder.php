<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {

        \DB::table('roles')->delete();

        \DB::table('roles')->insert([
            0 => [
                'id' => 1,
                'u_id' => '99',
                'name' => 'Ultraman',
                'nama' => 'Super User',
                'created_at' => '2025-10-28 02:26:34',
                'updated_at' => '2025-10-28 02:26:34',
            ],
            1 => [
                'id' => 2,
                'u_id' => '98',
                'name' => 'IT',
                'nama' => 'Tim IT',
                'created_at' => '2025-10-28 02:26:34',
                'updated_at' => '2025-10-28 02:26:34',
            ],
            2 => [
                'id' => 3,
                'u_id' => '1',
                'name' => 'Koc',
                'nama' => 'Ketua OSOKA',
                'created_at' => '2025-10-28 02:26:34',
                'updated_at' => '2025-10-28 02:26:34',
            ],
            3 => [
                'id' => 4,
                'u_id' => '2',
                'name' => 'Admin',
                'nama' => 'Administrator',
                'created_at' => '2025-10-28 02:26:34',
                'updated_at' => '2025-10-28 02:26:34',
            ],
            4 => [
                'id' => 5,
                'u_id' => '3',
                'name' => 'Materi',
                'nama' => 'Item Bank Administrator',
                'created_at' => '2025-10-28 02:26:34',
                'updated_at' => '2025-10-28 02:26:34',
            ],
            5 => [
                'id' => 6,
                'u_id' => '4',
                'name' => 'Meu',
                'nama' => 'Medical Education Unit',
                'created_at' => '2025-10-28 02:26:34',
                'updated_at' => '2025-10-28 02:26:34',
            ],
        ]);

    }
}
