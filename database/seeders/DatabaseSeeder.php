<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            ResidentsTableSeeder::class,
            LuponsTableSeeder::class,
            LuponCasesTableSeeder::class,
            SchedulesTableSeeder::class,
            MedicalReferralsTableSeeder::class,
            EscalatedCasesTableSeeder::class,
            DocumentsTableSeeder::class,
            UserSeeder::class,
            ShieldSeeder::class,
        ]);
    }
}
