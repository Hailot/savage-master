<?php

use Illuminate\Database\Seeder;

class SourceMaterialTypesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('source_material_types')->delete();
        
        \DB::table('source_material_types')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'official',
                'description' => NULL,
                'created_at' => '2019-12-20 05:45:43',
                'updated_at' => '2019-12-20 05:45:43',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Homebrew',
                'description' => NULL,
                'created_at' => '2019-12-20 05:45:43',
                'updated_at' => '2019-12-20 05:45:43',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => '3rd Party',
                'description' => NULL,
                'created_at' => '2019-12-20 05:45:43',
                'updated_at' => '2019-12-20 05:45:43',
            ),
        ));
        
        
    }
}