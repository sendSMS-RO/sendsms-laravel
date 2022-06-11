<?php

namespace SendSMS\SendsmsLaravel\API;

use ReflectionMethod;

class User extends ApiCommunication
{
    /**
     *   Gets the user balance
     *
     *   @global string $username
     *   @global string $password
     */
    function user_get_balance()
    {
        $args = func_get_args();
        return $this->call_api_action(new ReflectionMethod(__CLASS__, __FUNCTION__), $args);
    }

    /**
     *   Gets the user details
     *
     *   @global string $username
     *   @global string $password
     */
    function user_get_info()
    {
        $args = func_get_args();
        return $this->call_api_action(new ReflectionMethod(__CLASS__, __FUNCTION__), $args);
    }

    /**
     *   This function returns the verified phone number for the given user
     *
     *   @global string $username
     *   @global string $password
     */
    function user_get_phone_number()
    {
        $args = func_get_args();
        return $this->call_api_action(new ReflectionMethod(__CLASS__, __FUNCTION__), $args);
    }

    /**
     *   Transfer credit from one account to another
     *
     *   @global string $username
     *   @global string $password
     *   @param string target_username: The username to move funds to (this must be a sub-user of your account)
     *   @param float amount: The amount to transfer
     */
    function user_transfer_funds($target_username, $amount)
    {
        $args = func_get_args();
        return $this->call_api_action(new ReflectionMethod(__CLASS__, __FUNCTION__), $args);
    }

    /**
     *   Get the pricing for each network per country for the user's account
     *
     *   @global string $username
     *   @global string $password
     */
    function get_user_pricing_list()
    {
        $args = func_get_args();
        return $this->call_api_action(new ReflectionMethod(__CLASS__, __FUNCTION__), $args);
    }
}
