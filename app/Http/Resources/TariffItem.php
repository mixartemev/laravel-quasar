<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TariffItem extends JsonResource
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
            'tariff_id' => $this->tariff_id,
            'level' => $this->level,
            'percent' => $this->percent,
        ];
    }
}
