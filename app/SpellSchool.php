<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\SpellSchool
 *
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property string|null $pic
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Spell[] $spells
 * @property-read int|null $spells_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SpellSchool newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SpellSchool newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SpellSchool query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SpellSchool whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SpellSchool whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SpellSchool whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SpellSchool whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SpellSchool wherePic($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SpellSchool whereUpdatedAt($value)
 * @mixin \Eloquent
 */
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
        return $this->hasMany(Spell::class);
    }

}
