<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Item extends Model
{
    /* Fillable */
    protected $fillable = [
        'name', 'description', 'rarity', 'source', 'type', 'pic'
    ];
    /* @array $appends */
    public $appends = ['url', 'uploaded_time', 'size_in_kb'];

    public function getUrlAttribute()
    {
        return Storage::disk('s3')->url($this->path);
    }
    public function getUploadedTimeAttribute()
    {
        return $this->created_at->diffForHumans();
    }
    public function getSizeInKbAttribute()
    {
        return round($this->size / 1024, 2);
    }
}
