<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $fillable = [
        'room_number',
        'name',           // Optional: e.g., "Conference Room A"
        'capacity',       // Optional: Number of people the room can hold
        'location',       // Optional: e.g., "Building 1, 2nd Floor"
        'modality'        // Optional: e.g., 'online' or 'in-person'
    ];

    public function interviewSchedules()
    {
        return $this->hasMany(InterviewSchedule::class);
    }
}
