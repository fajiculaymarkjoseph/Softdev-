<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    use HasFactory;

    protected $fillable = ['interview_id', 'panelist_id', 'score'];

    // Relationship: Score belongs to an interview
    public function interview() {
        return $this->belongsTo(Interview::class);
    }
}
