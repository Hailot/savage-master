<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class GearResource extends JsonResource
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
            'gear_id' => $this->id,
            'gear_name' => $this->name,
            'gear_cost' => $this->cost,
            'gear_damage' => $this->damge,
            'gear_description' => $this->description,
            'gear_pic' => $this->pic,
            'gear_properties' => $this->properties,
            'gear_type' => $this->types,
            'gear_weight' => $this->
        ];
    }
}
