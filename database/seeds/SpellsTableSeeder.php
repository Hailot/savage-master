<?php

use App\Spell;
use App\SpellSchool;
use Illuminate\Database\Seeder;

class SpellsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //First we clear table
        DB::table('spells')->delete();

        $data = new ArrayObject();

        //Load json file
        $phbjson = File::get("database/json/spellsPHB.json");
        $phb = json_decode($phbjson);
        foreach ($phb as $item)
        {
         $data->offsetSet(null,$item);
        }
        $srdjson = File::get("database/json/spellsPHB.json");
        $srd = json_decode($srdjson);
        foreach ($srd as $item)
        {
            $data->offsetSet(null,$item);
        }
        $eejson = File::get("database/json/spellsEE.json");
        $ee = json_decode($eejson);
        foreach ($phb as $item)
        {
            $data->offsetSet(null,$item);
        }
        $xgtejson = File::get("database/json/spellsXGTE.json");
        $xgte = json_decode($xgtejson);
        foreach ($xgte as $item)
        {
            $data->offsetSet(null,$item);
        }


        foreach ($data as $spell) {
            $school = SpellSchool::where('name',strtolower($spell->spell_school))->first();

Spell::create(array(
                'name' => $spell->spell_name,
                'classes' => $spell->spell_classes,
                'source' => $spell->spell_sources,
                'level' => $spell->spell_level,
                'school_id' => $school->id,
                'casting_time' => $spell->spell_time,
                'range' => $spell->spell_range,
                'components' => $spell->spell_components,
                'duration' => $spell->spell_duration,
                'ritual' => ($spell->spell_ritual = NULL) ? 0 : 1,
                'description' => '',
                'pic' => ''
            ));
        }
    }
}
