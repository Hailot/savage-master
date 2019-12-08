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
 * @property string $classes
 * @property string|null $source
 * @property int $level
 * @property int $school_id
 * @property string $casting_time
 * @property string $range
 * @property string $components
 * @property string $duration
 * @property int $ritual
 * @property string|null $description
 * @property string|null $pic
 * @property-read mixed $level_name
 * @property-read \App\SpellSchool $school
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Spell whereCastingTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Spell whereClasses($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Spell whereComponents($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Spell whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Spell whereDuration($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Spell whereLevel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Spell wherePic($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Spell whereRange($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Spell whereRitual($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Spell whereSchoolId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Spell whereSource($value)
 */
class Spell extends Model
{
    /* Fillable */
    protected $fillable = [
        'name', 'classes', 'source', 'level', 'school_id',  'casting_time', 'range',
        'components', 'component_materials', 'duration', 'ritual', 'description', 'pic'
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
