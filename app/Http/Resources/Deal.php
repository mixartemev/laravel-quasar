<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Deal extends JsonResource
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
            'id' => $this->id,
            'ticker' => $this->ticker,
            'price' => $this->price,
            'profile_id' => $this->profile_id,
            'when' => $this->when,
        ];
    }
}
