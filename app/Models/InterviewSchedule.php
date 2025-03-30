<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InterviewSchedule extends Model
{
    use HasFactory;

    protected $fillable = ['interviewer_id', 'applicant_id', 'date_time', 'room_number', 'modality', 'status'];

    public function applicant()
    {
        return $this->belongsTo(Applicant::class, 'applicant_id');
    }

    public function interviewer()
    {
        return $this->belongsTo(Interviewer::class, 'interviewer_id');
    }
}

