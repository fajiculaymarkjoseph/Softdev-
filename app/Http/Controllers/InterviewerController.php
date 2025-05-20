<?php

namespace App\Http\Controllers;

use App\Models\Interviewer;
use Illuminate\Http\Request;

class InterviewerController extends Controller
{
    // Show all interviewers
    public function index()
    {
        $interviewers = Interviewer::all(); // You can also use pagination if you have many records
        return response()->json($interviewers);
    }

    // Store a new interviewer
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:interviewers,email',
            'department' => 'required|string|max:255',
        ]);

        $interviewer = Interviewer::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'department' => $request->department,
        ]);

        return response()->json([
            'message' => 'Interviewer created successfully',
            'interviewer' => $interviewer,
        ], 201);
    }

    // Show a specific interviewer by ID
    public function show($id)
    {
        $interviewer = Interviewer::find($id);

        if (!$interviewer) {
            return response()->json(['message' => 'Interviewer not found'], 404);
        }

        return response()->json($interviewer);
    }

    // Update an existing interviewer
    public function update(Request $request, $id)
    {
        $interviewer = Interviewer::find($id);

        if (!$interviewer) {
            return response()->json(['message' => 'Interviewer not found'], 404);
        }

        // Validate the updated data
        $request->validate([
            'first_name' => 'sometimes|string|max:255',
            'last_name' => 'sometimes|string|max:255',
            'email' => 'sometimes|email|unique:interviewers,email,' . $id,
            'department' => 'sometimes|string|max:255',
        ]);

        // Update only the fields that are passed in the request
        $interviewer->update($request->only(['first_name', 'last_name', 'email', 'department']));

        return response()->json([
            'message' => 'Interviewer updated successfully',
            'interviewer' => $interviewer,
        ]);
    }

    // Delete an interviewer
    public function destroy($id)
    {
        $interviewer = Interviewer::find($id);

        if (!$interviewer) {
            return response()->json(['message' => 'Interviewer not found'], 404);
        }

        $interviewer->delete();

        return response()->json(['message' => 'Interviewer deleted successfully']);
    }

    

}
