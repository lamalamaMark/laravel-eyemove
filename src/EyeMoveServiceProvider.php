<?php

namespace LamaLama\EyeMove;

use Illuminate\Support\ServiceProvider;
use LamaLama\EyeMove\EyeMove;

class EyeMoveServiceProvider extends ServiceProvider
{
    /**
     * Boot.
     */
    public function boot()
    {
        $this->registerPublishables();
    }

    /**
     * Register.
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/eyemove.php', 'eyemove');

        $this->app->bind('eyemove', function () {
            return new EyeMove();
        });
    }

    /**
     * registerPublishables.
     */
    protected function registerPublishables(): void
    {
        $this->publishes([
            __DIR__.'/../config/eyemove.php' => config_path('eyemove.php'),
        ], 'config');
    }
}
