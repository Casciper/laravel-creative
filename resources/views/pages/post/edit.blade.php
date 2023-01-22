@extends('welcome')

@section('content')
    @include('components.navbar')
    <form method="post" action="{{ route('posts.update', $post->id) }}">
        @csrf
        @method('patch')
        <div class="form-group mb-3">
            <label for="title">Title</label>
            <input type="text" name="title" class="form-control" value="{{ $post->title }}" id="title" placeholder="Title">
        </div>

        <div class="form-group mb-3">
            <label for="content">Content</label>
            <textarea style="resize:none" name="content" class="form-control" id="content" placeholder="Content">{{ $post->content }}</textarea>
        </div>

        <div class="form-group mb-3">
            <label for="image">Image</label>
            <input type="text" name="image" class="form-control" value="{{ $post->image }}" id="image" placeholder="Image">
        </div>

        <div class="form-group mb-3">
            <label for="category">Category</label>
            <select class="form-select" name="category_id" id="category">
                <option selected>Open this select menu</option>
                @foreach($categories as $category)
                    <option
                        {{ $category->id === $post->category_id ? 'selected' : '' }}
                        value="{{$category->id}}">{{$category->title}}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group mb-3">
            <label for="tags">Tags</label>
            <select multiple class="form-select" name="tags[]" id="tags">
                @foreach($tags as $tag)
                    <option
                        @foreach($post->tags as $postTag)
                            {{ $tag->id === $postTag->id ? 'selected' : '' }}
                        @endforeach
                        value="{{$tag->id}}">{{$tag->title}}</option>
                @endforeach
            </select>
        </div>


        <a href="{{ route('posts.index') }}" class="btn btn-primary ">Back</a>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
