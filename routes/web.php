<?php
 use  App\Http\controllers\QuestionController;
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
    Route::get('/posts/timeline/edit', 'TimelineController@edit');
    Route::get('/', 'PostController@index');
    Route::get('/posts/create', 'PostController@create');
    Route::get('posts/uenohara' ," PostController@uenohara");
    Route::post('/posts', 'PostController@store');
    Route::get('/posts/{post}', 'PostController@show');
    Route::post('/posts/{post}', 'PostController@update');
    Route::delete('/posts/{post}', 'PostController@delete');
    Route::get('/posts/{post}/edit', 'PostController@edit');
    Route::get('/profile', 'UserController@show')->name('profile');
    Route::put('/profile', 'UserController@profileUpdate')->name('profile_edit');
    Route::put('/password_change', 'UserController@passwordUpdate')->name('password_edit');
    Route::delete('/posts/timeline', 'TimelineController@delete');
    Route::get('question/{question}', [QuestionController::class, 'show'])->name('question.show');
    Route::get('question/result/{question?}', [QuestionController::class, 'result'])->name('question.result');
    Route::post('question', [QuestionController::class, 'store'])->name('question.store');
 });
    
    Route::put('/posts/{post}', 'PostController@update');
    Route::get('/user', 'UserController@index');
    Route::get('/categories/{category}', 'CategoryController@index');
    Auth::routes();  
    Route::post('timeline', 'TimelineController@postTweet');    
    Route::put('/posts/timeline', 'TimelineController@update');
    Route::put('/posts/timeline', 'TimelineController@store');
    Route::put('/posts/timeline/editname', 'TimelineController@update');
    Route::get('/posts/{tweets}/editname','TimelineController@edit');
    Route::get('/posts/vote','GenreController@index');
    
    Route::resource('category','GenreController');  //追記=>ここのかてごりーはなに？？
    Route::resource('product','ProductController');  //追記
    Route::get('/genre/create', 'GenreController@create'); 
    Route::put('/category/{category}', 'GenreController@update'); //るーてぃんぐにかんしてようみておくことたりないのがある。
    
    // 省略


  //読み取らないっすね、、どうしますか、、。まず、この記載の仕方が問題なのかも。
