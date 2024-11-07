<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('escalated_cases', function (Blueprint $table) {
            $table->id('escalation_id');
            $table->unsignedBigInteger('case_id');
            $table->date('escalation_date')->nullable();
            $table->integer('pnp_received_id')->nullable();
            $table->text('reason')->nullable();
            $table->unsignedBigInteger('escalated_by');
            $table->string('status')->nullable();
            $table->timestamps();

            $table->foreign('case_id')->references('case_id')->on('lupon_cases');
            $table->foreign('escalated_by')->references('lupon_id')->on('lupons');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('escalated_cases');
    }
};
