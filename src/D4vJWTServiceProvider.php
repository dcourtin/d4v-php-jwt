<?php

namespace D4v\JWT;

use Illuminate\Support\ServiceProvider;

class D4vJWTServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/d4v-jwt.php' => config_path('d4v-jwt.php'),
        ], 'config');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // Fusionner la config du package
        $this->mergeConfigFrom(
            __DIR__.'/../config/d4v-jwt.php', 'd4v-jwt'
        );

        $this->app->singleton('d4vjwt', function ($app) {
            return new \D4v\JWT\Manager();
        });

    }
}
