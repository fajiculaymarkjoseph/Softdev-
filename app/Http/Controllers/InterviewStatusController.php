<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ApplicantInterviewStatus;
use App\Models\InterviewSchedule;
use App\Models\Score;

class InterviewStatusController extends Controller
{
    // List all statuses
    public function index()
    {
        return response()->json(ApplicantInterviewStatus::with('applicant')->get());
    }

    // Show status for a specific applicant
    public function show($applicant_id)
    {
        // Get all schedules for this applicant
        $schedules = InterviewSchedule::where('applicant_id', $applicant_id)->pluck('id');

        if ($schedules->isEmpty()) {
            return response()->json([
                'applicant_id' => $applicant_id,
                'status' => 'Pending'
            ]);
        }

        $scores = Score::whereIn('interview_schedule_id', $schedules)->get();

        if ($scores->count() === 0) {
            return response()->json([
                'applicant_id' => $applicant_id,
                'status' => 'Pending'
            ]);
        }

        if ($scores->count() < $schedules->count()) {
            return response()->json([
                'applicant_id' => $applicant_id,
                'status' => 'In Progress'
            ]);
        }

        $average = $scores->avg('score');
        $finalStatus = $average >= 70 ? 'Passed' : 'Failed';

        return response()->json([
            'applicant_id' => $applicant_id,
            'status' => 'Evaluation Completed',
            'final_result' => $finalStatus,
            'average_score' => $average
        ]);
    }
}
