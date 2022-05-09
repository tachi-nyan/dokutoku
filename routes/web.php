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


//聞きたいこと…コントローラーの設定方法
//現在のエラー：booklist.blade.phpのコントローラーを作ったがどうやら、パラメーターが渡せていない
// 色々変えてはみたが、うまくはいかなかったという現状。

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
Route::get('books', 'BooksController@index')->name('books.index');
// ユーザー一覧。showの補助ページ
   // また、bookscontrolerのうち一部のみ使えることを記載している。resourceを使わずに表してみる。
Route::get('books/create', 'BooksController@create')->name('books.create');
//新規作成用のフォームページ
Route::get('books/booklist','BooksController@booklist')->name('books.booklist');

Route::get('books/{book}','BooksController@show')->name('books.show');
//個別詳細ページを表示する。その際、その個別の本のidを取ってくる必要があるため、{id}を指定する。
Route::post('books','BooksController@store')->name('books.store');
// 新規登録を処理する。ここで、idはこれから付与するから、idを指定する必要がない。
Route::put('books/{book}', 'BooksController@update')->name('books.update');
//更新処理。
Route::delete('books/{book}', 'BooksController@destroy')->name('books.destroy');
//削除処理。
Route::get('books/{book}/edit', 'BooksController@edit')->name('books.edit');
// edit: 更新用のフォームページ。name は「名前つきルート」というもので、特定のルートへのURLを生成したり、リダイレクトしたりする。

    
});
