<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TeachersResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {

        return [
            'id'=> (string)$this->id,
            'type' => 'teachers',

            'attributes' => [
                 'username'=> $this->username,
                 'fullname'=> $this->fullname,
                 'email'=> $this->email,
                 'created_at'=> $this->created_at,
                 'updated_at'=> $this->updated_at,
                 'href' => [
                    'periods' => route('periods.index',$this->id)
                 ],
            ],
            'periods' => PeriodResource::collection($this->whenLoaded('periods')),

        ];


 
    }
}
