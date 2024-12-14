<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller {
    public function index()
    {
        $posts = Post::where('user_id', auth()->id())
            ->latest()
            ->get();
        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        $categories = Category::where('user_id', auth()->id())
            ->pluck('name', 'id');
        return view('posts.add', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'       => 'required|max:255',
            'content'     => 'required',
            'category_id' => 'required',
        ]);

        $newPostData = [
            'title'       => $request->get('title'),
            'content'     => $request->get('content'),
            'user_id'     => auth()->id(),
            'category_id' => (int) $request->get('category_id'),
        ];

        Post::create($newPostData);

        return redirect()->route('posts.index')->with('success', 'Post created successfully!');
    }

    public function update(Request $request)
    {
        $request->validate([
            'id'      => 'required',
            'title'   => 'required|max:255',
            'content' => 'required',
            'category_id' => 'required',
        ]);

        $post = Post::where('id', $request->get('id'))->first();

        if ($post->user_id != auth()->id()) {
            return redirect()->route('posts.index')->with('error', 'Post cannot be edited!');
        }

        $post->title = $request->get('title');
        $post->content = $request->get('content');
        $post->category_id = (int) $request->get('category_id');
        $post->save();

        return redirect()->route('posts.index')->with('success', 'Post updated successfully!');
    }


    public function edit(Post $post)
    {
        $categories = Category::where('user_id', auth()->id())
            ->pluck('name', 'id');
        return view('posts.edit', compact('post', 'categories'));
    }

    public function delete(Request $request)
    {
        $post = Post::where('id', $request->get('id'))->first();
        if ($post->user_id == auth()->id()) {
            $post->delete();

            return redirect()->route('posts.index')->with('success', 'Post deleted successfully!');
        } else {
            return redirect()->route('posts.index')->with('error', 'Post cannot be deleted!');
        }
    }
}
