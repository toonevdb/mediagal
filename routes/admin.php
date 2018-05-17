<?php

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
| 
| Here we define the core admin routes.
|
*/

// - User routes -
Route::get('users', 'UserController@index')->name('admin.user.index');