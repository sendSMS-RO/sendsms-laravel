<?php

namespace SendSMS\SendsmsLaravel\API;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log as Logger;

class Request
{
    private static $instance;

    public static function getInstance()
    {
        if (!isset(self::$instance)) {
            Logger::notice("SendSMS integration with Laravel initialized");
            self::$instance = Http();
        }
        return self::$instance;
    }
}
