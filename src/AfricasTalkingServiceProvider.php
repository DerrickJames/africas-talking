<?php

namespace DerrickJames\AfricasTalking;

use Illuminate\Support\ServiceProvider;

class AfricasTalkingServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/config.php' => config_path('africas-talking.php')
        ]);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('DerrickJames\AfricasTalking\Contracts\Factory', function ($app) {
            return new AfricasTalkingManager($app);
        });
    }
}
