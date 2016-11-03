<?php

namespace MobilityPal\Surveys;

use Illuminate\Support\Facades\Log;
use MobilityPal\Surveys\Client\LimeSurveyClient;
use MobilityPal\Surveys\Reports\MapQuestionsExportHandler;
use MobilityPal\Surveys\Reports\SurveyResponseExportHandler;

/**
 * Class SurveyService
 * @package MobilityPal\Surveys
 */
class SurveyService
{

    /**
     *
     */
    const SUPERUSER = 'admin';

    /**
     * @var LimeSurveyClient
     */
    private $client;


    /**
     * SurveyService constructor.
     *
     * @param LimeSurveyClient $client
     */
    public function __construct(LimeSurveyClient $client)
    {

        $this->client = $client;
    }

    public function getClient()
    {
        return $this->client;
    }


    /**
     * @return static
     */
    public function getActiveSurveys()
    {
        $surveys = collect($this->client->list_surveys(self::SUPERUSER));
        return $surveys->filter(function($survey){
            return $survey['active'] == 'Y';
        });
    }


    /**
     * @param $setting
     *
     * @return mixed
     */
    public function getSiteSetting($setting)
    {
        return $this->client->get_site_setting($setting);
    }


    /**
     * @param       $surveyId
     * @param array $properties
     *
     * @return mixed
     */
    public function getSurveyProperties($surveyId, Array $properties)
    {
        return $this->client->get_survey_properties($surveyId, $properties);
    }


    /**
     * @param $surveyId
     * @param $statName
     *
     * @return mixed
     */
    public function getSummary($surveyId, $statName)
    {
        return $this->client->get_summary($surveyId, $statName);
    }


    /**
     * @param        $surveyId
     * @param array  $properties
     * @param string $lang
     *
     * @return mixed
     */
    public function getLanguageProperties($surveyId, Array $properties, $lang = 'en')
    {
        return $this->client->get_language_properties($surveyId, $properties, $lang);
    }


    /**
     * @param        $questionId
     * @param array  $properties
     * @param string $lang
     *
     * @return mixed
     */
    public function getQuestionProperties($questionId, Array $properties, $lang = 'en')
    {
        return $this->client->get_question_properties($questionId, $properties, $lang);
    }


    /**
     * @param       $surveyId
     * @param       $startId
     * @param       $limit
     * @param bool  $unUsed
     * @param array $attributes
     *
     * @return mixed
     */
    public function listParticipants($surveyId, $startId, $limit, $unUsed = true, $attributes = [])
    {
        return $this->client->list_participants($surveyId, $startId, $limit, $unUsed, $attributes);
    }


    /**
     * @return \Illuminate\Support\Collection
     */
    public function listAllSurveys()
    {
       return collect($this->client->list_surveys(self::SUPERUSER));
    }


    /**
     * @param $userName
     *
     * @return mixed
     */
    public function listSurveysByUser($userName)
    {
        return $this->client->list_surveys($userName);
    }


    /**
     * @param        $surveyId
     * @param null   $groupId
     * @param string $lang
     *
     * @return mixed
     */
    public function listQuestions($surveyId, $groupId = null, $lang = 'en')
    {
        return $this->client->list_questions($surveyId, $groupId, $lang);
    }


    /**
     * @return mixed
     */
    public function listUsers()
    {
        return $this->client->list_users();
    }


    /**
     * @param        $surveyId
     * @param string $headingType
     * @param string $lang
     *
     * @return \Illuminate\Support\Collection
     */
    public function exportSurveyResponses($surveyId, $headingType = 'full', $lang = 'en', $docType = 'json', $completionStatus = 'all', $responseType = 'long', $fields = null)
    {
        $responseData = $this->client->export_responses($surveyId, $headingType, $lang, $docType, $completionStatus, $responseType, $fields);
        if (is_array($responseData)) {
            Log::error($responseData);
            return;
        }
        $file = json_decode(base64_decode($responseData));
        $exportHandler = new SurveyResponseExportHandler($surveyId);

        return $exportHandler->handle(object_to_array($file->responses));
    }

    public function exportMapQuestionResponses($surveyId)
    {
        $exportHandler = new MapQuestionsExportHandler($surveyId);

        return $exportHandler->handle();
    }


}
