<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use \App\Models\Student;
class PeriodResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
           //eager loading in case we dont have period stop the indnite loop
        $teacher = $this->whenLoaded('teacher');
        return [
               'id'=> (string)$this->id,
               'type' => 'periods',
                  'attributes' => [
                    'name'=> $this->name,
                     'student' => $this->students,
                     'created_at'=> $this->created_at,
                     'updated_at'=> $this->updated_at,
                  ],
               'teacher' => new TeachersResource($teacher),
               'students' => $this->students,
        ];
    }
}
