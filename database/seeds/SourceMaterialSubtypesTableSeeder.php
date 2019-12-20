<?php

use Illuminate\Database\Seeder;

class SourceMaterialSubtypesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('source_material_subtypes')->delete();
        
        \DB::table('source_material_subtypes')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'adventures',
                'description' => NULL,
                'source_material_type_id' => 1,
                'created_at' => '2019-12-20 05:45:46',
                'updated_at' => '2019-12-20 05:45:46',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'core',
                'description' => NULL,
                'source_material_type_id' => 1,
                'created_at' => '2019-12-20 05:45:54',
                'updated_at' => '2019-12-20 05:45:54',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'unearthed-arcana',
                'description' => NULL,
                'source_material_type_id' => 1,
                'created_at' => '2019-12-20 05:46:00',
                'updated_at' => '2019-12-20 05:46:00',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'items',
                'description' => NULL,
                'source_material_type_id' => 2,
                'created_at' => '2019-12-20 05:46:11',
                'updated_at' => '2019-12-20 05:46:11',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'lore',
                'description' => NULL,
                'source_material_type_id' => 2,
                'created_at' => '2019-12-20 05:46:39',
                'updated_at' => '2019-12-20 05:46:39',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'player-tools',
                'description' => NULL,
                'source_material_type_id' => 2,
                'created_at' => '2019-12-20 05:46:49',
                'updated_at' => '2019-12-20 05:46:49',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'rules',
                'description' => NULL,
                'source_material_type_id' => 2,
                'created_at' => '2019-12-20 05:46:50',
                'updated_at' => '2019-12-20 05:46:50',
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'source-material',
                'description' => NULL,
                'source_material_type_id' => 2,
                'created_at' => '2019-12-20 05:47:17',
                'updated_at' => '2019-12-20 05:47:17',
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'Systems',
                'description' => NULL,
                'source_material_type_id' => 3,
                'created_at' => '2019-12-20 05:47:57',
                'updated_at' => '2019-12-20 05:47:57',
            ),
        ));
        
        
    }
}