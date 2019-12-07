<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\CreatureType
 *
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Creature[] $creatures
 * @property-read int|null $creatures_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CreatureType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CreatureType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CreatureType query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CreatureType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CreatureType whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CreatureType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CreatureType whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CreatureType whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class CreatureType extends Model
{
    /* Fillable */
    protected $fillable = [
        'name', 'description'
    ];

    public function creatures()
    {
        return $this->hasMany(Creature::class);
    }
    public function getNameAttribute($value)
    {
        return ucfirst($value);
    }
}
