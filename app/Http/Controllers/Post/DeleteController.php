<?php

namespace App\Http\Controllers\Post;

use App\Models\Post;

class DeleteController extends BaseController
{

    public function __invoke(Post $post)
    {
        $post->tags()->detach();
        $post->delete();
        return redirect()->route('posts.index');
    }
}
