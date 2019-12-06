<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Spell
 *
 * @property int $id
 * @property string $name
 * @property string $desription
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Spell newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Spell newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Spell query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Spell whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Spell whereDesription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Spell whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Spell whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Spell whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Spell extends Model
{
    /* Fillable */
    protected $fillable = [
        'name', 'classes', 'source', 'level', 'school_id',  'casting_time', 'range',
        'components', 'duration', 'ritual', 'description', 'pic'
    ];
    protected $appends = ['level_name'];

    public function getLevelNameAttribute()
    {
        if($this->level == 0){
            return 'Cantrip';
        }
        else{
            return $this->level;
        }
    }

    public function school()
    {
        return $this->belongsTo(SpellSchool::class);
    }

}
