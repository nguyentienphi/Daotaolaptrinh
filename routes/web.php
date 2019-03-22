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

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', function () {
    return view('home');
});

Route::get('view', function () {
    return view('clients.layouts.master');
});

Route::get('course', function () {
    return view('clients.courses.index');
});

Route::get('course-details', function () {
    return view('clients.courses.detail');
});

Route::get('post', function () {
    return view('clients.posts.index');
});

Route::get('create-post', function () {
    return view('clients.posts.create');
});

Route::get('post-details', function () {
    return view('clients.posts.detail');
});

Auth::routes();

Route::group([
    'namespace' => 'Admin',
    'prefix' => 'admin'
], function () {
    Route::get('/', function () {
        return view('admin.layouts.master');
    });

    Route::get('/users', 'UserController@index')
        ->name('admin.users.index');
});

Route::get('/logout', 'Auth\LoginController@logout');
