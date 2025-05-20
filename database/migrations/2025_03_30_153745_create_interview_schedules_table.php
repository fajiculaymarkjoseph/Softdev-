<?php
// database/migrations/YYYY_MM_DD_create_interview_schedules_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInterviewSchedulesTable extends Migration
{
    public function up()
    {
        Schema::create('interview_schedules', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('interviewer_id');
            $table->unsignedBigInteger('applicant_id');
            $table->dateTime('scheduled_at');
            $table->string('room_number');
            $table->string('modality');
            $table->string('status')->default('in-progress');
            $table->timestamps();

            // Foreign key relationships
            $table->foreign('interviewer_id')->references('id')->on('interviewers')->onDelete('cascade');
            $table->foreign('applicant_id')->references('id')->on('applicants')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('interview_schedules');
    }
}

