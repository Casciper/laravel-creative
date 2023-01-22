<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\PostTag;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with(['tags', 'category'])->get();
        return view('pages.post.index', compact('posts'));
    }

    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('pages.post.create', compact('categories', 'tags'));
    }

    public function store(Post $post)
    {
        $data = request()->validate([
            'title' => 'bail|required|string',
            'content' => 'bail|required|string',
            'image' => 'bail|required|string',
            'category_id' => 'bail|required',
            'tags' => 'bail|required|'
        ]);
        $tags = $data['tags'];
        unset($data['tags']);

        $post = Post::create($data);
        $post->tags()->attach($tags);

        return redirect()->route('posts.index');
    }

    public function show($id)
    {
        $post = Post::where('id', $id)->with(['tags', 'category'])->first();
        return view('pages.post.show', compact('post'));
    }

    public function edit(Post $post)
    {
        $categories = Category::all();
        $tags = Tag::all();

        return view('pages.post.edit', compact('post', 'categories', 'tags'));
    }

    public function update(Post $post)
    {
        $data = request()->validate([
            'title' => 'string',
            'content' => 'string',
            'image' => 'string',
            'category_id' => 'integer',
            'tags' => ''
        ]);
        $tags = $data['tags'];
        unset($data['tags']);

        $post->update($data);
        $post->tags()->sync($tags);
        return redirect()->route('posts.show', $post->id);
    }

    public function destroy(Post $post)
    {
        $post->tags()->detach();
        $post->delete();
        return redirect()->route('posts.index');
    }
}
