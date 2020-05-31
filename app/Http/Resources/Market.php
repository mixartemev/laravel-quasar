<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Market extends JsonResource
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
            'market' => $this->market,
            'ts_code' => $this->ts_code,
            'profile_id' => $this->profile_id,
            'tariff_id' => $this->tariff_id,
            'cur' => $this->cur,
        ];
    }
}
