<?php

namespace MobilityPal;

use Illuminate\Database\Eloquent\Model;
use MobilityPal\Moves\Entities\MovesUserSurvey;

class Survey extends Model
{
    public $table = '';

    public function userSurvey()
    {
        return $this->hasOne(MovesUserSurvey::class, 'submission_id', 'id');
    }

    public function setSurvey($sid)
    {
        $this->setTable('lime_survey_' . $sid);
    }

}
