<?php

namespace MediaGal\Core\Providers;

use Illuminate\Support\ServiceProvider;

class PluginServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        foreach (config('app.core_plugin_providers') as $entry) {
            (new $entry())->registerWithApp();
        }
    }
}
