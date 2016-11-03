<?php

namespace MobilityPal\Moves\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

/**
 * Class MovesUserSurvey
 * @package MobilityPal\Moves
 */
class MovesUserSurvey extends Model
{

    /**
     * @var string
     */
    protected $table = 'moves_user_surveys';
    
    /**
     * @var array
     */
    protected $fillable = [ 'user_id', 'survey_id', 'submission_id' ];


    public function user()
    {
        return $this->belongsTo(MovesUser::class, 'user_id', 'user_id');
    }

    public function survey($survey_id)
    {
        $table = 'lime_survey_' . $survey_id;
        $result =  DB::table($table)->where('id', $this->submission_id)->first();

        return collect($result);
    }


}
