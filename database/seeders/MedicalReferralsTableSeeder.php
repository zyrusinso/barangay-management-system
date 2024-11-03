<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MedicalReferral;
use App\Enum\MedicalReferralStatus;

class MedicalReferralsTableSeeder extends Seeder
{
    public function run()
    {
        MedicalReferral::create([
            'case_id' => 1,
            'resident_id' => 1,
            'healthcare_facility' => 'Local Clinic',
            'referral_date' => now(),
            'purpose' => 'Medical check-up',
            'status' => MedicalReferralStatus::PENDING,
        ]);
    }
} 