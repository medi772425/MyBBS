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
}
