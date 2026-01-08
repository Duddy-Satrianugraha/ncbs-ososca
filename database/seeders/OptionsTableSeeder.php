<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class OptionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('options')->delete();
        
        \DB::table('options')->insert(array (
            0 => 
            array (
                'id' => 1,
                'type' => 'kst',
                'name' => '1',
                'value' => 'Sistem Saraf',
                'created_at' => '2025-10-28 02:26:35',
                'updated_at' => '2025-10-28 02:26:35',
            ),
            1 => 
            array (
                'id' => 2,
                'type' => 'kst',
                'name' => '2',
                'value' => 'Psikiatri',
                'created_at' => '2025-10-28 02:26:35',
                'updated_at' => '2025-10-28 02:26:35',
            ),
            2 => 
            array (
                'id' => 3,
                'type' => 'kst',
                'name' => '3',
                'value' => 'Sistem Indra',
                'created_at' => '2025-10-28 02:26:35',
                'updated_at' => '2025-10-28 02:26:35',
            ),
            3 => 
            array (
                'id' => 4,
                'type' => 'kst',
                'name' => '4',
                'value' => 'Sistem Respirasi',
                'created_at' => '2025-10-28 02:26:35',
                'updated_at' => '2025-10-28 02:26:35',
            ),
            4 => 
            array (
                'id' => 5,
                'type' => 'kst',
                'name' => '5',
                'value' => 'Sistem Kardiovaskular',
                'created_at' => '2025-10-28 02:26:35',
                'updated_at' => '2025-10-28 02:26:35',
            ),
            5 => 
            array (
                'id' => 6,
                'type' => 'kst',
                'name' => '6',
                'value' => 'Sistem Gastrointestinal, Hepatobilier, dan Pankreas',
                'created_at' => '2025-10-28 02:26:35',
                'updated_at' => '2025-10-28 02:26:35',
            ),
            6 => 
            array (
                'id' => 7,
                'type' => 'kst',
                'name' => '7',
                'value' => 'Sistem Ginjal dan Saluran Kemih',
                'created_at' => '2025-10-28 02:26:35',
                'updated_at' => '2025-10-28 02:26:35',
            ),
            7 => 
            array (
                'id' => 8,
                'type' => 'kst',
                'name' => '8',
                'value' => 'Sistem Reproduksi',
                'created_at' => '2025-10-28 02:26:35',
                'updated_at' => '2025-10-28 02:26:35',
            ),
            8 => 
            array (
                'id' => 9,
                'type' => 'kst',
                'name' => '9',
                'value' => 'Sistem Endokrin, Metabolisme, dan Nutrisi',
                'created_at' => '2025-10-28 02:26:35',
                'updated_at' => '2025-10-28 02:26:35',
            ),
            9 => 
            array (
                'id' => 10,
                'type' => 'kst',
                'name' => '10',
                'value' => 'Sistem Hematologi dan Imunologi',
                'created_at' => '2025-10-28 02:26:35',
                'updated_at' => '2025-10-28 02:26:35',
            ),
            10 => 
            array (
                'id' => 11,
                'type' => 'kst',
                'name' => '11',
                'value' => 'Sistem Muskuloskeletal',
                'created_at' => '2025-10-28 02:26:35',
                'updated_at' => '2025-10-28 02:26:35',
            ),
            11 => 
            array (
                'id' => 12,
                'type' => 'kst',
                'name' => '12',
                'value' => 'Sistem Integumen',
                'created_at' => '2025-10-28 02:26:35',
                'updated_at' => '2025-10-28 02:26:35',
            ),
            12 => 
            array (
                'id' => 13,
                'type' => 'kyd',
                'name' => '1',
                'value' => 'Anamnesis',
                'created_at' => '2025-10-28 02:26:35',
                'updated_at' => '2025-10-28 02:26:35',
            ),
            13 => 
            array (
                'id' => 14,
                'type' => 'kyd',
                'name' => '2',
                'value' => 'Pemeriksaan fisik',
                'created_at' => '2025-10-28 02:26:35',
                'updated_at' => '2025-10-28 02:26:35',
            ),
            14 => 
            array (
                'id' => 15,
                'type' => 'kyd',
                'name' => '3',
                'value' => 'Pemeriksaan Tanda Tanda Vital',
                'created_at' => '2025-10-28 02:26:35',
                'updated_at' => '2025-10-28 02:26:35',
            ),
            15 => 
            array (
                'id' => 16,
                'type' => 'kyd',
                'name' => '4',
                'value' => 'Interpretasi data/kemampuan prosedural pemeriksaan penunjang',
                'created_at' => '2025-10-28 02:26:35',
                'updated_at' => '2025-10-28 02:26:35',
            ),
            16 => 
            array (
                'id' => 17,
                'type' => 'kyd',
                'name' => '5',
                'value' => 'Penegakan diagnosis dan diagnosis banding',
                'created_at' => '2025-10-28 02:26:35',
                'updated_at' => '2025-10-28 02:26:35',
            ),
            17 => 
            array (
                'id' => 18,
                'type' => 'kyd',
                'name' => '6',
                'value' => 'Tatalaksana nonfarmakoterapi',
                'created_at' => '2025-10-28 02:26:35',
                'updated_at' => '2025-10-28 02:26:35',
            ),
            18 => 
            array (
                'id' => 19,
                'type' => 'kyd',
                'name' => '7',
                'value' => 'Tatalaksana farmakoterapi',
                'created_at' => '2025-10-28 02:26:35',
                'updated_at' => '2025-10-28 02:26:35',
            ),
            19 => 
            array (
                'id' => 20,
                'type' => 'kyd',
                'name' => '8',
                'value' => 'Komunikasi dan edukasi pasien',
                'created_at' => '2025-10-28 02:26:35',
                'updated_at' => '2025-10-28 02:26:35',
            ),
            20 => 
            array (
                'id' => 21,
                'type' => 'kyd',
                'name' => '9',
                'value' => 'Perilaku professional',
                'created_at' => '2025-10-28 02:26:35',
                'updated_at' => '2025-10-28 02:26:35',
            ),
            21 => 
            array (
                'id' => 22,
                'type' => 'skdi',
                'name' => '1',
                'value' => ' Mampu mengenali dan menjelaskan',
                'created_at' => '2025-10-28 02:26:35',
                'updated_at' => '2025-10-28 02:26:35',
            ),
            22 => 
            array (
                'id' => 23,
                'type' => 'skdi',
                'name' => '2',
                'value' => ' Mampu mendiagnosis dan merujuk',
                'created_at' => '2025-10-28 02:26:35',
                'updated_at' => '2025-10-28 02:26:35',
            ),
            23 => 
            array (
                'id' => 24,
                'type' => 'skdi',
                'name' => '3A',
                'value' => ' Mampu mendiagnosis, melakukan penatalaksanaan awal, dan merujuk pada keadaan yang bukan gawat darurat. ',
                'created_at' => '2025-10-28 02:26:35',
                'updated_at' => '2025-10-28 02:26:35',
            ),
            24 => 
            array (
                'id' => 25,
                'type' => 'skdi',
                'name' => '3B',
                'value' => ' Mampu mendiagnosis, melakukan penatalaksanaan awal, dan merujuk pada keadaan gawat darurat. ',
                'created_at' => '2025-10-28 02:26:35',
                'updated_at' => '2025-10-28 02:26:35',
            ),
            25 => 
            array (
                'id' => 26,
                'type' => 'skdi',
                'name' => '4A',
                'value' => ' Mampu mendiagnosis, melakukan penatalaksanaan secara mandiri dan tuntas. ',
                'created_at' => '2025-10-28 02:26:35',
                'updated_at' => '2025-10-28 02:26:35',
            ),
            26 => 
            array (
                'id' => 27,
                'type' => 'sex',
                'name' => 'male',
                'value' => 'Laki-laki',
                'created_at' => '2025-10-28 02:26:35',
                'updated_at' => '2025-10-28 02:26:35',
            ),
            27 => 
            array (
                'id' => 28,
                'type' => 'sex',
                'name' => 'female',
                'value' => 'Perempuan',
                'created_at' => '2025-10-28 02:26:35',
                'updated_at' => '2025-10-28 02:26:35',
            ),
            28 => 
            array (
                'id' => 29,
                'type' => 'ahli',
                'name' => '1',
                'value' => 'Pelatiahan Pasien Standar',
                'created_at' => '2025-10-28 02:26:35',
                'updated_at' => '2025-10-28 02:26:35',
            ),
            29 => 
            array (
                'id' => 30,
                'type' => 'ahli',
                'name' => '2',
                'value' => 'PS Osce Semester',
                'created_at' => '2025-10-28 02:26:35',
                'updated_at' => '2025-10-28 02:26:35',
            ),
            30 => 
            array (
                'id' => 31,
                'type' => 'ahli',
                'name' => '3',
                'value' => 'PS Osce UKMPPD',
                'created_at' => '2025-10-28 02:26:35',
                'updated_at' => '2025-10-28 02:26:35',
            ),
            31 => 
            array (
                'id' => 32,
                'type' => 'ahli',
                'name' => '4',
                'value' => 'PS Trauma',
                'created_at' => '2025-10-28 02:26:35',
                'updated_at' => '2025-10-28 02:26:35',
            ),
            32 => 
            array (
                'id' => 33,
                'type' => 'ahli',
                'name' => '5',
                'value' => 'PS Psikiatri',
                'created_at' => '2025-10-28 02:26:35',
                'updated_at' => '2025-10-28 02:26:35',
            ),
            33 => 
            array (
                'id' => 34,
                'type' => 'ahli',
                'name' => '6',
                'value' => 'PS Bidai',
                'created_at' => '2025-10-28 02:26:35',
                'updated_at' => '2025-10-28 02:26:35',
            ),
            34 => 
            array (
                'id' => 35,
                'type' => 'ahli',
                'name' => '7',
                'value' => 'PS infeksi',
                'created_at' => '2025-10-28 02:26:35',
                'updated_at' => '2025-10-28 02:26:35',
            ),
            35 => 
            array (
                'id' => 36,
                'type' => 'jpp',
                'name' => '1',
                'value' => 'Labratorium',
                'created_at' => '2025-10-28 02:26:35',
                'updated_at' => '2025-10-28 02:26:35',
            ),
            36 => 
            array (
                'id' => 37,
                'type' => 'jpp',
                'name' => '2',
                'value' => 'Radiologi',
                'created_at' => '2025-10-28 02:26:35',
                'updated_at' => '2025-10-28 02:26:35',
            ),
            37 => 
            array (
                'id' => 38,
                'type' => 'jpp',
                'name' => '3',
                'value' => 'Lainnya',
                'created_at' => '2025-10-28 02:26:35',
                'updated_at' => '2025-10-28 02:26:35',
            ),
        ));
        
        
    }
}