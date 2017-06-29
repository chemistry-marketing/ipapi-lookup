<?php

namespace Seymourlabs\ipapi\Exceptions;

/**
 * Class InvalidIP
 * @package Seymourlabs\ipapi\Exceptions
 */
class InvalidIP extends \Exception {
    public function __construct($message = null, $code = 0, \Exception $previous = null) {
        $message = 'Invalid IP';
        parent::__construct($message, $code, $previous);
    }
}