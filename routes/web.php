<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/upload', 'UploadController@form')->name('upload.form');
Route::post('/upload', 'UploadController@handle')->name('upload.handle');

Route::get('/content/{content}', 'ContentController@view')->name('content.view');
Route::post('/content/actions', 'ContentController@actions')->name('content.actions');

Route::get('/users/{user}', 'UserController@detail')->name('user.detail');
