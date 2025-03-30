<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InterviewScheduleSeeder extends Seeder
{
    public function run()
    {
        DB::table('interview_schedules')->insert([
            [
                'candidate_name' => 'John Doe',
                'interviewer' => 'Jane Smith',
                'date' => '2025-04-02',
                'time' => '10:00:00',
                'status' => 'scheduled',
                'score' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
