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

Route::get('/', 'BooksController@index');

// ユーザ登録に関するルーティング
Route::get('signup', 'Auth\RegisterController@showRegistrationForm')->name('signup.get');
Route::post('signup', 'Auth\RegisterController@register')->name('signup.post');

// 認証に関するルーティング
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login.post');
Route::get('logout', 'Auth\LoginController@logout')->name('logout.get');

//認証している人でなければならないルーティング設定　middleware auth でそれを指定している。
Route::group(['middleware' => ['auth']], function () {
// また、bookscontrolerのうち一部のみ使えることを記載している。resourceで基本機能は搭載しておいた。
Route::resource('books', 'BooksController');
});
