<?php

namespace DivideBuy\LaravelOptions;

use Illuminate\Support\ServiceProvider;

class LaravelOptionsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__.'/../migrations');
        $this->publishThings();
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // Register facade
        $this->app->bind('laravel-options', \DivideBuy\LaravelOptions\LaravelOption::class);
    }

    public function publishThings(){
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../migrations' => database_path('migrations'),
            ], 'migrations');
        }
    }
}