<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Interviewer extends Model
{
    use HasFactory;

    protected $fillable = ['first_name', 'last_name', 'email', 'department'];

    public function interviews()
    {
        return $this->hasMany(InterviewSchedule::class, 'interviewer_id');
    }
}


