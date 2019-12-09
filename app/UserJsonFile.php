<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

/**
 * App\UserJsonFile
 *
 * @property int $id
 * @property string $file_name
 * @property string $file_url
 * @property int $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read mixed $size_in_kb
 * @property-read mixed $url
 * @property-read \App\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserJsonFile newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserJsonFile newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserJsonFile query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserJsonFile whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserJsonFile whereFileName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserJsonFile whereFileUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserJsonFile whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserJsonFile whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserJsonFile whereUserId($value)
 * @mixin \Eloquent
 */
class UserJsonFile extends Model
{
    /* Fillable */
    protected $fillable = [
        'file_name', 'path', 'user_id',
    ];
    /* @array $appends */
    public $appends = ['url',  'size_in_kb'];

    public function getUrlAttribute()
    {
        return Storage::disk('s3')->url($this->path);
    }
    public function getUploadedTimeAttribute()
    {
        return $this->created_at->diffForHumans();
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function getSizeInKbAttribute()
    {
        return round($this->size / 1024, 2);
    }

}
