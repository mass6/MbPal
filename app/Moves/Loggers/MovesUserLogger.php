<?php

namespace MobilityPal\Moves\Loggers;

use MobilityPal\Moves\Entities\MovesUser;

/**
 * Class MovesUserLogger
 * @package MobilityPal\Moves
 */
class MovesUserLogger implements UserLogger
{

    /**
     * @var
     */
    private $tokens;


    /**
     * MovesUserLogger constructor.
     *
     * @param $tokens
     */
    public function __construct($tokens)
    {
        $this->tokens = $tokens;
    }


    /**
     * Log the Moves Authorization
     *
     * @return mixed
     */
    public function logUserData()
    {
        if ( ! $user = MovesUser::where('user_id', $this->tokens['user_id'])->first()) {
            return MovesUser::create([
                'user_id'       => $this->tokens['user_id'],
                'access_token'  => $this->tokens['access_token'],
                'refresh_token' => $this->tokens['refresh_token'],
                'expires_in'    => $this->tokens['expires_in'],
            ]);
        } else {
            $user->update([
                'access_token'  => $this->tokens['access_token'],
                'refresh_token' => $this->tokens['refresh_token'],
                'expires_in'    => $this->tokens['expires_in'],
            ]);
        }

        return $user;
    }


    /**
     * Get tokens
     *
     * @return mixed
     */
    function getTokens()
    {
        return $this->tokens;
    }
}
