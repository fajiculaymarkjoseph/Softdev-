<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\InterviewSchedule;
use App\Http\Resources\InterviewScheduleResource;
use App\Models\User;

class InterviewController extends Controller
{
   
    public function index()
    {
        $interviews = InterviewSchedule::with(['applicant', 'interviewer'])->get();
        return InterviewScheduleResource::collection($interviews);
    }
    

    
    public function store(Request $request)
    {
        $request->validate([
            'applicant_id' => 'required|exists:applicants,id',
            'interviewer_id' => 'required|exists:interviewers,id',
            'date_time' => 'required|date',
            'room_number' => 'required|string',
            'modality' => 'required|string',
            'status' => 'nullable|string'
        ]);
    
        $schedule = InterviewSchedule::create([
            'applicant_id' => $request->applicant_id,
            'interviewer_id' => $request->interviewer_id,
            'scheduled_at' => $request->date_time,
            'room_number' => $request->room_number,
            'modality' => $request->modality,
            'status' => $request->status ?? 'scheduled'
        ]);
    
        return response()->json([
            'message' => 'Interview schedule created successfully',
            'schedule' => new InterviewScheduleResource($schedule),
        ], 201);
        
        
    }

    public function show($id)
{
    $schedule = InterviewSchedule::with(['applicant', 'interviewer'])->find($id);

    if (!$schedule) {
        return response()->json(['message' => 'Schedule not found'], 404);
    }

    return new InterviewScheduleResource($schedule);
}

    public function assign(Request $request)
    {
        $request->validate([
            'applicant_id' => 'required|exists:applicants,id',
            'interviewer_id' => 'required|exists:interviewers,id',
            'date_time' => 'required|date'
        ]);
    
        $schedule = InterviewSchedule::create([
            'applicant_id' => $request->applicant_id,
            'interviewer_id' => $request->interviewer_id,
            'scheduled_at' => $request->date_time,
            'notes' => $request->notes ?? null
        ]);
    
        return response()->json([
            'message' => 'Interview assigned',
            'schedule' => $schedule
        ]);
    }
    public function update(Request $request, $id)
    {
        $schedule = InterviewSchedule::find($id);
    
        if (!$schedule) {
            return response()->json(['message' => 'Schedule not found'], 404);
        }
    
        $request->validate([
            'applicant_id' => 'sometimes|exists:applicants,id',
            'interviewer_id' => 'sometimes|exists:interviewers,id',
            'date_time' => 'sometimes|date',
            'room_number' => 'sometimes|string',
            'modality' => 'sometimes|string',
            'status' => 'nullable|string'
        ]);
    
        $schedule->update($request->all());
    
        return response()->json([
            'message' => 'Schedule updated',
            'schedule' => $schedule
        ]);
    }
    
    public function destroy($id)
    {
        $schedule = InterviewSchedule::find($id);
    
        if (!$schedule) {
            return response()->json(['message' => 'Schedule not found'], 404);
        }
    
        $schedule->delete();
    
        return response()->json(['message' => 'Schedule deleted successfully']);
    }
    

    
    
}
