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

Route::resource('articles', 'ArticleController', ['only' => ['index','create','show','destroy','edit','store','update']]);
Route::resource('user', 'UserController', ['only' => ['index','create','edit','update', 'destroy']]);

Route::get('/home', 'HomeController@index');
// Route::get('/articles', 'HomeController@index');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
