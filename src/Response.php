<?php

namespace Seymourlabs\ipapi;

/**
 * Class Response
 * @package Seymourlabs\ipapi
 */
class Response
{
    /**
     * @var object
     */
    private $response;

    /**
     * @var object
     */
    private $IPResponse;

    /**
     * Response constructor.
     *
     * @param \GuzzleHttp\Psr7\Response $response
     * @throws \Exception
     */
    public function __construct(\GuzzleHttp\Psr7\Response $response)
    {
        $this->response = $response;

        if(!$this->validateCode()) {
            throw new \Exception('Non-200 received from ipapi: ' . $this->response->getReasonPhrase());
        }

        // get IP response
        $this->IPResponse = $this->getRaw();
        return $this;
    }

    /**
     * Validate the status code
     *
     * @return bool
     */
    private function validateCode()
    {
        return (($this->response->getStatusCode() === 200) ? true : false);
    }

    /**
     * @return \GuzzleHttp\Psr7\Stream|\Psr\Http\Message\StreamInterface
     */
    public function getRaw()
    {
        return json_decode($this->response->getBody()->getContents());
    }

    /**
     * IP
     */
    public function getIp()
    {
        return $this->IPResponse->ip;
    }

    /**
     * City
     */
    public function getCity()
    {
        return $this->IPResponse->city;
    }

    /**
     * Region
     */
    public function getRegion()
    {
        return $this->IPResponse->region;
    }

    /**
     * Country
     */
    public function getCountry()
    {
        return $this->IPResponse->country;
    }

    /**
     * Postal
     */
    public function getPostal()
    {
        return $this->IPResponse->postal;
    }

    /**
     * Latitude
     */
    public function getLatitude()
    {
        return $this->IPResponse->latitude;
    }

    /**
     * Longitude
     */
    public function getLongitude()
    {
        return $this->IPResponse->longitude;
    }

    /**
     * Timezone
     */
    public function getTimezone()
    {
        return $this->IPResponse->timezone;
    }

    /**
     * ASN
     */
    public function getAsn()
    {
        return $this->IPResponse->asn;
    }

    /**
     * Organisation
     */
    public function getOrg()
    {
        return $this->IPResponse->org;
    }
}