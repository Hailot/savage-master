<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlayerClass extends Model
{
    /* Fillable */
    protected $fillable = [
        'name', 'description', 'pic',
    ];
    /* @array $appends */
    public $appends = ['url'];

    public function getUrlAttribute()
    {
        return Storage::disk('s3')->url($this->path);
    }
}
