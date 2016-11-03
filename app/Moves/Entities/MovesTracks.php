<?php

namespace MobilityPal\Moves\Entities;

use Illuminate\Database\Eloquent\Model;

class MovesTracks extends Model
{

    protected $fillable = [
        'date',
        'user_id',
        'type',
        'activity',
        'start_time',
        'end_time',
        'place_id',
        'place_type',
        'place_lat',
        'place_lng',
        'trackpoint_lat',
        'trackpoint_lng',
        'trackpoint_time',
    ];
}


