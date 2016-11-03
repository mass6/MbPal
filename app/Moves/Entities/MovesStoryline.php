<?php

namespace MobilityPal\Moves\Entities;

use Illuminate\Database\Eloquent\Model;

/**
 * Class MovesStoryline
 * @package MobilityPal\Moves\Entities
 */
class MovesStoryline extends Model
{

    /**
     * @var array
     */
    protected $fillable = ['user_id', 'date', 'storyline'];
}
