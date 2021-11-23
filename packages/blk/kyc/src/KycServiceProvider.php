<?php

namespace Blk\Kyc;

use Illuminate\Support\ServiceProvider;

class KycServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        /*
         * Optional methods to load your package assets
         */
        $this->loadTranslationsFrom(__DIR__.'/resources/lang', 'kyc');
        $this->loadViewsFrom(__DIR__.'/resources/views', 'kyc');
        $this->loadMigrationsFrom(__DIR__.'/database/migrations');
        $this->loadRoutesFrom(__DIR__.'/routes/web.php');

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/config/config.php' => config_path('config.php'),
            ], 'config');

            // Publishing the views.
            $this->publishes([
                __DIR__.'/resources/views' => resource_path('views/vendor/kyc'),
            ], 'views');

            // Publishing assets.
            $this->publishes([
                __DIR__.'/resources/assets' => public_path('vendor/kyc'),
            ], 'assets');

            // Publishing the translation files.
            $this->publishes([
                __DIR__.'/resources/lang' => resource_path('lang/vendor/kyc'),
            ], 'lang');

            // Registering package commands.
            $this->commands([]);
        }
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        // Automatically apply the package configuration
        $this->mergeConfigFrom(__DIR__.'/config/config.php', 'kyc');

        // Register the main class to use with the facade
        $this->app->singleton('kyc', function () {
            return new Kyc;
        });
    }
}
