<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        // latest()と同じ意味になる
        // // // $posts = Post::OrderBy('created_at', 'desc')->get();
        $posts = Post::latest()->get();

        return view('index')->with(['posts' => $posts]);
    }

    // Implicit Binding で Postを受け取る
    public function show(Post $post)
    {
        return view('posts.show')->with(['post' => $post]);
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            "title" => 'required|min:3',
            "body" => 'required',
        ], [
            "title.required" => 'タイトルは必須です',
            "title.min" => ':min 文字以上で入力してください',
            "body.required" => '本文は必須です',
        ]);

        $post = new Post();
        $post->title = $request->title;
        $post->body = $request->body;
        $post->save();

        return redirect()
            ->route('posts.index');
    }
}
