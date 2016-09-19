<?php

namespace Loktarjugg\Coordinate;

use GuzzleHttp\Client;
use Illuminate\Support\ServiceProvider;

class CoordinateServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/config/config.php' => base_path('config/coordinate.php'),
        ]);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('Coordinate',function($app){
           return new Coordinate(new Client());
        });
    }
}
