<?php

namespace SendSMS\SendsmsLaravel\API;

use ReflectionMethod;

class Other extends ApiCommunication
{
    /**
     *   Function to ensure communication
     */
    function ping()
    {
        $args = func_get_args();
        return $this->call_api_action(new ReflectionMethod(__CLASS__, __FUNCTION__), $args, false);
    }

    /**
     *   This action allows you to check the price you can expect to pay for a message to the destination in 'to'
     *
     *   @global string $username
     *   @global string $password
     *   @param string $to: A phone number
     */
    function route_check_price($to)
    {
        $args = func_get_args();
        return $this->call_api_action(new ReflectionMethod(__CLASS__, __FUNCTION__), $args);
    }
}
