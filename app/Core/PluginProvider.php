<?php

namespace MediaGal\Core;

use ReflectionClass;
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
     * Vue components mapping.
     *
     * @var array
     */
    protected $vueComponents = [];

    /**
     * Content action components.
     *
     * @var array
     */
    protected $contentActionComponents = [];

    /**
     * Reflection of the actual plugin provider.
     *
     * @var \ReflectionClass
     */
    protected $reflector;

    public function __construct()
    {
        $this->reflector = new ReflectionClass(get_class($this));
    }

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
        return realpath(dirname($this->reflector->getFileName()).'/routes/front.php');
    }

    /**
     * Path to admin routes file.
     *
     * @return string
     */
    public function adminRoutesFile(): string
    {
        return realpath(dirname($this->reflector->getFileName()).'/routes/admin.php');
    }

    /**
     * Content uploaded event listeners.
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
        return realpath(dirname($this->reflector->getFileName()).'/resources/views');
    }

    /**
     * Migration path.
     *
     * @return string
     */
    public function migrationPath(): string
    {
        return realpath(dirname($this->reflector->getFileName()).'/migrations');
    }

    /**
     * Vue components mapping.
     *
     * @return array
     */
    public function vueComponents(): array
    {
        $components = [];

        foreach ($this->vueComponents as $name => $file) {
            $components[$name] = realpath(dirname($this->reflector->getFileName()).$file);
        }

        return $components;
    }

    /**
     * Vue components that are content actions.
     *
     * @return array
     */
    public function contentActionComponents(): array
    {
        return $this->contentActionComponents;
    }

    /**
     * Register the plugin with the app.
     *
     * @return void
     */
    public function registerWithApp()
    {
        $namespace = $this->reflector->getNamespaceName().'\Http';
        
        if ($this->frontRoutesFile()) {
            Route::prefix($this->slug())
                 ->name($this->slug().'.')
                 ->middleware('web')
                 ->namespace($namespace)
                 ->group($this->frontRoutesFile());
        }

        if ($this->adminRoutesFile()) {
            Route::prefix('admin/'.$this->slug())
                 ->name($this->slug().'.')
                 ->middleware('web')
                 ->namespace($namespace)
                 ->group($this->adminRoutesFile());
        }

        foreach($this->contentUploadedListeners() as $listener) {
            Event::listen(ContentUploaded::class, $listener);
        }

        View::addNamespace($this->slug(), $this->viewPath());
    }
}
