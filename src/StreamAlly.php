<?php

namespace StreamAlly;

use Zttp\Zttp;

class StreamAlly
{
    protected $apiToken;
    protected $host = 'https://studio.streamally.live';

    /**
     * UrlShortener constructor.
     * @param $apiToken
     */
    public function __construct($apiToken)
    {
        $this->apiToken = $apiToken;

        return $this;
    }

    /**
     * @param $host
     * @return $this
     */
    public function host($host)
    {
        $this->host = $host;

        return $this;
    }

    /**
     * @param array $data
     * @return string
     * @throws \Exception
     */
    public function register($data = [])
    {
        $response = Zttp::post($this->host . '?api_token=' . $this->apiToken, $data);

        if (!$response->isOk()) {
            throw new \Exception('Unable to register user!');
        }

        return $response->json();
    } 
}