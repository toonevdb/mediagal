<?php

namespace MediaGal\Core;

use MediaGal\Core\Events\ContentUploaded;
use Event;
use Route;
use View;

abstract class PluginProvider implements Contracts\PluginProvider
{
    /**
     * Plugin name.
     *
     * @var string
     */
    protected $name;

    /**
     * Plugin slug.
     *
     * @var string
     */
    protected $slug;

    /**
     * Content uploaded listeners.
     *
     * @var array
     */
    protected $uploadedListeners = [];

    /**
     * Auth actions.
     *
     * @var array
     */
    protected $authActions = [];

    /**
     * Plugin name.
     *
     * @return string
     */
    public function name(): string
    {
        return $this->name;
    }

    /**
     * Plugin slug.
     *
     * @return string
     */
    public function slug(): string
    {
        return $this->slug;
    }
    
    /**
     * Path to front routes file.
     *
     * @return string
     */
    public function frontRoutesFile(): string
    {
        return realpath(__DIR__.'routes/front.php');
    }

    /**
     * Path to admin routes file.
     *
     * @return string
     */
    public function adminRoutesFile(): string
    {
        return realpath(__DIR__.'routes/admin.php');
    }

    /**
     * Content uploaded listeners.
     *
     * @return array
     */
    public function contentUploadedListeners(): array
    {
        return $this->uploadedListeners;
    }

    /**
     * Auth actions.
     *
     * @return array
     */
    public function authActions(): array
    {
        return $this->authActions;
    }

    /**
     * Plugin view path.
     *
     * @return string
     */
    public function viewPath(): string
    {
        return realpath(__DIR__.'resources/views');
    }

    public function registerWithApp($app)
    {
        Route::prefix($this->slug())
             ->middleware('web')
             ->namespace(__DIR__)
             ->group($this->frontRoutesFile());

        Route::prefix($this->slug())
             ->middleware('web')
             ->namespace(__DIR__)
             ->group($this->adminRoutesFile());

        foreach($this->contentUploadedListeners() as $listener) {
            Event::listen(ContentUploaded::class, $listener);
        }

        View::registerNamespace($this->slug(), $this->viewPath());
    }
}
