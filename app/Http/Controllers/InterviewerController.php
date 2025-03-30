<?php

namespace App\Http\Controllers;

use App\Models\Interviewer;
use Illuminate\Http\Request;

class InterviewerController extends Controller
{
    public function index()
    {
        return Interviewer::all();
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:interviewers',
        ]);

        $interviewer = Interviewer::create($data);
        return response()->json($interviewer, 201);
    }

    public function show(Interviewer $interviewer)
    {
        return response()->json($interviewer);
    }

    public function update(Request $request, Interviewer $interviewer)
    {
        $data = $request->validate([
            'name' => 'string',
            'email' => 'email|unique:interviewers,email,' . $interviewer->id,
        ]);

        $interviewer->update($data);
        return response()->json($interviewer);
    }

    public function destroy(Interviewer $interviewer)
    {
        $interviewer->delete();
        return response()->json(['message' => 'Interviewer deleted']);
    }
}
