<?php

namespace StreamAlly;

use StreamAlly\Concerns\Message;
use StreamAlly\Concerns\Poll;
use StreamAlly\Concerns\Show;
use Zttp\Zttp;

class StreamAlly
{
    use Show;
    use Message;
    use Poll;

    protected $apiToken;
    protected $host = 'https://studio.streamally.live';
    protected $http;
    protected $urlParts = [];

    /**
     * UrlShortener constructor.
     * @param $apiToken
     */
    public function __construct($apiToken, $sandbox = false)
    {
        $this->http = Zttp::withHeaders([
            'Accept' => 'application/json',
        ])
            ->withOptions([
                'base_uri' => $sandbox ? $this->sandboxUri() : $this->apiUri()
            ]);

        $this->apiToken = $apiToken;

        return $this;
    }

    public function addUrlSegment($string)
    {
        if (is_null($string)) {
            return $this;
        }

        array_push($this->urlParts, $string);

        return $this;
    }

    public function getUrlSegments()
    {
        return implode('/', $this->urlParts);
    }

    protected function sandboxUri()
    {
        $sandbox = getenv('STREAMALLY_SANDBOX_URI');

        if ($sandbox) {
            return $sandbox;
        }

        return 'https://sandbox.streamally.live/api/v2/';
    }

    protected function apiUri()
    {
        $api = getenv('STREAMALLY_API_URI');

        if ($api) {
            return $api;
        }

        return 'https://studio.streamally.live/api/v2/';
    }

    /**
     * @param array $data
     * @return string
     * @throws \Exception
     */
    public function register($data = [])
    {
        return $this->addUrlSegment('/api/user/register')->post($data);
    }

    public function get($parameters = [])
    {
        $parameters['api_token'] = $this->apiToken;

        return $this->http->get($this->getUrlSegments(), $parameters);
    }

    public function post($parameters = [])
    {
        $parameters['api_token'] = $this->apiToken;

        return $this->http->post($this->getUrlSegments(), $parameters);
    }
}