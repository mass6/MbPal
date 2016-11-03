<?php

namespace MobilityPal\Moves\Services;

use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Log;
use MobilityPal\Moves\Auth\AuthorizationResponse;
use MobilityPal\Moves\Auth\MovesAuthClient;
use MobilityPal\Moves\Entities\MovesUser;
use MobilityPal\Moves\Loggers\MovesUserLogger;
use MobilityPal\Moves\Loggers\MovesUserSurveyLogger;
use MobilityPal\Moves\Loggers\ProfileLogger;

/**
 * Class MovesUserService
 * @package MobilityPal\Moves
 */
class MovesUserService
{

    /**
     * @var MovesAPI
     */
    public $client;


    /**
     * MovesUserService constructor.
     */
    public function __construct()
    {
        $this->client = MovesAuthClient::create();
    }


    /**
     * @return MovesAPI
     */
    public function getClient()
    {
        return $this->client;
    }


    /**
     * @param null $survey_id
     * @param null $submission_id
     *
     * @return string
     */
    public function getAuthorizationUrl($survey_id = null, $submission_id = null)
    {
        $this->client->setStateParameter($survey_id, $submission_id);

        return $this->client->requestURL();
    }


    /**
     * @param AuthorizationResponse $authorizationResponse
     *
     * @return MovesUserService
     */
    public function logSuccessfulRegistration(AuthorizationResponse $authorizationResponse)
    {

        try {
            $tokens = $this->client->auth($authorizationResponse->code);
            $user   = new MovesUserSurveyLogger(new ProfileLogger(new MovesUserLogger($tokens)),
                $authorizationResponse->surveySubmission);

            return $user->logUserData();
        } catch (QueryException $e) {
            Log::error($e->getMessage());
        }
    }


    /**
     *
     */
    public function verifyAllUserTokens()
    {
        $users = MovesUser::where('disabled', false)->get();
        foreach ($users as $user) {
            $this->verifyUserToken($user);
        }
    }

    /**
     * @param $user
     */
    public function verifyUserToken($user)
    {
        if ( ! $this->client->validate_token($user['access_token'])) {
            $this->refreshUserToken($user);
        }
    }


    /**
     * @param $user
     */
    public function refreshUserToken($user)
    {
        if ($tokens = $this->client->refresh($user['refresh_token'])) {
            $user->update([
                'access_token' => $tokens['access_token'],
                'refresh_token' => $tokens['refresh_token'],
                'disabled' => false
            ]);
        } else {
            $this->disableUser($user);
        }
    }


    /**
     * @param $user
     */
    private function disableUser($user)
    {
        $user->disabled = true;
        $user->save();
        Log::info($user['user_id'] . ' has been disabled.');
    }

}
