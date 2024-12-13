<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;

class BlogController extends Controller
{
    public function index(bool $all = false)
    {
        $posts = Post::latest()
            ->with('author');

        if (!$all) {
            $posts->limit(1);
        }

        $posts = $posts->get();

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
