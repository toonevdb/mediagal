<?php

namespace MediaGal\Core\Providers;

use Illuminate\Support\ServiceProvider;

class PluginServiceProvider extends ServiceProvider
{
    /**
     * Plugin providers.
     *
     * @var array
     */
    protected $plugins = [];
    
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        foreach ($this->plugins as $plugin) {
            $plugin->registerWithApp();

            $this->loadMigrationsFrom($plugin->migrationPath());
        }
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        foreach (config('app.core_plugin_providers') as $entry) {
            $this->plugins[] = new $entry;
        }
    }
}
