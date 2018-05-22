<?php

namespace MediaGal\Core\Http\Controllers;

use MediaGal\Core\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Shows the user detail page.
     *
     * @param \MediaGal\Core\User $user
     * @return \Illuminate\Http\Response
     */
    public function detail(User $user)
    {
        return view('user.detail', compact('user'));
    }
}
