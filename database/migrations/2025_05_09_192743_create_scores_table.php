<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {
        Schema::create('scores', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('interview_schedule_id'); // must match referenced column type
            $table->decimal('score', 5, 2);
            $table->text('comments')->nullable();
            $table->timestamps();
        
            $table->foreign('interview_schedule_id')
                ->references('id')
                ->on('interview_schedules')
                ->onDelete('cascade');
        });
        
        
    }

    
    public function down(): void
    {
        Schema::dropIfExists('scores');
    }
};
