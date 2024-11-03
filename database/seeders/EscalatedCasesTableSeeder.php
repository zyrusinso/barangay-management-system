<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\EscalatedCase;
use App\Enum\EscalatedCaseStatus;

class EscalatedCasesTableSeeder extends Seeder
{
    public function run()
    {
        EscalatedCase::create([
            'case_id' => 1,
            'escalation_date' => now(),
            'pnp_received_id' => 123,
            'reason' => 'Escalation reason',
            'escalated_by' => 1,
            'status' => EscalatedCaseStatus::ESCALATED,
        ]);
    }
} 