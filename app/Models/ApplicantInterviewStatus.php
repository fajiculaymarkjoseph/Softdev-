<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApplicantInterviewStatus extends Model
{
    use HasFactory;

    protected $fillable = ['applicant_id', 'status'];

    public function applicant()
    {
        return $this->belongsTo(User::class, 'applicant_id');
    }
    
}
