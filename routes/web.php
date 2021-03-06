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

Route::get('/admin/login', [
    'as' => 'admin.login', 'uses' => 'Auth\AdminLoginController@login'
]);

Route::post('/admin/login', [
    'as' => 'admin.login.post', 'uses' => 'Auth\AdminLoginController@loginPost'
]);

Route::get('/admin/logout', [
    'as' => 'admin.logout', 'uses' => 'Auth\AdminLoginController@logout'
]);

Auth::routes();

Route::group([
    'namespace' => 'Admin',
    'prefix' => 'admin',
    'middleware' => ['auth', 'admin']
], function () {
    Route::get('/', function () {
        return view('admin.layouts.master');
    })->name('dashboard.admin');

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

        Route::get('/{course}/edit', 'CourseController@edit')
            ->name('admin.courses.edit');

        Route::post('/{course}', 'CourseController@update')
            ->name('admin.courses.update');

        Route::get('/{course}', 'CourseController@destroy')
            ->name('admin.courses.destroy');
    });

    Route::group([
        'prefix' => 'posts'
    ], function (){
        Route::get('/', 'PostController@index')->name('admin.posts.index');

        Route::get('/create', 'PostController@create')
            ->name('admin.posts.create');

        Route::post('/', 'PostController@store')
            ->name('admin.posts.store');

        Route::get('/{post}/edit', 'PostController@edit')
            ->name('admin.posts.edit');

        Route::post('/{post}', 'PostController@update')
            ->name('admin.posts.update');

        Route::get('/{post}', 'PostController@destroy')
            ->name('admin.posts.destroy');
    });

    Route::group([
        'prefix' => 'comments'
    ], function (){
        Route::get('/', 'CommentController@index')->name('admin.comments.index');

        Route::get('/{comment}', 'CommentController@destroy')
            ->name('admin.comments.destroy');
    });

    Route::group([
        'prefix' => 'categories'
    ], function (){
        Route::get('/', 'CategoryController@index')->name('admin.categories.index');

        Route::get('/create', 'CategoryController@create')
            ->name('admin.categories.create');

        Route::post('/', 'CategoryController@store')
            ->name('admin.categories.store');

        Route::get('/{category}/edit', 'CategoryController@edit')
            ->name('admin.categories.edit');

        Route::post('/{category}', 'CategoryController@update')
            ->name('admin.categories.update');

        Route::get('/{category}', 'CategoryController@destroy')
            ->name('admin.categories.destroy');

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

    // Route::get('show-video-ajax', 'CourseController@showVideoAjax')
    //     ->name('show-video-ajax');

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

    Route::group(['middleware' => 'profile'], function () {
        Route::get('video-course/{id}', 'CourseController@showVideoCourse')
        ->name('video-course');

        Route::get('management-course', 'ManagementCourseController@index')
        ->name('management-course');

        Route::get('show-course-managenent/{id}', 'ManagementCourseController@show')
        ->name('show-course-managenent');

        Route::get('show-course-video-detail/{id}', 'ManagementCourseController@showDetail')
            ->name('show-course-video-detail');

        Route::get('test/list/{id}', 'TestController@listTest')
            ->name('list-test');

        Route::get('test/create/{id}', 'TestController@create')
            ->name('create-test');

        Route::post('test/store', 'TestController@store')
            ->name('store-test');

        Route::get('test/show/{id}', 'TestController@show')
            ->name('show-test');

        // profile
        Route::get('profile', 'ProfileController@index')
            ->name('profile.index');

        Route::get('profile/edit', 'ProfileController@edit')
            ->name('profile.edit');

        Route::patch('profile/update', 'ProfileController@update')
            ->name('profile.update');

        Route::get('profile/chaneg-password', 'ProfileController@getChangePassword')
            ->name('profile.change');

        Route::patch('profile/chaneg-password', 'ProfileController@changePassword')
            ->name('profile.changepassword');
        //doing test
        Route::get('course/test/list/{id}', 'DoingTestController@listTest')
            ->name('course.list_test');

        Route::get('test/doing/{id}', 'DoingTestController@show')
            ->name('test.doing');

        Route::post('test/complete', 'DoingTestController@complete')
            ->name('test.complete');

        Route::get('test/doing/detail/{id}', 'DoingTestController@detail')
            ->name('test.doing.details');

        //follow
        Route::get('follow', 'PostController@follow')
        ->name('follow');

        //unfollow
        Route::get('un-follow', 'PostController@unFollow')
        ->name('un-follow');

         Route::get('follow/post', 'PostController@getFollow')
        ->name('follow.post');

        Route::get('show-code', 'CodeController@showCode');
        Route::post('write-code', 'CodeController@writeCode');

        //add coin
        Route::get('add-coin', 'CoinController@index')
            ->name('add-coin');
    });

    //create rating course
    Route::post('rating', 'CourseController@rating')
        ->name('rating.store');

    //comment video
    Route::post('add-comment-video', 'CommentController@addCommentVideo')
        ->name('add.comment.video');
});

Route::get('list-notification', 'HomeController@listNotification')
    ->name('list-notification')
    ->middleware('profile');
