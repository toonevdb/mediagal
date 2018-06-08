<?php

namespace MediaGal\Core\Console\Commands;

use Illuminate\Console\Command;

class PluginJs extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mediagal:plugin-js';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generates the JS required for plugin js';

    protected $template = <<<END
/**
 * This file was automatically generated from the mediagal:plugin-js artisan command at [time]
 */
[vueComponents]

export const contentActionComponents = [actionComponents]
END;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        // todo get all installed plugins their pluginprovider

        $vueComponents = '';
        $actionComponents = '[';

        foreach (config('app.core_plugin_providers') as $entry) {
            $plugin = new $entry;
            
            foreach ($plugin->vueComponents() as $name => $file) {
                $vueComponents .= "Vue.component('$name', require('$file'));\n";
            }

            foreach ($plugin->contentActionComponents() as $name) {
                $actionComponents .= "'$name', ";
            }

            $actionComponents = substr($actionComponents, 0, strlen($actionComponents) - 2).']';
        }

        $content = str_replace('[time]', date('Y-m-d H:i:s'), $this->template);
        $content = str_replace('[vueComponents]', $vueComponents, $content);
        $content = str_replace('[actionComponents]', $actionComponents, $content);

        file_put_contents(resource_path('assets/js/plugins.js'), $content);

        $this->line('Plugins.js successfully written');
    }
}
