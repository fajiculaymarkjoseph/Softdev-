<?php

namespace App\Http\Controllers;

use App\Models\Score;
use App\Models\Interview;
use Illuminate\Http\Request;

class ScoreController extends Controller
{
    public function calculateStatus($interview_id)
    {
        $scores = Score::where('interview_id', $interview_id)->pluck('score');

        if ($scores->isEmpty()) {
            return response()->json(['message' => 'No scores found'], 404);
        }

        $averageScore = $scores->avg();
        $status = $averageScore >= 50 ? 'Passed' : 'Failed';

        $interview = Interview::find($interview_id);
        $interview->status = 'completed';
        $interview->save();

        return response()->json([
            'average_score' => $averageScore,
            'status' => $status
        ]);
    }
}

