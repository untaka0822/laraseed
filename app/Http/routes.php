<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Route::get('/', 'WelcomeController@index');

// Route::get('/', 'TweetsController@index');
// // 記事一つ作成
// Route::get('tweets/create', 'TweetsController@create');
// // id指定した記事一件表示
// Route::get('tweets/{id}', 'TweetsController@show');
// // post送信時
// Route::post('tweets', 'TweetsController@store');
// // 編集
// Route::get('tweets/{id}/edit', 'TweetsController@edit');
// // 更新
// Route::patch('tweets/{id}', 'TweetsController@update');
// // 削除
// Route::delete('tweets/{id}', 'TweetsController@destroy');


// 名前を指定した Route の書き方
Route::get('/', ['as' => 'tweets.index', 'uses' => 'TweetsController@index']);
// ‘as’ キーでルート名を指定 ‘uses’ キーでアクションを指定
Route::get('tweets/create', ['as' => 'tweets.create', 'uses' => 'TweetsController@create']);
Route::get('tweets/{id}', ['as' => 'tweets.show', 'uses' => 'TweetsController@show']);
Route::post('tweets', ['as' => 'tweets.store', 'uses' => 'TweetsController@store']);
Route::get('tweets/{id}/edit', ['as' => 'tweets.edit', 'uses' => 'TweetsController@edit']);
Route::patch('tweets/{id}', ['as' => 'tweets.update', 'uses' => 'TweetsController@update']);
Route::delete('tweets/{id}', ['as' => 'tweets.destroy', 'uses' => 'TweetsController@destroy']);
Route::post('/search', ['as' => 'tweets.search', 'uses' => 'TweetsController@search']);

// Authentication routes...ログイン
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');
 
// Registration routes...会員登録
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');