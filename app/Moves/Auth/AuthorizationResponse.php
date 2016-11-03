<?php

namespace MobilityPal\Moves\Auth;

/**
 * Authorization Response DTO
 *
 * Class AuthorizationResponse
 * @package MobilityPal\Moves\Auth
 */
class AuthorizationResponse
{

    /**
     * @var
     */
    public $code;

    /**
     * @var SurveySubmission
     */
    public $surveySubmission;


    /**
     * AuthorizationResponse constructor.
     *
     * @param                  $code
     * @param SurveySubmission $surveySubmission
     */
    public function __construct($code, SurveySubmission $surveySubmission)
    {
        $this->code = $code;
        $this->surveySubmission = $surveySubmission;
    }
}
