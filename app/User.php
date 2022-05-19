<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    /**
     * このユーザが所有する投稿。（ Bookモデルとの関係を定義）
     */
    public function books()
    {
        return $this->hasMany(Book::class);
    }
    
     /**
     * お気に入り機能。（ Bookモデルとの関係を定義）
     */
    public function  bookmarks()
    {
        return $this->belongsToMany(Book::class, 'bookmarks', 'user_id', 'book_id')->withTimestamps();
    }
    
    
    public function bookmark($bookId)
    {
        // すでにお気に入りか確認
        if ($this->is_bookmark($bookId)) {
            // すでにお気に入りであれば何もしない
            return false;
        } else {
            // お気に入りに追加する
            $this->bookmarks()->attach($bookId);
            return true;
        }
    }
    
     public function unbookmark($bookId)
    {
       // すでにお気に入りか確認
        if ($this->is_bookmark($bookId)) {
            // すでにお気に入りであれば、削除する
            $this->bookmarks()->detach($bookId);
            return true;
        } else {
            // お気に入りでなければ何もしない
            return false;
        }
    }
    
    /**
     * お気に入り中ならtrueを返す。
     *
     * @param  int  $userId
     * @return bool
     */
    public function is_bookmark($bookId)
    {
        // micropostIDが存在するか
        return $this->bookmarks()->where('book_id', $bookId)->exists();
    }
    
}
