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
     * Retrieve relevant elements
     *
     * @param string $name
     * @param $arguments
     * @return null|string
     */
    public function __call($name, $arguments)
    {
        // normalise
        $name = str_replace('get', '', $name);
        $name = strtolower($name);

        // match
        if (isset($this->IPResponse->$name)) {
            return $this->IPResponse->$name;
        } else {
            return null;
        }
    }
}