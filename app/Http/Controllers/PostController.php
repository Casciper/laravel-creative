<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('posts', compact('posts'));
    }

    public function create()
    {
        $postsArr = [
            [
                'title' => 'created title',
                'content' => 'created content',
                'image' => 'created image',
                'likes' => 200,
                'is_published' => 1,
            ],
            [
                'title' => 'created title 2',
                'content' => 'created content 2',
                'image' => 'created image 2',
                'likes' => 201,
                'is_published' => 0,
            ]
        ];

        foreach ($postsArr as $item) {
            Post::create($item);
        }
        dd('created');

    }

    public function update()
    {
        $post = Post::find(6);
        $post->update([
            'title' => 'updated title 2',
            'content' => 'updated content 2',
            'image' => 'updated image 2',
            'likes' => 201,
            'is_published' => 0,
        ]);
        dd('updated');
    }

    public function delete()
    {
        $post = Post::find(1);
        $post->delete();
        dd('deleted');
    }
}
