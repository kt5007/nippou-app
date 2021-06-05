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

Route::get('/', function () {
    // return redirect('articles');
    return view('welcome');
});

Auth::routes();

Route::group(['middleware' => 'auth'], function(){
    Route::post('articles/search', 'ArticleController@search')->name('articles.search');
    Route::resource('articles', 'ArticleController', ['only' => ['index','create','show','destroy','edit','store','update']]);
    Route::resource('user', 'UserController', ['only' => ['index','create','edit','update', 'destroy']]);
    Route::get('motivation', 'MotivationController@index');
});