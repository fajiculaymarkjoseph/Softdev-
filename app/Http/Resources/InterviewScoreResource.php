<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class InterviewScoreResource extends JsonResource
{
   // app/Http/Resources/ScoreResource.php

public function toArray($request)
{
    return [
        'id' => $this->id,
        'interview_schedule_id' => $this->interview_schedule_id,
        'score' => $this->score,
        'comments' => $this->comments,
        'status' => $this->score >= 70 ? 'Passed' : 'Failed'
    ];
}

}

