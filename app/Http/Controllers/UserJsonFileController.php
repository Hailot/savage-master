<?php

namespace App\Http\Controllers;

use App\Creature;
use App\Gear;
use App\Http\Resources\CreatureResource;
use App\Http\Resources\GearResource;
use App\Http\Resources\SpellResource;
use App\Spell;
use App\User;
use App\UserJsonFile;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Response;
use function GuzzleHttp\Promise\all;

class UserJsonFileController extends Controller
{
    public function download($file)
    {
        return Storage::disk('s3')->download('userfiles/tomejson/'.$file.'.json');
    }

    public function makeJsonFile(Request $request)
    {
        $dataType = $request->get('dataType');

        $selectedIds = $request->get('selectedIds');
        $data = null;
        switch ($dataType) {
            case 'spells':
                $data = SpellResource::collection(Spell::all());
                $filename = time() . mt_rand() . '_spells';
                break;
            case 'gear':
                $data = GearResource::collection(Gear::all());
                $filename = time() . mt_rand() . '_gear';
                break;
            case 'creatures':
                $data = CreatureResource::collection(Creature::all());
                $filename = time() . mt_rand() . '_creatures';
                break;
        }
        if ($data === null) {
            return ['error' => true, 'message' => 'No Data was found'];
        }
        $filtered = $data->wherein('id',$selectedIds);
        $json = json_encode($filtered->all());
        $path = 'userfiles/tomejson/' .$filename;
        Storage::disk('s3')->put($path.'.json', $json.'.json', 'public');

        $userfile = UserJsonFile::create([
            'file_name' => $filename,
            'path' => $path.'.json',
            'user_id' => auth()->user()->id
        ]);




        return $filename;
    }

    public function getUserFiles(Request $request)
    {
        $files = UserJsonFile::where('user_id',auth()->user()->id)->get();

        return view('user.files')->with('files', $files);

    }
}
