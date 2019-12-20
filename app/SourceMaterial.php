<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Storage;

class SourceMaterial extends Model
{
    /* Fillable */
    protected $fillable = [
        'title', 'path', 'description', 'size', 'source_material_type_id', 'source_material_subtype_id'
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

    public function type() {
        return $this->belongsTo(SourceMaterialType::class, 'source_material_type_id');
    }

    public function subtype() {
        return $this->belongsTo(SourceMaterialSubtype::class,'source_material_subtype_id');
    }

}
