<?php

use App\Creature;
use App\CreatureType;
use Illuminate\Database\Seeder;

class CreaturesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('creatures')->delete();

        $data = new ArrayObject();

        $srdjson = File::get("database/json/creatures/monstersSRD.json");
        $srd = json_decode($srdjson);
        foreach ($srd as $item) {
            $data->offsetSet(null, $item);
        }

        foreach ($data as $creature)
        {
            $creatureType = CreatureType::where('name', strtolower($creature->monster_type))->first();
            if (!$creatureType){
                dd($creature);
            }
            Creature::create([
                'name' => $creature->monster_name,
                'description' => '',
                'type_id' => $creatureType->id,
                'sub_type_id' => null,
                'languages' => $creature->monster_lang,
                'size' => $creature->monster_size,
                'speed' => $creature->monster_speed,
                'challenge_rating' => $creature->monster_cr,

                'average_hitpoints' => $creature->monster_hitPoints,
                'hitpoint_dice' => '',
                'armor_class' => $creature->monster_armorClass,
                'alignment' => $creature->monster_alignment,
                'source' => $creature->monster_source,
                'skills' => $creature->monster_skills,
                'senses' => $creature->monster_senses,

                'saving_throws' => $creature->monster_savingThrows,
                'damage_vulnerabilities' => $creature->monster_dmgVulnerabilities,
                'damage_resistances' => $creature->monster_dmgResistance,
                'damage_immunities' => $creature->monster_dmgImmunities,

                'condition_immunities' => $creature->monster_conImmunities,
                'legendary_actions' => $creature->monster_lAbtl,
                'special_abilities' => $creature->monster_sAblt,
                'attacks' => $creature->monster_ablt,

                'strength' => $creature->monster_strength,
                'dexterity' => $creature->monster_dexterity,
                'constitution' => $creature->monster_constitution,
                'intelligence' => $creature->monster_intelligence,
                'wisdom' => $creature->monster_wisdom,
                'charisma' => $creature->monster_charisma,
                'pic' => ''
            ]);
        }
    }
}
