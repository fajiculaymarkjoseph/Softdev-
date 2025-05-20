<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use Illuminate\Http\Request;

class ApplicantController extends Controller
{
    // Get all applicants
    public function index()
    {
        return response()->json(Applicant::all());
    }

    // Store a new applicant
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name'  => 'required|string|max:255',
            'email'      => 'required|email|unique:applicants,email',
            'department' => 'required|string|max:255',
        ]);

        $applicant = Applicant::create($request->only(['first_name', 'last_name', 'email', 'department']));

        return response()->json([
            'message' => 'Applicant created successfully',
            'applicant' => $applicant
        ], 201);
    }

    // Show a single applicant
    public function show($id)
    {
        $applicant = Applicant::find($id);

        if (!$applicant) {
            return response()->json(['message' => 'Applicant not found'], 404);
        }

        return response()->json($applicant);
    }

    // Update an applicant
    public function update(Request $request, $id)
    {
        $applicant = Applicant::find($id);

        if (!$applicant) {
            return response()->json(['message' => 'Applicant not found'], 404);
        }

        $request->validate([
            'first_name' => 'sometimes|string|max:255',
            'last_name'  => 'sometimes|string|max:255',
            'email'      => 'sometimes|email|unique:applicants,email,' . $id,
            'department' => 'sometimes|string|max:255',
        ]);

        $applicant->update($request->only(['first_name', 'last_name', 'email', 'department']));

        return response()->json([
            'message' => 'Applicant updated successfully',
            'applicant' => $applicant
        ]);
    }

    // Delete an applicant
    public function destroy($id)
    {
        $applicant = Applicant::find($id);

        if (!$applicant) {
            return response()->json(['message' => 'Applicant not found'], 404);
        }

        $applicant->delete();

        return response()->json(['message' => 'Applicant deleted successfully']);
    }
}
