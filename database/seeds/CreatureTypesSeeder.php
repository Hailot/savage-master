<?php

use App\CreatureType;
use Illuminate\Database\Seeder;

class CreatureTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        CreatureType::create([
            'name' => 'aberration'
        ]);
        CreatureType::create([
            'name' => 'beast'
        ]);
        CreatureType::create([
            'name' => 'celestial'
        ]);
        CreatureType::create([
            'name' => 'construct'
        ]);
        CreatureType::create([
            'name' => 'dragon'
        ]);
        CreatureType::create([
            'name' => 'elemental'
        ]);
        CreatureType::create([
            'name' => 'fey'
        ]);
        CreatureType::create([
            'name' => 'fiend'
        ]);
        CreatureType::create([
            'name' => 'giant'
        ]);
        CreatureType::create([
            'name' => 'humanoid'
        ]);
        CreatureType::create([
            'name' => 'monstrosity'
        ]);
        CreatureType::create([
            'name' => 'ooze'
        ]);
        CreatureType::create([
            'name' => 'plant'
        ]);
        CreatureType::create([
            'name' => 'undead'
        ]);


    }
}
