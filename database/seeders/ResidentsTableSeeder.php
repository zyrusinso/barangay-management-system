<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Resident;

class ResidentsTableSeeder extends Seeder
{
    public function run()
    {
        Resident::create([
            'resident_number' => 'R-001',
            'first_name' => 'Jane',
            'last_name' => 'Doe',
            'address' => '123 Main St',
            'birth_date' => '1990-01-01',
            'contact_number' => '0987654321',
            'barangay_id' => 1,
        ]);

        Resident::create([
            'resident_number' => 'R-002',
            'first_name' => 'John', 
            'last_name' => 'Smith',
            'address' => '456 Oak Ave',
            'birth_date' => '1985-06-15',
            'contact_number' => '0912345678',
            'barangay_id' => 1,
        ]);
    }
} 