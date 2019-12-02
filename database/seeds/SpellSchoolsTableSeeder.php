<?php

use Illuminate\Database\Seeder;

class SpellSchoolsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('spell_schools')->insert(
            [
                'name' => 'abjuration'
            ]
        );
        DB::table('spell_schools')->insert(
            [
                'name' => 'conjuration'
            ]
        );
        DB::table('spell_schools')->insert(
            [
                'name' => 'divination'
            ]
        );
        DB::table('spell_schools')->insert(
            [
                'name' => 'enchantment'
            ]
        );
        DB::table('spell_schools')->insert(
            [
                'name' => 'evocation'
            ]
        );
        DB::table('spell_schools')->insert(
            [
                'name' => 'illusion'
            ]
        );
        DB::table('spell_schools')->insert(
            [
                'name' => 'necromancy'
            ]
        );
        DB::table('spell_schools')->insert(
            [
                'name' => 'transmutation'
            ]
        );
        DB::table('spell_schools')->insert(
            [
                'name' => 'avatar'
            ]
        );
        DB::table('spell_schools')->insert(
            [
                'name' => 'awakened'
            ]
        );
        DB::table('spell_schools')->insert(
            [
                'name' => 'immortal'
            ]
        );
        DB::table('spell_schools')->insert(
            [
                'name' => 'nomad'
            ]
        );
        DB::table('spell_schools')->insert(
            [
                'name' => 'wu jen'
            ]
        );
    }
}
