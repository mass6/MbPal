<?php

namespace MobilityPal\Moves\Loggers;

use MobilityPal\Moves\Auth\SurveySubmission;
use MobilityPal\Moves\Entities\MovesUserSurvey;

/**
 * Class MovesUserSurveyLogger
 * @package MobilityPal\Moves
 */
class MovesUserSurveyLogger implements UserLogger
{

    /**
     * @var UserLogger
     */
    private $userLogger;

    /**
     * @var SurveySubmission
     */
    private $surveySubmission;


    /**
     * MovesUserSurveyLogger constructor.
     *
     * @param UserLogger       $userLogger
     * @param SurveySubmission $surveySubmission
     */
    public function __construct(UserLogger $userLogger, SurveySubmission $surveySubmission)
    {
        $this->userLogger       = $userLogger;
        $this->surveySubmission = $surveySubmission;
    }


    /**
     * @return mixed
     */
    public function logUserData()
    {
        $user = $this->userLogger->logUserData();

        // perform logging Moves Auth with Survey submission
        if ($this->surveySubmission->hasSurvey()) {
            $tokens = $this->getTokens();
            $this->saveUserSurvey($tokens);
        }

        // return result from decorated $authLogger
        return $user;
    }


    /**
     * @return mixed
     */
    function getTokens()
    {
        return $this->userLogger->getTokens();
    }


    /**
     * @param $tokens
     */
    private function saveUserSurvey($tokens)
    {
        if ( ! $survey = MovesUserSurvey::where('user_id', $tokens['user_id'])->where('survey_id',
            $this->surveySubmission->survey_id)->first()
        ) {
            MovesUserSurvey::create([
                'user_id'       => $tokens['user_id'],
                'survey_id'     => $this->surveySubmission->survey_id,
                'submission_id' => $this->surveySubmission->submission_id,
            ]);
        } else {
            $survey->update([
                'submission_id' => $this->surveySubmission->submission_id,
            ]);
        }
    }
}
