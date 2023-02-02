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

// トップページの表示
Route::get('/', 'BooksController@index');

// ユーザ登録
Route::get('signup', 'Auth\RegisterController@showRegistrationForm')->name('signup.get');
Route::post('signup', 'Auth\RegisterController@register')->name('signup.post');

// ログイン、認証
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login.post');
Route::get('logout', 'Auth\LoginController@logout')->name('logout.get');

// 認証している人でなければならないルーティング設定
Route::group(['middleware' => ['auth']], function () {
Route::get('books', 'BooksController@index')->name('books.index');

// ユーザー一覧。showの補助ページ
Route::get('books/create', 'BooksController@create')->name('books.create');
// 新規作成用のフォームページ
Route::get('books/booklist','BooksController@booklist')->name('books.booklist');
Route::get('books/{book}','BooksController@show')->name('books.show');
// 個別詳細ページ
Route::post('books','BooksController@store')->name('books.store');
// 新規登録
Route::post('books/{book}/update', 'BooksController@update')->name('books.update');
// 更新処理
Route::post('books/{book}/destroy', 'BooksController@destroy')->name('books.destroy');
// 削除処理
Route::get('books/{book}/edit', 'BooksController@edit')->name('books.edit');

// edit: 更新用のフォームページ。
Route::get('bookmarks', 'BooksController@bookmarks')->name('books.bookmarks');
Route::post('bookmark/{book}', 'BookmarksController@store')->name('bookmarks.bookmark');
Route::post('unbookmark/{book}', 'BookmarksController@destroy')->name('bookmarks.unbookmark');
});
