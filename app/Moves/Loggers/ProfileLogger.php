<?php

namespace MobilityPal\Moves\Loggers;


use MobilityPal\Moves\Auth\MovesAuthClient;
use MobilityPal\Moves\Entities\MovesProfile;

class ProfileLogger implements UserLogger
{

    /**
     * @var MovesAPI
     */
    protected $moves;

    /**
     * @var UserLogger
     */
    private $userLogger;


    /**
     * ProfileLogger constructor.
     *
     * @param UserLogger $userLogger
     */
    public function __construct(UserLogger $userLogger)
    {
        $this->userLogger = $userLogger;
        $this->moves      = MovesAuthClient::create();
    }


    /**
     * Log the Moves User Profile
     *
     * @return mixed
     */
    public function logUserData()
    {
        $user = $this->userLogger->logUserData();

        // Fetch Moves profile and save to database
        $tokens  = $this->getTokens();
        $profile = $this->moves->get_profile($tokens['access_token']);
        $this->saveProfile($profile);

        // return result from decorated $userLogger
        return $user;
    }


    /**
     * Get tokens
     *
     * @return mixed
     */
    function getTokens()
    {
        return $this->userLogger->getTokens();
    }


    /**
     * @param $profile
     */
    private function saveProfile($profile)
    {
        if ( ! $currentProfile = MovesProfile::where('user_id', $profile['userId'])->first()) {
            MovesProfile::create([
                'user_id'            => $profile['userId'],
                'first_date'         => $profile['profile']['firstDate'],
                'timezone'           => $profile['profile']['currentTimeZone']['id'],
                'timezone_offset'    => $profile['profile']['currentTimeZone']['offset'],
                'language'           => $profile['profile']['localization']['language'],
                'locale'             => $profile['profile']['localization']['locale'],
                'first_weekday'      => $profile['profile']['localization']['firstWeekDay'],
                'metric'             => $profile['profile']['localization']['metric'],
                'calories_available' => $profile['profile']['caloriesAvailable'],
                'platform'           => $profile['profile']['platform'],
            ]);
        } else {
            $currentProfile->update([
                'first_date'         => $profile['profile']['firstDate'],
                'timezone'           => $profile['profile']['currentTimeZone']['id'],
                'timezone_offset'    => $profile['profile']['currentTimeZone']['offset'],
                'language'           => $profile['profile']['localization']['language'],
                'locale'             => $profile['profile']['localization']['locale'],
                'first_weekday'      => $profile['profile']['localization']['firstWeekDay'],
                'metric'             => $profile['profile']['localization']['metric'],
                'calories_available' => $profile['profile']['caloriesAvailable'],
                'platform'           => $profile['profile']['platform'],
            ]);
        }
    }
}
