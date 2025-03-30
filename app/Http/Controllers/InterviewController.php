<?php

namespace App\Http\Controllers;
use App\Models\InterviewSchedule;

use App\Models\Interview;

class InterviewController extends Controller
{
    
public function index() {
    $schedules = InterviewSchedule::all(); // Fetch all records
    return view('schedule.index', compact('schedules'));
}


}



