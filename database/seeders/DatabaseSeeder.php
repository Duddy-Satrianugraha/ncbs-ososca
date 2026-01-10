<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);


         //$this->call(OpesertasTableSeeder::class)
         $this->call(UsersTableSeeder::class);
         $this->call(RolesTableSeeder::class);
         $this->call(RoleUserTableSeeder::class);
         $this->call(TeamsTableSeeder::class);
         $this->call(TeamUserTableSeeder::class);
         $this->call(OptionsTableSeeder::class);
        // $this->call(OnilaisTableSeeder::class);
         $this->call(OtemplatesTableSeeder::class);
         $this->call(OrubriksTableSeeder::class);
         $this->call(OujiansTableSeeder::class);
         $this->call(OstationsTableSeeder::class);
         $this->call(OsesisTableSeeder::class);

        // $this->call(OfeedbacksTableSeeder::class);
        $this->call(OpengujisTableSeeder::class);

        $this->call(DataDirisTableSeeder::class);


        $this->call(LocationsTableSeeder::class);

        $this->call(NilaisTableSeeder::class);


        $this->call(PendaftaransTableSeeder::class);
        $this->call(PesertasTableSeeder::class);


        $this->call(RotationsTableSeeder::class);
        $this->call(RubriksTableSeeder::class);
        $this->call(SesisTableSeeder::class);

        $this->call(SoalsTableSeeder::class);
        $this->call(StationsTableSeeder::class);


        $this->call(TemplatesTableSeeder::class);
        $this->call(TrmesTableSeeder::class);
        $this->call(UjiansTableSeeder::class);
        $this->call(UmpanbaliksTableSeeder::class);

        $this->call(PblKegsTableSeeder::class);
        $this->call(PblMininotesTableSeeder::class);
    }
}
