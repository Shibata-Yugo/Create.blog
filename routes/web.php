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
    Route::group(['middleware' => ['auth']], function(){
    Route::get('posts/timeline', 'TimelineController@showTimelinePage');  
    Route::get('/', 'PostController@index');
    Route::get('/posts/create', 'PostController@create');
    Route::post('/posts', 'PostController@store');
    Route::get('/posts/{post}', 'PostController@show');
    Route::post('/posts/{post}', 'PostController@update');
    Route::delete('/posts/{post}', 'PostController@delete');
    Route::get('/posts/{post}/edit', 'PostController@edit');
    Route::get('/profile', 'UserController@show')->name('profile');
    Route::put('/profile', 'UserController@profileUpdate')->name('profile_edit');
    Route::put('/password_change', 'UserController@passwordUpdate')->name('password_edit');
     });
    
    Route::put('/posts/{post}', 'PostController@update');
    Route::get('/user', 'UserController@index');
    Route::get('/categories/{category}', 'CategoryController@index');
    Auth::routes();  
    Route::post('timeline', 'TimelineController@postTweet');    
    