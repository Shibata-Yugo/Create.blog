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
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

Route::get('/', [PostController::class, 'index']);
Route::get('/posts/create', 'PostController@create');
Route::get('/posts/{post}', [PostController::class, 'show'])
    ->name('posts.show');
Route::get('/posts/create', [PostController::class, 'create'])
    ->name('posts.create');
Route::post('/posts/store', [PostController::class, 'store'])
    ->name('posts.store');

Auth::routes();

Route::get('/images', 'imageController@index');
Route::get('/image/form', 'imageController@form');
Route::post('/image/store', 'imageController@store');
