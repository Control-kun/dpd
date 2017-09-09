<?php

namespace Pugofka\Dpd;

use Illuminate\Support\ServiceProvider;


class DpdServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/dpd.php' => config_path('dpd.php'),
        ]);
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/dpd.php', 'dpd');
        $dpdConfig = config('dpd');

        $this->app->bind(Dpd::class, function()  {
            return new Dpd();
        });

    }


}