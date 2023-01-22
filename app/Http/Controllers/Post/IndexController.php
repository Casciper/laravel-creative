<?php

namespace App\Http\Controllers\Post;

use App\Models\Post;

class IndexController extends BaseController
{

    public function __invoke()
    {
        $posts = Post::with(['tags', 'category'])->get();
        return view('pages.post.index', compact('posts'));
    }
}
