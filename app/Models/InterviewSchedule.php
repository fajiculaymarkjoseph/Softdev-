<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InterviewSchedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'interviewer_id',
        'applicant_id',
        'scheduled_at',
        'room_number',
        'modality',
        'status'
    ];

    
protected $casts = [
    'scheduled_at' => 'datetime',
    'created_at' => 'datetime',
    'updated_at' => 'datetime',
];


    public function applicant()
    {
        return $this->belongsTo(Applicant::class, 'applicant_id');
    }

//     public function schedules() {
//     return $this->hasMany(InterviewSchedule::class);
// }

// public function interviews() {
//     return $this->hasMany(Interview::class);
// }
  public function room()
{
    return $this->belongsTo(Room::class, 'room_number', 'room_number');
}



    public function interviewer()
    {
        return $this->belongsTo(Interviewer::class, 'interviewer_id');
    }
    public function score() {
        return $this->hasOne(Score::class);
    }
    
}
