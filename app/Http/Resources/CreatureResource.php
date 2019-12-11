<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CreatureResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'monster_name' => $this->name ,
            'monster_ablt' => $this->attacks ,
            'monster_alignment' => $this->alignment ,
            'monster_armorClass' => $this->armor_class ,
            'monster_strength' => $this->strength ,
            'monster_dexterity' => $this->dexterirty ,
            'monster_constitution' => $this->constitution ,
            'monster_intelligence' => $this->intelligence ,
            'monster_wisdom' => $this->wisdom ,
            'monster_charisma' => $this->charisma ,
            'monster_cr' => $this->challenge_rating ,
            'monster_conImmunities' => $this->condition_immunities ,
            'monster_dmgImmunities' => $this->damage_immunities ,
            'monster_dmgResistance' => $this->damage_resistances ,
            'monster_dmgVulnerabilities' => $this->damage_vulnerabilities ,
            'monster_hitPoints' => $this->average_hitpoints ,
            'monster_lAbtl' => $this->legendary_actions ,
            'monster_lang' => $this->languages ,
            'monster_pic' => $this->url ,
            'monster_sAblt' => $this->special_abilities ,
            'monster_savingThrows' => $this->saving_throws ,
            'monster_senses' => $this->senses ,
            'monster_size' => $this->size ,
            'monster_skills' => $this->skills ,
            'monster_source' => $this->source ,
            'monster_speed' => $this->speed,
            'monster_subtype' => $this->subtype ,
            'monster_type' => $this->type->name ,

        ];
    }
}
