<?php

namespace Silvertip\A11y;

use Illuminate\Support\ServiceProvider;

class A11yServiceProvider extends ServiceProvider {

    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot() {
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'silvertip');
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'silvertip');
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
    public function register() {
        $this->mergeConfigFrom(__DIR__.'/../config/a11y.php', 'a11y');

        // Register the service the package provides.
        $this->app->singleton('a11y', function ($app) {
            return new A11y;
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides() {
        return ['a11y'];
    }
    
    /**
     * Console-specific booting.
     *
     * @return void
     */
    protected function bootForConsole() {
        // Publishing the configuration file.
        $this->publishes([
            __DIR__.'/../config/a11y.php' => config_path('a11y.php'),
        ], 'a11y.config');

        // Publishing the views.
        /*$this->publishes([
            __DIR__.'/../resources/views' => base_path('resources/views/vendor/silvertip'),
        ], 'a11y.views');*/

        // Publishing assets.
        /*$this->publishes([
            __DIR__.'/../resources/assets' => public_path('vendor/silvertip'),
        ], 'a11y.views');*/

        // Publishing the translation files.
        /*$this->publishes([
            __DIR__.'/../resources/lang' => resource_path('lang/vendor/silvertip'),
        ], 'a11y.views');*/

        // Registering package commands.
        // $this->commands([]);
    }
}
