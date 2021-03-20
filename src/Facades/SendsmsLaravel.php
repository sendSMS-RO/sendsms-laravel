<?php

namespace SendSMS\SendsmsLaravel\Facades;

use Illuminate\Support\Facades\Facade;

class SendsmsLaravel extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return 'sendsms-laravel';
    }
}
