<?php

use App\Creature;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RolesAndPermissionsSeeder::class);
        $this->call(UsersTableSeeder::class);
         $this->call(SpellSchoolsTableSeeder::class);
         $this->call(SpellsTableSeeder::class);
         $this->call(GearsTableSeeder::class);
         $this->call(CreatureTypesSeeder::class);
        $this->call(CreateCreaturesSeeder::class);
        $this->call(SourceMaterialSeeder::class);
//         $this->call(CreaturesTableSeeder::class);
        $this->call(SourceMaterialTypesTableSeeder::class);
        $this->call(SourceMaterialSubtypesTableSeeder::class);
        $this->call(SourceMaterialsTableSeeder::class);
    }
}
