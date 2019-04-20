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

    Route::group([
        'prefix' => 'users'
    ], function () {
        Route::get('/', 'UserController@index')
            ->name('admin.users.index');

        Route::get('/create', 'UserController@create')
            ->name('admin.users.add');

        Route::post('/', 'UserController@store')
            ->name('admin.users.store');

        Route::get('/{user}/edit', 'UserController@edit')
            ->name('admin.users.edit');

        Route::post('/{user}', 'UserController@update')
            ->name('admin.users.update');

        Route::get('/{user}', 'UserController@destroy')
            ->name('admin.users.destroy');
    });

    Route::group([
        'prefix' => 'courses'
    ], function (){
        Route::get('/', 'CourseController@index')->name('admin.courses.index');

        Route::get('/create', 'CourseController@create')
            ->name('admin.courses.create');

        Route::post('/', 'CourseController@store')
            ->name('admin.courses.store');
    });
});


Route::get('logout', 'Auth\LoginController@logout');

Route::group(['namespace' => 'Client'], function () {
    Route::resource('post', 'PostController');
    Route::get('delete-post/{id}', 'PostController@destroy')
        ->name('delete-post');
    Route::get('list-post-user', 'PostController@showPostUser')
        ->name('list-post-user')->middleware('profile');
    Route::get('list-post-category/{id}', 'PostController@showPostCategory')
        ->name('list-post-category');

    Route::get('list-course-category/{id}', 'CourseController@showCourseCategory')
        ->name('list-course-category');

    Route::get('show-course/{id}', 'CourseController@show')->name('show-course');

    Route::post('register-course', 'CourseController@registerCourse')
        ->name('register-course');

    Route::get('list-course-register', 'CourseController@listCourse')
        ->name('list-course-register');

    Route::get('course-detail/{id}', 'CourseController@getDetailCourseRegister')
        ->name('course-detail');

    Route::get('show-video-ajax', 'CourseController@showVideoAjax')
        ->name('show-video-ajax');

    //comment post
    Route::post('add-comment', 'CommentController@addCommentPost')
        ->name('add-comment');

    Route::post('reply-comment-post', 'CommentController@replyCommentPost')->name('reply-comment-post');

    Route::get('update-notification/{id}', 'CommentController@updateNotification')
        ->name('update-notification');

    Route::get('live', "GroupVideoCallController@index")->name('live');
    Route::prefix('live')->middleware('profile')->group(function() {
       Route::get('join/{roomName}', 'GroupVideoCallController@joinRoom');
       Route::post('create', 'GroupVideoCallController@createRoom')->name('live-create');
    });

    Route::get('detail-post-user/{id}', 'PostController@posrUserDetail')
        ->name('detail-post-user');

    Route::get('update-view-number', 'PostController@updateViewNumber')
        ->name('update-view-number');

});

Route::get('list-notification', 'HomeController@listNotification')
    ->name('list-notification')
    ->middleware('profile');
