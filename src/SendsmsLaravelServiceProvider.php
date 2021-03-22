<?php

namespace SendSMS\SendsmsLaravel;

use Illuminate\Support\ServiceProvider;
use SendSMS\SendsmsLaravel\ApiRequest;

class SendsmsLaravelServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot(): void
    {
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'sendsms');
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'sendsms');
        // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        // $this->loadRoutesFrom(__DIR__.'/routes.php');

        // Publishing is only necessary when using the CLI.
        if ($this->app->runningInConsole()) {
            $this->bootForConsole();
        }
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__.'/../config/sendsms-laravel.php', 'sendsms-laravel');

        // Register the service the package provides.
        // $this->app->singleton('sendsms-laravel', function ($app) {
        //     return new ApiRequest;
        // });
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

    /**
     * Console-specific booting.
     *
     * @return void
     */
    protected function bootForConsole(): void
    {
        // Publishing the configuration file.
        $this->publishes([
            __DIR__.'/../config/sendsms-laravel.php' => config_path('sendsms-laravel.php'),
        ], 'sendsms-laravel.config');

        // Publishing the views.
        /*$this->publishes([
            __DIR__.'/../resources/views' => base_path('resources/views/vendor/sendsms'),
        ], 'sendsms-laravel.views');*/

        // Publishing assets.
        /*$this->publishes([
            __DIR__.'/../resources/assets' => public_path('vendor/sendsms'),
        ], 'sendsms-laravel.views');*/

        // Publishing the translation files.
        /*$this->publishes([
            __DIR__.'/../resources/lang' => resource_path('lang/vendor/sendsms'),
        ], 'sendsms-laravel.views');*/

        // Registering package commands.
        // $this->commands([]);
    }
}
