<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Enum\MedicalReferralStatus;
return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('medical_referrals', function (Blueprint $table) {
            $table->id('referral_id');
            $table->unsignedBigInteger('case_id');
            $table->unsignedBigInteger('resident_id');
            $table->string('healthcare_facility', 255)->nullable();
            $table->date('referral_date')->nullable();
            $table->text('purpose')->nullable();
            $table->enum('status', MedicalReferralStatus::values())->default(MedicalReferralStatus::PENDING);
            $table->timestamps();

            $table->foreign('case_id')->references('case_id')->on('lupon_cases');
            $table->foreign('resident_id')->references('resident_id')->on('residents');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medical_referrals');
    }
};
