<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Interview extends Model
{
    use HasFactory;



    // Relationship: Interview belongs to an applicant
    public function applicant() {
        return $this->belongsTo(Applicant::class);
    }

    // Relationship: Interview belongs to an interviewer
    public function interviewer() {
        return $this->belongsTo(Interviewer::class);
    }

    // Relationship: Interview has many scores
    public function scores() {
        return $this->hasMany(Score::class);
    }
}

