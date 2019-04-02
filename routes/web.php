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


Route::get('logout', 'Auth\LoginController@logout');
Route::resource('post', 'Client\PostController');
Route::get('list-post-user', 'Client\PostController@showPostUser')->name('list-post-user')->middleware('profile');
Route::get('list-post-category/{id}', 'Client\PostController@showPostCategory')->name('list-post-category');

Route::get('list-course-category/{id}', 'Client\CourseController@showCourseCategory')->name('list-course-category');
Route::get('show-course/{id}', 'Client\CourseController@show')->name('show-course');
Route::post('register-course', 'Client\CourseController@registerCourse')->name('register-course');
Route::get('list-course-register', 'Client\CourseController@listCourse')->name('list-course-register');

