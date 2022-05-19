<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookmarksController extends Controller
{
     /**
     * お気に入りを追加するアクション。
     *
     * @param  $id  bookのid
     * @return \Illuminate\Http\Response
     */
    public function store($id)
    {
        // 認証済みユーザ（閲覧者）が、 idの投稿をお気に入りにする
        \Auth::user()->bookmark($id);
        // 前のURLへリダイレクトさせる
        return back();
    }

    /**
     * お気に入りを削除するアクション。
     *
     * @param  $id  bookのid
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // 
        \Auth::user()->unbookmark($id);
        // 前のURLへリダイレクトさせる
        return back();
    }
}
