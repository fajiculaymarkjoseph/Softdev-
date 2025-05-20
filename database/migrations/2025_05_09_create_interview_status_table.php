<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration{

public function up()
{
    Schema::create('applicant_interview_statuses', function (Blueprint $table) {
        $table->id();
        $table->foreignId('applicant_id')->constrained('users')->onDelete('cascade');
        $table->enum('status', ['Pending', 'In Progress', 'Evaluation Completed', 'Passed', 'Failed']);
        $table->timestamps();
    });
}
};
