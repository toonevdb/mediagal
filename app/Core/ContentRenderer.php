<?php

namespace MediaGal\Core;

use Storage;

class ContentRenderer
{
    /**
     * List of image mime types.
     * 
     * @var array
     */
    static $imageTypes = [
        'image/png', 'image/jpeg', 'image/gif', 'image/svg+xml', 'image/tiff', 'image/webp',
    ];
    
    /**
     * Content model to render.
     *
     * @var \MediaGal\Content
     */
    protected $content;
    
    /**
     * Constructor.
     *
     * @param \MediaGal\Content $content
     */
    public function __construct(Content $content)
    {
        $this->content = $content;
    }

    public function original(): string
    {
        if ($this->isImage()) {
            // TODO: avoid using Storage facade (we might need a content url builder for derived)
            $url = Storage::disk('content')->url($this->content->storageKey);
            
            return view('content.image', compact('url'));
        }

        throw new \DomainException('ContentRenderer only supports images');
    }

    protected function isImage(): bool {
        if (in_array($this->content->type, static::$imageTypes)) {
            return true;
        }

        return false;
    }
}
