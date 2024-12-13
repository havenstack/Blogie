<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->get();
        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        return view('posts.add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
        ]);

        $newPostData = [
            'title' => $request->get('title'),
            'content' => $request->get('content'),
            'user_id' => auth()->id(),
        ];

        Post::create($newPostData);

        return redirect()->route('posts.index')->with('success', 'Post created successfully!');
    }

    public function update(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'title' => 'required|max:255',
            'content' => 'required',
        ]);

        $post = Post::where('id', $request->get('id'))->first();

        if ($post->user_id != auth()->id()) {
            return redirect()->route('posts.index')->with('error', 'Post cannot be edited!');
        }

        $post->title = $request->get('title');
        $post->content = $request->get('content');
        $post->save();

        return redirect()->route('posts.index')->with('success', 'Post updated successfully!');
    }



    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
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
