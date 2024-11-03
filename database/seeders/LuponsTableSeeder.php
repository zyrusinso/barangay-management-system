<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Lupon;

class LuponsTableSeeder extends Seeder
{
    public function run()
    {
        Lupon::create([
            'first_name' => 'John',
            'last_name' => 'Doe',
            'email' => 'john.doe@example.com',
            'position' => 'Chairman',
            'contact_number' => '1234567890',
        ]);
    }
} 