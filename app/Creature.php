<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Storage;

/**
 * App\Creature
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Creature newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Creature newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Creature query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Creature whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Creature whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Creature whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property string $name
 * @property string|null $description
 * @property int $type_id
 * @property int|null $sub_type_id
 * @property string|null $languages
 * @property string $size
 * @property string $speed
 * @property string $challenge_rating
 * @property int $average_hitpoints
 * @property string $hitpoint_dice
 * @property int $armor_class
 * @property string|null $alignment
 * @property string|null $source
 * @property string|null $skills
 * @property string|null $senses
 * @property string|null $saving_throws
 * @property string|null $damage_vulnerabilities
 * @property string $damage_resistances
 * @property string|null $damage_immunities
 * @property string|null $condition_immunities
 * @property string|null $legendary_actions
 * @property string|null $special_abilities
 * @property string|null $attacks
 * @property int $strength
 * @property int $dexterity
 * @property int $constitution
 * @property int $intelligence
 * @property int $wisdom
 * @property int $charisma
 * @property string|null $pic
 * @property-read \App\CreatureType $type
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Creature whereAlignment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Creature whereArmorClass($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Creature whereAttacks($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Creature whereAverageHitpoints($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Creature whereChallengeRating($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Creature whereCharisma($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Creature whereConditionImmunities($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Creature whereConstitution($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Creature whereDamageImmunities($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Creature whereDamageResistances($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Creature whereDamageVulnerabilities($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Creature whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Creature whereDexterity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Creature whereHitpointDice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Creature whereIntelligence($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Creature whereLanguages($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Creature whereLegendaryActions($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Creature whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Creature wherePic($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Creature whereSavingThrows($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Creature whereSenses($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Creature whereSize($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Creature whereSkills($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Creature whereSource($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Creature whereSpecialAbilities($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Creature whereSpeed($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Creature whereStrength($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Creature whereSubTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Creature whereTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Creature whereWisdom($value)
 */
class Creature extends Model
{
    /* Fillable */
    protected $fillable = [
        'name', 'description', 'type_id', 'sub_type_id', 'languages', 'size', 'speed', 'challenge_rating',
        'average_hitpoints', 'hitpoint_dice', 'armor_class', 'alignment', 'source', 'skills', 'senses',
        'saving_throws', 'damage_vulnerabilities', 'damage_resistances', 'damage_immunities',
        'condition_immunities', 'legendary_actions', 'special_abilities', 'attacks',
        'strength', 'dexterity', 'constitution', 'intelligence', 'wisdom', 'charisma',
        'pic'
    ];
    public $appends = ['url'];

    public function getUrlAttribute()
    {
        return Storage::disk('s3')->url($this->pic);
    }
    public function type()
    {
        return $this->belongsTo(CreatureType::class);
    }
}
