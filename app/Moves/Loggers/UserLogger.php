<?php

namespace MobilityPal\Moves\Loggers;

/**
 * Interface UserLogger
 * @package MobilityPal\Moves
 */
interface UserLogger
{

    /**
     * Log the Moves User
     *
     * @return mixed
     */
    public function logUserData();


    /**
     * Get access tokens
     *
     * @return mixed
     */
    function getTokens();

}