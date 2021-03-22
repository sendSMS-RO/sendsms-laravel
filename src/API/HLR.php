<?php

namespace SendSMS\SendsmsLaravel\API;

use ReflectionMethod;

class HLR extends ApiCommunication
{
    /**
     *   This performs an HLR request and gives you the result via an HTTP callback
     *
     *   @global string $username
     *   @global string $password
     *   @param string $number
     *   @param string $report_url: This is the URL you want to be called with the resulting information
     */
    function hlr_perform($number, $report_url)
    {
        $args = func_get_args();
        return $this->call_api_action(new ReflectionMethod(__CLASS__, __FUNCTION__), $args);
    }

    /**
     *   This performs an HLR request and gives you the result immediately.
     *
     *   @global string $username
     *   @global string $password
     *   @param string $number
     */
    function hlr_perform_synchronous($number)
    {
        $args = func_get_args();
        return $this->call_api_action(new ReflectionMethod(__CLASS__, __FUNCTION__), $args);
    }
}
