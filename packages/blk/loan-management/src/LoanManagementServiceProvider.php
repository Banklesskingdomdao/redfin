<?php

namespace Blk\LoanManagement;

use Illuminate\Support\ServiceProvider;

class LoanManagementServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        /*
         * Optional methods to load your package assets
         */
        $this->loadTranslationsFrom(__DIR__.'/resources/lang', 'loan-management');
        $this->loadViewsFrom(__DIR__.'/resources/views', 'loan-management');
        $this->loadMigrationsFrom(__DIR__.'/database/migrations');
        $this->loadRoutesFrom(__DIR__.'/routes/web.php');

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/config/config.php' => config_path('loan-management.php'),
            ], 'config');

            // Publishing the views.
            $this->publishes([
                __DIR__.'/resources/views' => resource_path('views/vendor/loan-management'),
            ], 'views');

            // Publishing assets.
            $this->publishes([
                __DIR__.'/resources/assets' => public_path('vendor/loan-management'),
            ], 'assets');

            // Publishing the translation files.
            $this->publishes([
                __DIR__.'/resources/lang' => resource_path('lang/vendor/loan-management'),
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
        $this->mergeConfigFrom(__DIR__.'/config/config.php', 'loan-management');

        // Register the main class to use with the facade
        $this->app->singleton('loan-management', function () {
            return new LoanManagement;
        });
    }
}
