<?php

use App\SourceMaterial;
use App\SourceMaterialSubtype;
use App\SourceMaterialType;
use Illuminate\Database\Seeder;

class SourceMaterialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()

    {
        $offical = SourceMaterialType::create([
            'name' => 'official'
        ]);
        $homebrew = SourceMaterialType::create([
            'name' => 'Homebrew'
        ]);
        $thirdParty = SourceMaterialType::create([
            'name' => '3rd Party'
        ]);

        $directories = Storage::disk('s3')->allDirectories('source-material/official');
        foreach ($directories as $directory) {
            if($directory != 'source-material/official/Unearthed Arcana'){
                $subtypeName = $this->after('source-material/official/',$directory);
                $subtype = SourceMaterialSubtype::create([
                    'name' => $subtypeName,
                    'source_material_type_id' => $offical->id
                ]);
                $files = Storage::disk('s3')->files($directory);
                foreach ($files as $file) {
                    $fileName = $this->after('source-material/official/'.$subtypeName.'/',$file);
                    $path = 'source-material/official/'.$subtypeName.'/'.$fileName;
                    SourceMaterial::create([
                        'title' => $fileName,
                        'path' => $path,
                        'size' => Storage::disk('s3')->size($path),
                        'source_material_type_id' => $offical->id,
                        'source_material_subtype_id' => $subtype->id
                    ]);
                }
            }
        }

        $skipArray = [
            'source-material/homebrew/gm-tools//CampaignTemplate_1.scriv',
            'source-material/homebrew/gm-tools',
        ];
        $directories = Storage::disk('s3')->allDirectories('source-material/homebrew');
        foreach ($directories as $directory) {
            if(strpos($directory,'source-material/homebrew/gm-tools') !== false) {
            }else {
                $subtypeName = $this->after('source-material/homebrew/',$directory);
                $subtype = SourceMaterialSubtype::create([
                    'name' => $subtypeName,
                    'source_material_type_id' => $homebrew->id
                ]);
                $files = Storage::disk('s3')->files($directory);
                foreach ($files as $file) {
                    dump($file);
                    $fileName = $this->after('source-material/homebrew/'.$subtypeName.'/',$file);
                    $path = 'source-material/homebrew/'.$subtypeName.'/'.$fileName;
                    SourceMaterial::create([
                        'title' => $fileName,
                        'path' => $path,
                        'size' => Storage::disk('s3')->size($path),
                        'source_material_type_id' => $homebrew->id,
                        'source_material_subtype_id' => $subtype->id
                    ]);
                }
            }
        }

        $directories = Storage::disk('s3')->allDirectories('source-material/3rd-party');
        foreach ($directories as $directory) {

                $subtypeName = $this->after('source-material/3rd-party/',$directory);
                $subtype = SourceMaterialSubtype::create([
                    'name' => $subtypeName,
                    'source_material_type_id' => $thirdParty->id
                ]);
                $files = Storage::disk('s3')->files($directory);
                foreach ($files as $file) {
                    $fileName = $this->after('source-material/3rd-party/'.$subtypeName.'/',$file);
                    $path = 'source-material/3rd-party/'.$subtypeName.'/'.$fileName;
                    SourceMaterial::create([
                        'title' => $fileName,
                        'path' => $path,
                        'size' => Storage::disk('s3')->size($path),
                        'source_material_type_id' => $thirdParty->id,
                        'source_material_subtype_id' => $subtype->id
                    ]);
                }

        }
    }
    function after ($after, $inthat)
    {
        if (!is_bool(strpos($inthat, $after)))
            return substr($inthat, strpos($inthat,$after)+strlen($after));
    }
    function before ($before, $inthat)
    {
        return substr($inthat, 0, strpos($inthat, $before));
    }


}
