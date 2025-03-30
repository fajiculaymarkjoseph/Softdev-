<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use Illuminate\Http\Request;

class ApplicantController extends Controller
{
    public function index()
    {
        return Applicant::all();
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:applicants',
        ]);

        $applicant = Applicant::create($data);
        return response()->json($applicant, 201);
    }

    public function show(Applicant $applicant)
    {
        return response()->json($applicant);
    }

    public function update(Request $request, Applicant $applicant)
    {
        $data = $request->validate([
            'name' => 'string',
            'email' => 'email|unique:applicants,email,' . $applicant->id,
        ]);

        $applicant->update($data);
        return response()->json($applicant);
    }

    public function destroy(Applicant $applicant)
    {
        $applicant->delete();
        return response()->json(['message' => 'Applicant deleted']);
    }

    
}
