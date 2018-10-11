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


Auth::routes();

Route::get('/', 'PostController@index')->name('home');
Route::get('/home', 'PostController@index');

// Post routes
Route::get('/posts', 'PostController@index')->name('posts');

// Only allow login users
Route::get('/posts/create', 'PostController@create')->name('create_post')->middleware('auth');
Route::post('/posts/create', 'PostController@store')->middleware('auth');

Route::get('/posts/{id}', 'PostController@show')->name('post');

// Comment
Route::post('/comments/create', 'CommentController@store')->name('create_comment');

