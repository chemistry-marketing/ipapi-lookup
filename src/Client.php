<?php

namespace Seymourlabs\ipapi;
use Seymourlabs\ipapi\Exceptions\InvalidIP;

/**
 * Class Client
 * @package Seymourlabs\ipapi
 */
class Client
{
    /**
     * @var string
     */
    private $key;

    /**
     * @var string
     */
    private $ipAddress;

    /**
     * @var string
     */
    private $url = 'https://ipapi.co/';

    /**
     * @var string
     */
    private $format = 'json';

    /**
     * Client constructor.
     *
     * @param string $ipAddress User's IP Address
     * @param string $key Paid key
     */
    public function __construct($ipAddress, $key = null)
    {
        $this->validateIP($ipAddress);

        // assign data
        $this->ipAddress = $ipAddress;
        $this->key = $key;
    }

    /**
     * Validates an IP address (v4 and v6)
     *
     * @param string $ipAddress
     * @throws InvalidIP
     */
    private function validateIP($ipAddress)
    {
        if(!filter_var($ipAddress, FILTER_VALIDATE_IP)) {
            throw new InvalidIP();
        }
    }

    /**
     * Make the request and inject into the Response
     *
     * @return Response
     * @todo add better error handling
     */
    public function request()
    {
        $client = new \GuzzleHttp\Client([
            'base_uri' => $this->url
        ]);

        // make request and process response
        $response = $client->request('GET', $this->ipAddress . '/' . $this->format . (
                !empty($this->key) ? '?key=' . $this->key : ''
            )
        );

        return new Response($response);
    }

}