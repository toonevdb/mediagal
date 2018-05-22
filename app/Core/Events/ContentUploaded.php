<?php

namespace MediaGal\Core\Events;

use MediaGal\Core\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;

class ContentUploaded
{
    use Dispatchable, SerializesModels;

    /**
     * Content model.
     *
     * @var \MediaGal\Core\Content
     */
    protected $content;

    /**
     * Constructor.
     *
     * @param \MediaGal\Core\yContent $content
     */
    public function __construct(Content $content)
    {
        $this->content = $content;
    }
}
