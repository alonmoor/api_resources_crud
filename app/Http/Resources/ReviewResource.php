<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Review;

class ReviewResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
      //$product = $this->whenLoaded(reviews);
      return [
        'id' => $this->id,
        'customer' => $this->customer,
        'body' => $this->review,
        'star' => $this->star
      ];
    }
}
