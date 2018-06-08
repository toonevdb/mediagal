<?php

namespace MediaGal\Core\Contracts;

interface PluginProvider 
{
    /**
     * Plugin name.
     *
     * @return string
     */
    public function name(): string;

    /**
     * Plugin slug.
     *
     * @return string
     */
    public function slug(): string;
    
    /**
     * Path to front routes file.
     *
     * @return string
     */
    public function frontRoutesFile(): string;

    /**
     * Path to admin routes file.
     *
     * @return string
     */
    public function adminRoutesFile(): string;

    /**
     * Content uploaded listeners.
     *
     * @return array
     */
    public function contentUploadedListeners(): array;

    /**
     * Auth actions.
     *
     * @return array
     */
    public function authActions(): array;

    /**
     * Plugin view path.
     *
     * @return string
     */
    public function viewPath(): string;

    /**
     * Vue components mapping.
     *
     * @return array
     */
    public function vueComponents(): array;

    /**
     * Vue components that are content actions.
     *
     * @return array
     */
    public function contentActionComponents(): array;

    /**
     * Register the plugin with the app.
     *
     * @return void
     */
    public function registerWithApp();
}
