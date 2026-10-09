<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class OstationsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('ostations')->delete();
        
        \DB::table('ostations')->insert(array (
            0 => 
            array (
                'id' => 34,
                'oujian_id' => 5,
                'urutan' => 1,
                'name' => 'station 1',
                'qrstation' => '814603840451',
                'penguji_id' => 8,
                'nama_penguji' => 'dr. Bambang Wibisono, MH.Kes.',
                'current' => 1,
                'next' => 2,
                'created_at' => '2025-10-30 07:48:32',
                'updated_at' => '2025-12-02 05:41:33',
                'open' => 0,
            ),
            1 => 
            array (
                'id' => 35,
                'oujian_id' => 5,
                'urutan' => 2,
                'name' => 'station 2',
                'qrstation' => '158599946952',
                'penguji_id' => 8,
                'nama_penguji' => 'dr. Bambang Wibisono, MH.Kes.',
                'current' => 3,
                'next' => 4,
                'created_at' => '2025-10-30 07:48:32',
                'updated_at' => '2025-12-02 06:11:31',
                'open' => 0,
            ),
            2 => 
            array (
                'id' => 36,
                'oujian_id' => 5,
                'urutan' => 3,
                'name' => 'station 3',
                'qrstation' => '596222091253',
                'penguji_id' => 34,
                'nama_penguji' => 'dr. Moh. Irwan Dharmansyah, M.Biomed',
                'current' => 1,
                'next' => 2,
                'created_at' => '2025-10-30 07:48:32',
                'updated_at' => '2025-11-04 04:05:59',
                'open' => 0,
            ),
            3 => 
            array (
                'id' => 37,
                'oujian_id' => 5,
                'urutan' => 4,
                'name' => 'station 4',
                'qrstation' => '064658095954',
                'penguji_id' => 5,
                'nama_penguji' => 'dr. Tiar Masykuroh Pratamawati, MM, M.Biomed',
                'current' => 1,
                'next' => 2,
                'created_at' => '2025-10-30 07:48:32',
                'updated_at' => '2025-12-02 05:52:08',
                'open' => 0,
            ),
            4 => 
            array (
                'id' => 38,
                'oujian_id' => 5,
                'urutan' => 5,
                'name' => 'station 5',
                'qrstation' => '189213407655',
                'penguji_id' => 22,
                'nama_penguji' => 'dr. Helga Marwa Afifah, M.Biomed',
                'current' => 1,
                'next' => 2,
                'created_at' => '2025-10-30 07:48:32',
                'updated_at' => '2025-11-04 04:07:35',
                'open' => 0,
            ),
            5 => 
            array (
                'id' => 39,
                'oujian_id' => 5,
                'urutan' => 6,
                'name' => 'station 6',
                'qrstation' => '930342418456',
                'penguji_id' => 79,
                'nama_penguji' => 'dr. Azkiya Rizki Rahmaniya, M.Biomed',
                'current' => 1,
                'next' => 2,
                'created_at' => '2025-10-30 07:48:32',
                'updated_at' => '2025-11-04 04:24:37',
                'open' => 0,
            ),
            6 => 
            array (
                'id' => 40,
                'oujian_id' => 5,
                'urutan' => 7,
                'name' => 'station 7',
                'qrstation' => '293755329857',
                'penguji_id' => 24,
                'nama_penguji' => 'dr. Yukke Nilla Permata,M.Biomed',
                'current' => 1,
                'next' => 2,
                'created_at' => '2025-10-30 07:48:32',
                'updated_at' => '2025-11-04 04:08:30',
                'open' => 0,
            ),
            7 => 
            array (
                'id' => 41,
                'oujian_id' => 5,
                'urutan' => 8,
                'name' => 'station 8',
                'qrstation' => '468821931858',
                'penguji_id' => 8,
                'nama_penguji' => 'dr. Bambang Wibisono, MH.Kes.',
                'current' => 1,
                'next' => 2,
                'created_at' => '2025-10-30 07:48:32',
                'updated_at' => '2025-12-02 05:53:35',
                'open' => 0,
            ),
            8 => 
            array (
                'id' => 42,
                'oujian_id' => 5,
                'urutan' => 9,
                'name' => 'station 9',
                'qrstation' => '871120553759',
                'penguji_id' => 10,
                'nama_penguji' => 'dr. R. Vivi Meidianawaty, M.Med.Ed.',
                'current' => 1,
                'next' => 2,
                'created_at' => '2025-10-30 07:48:32',
                'updated_at' => '2025-11-04 04:22:38',
                'open' => 0,
            ),
            9 => 
            array (
                'id' => 43,
                'oujian_id' => 5,
                'urutan' => 10,
                'name' => 'station 10',
                'qrstation' => '2345062609510',
                'penguji_id' => 9,
                'nama_penguji' => 'dr. Ouve Rahadiani Permana, MH.Kes, M.Sc.',
                'current' => 1,
                'next' => 2,
                'created_at' => '2025-10-30 07:48:32',
                'updated_at' => '2025-11-04 04:23:29',
                'open' => 0,
            ),
            10 => 
            array (
                'id' => 44,
                'oujian_id' => 5,
                'urutan' => 11,
                'name' => 'station 11',
                'qrstation' => '5163077085511',
                'penguji_id' => 27,
                'nama_penguji' => 'dr. Yandri Naldi, MH, MKM',
                'current' => 1,
                'next' => 2,
                'created_at' => '2025-10-30 07:48:32',
                'updated_at' => '2025-11-04 01:18:23',
                'open' => 0,
            ),
            11 => 
            array (
                'id' => 45,
                'oujian_id' => 5,
                'urutan' => 12,
                'name' => 'station 12',
                'qrstation' => '7357145328512',
                'penguji_id' => 32,
                'nama_penguji' => 'dr. Siti Maria Ulfah, MMR',
                'current' => 1,
                'next' => 2,
                'created_at' => '2025-10-30 07:48:32',
                'updated_at' => '2025-11-04 04:23:53',
                'open' => 0,
            ),
            12 => 
            array (
                'id' => 46,
                'oujian_id' => 5,
                'urutan' => 13,
                'name' => 'station 13',
                'qrstation' => '4886578360513',
                'penguji_id' => 67,
                'nama_penguji' => 'dr. Efendi Agnilinia',
                'current' => 1,
                'next' => 2,
                'created_at' => '2025-10-30 07:48:32',
                'updated_at' => '2025-11-04 04:07:58',
                'open' => 0,
            ),
            13 => 
            array (
                'id' => 47,
                'oujian_id' => 5,
                'urutan' => 14,
                'name' => 'station 14',
                'qrstation' => '3072537863514',
                'penguji_id' => 7,
                'nama_penguji' => 'dr. Frista Martha Rahayu, Sp.DV',
                'current' => 1,
                'next' => 2,
                'created_at' => '2025-10-30 07:48:32',
                'updated_at' => '2025-11-04 04:23:56',
                'open' => 0,
            ),
            14 => 
            array (
                'id' => 48,
                'oujian_id' => 5,
                'urutan' => 15,
                'name' => 'station 15',
                'qrstation' => '1563395369515',
                'penguji_id' => 30,
                'nama_penguji' => 'dr. Rian Damayanti, M.Biomed',
                'current' => 1,
                'next' => 2,
                'created_at' => '2025-10-30 07:48:32',
                'updated_at' => '2025-11-04 04:24:14',
                'open' => 0,
            ),
            15 => 
            array (
                'id' => 49,
                'oujian_id' => 5,
                'urutan' => 16,
                'name' => 'station 16',
                'qrstation' => '9111220420516',
                'penguji_id' => 152,
                'nama_penguji' => 'dr. Alendra Chakramurty, Sp.PA',
                'current' => 1,
                'next' => 2,
                'created_at' => '2025-10-30 07:48:32',
                'updated_at' => '2025-11-04 04:07:51',
                'open' => 0,
            ),
            16 => 
            array (
                'id' => 72,
                'oujian_id' => 15,
                'urutan' => 1,
                'name' => 'station 1',
                'qrstation' => '5799243894151',
                'penguji_id' => NULL,
                'nama_penguji' => NULL,
                'current' => 1,
                'next' => 2,
                'created_at' => '2025-11-06 03:50:40',
                'updated_at' => '2025-11-06 03:50:40',
                'open' => 0,
            ),
            17 => 
            array (
                'id' => 73,
                'oujian_id' => 15,
                'urutan' => 2,
                'name' => 'station 2',
                'qrstation' => '0027530501152',
                'penguji_id' => NULL,
                'nama_penguji' => NULL,
                'current' => 1,
                'next' => 2,
                'created_at' => '2025-11-06 03:50:40',
                'updated_at' => '2025-11-06 03:50:40',
                'open' => 0,
            ),
        ));
        
        
    }
}