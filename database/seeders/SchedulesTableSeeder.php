<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Schedule;
use App\Enum\ScheduleStatus;

class SchedulesTableSeeder extends Seeder
{
    public function run()
    {
        Schedule::create([
            'case_id' => 1,
            'mediation_date' => now(),
            'venue' => 'Community Hall',
            'status' => ScheduleStatus::SCHEDULED,
        ]);
    }
} 