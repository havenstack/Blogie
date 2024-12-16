<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;

class BlogController extends Controller
{
    public function index()
    {
        $posts = Post::latest()
            ->with('author', 'category')
            ->limit(3)
            ->get();

        $categories = Category::with('latestPost')->get();

        return view('blog.index', compact('posts', 'categories'));
    }

    public function all()
    {
        $posts = Post::latest()
            ->with('author', 'category')
            ->get();

        $categories = Category::with('latestPost')->get();

        return view('blog.index', compact('posts', 'categories'));
    }

    public function post(Post $post)
    {
        $author = User::where('id', $post->user_id)
            ->first();

        $posts = Post::latest()
            ->with('author', 'category')
            ->limit(3)
            ->get();

        $categories = Category::all();

        return view('blog.post', compact('post', 'author', 'posts', 'categories'));
    }

    public function contact()
    {
        return view('blog.contact');
    }
}
