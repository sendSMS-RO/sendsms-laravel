<?php

namespace SendSMS\SendsmsLaravel\API;

use ReflectionMethod;

class Message extends ApiCommunication
{
    /**
     *   This function returns all inbound (MO) messages for the user which have an ID larger than 'last_id'.
     *
     *   @global string $username
     *   @global string $password
     *   @param int $last_id
     */
    function messages_get($last_id)
    {
        $args = func_get_args();
        return $this->call_api_action(new ReflectionMethod(__CLASS__, __FUNCTION__), $args);
    }

    /**
     *   Statistics for the user account.
     *
     *   @global string $username
     *   @global string $password
     *   @param string user_id (optional): the sub user id that these statistics are for
     *   @param string start_date (optional): start point of the statistics
     *   @param string end_date (optional): end point of the statistics
     */
    function messages_statistics($user_id = null, $start_date = null, $end_date = null)
    {
        $args = func_get_args();
        return $this->call_api_action(new ReflectionMethod(__CLASS__, __FUNCTION__), $args);
    }

    /**
     *   Send an SMS message
     *
     *   @global string $username
     *   @global string $password
     *   @param string $to
     *   @param string $text: The body of your message
     *   @param string $from (optional): The expeditor's label
     *   @param int $report_mask (optional): Delivery report request bitmask
     *   @param string $report_url (optional): URL to call when delivery status changes
     *   @param string $charset (optional): Character set to use
     *   @param int $data_coding (optional): Data coding
     *   @param int $message_class (optional): Message class
     *   @param int $auto_detect_encoding (optional): Auto detect the encoding and send appropriately 1 = on, 0 = off.
     *   @param string/boolean $short (optional): 1. "string" Add sort url at the end of message or search for key {short} in message and replace with short url when parameter contain URL
     * @param int $ctype (optional): 1 = SMS (Default), 2 = RCS - (not active yet), 3 = Viber (failover to SMS if undelivered)
     *                                            2. "boolean" Searches long url and replaces them with coresponding sort url when shrot parameter is "true"
     */
    function message_send($to, $text, $from = null, $report_mask = 19, $report_url = null, $charset = null, $data_coding = null, $message_class = -1, $auto_detect_encoding = null, $short = false, $ctype = 1)
    {
        $args = func_get_args();
        return $this->call_api_action(new ReflectionMethod(__CLASS__, __FUNCTION__), $args);
    }

    /**
     *   Send an SMS message with and gdpr link
     *
     *   @global string $username
     *   @global string $password
     *   @param string $to
     *   @param string $text: The body of your message
     *   @param string $from (optional): The expeditor's label
     *   @param int $report_mask (optional): Delivery report request bitmask
     *   @param string $report_url (optional): URL to call when delivery status changes
     *   @param string $charset (optional): Character set to use
     *   @param int $data_coding (optional): Data coding
     *   @param int $message_class (optional): Message class
     *   @param int $auto_detect_encoding (optional): Auto detect the encoding and send appropriately 1 = on, 0 = off.
     *   @param string/boolean $short (optional): 1. "string" Add sort url at the end of message or search for key {short} in message and replace with short url when parameter contain URL
     *                                            2. "boolean" Searches long url and replaces them with coresponding sort url when shrot parameter is "true"
     */
    function message_send_gdpr($to, $text, $from = null, $report_mask = 19, $report_url = null, $charset = null, $data_coding = null, $message_class = -1, $auto_detect_encoding = null, $short = false)
    {
        $args = func_get_args();
        return $this->call_api_action(new ReflectionMethod(__CLASS__, __FUNCTION__), $args);
    }

    /**
     *   Checks the status of a message
     *
     *   @global string $username
     *   @global string $password
     *   @param string $message_id: The ID of the message
     */
    function message_status($message_id)
    {
        $args = func_get_args();
        return $this->call_api_action(new ReflectionMethod(__CLASS__, __FUNCTION__), $args);
    }
}
