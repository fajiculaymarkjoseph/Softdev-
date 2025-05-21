<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\InterviewSchedule;
use App\Models\Applicant;
use App\Models\Interviewer;
use Carbon\Carbon;

class Score extends Model
{
    use HasFactory;

    protected $fillable = ['interview_schedule_id', 'score', 'comments'];
    protected $hidden = ['created_at', 'updated_at'];
    protected $appends = ['created_at_human', 'updated_at_human'];


    // Relationships
    public function applicant()
    {
        return $this->hasOneThrough(
            Applicant::class,
            InterviewSchedule::class,
            'id',
            'id',
            'interview_schedule_id',
            'applicant_id'
        );
    }

    public function interviewer()
    {
        return $this->hasOneThrough(
            Interviewer::class,
            InterviewSchedule::class,
            'id',
            'id',
            'interview_schedule_id',
            'interviewer_id'
        );
    }

    public function interviewSchedule()
    {
        return $this->belongsTo(InterviewSchedule::class);
    }

    

    // Accessors
    public function getCreatedAtHumanAttribute()
{
    return Carbon::parse($this->created_at)->toDayDateTimeString();
}

public function getUpdatedAtHumanAttribute()
{
    return Carbon::parse($this->updated_at)->toDayDateTimeString();
}

}
