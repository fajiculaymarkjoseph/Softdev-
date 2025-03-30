<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('interviews', function (Blueprint $table) {
        $table->id();
        $table->string('interviewer_id');
        $table->string('applicant_id');
        $table->dateTime('date_time');
        $table->string('room_number');
        $table->string('modality');
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('interviews');
    }
};
