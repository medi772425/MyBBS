<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;

class CommentController extends Controller
{
    public function store(Request $request, Post $post)
    {
        $request->validate([
            "body" => 'required',
        ]);

        $comments = new Comment();
        $comments->post_id = $post->id;
        $comments->body = $request->body;
        $comments->save();

        return redirect()->route('posts.show', $post);
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();

        // モデルのCommentクラスのpostメソッドを使用している。
        return redirect()->route('posts.show', $comment->post);
    }
}
