<?php

namespace MobilityPal\Moves\Entities;

use Illuminate\Database\Eloquent\Model;

class MovesUser extends Model
{


    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'user_id';

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id','access_token','refresh_token','expires_in','error_code', 'disabled'
    ];

    public function profile()
    {
        return $this->hasOne(MovesProfile::class, 'user_id', 'user_id');
    }

    public function surveySubmission($surveyId)
    {
        return MovesUserSurvey::where('user_id', $this->user_id)->where('survey_id', $surveyId)->first();
    }
}
