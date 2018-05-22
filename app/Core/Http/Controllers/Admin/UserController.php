<?php

namespace MediaGal\Core\Http\Controllers\Admin;

use Illuminate\Http\Request;
use MediaGal\Core\User;
use MediaGal\Core\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate(10);
        
        return view('admin.user.index', compact('users'));
    }
}