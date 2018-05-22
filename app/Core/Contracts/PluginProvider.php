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
}
