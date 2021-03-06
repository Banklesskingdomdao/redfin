<?php

namespace Blk\Admin;

use Illuminate\Support\ServiceProvider;

class AdminServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        /*
         * Optional methods to load your package assets
         */
        $this->loadMigrationsFrom(__DIR__.'/database/migrations');

         $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'admin');
         $this->loadViewsFrom(__DIR__.'/resources/views', 'admin');

         $this->loadRoutesFrom(__DIR__.'/routes/web.php');

        if ($this->app->runningInConsole()) {
            $this->configPublish();

            $this->publishes([
                __DIR__ . '/../database/seeders/AdminSeeder.php' => database_path('seeders/AdminSeeder.php'),
            ]);
            $this->publishes([
                __DIR__ . '/../config/config.php' => config_path('admin.php'),
            ], 'config');
//
//            // Publishing the views.
            $this->publishes([
                __DIR__.'/resources/views' => resource_path('views/vendor/admin'),
            ], 'views');
//
//            // Publishing assets.
            $this->publishes([
                __DIR__.'/../resources/assets' => public_path('vendor/admin'),
            ], 'assets');
//
//            // Publishing the translation files.
            $this->publishes([
                __DIR__.'/../resources/lang' => resource_path('lang/vendor/admin'),
            ], 'lang');

//             Registering package commands.
             $this->commands([]);
        }
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        // Automatically apply the package configuration
        $this->mergeConfigFrom(__DIR__ . '/config/config.php', 'admin');

        // Register the main class to use with the facade
        $this->app->singleton('admin', function () {
            return new Admin;
        });
    }
    public function configPublish()
    {
        $this->publishes([
            __DIR__ . '/config/config.php' => config_path('messages.php'),
        ], 'config');
    }
}
