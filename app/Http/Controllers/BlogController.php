<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;

class BlogController extends Controller
{
    public function index()
    {
        $posts = Post::latest()
            ->with('author')
            ->limit(1)
            ->get();

        return view('blog.index', compact('posts'));
    }

    public function all()
    {
        $posts = Post::latest()
            ->with('author')
            ->get();

        return view('blog.index', compact('posts'));
    }

    public function post(Post $post)
    {
        $author = User::where('id', $post->user_id)
            ->first();

        return view('blog.post', compact('post', 'author'));
    }

    public function contact()
    {
        return view('blog.contact');
    }
}
