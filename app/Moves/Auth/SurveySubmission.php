<?php

namespace MobilityPal\Moves\Auth;

/**
 * Survey Submission DTO
 *
 * Class SurveySubmission
 * @package MobilityPal\Moves
 */
class SurveySubmission
{

    /**
     * @var
     */
    public $survey_id;

    /**
     * @var
     */
    public $submission_id;


    /**
     * SurveySubmission constructor.
     *
     * @param $survey_id
     * @param $submission_id
     */
    public function __construct($survey_id, $submission_id)
    {
        $this->survey_id     = $survey_id;
        $this->submission_id = $submission_id;
    }


    /**
     * @return bool
     */
    public function hasSurvey()
    {
        return $this->survey_id && $this->submission_id;
    }
}
