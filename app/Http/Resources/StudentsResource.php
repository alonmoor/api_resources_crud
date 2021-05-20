<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use \App\Models\Period;
class StudentsResource extends JsonResource
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
               'type' => 'students',
               'attributes' => [
                    'username'=> $this->username,
                    'fullname'=> $this->fullname,
                    'grade'=> $this->grade,
                    'password'=> $this->password,
                    'profile' => route('students.show',$this->id),
                    'created_at'=> $this->created_at,
                    'updated_at'=> $this->updated_at,
                    'href' => [
                        'periods' => route('periods.index',$this->id)
                     ],
                        $this->periods,
                    ],
        ];

    }

    // public function with($request)
    // {
    //   $period =  Period::with('students')->get();
    //     return  [
    //         'version' => '2.0.0'
    //         // response()->json(['message'=>null,'data'=>$period],200);
    //     ];

    //   }
}
