<?php

namespace Noecs\AliCloud;

use Illuminate\Support\ServiceProvider;

class AliCloudServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // config
        $this->publishes([
            __DIR__.'/../config/alicloud.php' => config_path('alicloud.php'),
        ]);

        // migration
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');

        // ali cloud
        $this->app->singleton('alicloud', function () {
            return new AliCloud();
        });
    }
}
