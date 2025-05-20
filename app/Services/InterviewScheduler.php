<?php
namespace App\Services;

use App\Models\Interview;

class InterviewScheduler
{
    public static function hasConflict($datetime)
    {
        return Interview::where('scheduled_at', $datetime)->exists();
    }
}
