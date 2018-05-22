<?php

namespace MediaGal\Core\Http\Controllers;

use MediaGal\Core\Content;
use Illuminate\Http\Request;
use \Illuminate\Contracts\Filesystem\Factory as FSFactory;

class UploadController extends Controller
{
    /**
     * Filesystem disk name.
     *
     * @var string
     */
    const DISK_NAME = 'content';

    /**
     * Content disk.
     *
     * @var \Illuminate\Contracts\Filesystem\Filesystem
     */
    protected $disk;
    
    /**
     * Constructor.
     *
     * @param \Illuminate\Contracts\Filesystem\Factory $filesystem
     */
    public function __construct(FSFactory $filesystem)
    {
        $this->disk = $filesystem->disk(static::DISK_NAME);
    }

    public function form()
    {
        return view('upload.form');
    }

    public function handle(Request $request)
    {
        if ($request->content->isValid()) {
            $data = [
                'type'     => $request->content->getMimeType(),
                'filename' => $request->content->getClientOriginalName(),
            ];

            $content = $request->user()->content()->create($data);

            $request->content->storeAs('', $content->storageKey, static::DISK_NAME);
        }
    }
}
