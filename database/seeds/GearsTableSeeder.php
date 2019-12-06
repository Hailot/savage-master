<?php

use App\Gear;
use Illuminate\Database\Seeder;

class GearsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('gears')->delete();

        $data = new ArrayObject();

        $gearjson = File::get("database/json/gear/gear.json");
        $gear = json_decode($gearjson);
        foreach ($gear as $item) {
            $data->offsetSet(null, $item);
        }

        foreach ($data as $gear)
        {
            Gear::create(array(
                'name' => $gear->gear_name,
                'description' => '',
                'damage' => $gear->gear_damage,
                'cost' => $gear->gear_cost,
                'weight' => $gear->gear_weight,
                'properties' => $gear->gear_properties,
                'type' => $gear->gear_type,
                'pic' => $gear->gear_pic
            ));
        }
    }
}
