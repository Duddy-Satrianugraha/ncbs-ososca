<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => "Super admin",
            'username' => "ultraman",
            'slug' => 'xxx_999_1',
            'email' => 'ultra@fk.ugj',
            'email_verified_at' => now(),
            'password' => Hash::make('buka'),
            'remember_token' => Str::random(10),
        ]);

        User::create([
            'name' => "Mas IT",
            'username' => "it",
            'slug' => 'xxx_999_2',
            'email' => 'it@fk.ugj',
            'email_verified_at' => now(),
            'password' => Hash::make('buka'),
            'remember_token' => Str::random(10),
        ]);

        User::create([
            'name' => "Mas koc",
            'username' => "koc",
            'slug' => 'xxx_999_3',
            'email' => 'koc@fk.ugj',
            'email_verified_at' => now(),
            'password' => Hash::make('buka'),
            'remember_token' => Str::random(10),
        ]);

        User::create([
            'name' => "Mas admin",
            'username' => "admin",
            'slug' => 'xxx_999_4',
            'email' => 'admin@fk.ugj',
            'email_verified_at' => now(),
            'password' => Hash::make('buka'),
            'remember_token' => Str::random(10),
        ]);

        User::create([
            'name' => "Mas Materi",
            'username' => "materi",
            'slug' => 'xxx_999_5',
            'email' => 'materi@fk.ugj',
            'email_verified_at' => now(),
            'password' => Hash::make('buka'),
            'remember_token' => Str::random(10),
        ]);

        User::create([
            'name' => "dr. Novi Robbayanti Fiqih",
            'username' => "drnovi",
            'slug' => '90921130',
            'email' => 'drnovi@fk.ugj',
            'email_verified_at' => now(),
            'password' => Hash::make('buka'),
            'remember_token' => Str::random(10),
        ]);

        User::create([
            'name' => "dr. Rizkia Alifia Fitriani",
            'username' => "drkia",
            'slug' => '90931237',
            'email' => 'drkia@fk.ugj',
            'email_verified_at' => now(),
            'password' => Hash::make('buka'),
            'remember_token' => Str::random(10),
        ]);

        User::create([
            'name' => "dr. Lita Harlianti",
            'username' => "drlita",
            'slug' => '90941207',
            'email' => 'drlita@fk.ugj',
            'email_verified_at' => now(),
            'password' => Hash::make('buka'),
            'remember_token' => Str::random(10),
        ]);

        User::create([
            'name' => "dr. Permata Ayuning Tyas",
            'username' => "drtyas",
            'slug' => '90931224',
            'email' => 'drtyas@fk.ugj',
            'email_verified_at' => now(),
            'password' => Hash::make('buka'),
            'remember_token' => Str::random(10),
        ]);
         User::create([
            'name' => "dr. Ghina Sofiana Lestari",
            'username' => "drghina",
            'slug' => '90950938',
            'email' => 'drghina@fk.ugj',
            'email_verified_at' => now(),
            'password' => Hash::make('buka'),
            'remember_token' => Str::random(10),
        ]);
          User::create([
            'name' => "dr. Coryna Frisqila",
            'username' => "droi",
            'slug' => '90930422',
            'email' => 'droi@fk.ugj',
            'email_verified_at' => now(),
            'password' => Hash::make('buka'),
            'remember_token' => Str::random(10),
        ]);
           User::create([
            'name' => "dr. Mellyna Irianti Sujana",
            'username' => "drmelly",
            'slug' => '90960501',
            'email' => 'drmelly@fk.ugj',
            'email_verified_at' => now(),
            'password' => Hash::make('buka'),
            'remember_token' => Str::random(10),
        ]);
            User::create([
            'name' => "dr. Erma Permata Sari",
            'username' => "drerma",
            'slug' => '90930625',
            'email' => 'drerma@fk.ugj',
            'email_verified_at' => now(),
            'password' => Hash::make('buka'),
            'remember_token' => Str::random(10),
        ]);










    }

}
