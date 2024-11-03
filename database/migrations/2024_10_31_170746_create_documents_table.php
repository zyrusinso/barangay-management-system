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
        Schema::create('documents', function (Blueprint $table) {
            $table->id('document_id');
            $table->unsignedBigInteger('case_id');
            $table->string('file_path', 255);
            $table->string('file_type', 50);
            $table->unsignedBigInteger('uploaded_by');
            $table->timestamp('uploaded_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamps();

            $table->foreign('case_id')->references('case_id')->on('lupon_cases');
            $table->foreign('uploaded_by')->references('lupon_id')->on('lupons');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('documents');
    }
};
