<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SourceMaterialSubtype extends Model
{
    /* Fillable */
    protected $fillable = [
        'name', 'descripton', 'source_material_type_id'
    ];

    public function sourceMaterials() {
        return $this->hasMany(SourceMaterial::class);
    }

    public function subtypes() {
        return $this->hasMany(SourceMaterialSubtype::class);
    }
}
