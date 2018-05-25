<?php

namespace MediaGal\Plugins\Album;

use MediaGal\Core\PluginProvider;

class AlbumPluginProvider extends PluginProvider
{
    /**
     * Plugin name.
     *
     * @var string
     */
    protected $name = 'Album';

    /**
     * Plugin slug.
     *
     * @var string
     */
    protected $slug = 'album';

    /**
     * Auth actions.
     *
     * @var array
     */
    protected $authActions = [
        'album.view', 'album.create', 'album.edit', 'album.delete',
    ];
}
