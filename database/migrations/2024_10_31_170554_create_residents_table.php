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
        Schema::create('residents', function (Blueprint $table) {
            $table->id('resident_id');
            $table->string('resident_number', 50)->unique();
            $table->string('first_name', 100)->nullable();
            $table->string('last_name', 100)->nullable();
            $table->longText('address')->nullable();
            $table->date('birth_date')->nullable();
            $table->string('contact_number', 20)->nullable();
            // $table->unsignedBigInteger('barangay_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('residents');
    }
};
