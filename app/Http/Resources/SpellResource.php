<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SpellResource extends JsonResource
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
            'spell_id' => $this->id,
            'spell_name' => $this->name,
            'spell_classes' => $this->classes,
            'spell_sources' => $this->source,
            'spell_level' => $this->level,
            'spell_school' => $this->school->name,
            'spell_time' => $this->casting_time,
            'spell_range' => $this->range,
            'spell_components' => $this->components,
            'spell_duration' => $this->duration,
            'spell_ritual' => $this->ritual,
            'spell_text' => $this->description,
            'spell_pic' => $this->pic
        ];
    }
}
