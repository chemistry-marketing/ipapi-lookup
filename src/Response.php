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
     * Response constructor.
     * @param $response
     */
    public function __construct($response)
    {
        $this->response = $response;
    }

}