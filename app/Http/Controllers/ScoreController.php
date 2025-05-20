<?php

namespace App\Http\Controllers;

use App\Models\Score;
use App\Models\Applicant; // or Applicant if you have a separate model
use App\Models\Interviewer;
use Illuminate\Http\Request;
use App\Models\InterviewSchedule;
use App\Models\ApplicantInterviewStatus;

class ScoreController extends Controller
{
    // List all scores (optional)
    public function index()
    {
        return Score::with(['applicant', 'interviewer'])->get();
    }

    // Store or update a score
    public function store(Request $request)
{
    $request->validate([
        'interview_schedule_id' => 'required|exists:interview_schedules,id',
        'score' => 'required|numeric|min:0|max:100',
        'comments' => 'nullable|string'
    ]);

    $score = Score::create([
        'interview_schedule_id' => $request->interview_schedule_id,
        'score' => $request->score,
        'comments' => $request->comments
    ]);

    return response()->json([
        'message' => 'Score saved',
        'data' => $score
    ]);
}

    // View a single score by ID
    public function show($id)
    {
        $score = Score::with(['applicant', 'interviewer'])->find($id);

        if (!$score) {
            return response()->json(['message' => 'Score not found'], 404);
        }

        return response()->json($score);
    }

    // Delete a score
    public function destroy($id)
    {
        $score = Score::find($id);

        if (!$score) {
            return response()->json(['message' => 'Score not found'], 404);
        }

        $score->delete();

        return response()->json(['message' => 'Score deleted successfully']);
    }
}
