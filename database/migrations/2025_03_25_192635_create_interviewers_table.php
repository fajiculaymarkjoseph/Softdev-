<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up()
{
    Schema::create('interviewers', function (Blueprint $table) {
        $table->id();
        $table->string('first_name');
        $table->string('last_name');
        $table->string('email')->unique();
        $table->string('department');
        $table->string('employee_id')->unique();
        $table->string('position');
        $table->date('date_of_birth');
        $table->enum('sex', ['Male', 'Female', 'Other']);
        $table->string('civil_status');
        $table->string('contact_number');
        $table->text('address')->nullable();
        $table->text('medical_conditions')->nullable();
        $table->timestamps();
    });
}

    

    
    public function down(): void
    {
        Schema::dropIfExists('interviewers');
    }
};
