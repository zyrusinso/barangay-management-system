<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\LuponCase;
use App\Enum\CaseStatus;
use App\Enum\CasePriority;

class LuponCasesTableSeeder extends Seeder
{
    public function run()
    {
        LuponCase::create([
            'case_number' => 'LC-001',
            'case_description' => 'Description of case 1',
            'case_status' => CaseStatus::PENDING,
            'resident_complaint_id' => 1,
            'resident_defendant_id' => 2,
            'case_priority' => CasePriority::LOW,
            'lupon_id' => 1,
        ]);
    }
} 