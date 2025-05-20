<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Score extends Model
{
    use HasFactory;

    protected $fillable = ['interview_schedule_id', 'score', 'comments'];

    protected $hidden = ['created_at', 'updated_at']; 
    protected $appends = ['created_at_readable', 'updated_at_readable']; 

    public function interviewSchedule()
    {
        return $this->belongsTo(InterviewSchedule::class);
    }

    public function applicant()
    {
        return $this->hasOneThrough(
            \App\Models\Applicant::class,
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
            \App\Models\Interviewer::class,
            InterviewSchedule::class,
            'id',
            'id',
            'interview_schedule_id',
            'interviewer_id'
        );
    }

    public function getCreatedAtReadableAttribute()
    {
        return Carbon::parse($this->created_at)->toDayDateTimeString();
    }

    public function getUpdatedAtReadableAttribute()
    {
        return Carbon::parse($this->updated_at)->toDayDateTimeString();
    }
}
