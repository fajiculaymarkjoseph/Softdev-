<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ApplicantInterviewStatusResource extends JsonResource
{
    public function toArray($request)
    {
        return [
           'applicant' => $this->applicant ? $this->applicant->first_name . ' ' . $this->applicant->last_name : null,
        'interviewer' => $this->interviewer ? $this->interviewer->first_name . ' ' . $this->interviewer->last_name : null,
        'scheduled_at' => $this->scheduled_at,
        'notes' => $this->notes,

        ];
    }
}
