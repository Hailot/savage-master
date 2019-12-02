<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SpellSchool extends Model
{
    /* Fillable */
    protected $fillable = [
        'name', 'description', 'pic'
    ];
    public function getNameAttribute($value)
    {
        return ucfirst($value);
    }

    public function spells()
    {
        return $this->belongsToMany(Spell::class);
    }

}
