<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Enum\CaseStatus;
use App\Enum\CasePriority;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('lupon_cases', function (Blueprint $table) {
            $table->id('case_id');
            $table->string('case_number', 50)->unique();
            $table->text('case_description')->nullable();
            $table->enum('case_status', CaseStatus::values())->default(CaseStatus::PENDING);
            $table->unsignedBigInteger('resident_complaint_id');
            $table->unsignedBigInteger('resident_defendant_id');
            $table->timestamps();
            $table->enum('case_priority', CasePriority::values())->default(CasePriority::LOW);
            $table->unsignedBigInteger('lupon_head_id');

            $table->foreign('resident_complaint_id')->references('resident_id')->on('residents');
            $table->foreign('resident_defendant_id')->references('resident_id')->on('residents');
            $table->foreign('lupon_head_id')->references('lupon_id')->on('lupons');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lupon_cases');
    }
};
