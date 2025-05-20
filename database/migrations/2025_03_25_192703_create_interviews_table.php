<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('interviews', function (Blueprint $table) {
            $table->id();
            $table->string('applicant_no');
            $table->string('applicant_name');
            $table->string('program');
            $table->string('progress');
            $table->string('time_slot');
            $table->string('interviewer');
            $table->timestamps();
        });        
    }
    



    public function down(): void
    {
        Schema::dropIfExists('interviews');
    }
};
