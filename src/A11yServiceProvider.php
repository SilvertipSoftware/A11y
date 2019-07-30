<?php
namespace Silvertip\A11y;
use Illuminate\Support\ServiceProvider;
class A11yServiceProvider extends ServiceProvider {
    /**
     * Register any package services.
     *
     * @return void
     */
    public function register() {
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
}