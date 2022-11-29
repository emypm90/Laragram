<?php

use Illuminate\Support\Facades\Route;

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
    return view('home');
})->name('home');

Route::get('/dashboard', 'App\Http\Controllers\HomeController@index')->name('dashboard');

require __DIR__.'/auth.php';

Route::get('/configuracion', 'App\Http\Controllers\UserController@config')->name('config');
Route::post('/user/update', 'App\Http\Controllers\UserController@update')->name('user.update');
Route::get('/user/avatar/{filename}', 'App\Http\Controllers\UserController@getImage')->name('user.avatar');
Route::get('/subir-imagen', 'App\Http\Controllers\ImageController@create')->name('image.create');
Route::post('/image/save', 'App\Http\Controllers\ImageController@save')->name('image.save');
Route::get('/image/file/{filename}', 'App\Http\Controllers\ImageController@getImage')->name('image.file');
Route::get('/profile/{id}', 'App\Http\Controllers\UserController@profile')->name('profile');
Route::get('/imagen/{id}', 'App\Http\Controllers\ImageController@detail')->name('image.detail');
Route::post('/comment/save', 'App\Http\Controllers\CommentController@save')->name('comment.save');
Route::get('/comment/delete/{id}', 'App\Http\Controllers\CommentController@delete')->name('comment.delete');
Route::get('/like/{image_id}', 'App\Http\Controllers\LikeController@like')->name('like.save');
Route::get('/dislike/{image_id}', 'App\Http\Controllers\LikeController@dislike')->name('like.delete');
Route::get('/imagen/delete/{id}', 'App\Http\Controllers\ImageController@delete')->name('image.delete');
Route::get('/imagen/editar/{id}', 'App\Http\Controllers\ImageController@edit')->name('image.edit');
Route::post('/imagen/update', 'App\Http\Controllers\ImageController@update')->name('image.update');
Route::get('/users/{search?}', 'App\Http\Controllers\UserController@index')->name('user.index');
