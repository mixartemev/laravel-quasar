<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Tariff extends JsonResource
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
            'name' => $this->name,
            'market_type' => $this->market_type,
            'deposit' => $this->deposit,
            'min' => $this->min,
            'min_condition' => $this->min_condition,
        ];
    }
}
