<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Applicant extends Model
{
    use HasFactory;

    protected $fillable = ['first_name', 'last_name', 'email', 'department'];

    public function interviews()
    {
        return $this->hasMany(InterviewSchedule::class, 'applicant_id');
    }
}

