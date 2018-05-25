<?php

namespace MediaGal\Plugins\Album\Http;

use MediaGal\Core\Http\Controllers\Controller;

class FrontController extends Controller
{
    public function index()
    {
        return view('album::front.index');
    }
}