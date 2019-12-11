<?php

use App\PlayerClass;
use Illuminate\Database\Seeder;

class PlayerClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PlayerClass::create([
            'name' => ''
        ]);
    }
}
