<?php

namespace MediaGal\Core\Http\Controllers;

use MediaGal\Core\Content;
use Illuminate\Http\Request;

class ContentController extends Controller
{
    public function view(Content $content)
    {
        return view('content.view', compact('content'));
    }

    public function actions(Request $request)
    {
        $contentList = Content::whereIn('id', $request->ids)->get();

        return view('content.actions', compact('contentList'));
    }
}
