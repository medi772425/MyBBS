<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'body',
    ];

    // コメントテーブルとのリレーション
    // $post->comments() のような形で、postのデータからcommentテーブルのデータも取得できるようにする
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
