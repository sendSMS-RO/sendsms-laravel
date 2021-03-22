<?php

namespace SendSMS\SendsmsLaravel;

use Illuminate\Support\ServiceProvider;

class SendsmsLaravelServiceProvider extends ServiceProvider
{
    /**
     * Register any package services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__.'/../config/sendsms-laravel.php', 'sendsms-laravel');
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['sendsms-laravel'];
    }
}
