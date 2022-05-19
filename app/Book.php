<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model

// これはBookモデルです.
{
    protected $fillable = [
        'title',
        'price',
        'image',
        'memo'
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
     public function bookmark_users()
    {
        return $this->belongsToMany(User::class, 'bookmarks', 'book_id', 'user_id')->withTimestamps();
    }
}
