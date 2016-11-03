<?php

namespace MobilityPal\Moves\Auth;

/**
 * Access Tokens DTO
 *
 * Class AccessTokens
 * @package MobilityPal\Moves\Auth
 */
class AccessTokens
{

    /**
     * @var
     */
    public $accessToken;

    /**
     * @var
     */
    public $refreshToken;

    /**
     * @var
     */
    public $validUntil;

    /**
     * @var
     */
    public $userId;


    /**
     * AccessTokens constructor.
     *
     * @param $accessToken
     * @param $refreshToken
     * @param $validUntil
     * @param $userId
     */
    public function __construct($accessToken, $refreshToken, $validUntil, $userId)
    {
        $this->accessToken = $accessToken;
        $this->refreshToken = $refreshToken;
        $this->validUntil = $validUntil;
        $this->userId = $userId;
    }
}
