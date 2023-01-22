<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function main()
    {
        return view('pages.main');
    }

    public function posts()
    {
        $posts = Post::all();
        return view('pages.post.index', compact('posts'));
    }
}
