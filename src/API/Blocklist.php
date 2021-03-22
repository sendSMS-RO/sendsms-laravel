<?php

namespace SendSMS\SendsmsLaravel\API;

use ReflectionMethod;

class Blocklist extends ApiCommunication
{
    /**
     *   Add the given number to block list
     *
     *   @global string $username
     *   @global string $password
     *   @param int $phonenumber: The phone number
     */
    function blocklist_add($phonenumber)
    {
        $args = func_get_args();
        return $this->call_api_action(new ReflectionMethod(__CLASS__, __FUNCTION__), $args);
    }

    /**
     *   Delete the given number from block list
     *
     *   @global string $username
     *   @global string $password
     *   @param int $phonenumber: The phone number
     */
    function blocklist_del($phonenumber)
    {
        $args = func_get_args();
        return $this->call_api_action(new ReflectionMethod(__CLASS__, __FUNCTION__), $args);
    }

    /**
     *   Check if the given number is in block list
     *
     *   @global string $username
     *   @global string $password
     *   @param int $phonenumber: The phone number
     */
    function blocklist_check($phonenumber)
    {
        $args = func_get_args();
        return $this->call_api_action(new ReflectionMethod(__CLASS__, __FUNCTION__), $args);
    }
}
