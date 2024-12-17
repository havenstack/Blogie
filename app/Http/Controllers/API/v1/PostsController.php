<?php

namespace App\Http\Controllers\API\v1;

use App\Models\Post;
use Illuminate\Http\Request;

class PostsController {
    public function index()
    {
        $items = Post::where('user_id', auth()->id())->get();
        return response()->json($items);
    }

    public function show($id)
    {
        $item = Post::where('user_id', auth()->id())
            ->where('id', $id)
            ->get();
        return response()->json($item);
    }
}
