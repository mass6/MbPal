<?php

namespace MobilityPal\Moves\Auth;

use Guzzle\Http\Client as GuzzleClient;

/**
 * Class MovesUserClient
 * @package MobilityPal\Moves\Auth
 */
class MovesUserClient
{

    /**
     * @var
     */
    public $guzzleClient;

    /**
     * @var string
     */
    private $endpoint = "https://api.moves-app.com/api/1.1/";

    /**
     * @var
     */
    private $accessToken;


    /**
     * MovesUserClient constructor.
     *
     * @param $accessToken
     */
    public function __construct($accessToken)
    {
        $this->accessToken = $accessToken;
    }


    /**
     * Set access token
     * @param $accessToken
     */
    public function setAccessToken($accessToken)
    {
        $this->accessToken = $accessToken;
    }

    /**
     * @return mixed
     */
    public function profile()
    {
        return $this->get('user/profile');
    }


    /**
     * @param       $path
     * @param array $params
     *
     * @return mixed
     * @throws \Exception
     */
    public function get($path, $params = [ ])
    {
        $client = $this->guzzleClient ?: new GuzzleClient($this->endpoint);

        $request = $client->get($path, [ 'Accept' => 'application/json' ], [ 'query' => $params ]);
        $request->addHeader('Authorization', "Bearer {$this->accessToken}");
        $request->addHeader('Accept-Encoding', 'gzip');

        $response = $request->send();

        return $this->handleResponse($response);
    }


    /**
     * @param $response
     *
     * @return mixed
     * @throws \Exception
     */
    private function handleResponse($response)
    {
        if ( ! $response || ! $response->isSuccessful()) {
            throw new \Exception("HTTP request failed");
        }

        if ($response->getContentLength() == 0) {
            throw new \Exception("HTTP body empty");
        }

        try {
            $responseJsonArray = json_decode($response->getBody(), true);
        } catch (RuntimeException $e) {
            throw new \Exception("Invalid JSON response: " . $e->getMessage());
        }

        return $responseJsonArray;
    }


    /**
     * @return mixed
     */
    public function dailySummary()
    {
        $args = func_get_args();

        return $this->getRange("user/summary/daily", $args);
    }


    /**
     * @param $path
     * @param $args
     *
     * @return mixed
     */
    public function getRange($path, $args)
    {
        $arg0 = isset( $args[0] ) ? $args[0] : false;
        $arg1 = isset( $args[1] ) ? $args[1] : false;

        $ProcessFunctionArguments = new \Moves\ProcessFunctionArguments();
        list( $extraPath, $params ) = $ProcessFunctionArguments->process($arg0, $arg1);
        $params = $params ?: [ ];

        return $this->get("{$path}{$extraPath}", $params);
    }


    /**
     * @return mixed
     */
    public function dailyActivities()
    {
        $args = func_get_args();

        return $this->getRange("user/activities/daily", $args);
    }


    /**
     * @return mixed
     */
    public function dailyPlaces()
    {
        $args = func_get_args();

        return $this->getRange("user/places/daily", $args);
    }


    /**
     * @return mixed
     */
    public function dailyStoryline()
    {
        $args = func_get_args();

        return $this->getRange("user/storyline/daily", $args);
    }
}
