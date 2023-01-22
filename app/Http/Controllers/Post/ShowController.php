<?php

namespace App\Http\Controllers\Post;

use App\Models\Post;

class ShowController extends BaseController
{

    public function __invoke($id)
    {
        $post = Post::where('id', $id)->with(['tags', 'category'])->first();
        return view('pages.post.show', compact('post'));
    }
}
