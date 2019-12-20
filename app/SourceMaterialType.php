<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SourceMaterialType extends Model
{
    /* Fillable */
    protected $fillable = [
        'name', 'descripton'
    ];

    public function sourceMaterials() {
        return $this->hasMany(SourceMaterial::class);
    }

    public function subtypes() {
        return $this->hasMany(SourceMaterialSubtype::class);
    }
}
