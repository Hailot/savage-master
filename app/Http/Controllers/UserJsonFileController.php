<?php

namespace App\Http\Controllers;

use App\Creature;
use App\Gear;
use App\Spell;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserJsonFileController extends Controller
{
    public function download(Request $request, User $user)
    {

    }
    public function makeJsonFile(Request $request)
    {
        $dataType = $request->get('dataType');

        $selectedIds = $request->get('selectedIds');
        $data = null;
        switch ($dataType) {
            case 'spells':
                $data = Spell::whereIn('id', $selectedIds)->get();
                $filename = time() .rand(). '_spells.json';
                break;
            case 'gear':
                $data = Gear::whereIn('id', $selectedIds)->get();
                $filename = time() .rand(). '_gear.json';
                break;
            case 'creatures':
                $data = Creature::whereIn('id', $selectedIds)->get();
                $filename = time() .rand(). '_creatures.json';
                break;
        }
        if ($data === null) {
            return ['error' => true, 'message' => 'No Data was found'];
        }
        Storage::disk('local')->put('userFiles/json/'.$filename, json_encode($data),'public');

    }

    public function formatOutput($type)
    {
        switch ($type) {
            case 0:
                echo "i equals 0";
                break;
            case 1:
                echo "i equals 1";
                break;
            case 2:
                echo "i equals 2";
                break;
        }
    }
}
