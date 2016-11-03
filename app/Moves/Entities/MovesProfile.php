<?php

namespace MobilityPal\Moves\Entities;

use Illuminate\Database\Eloquent\Model;

/**
 * Class MovesProfile
 * @package MobilityPal\Moves
 */
class MovesProfile extends Model
{

    /**
     * @var array
     */
    protected $fillable = [
        'user_id',
        'first_date',
        'timezone',
        'timezone_offset',
        'language',
        'locale',
        'first_weekday',
        'metric',
        'calories_available',
        'platform'
    ];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne(MovesUser::class, 'user_id', 'user_id');
    }
}
