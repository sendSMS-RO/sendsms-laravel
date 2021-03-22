<?php

namespace SendSMS\SendsmsLaravel\API;

use ReflectionMethod;

class MNP extends ApiCommunication
{
    /**
     *   This performs an MNP request and gives you the result immediately.
     *
     *   @global string $username
     *   @global string $password
     *   @param string $number
     */
    function mnp_perform($number)
    {
        $args = func_get_args();
        return $this->call_api_action(new ReflectionMethod(__CLASS__, __FUNCTION__), $args);
    }
}
