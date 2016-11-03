<?php

namespace MobilityPal\Surveys\Client;

use org\jsonrpcphp\JsonRPCClient;

/**
 * Class LimeSurveyClient
 * @package MobilityPal\Surveys\Client
 */
class LimeSurveyClient
{

    /**
     * @var JsonRPCClient
     */
    protected $client;

    /**
     * @var
     */
    protected $sessionKey;


    /**
     * LimeSurveyClient constructor.
     *
     * @param bool $debug
     */
    public function __construct($debug = false)
    {
        $this->client = new JsonRPCClient(env('LS_API_URL'), $debug);
        $this->sessionKey = $this->client->get_session_key( env('LS_USER'), env('LS_PASSWORD'));
    }

    public function get_site_setting($setting)
    {
        return $this->client->get_site_settings($this->sessionKey, $setting);
    }

    public function get_survey_properties($surveyId, Array $properties) {
        return $this->client->get_survey_properties($this->sessionKey, $surveyId, $properties);
    }

    public function export_responses($iSurveyID, $sHeadingType = 'code', $sLanguageCode = 'en', $sDocumentType = 'json',  $sCompletionStatus = 'all',
         $sResponseType = 'long', $fields = null)
    {
        return $this->client->export_responses($this->sessionKey, $iSurveyID, $sDocumentType, $sLanguageCode, $sCompletionStatus,
            $sHeadingType, $sResponseType, $fields);
    }
    /**
     * @param $name
     * @param $arguments
     *
     * @return mixed
     */
    public function __call($name, $arguments)
    {
        array_unshift($arguments, $name);
        return call_user_func_array([$this, "arguments" . (count($arguments) - 1) ], $arguments);
    }


    /**
     *
     */
    protected function releaseSession()
    {
        $this->client->release_session_key($this->sessionKey);
    }


    /**
     * @param $name
     *
     * @return mixed
     */
    protected function arguments0($name)
    {
        return $this->client->$name($this->sessionKey);
    }


    /**
     * @param $name
     * @param $arg1
     *
     * @return mixed
     */
    protected function arguments1($name, $arg1)
    {
        return $this->client->$name($this->sessionKey, $arg1);
    }


    /**
     * @param $name
     * @param $arg1
     * @param $arg2
     *
     * @return mixed
     */
    protected function arguments2($name, $arg1, $arg2)
    {
        return $this->client->$name($this->sessionKey, $arg1, $arg2);
    }


    /**
     * @param $name
     * @param $arg1
     * @param $arg2
     * @param $arg3
     *
     * @return mixed
     */
    protected function arguments3($name, $arg1, $arg2, $arg3)
    {
        return $this->client->$name($this->sessionKey, $arg1, $arg2, $arg3);
    }


    /**
     * @param $name
     * @param $arg1
     * @param $arg2
     * @param $arg3
     * @param $arg4
     *
     * @return mixed
     */
    protected function arguments4($name, $arg1, $arg2, $arg3, $arg4)
    {
        return $this->client->$name($this->sessionKey, $arg1, $arg2, $arg3, $arg4);
    }


    /**
     * @param $name
     * @param $arg1
     * @param $arg2
     * @param $arg3
     * @param $arg4
     * @param $arg5
     *
     * @return mixed
     */
    protected function arguments5($name, $arg1, $arg2, $arg3, $arg4, $arg5)
    {
        return $this->client->$name($this->sessionKey, $arg1, $arg2, $arg3, $arg4, $arg5);
    }
}
