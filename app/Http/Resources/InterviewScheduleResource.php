<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class InterviewScheduleResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'applicant' => $this->applicant ? $this->applicant->first_name . ' ' . $this->applicant->last_name : null,
            'interviewer' => $this->interviewer ? $this->interviewer->first_name . ' ' . $this->interviewer->last_name : null,
            'scheduled_at' => $this->scheduled_at ? \Carbon\Carbon::parse($this->scheduled_at)->format('F j, Y g:i A') : null,
            'room_number' => $this->room_number,
            'modality' => $this->modality,
            'status' => $this->status,
            'created_at' => $this->created_at ? \Carbon\Carbon::parse($this->created_at)->format('F j, Y g:i A') : null,
            'updated_at' => $this->updated_at ? \Carbon\Carbon::parse($this->updated_at)->format('F j, Y g:i A') : null,

        ];
    }
}
