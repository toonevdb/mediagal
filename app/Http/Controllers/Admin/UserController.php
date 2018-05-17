<?php

namespace MediaGal\Http\Controllers\Admin;

use Illuminate\Http\Request;
use MediaGal\User;
use MediaGal\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate(10);
        
        return view('admin.user.index', compact('users'));
    }
}