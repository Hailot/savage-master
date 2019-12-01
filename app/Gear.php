<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

/**
 * App\Gear
 *
 * @property int $id
 * @property string $name
 * @property string $desription
 * @property string $damage
 * @property string $cost
 * @property string $weight
 * @property string $properties
 * @property string $type
 * @property string $pic
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read mixed $size_in_kb
 * @property-read mixed $uploaded_time
 * @property-read mixed $url
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Gear newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Gear newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Gear query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Gear whereCost($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Gear whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Gear whereDamage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Gear whereDesription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Gear whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Gear whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Gear wherePic($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Gear whereProperties($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Gear whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Gear whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Gear whereWeight($value)
 * @mixin \Eloquent
 */
class Gear extends Model
{
    /* Fillable */
    protected $fillable = [
        'name', 'description', 'damage', 'cost', 'weight', 'properties', 'type', 'pic'
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
