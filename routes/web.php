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

Route::get('/', 'HomeController@index');

Route::get('course', function () {
    return view('clients.courses.index');
});

Route::get('course-details', function () {
    return view('clients.courses.detail');
});

Route::get('create-post', function () {
    return view('clients.posts.create');
});

Route::get('post-details', function () {
    return view('clients.posts.detail');
});

Auth::routes();

Route::get('logout', 'Auth\LoginController@logout');
Route::resource('post', 'Client\PostController')->except(['index']);
Route::get('list-post-user', 'Client\PostController@showPostUser')->name('list-post-user');
Route::get('list-post-category/{id}', 'Client\PostController@showPostCategory')->name('list-post-category');

