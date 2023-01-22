@extends('welcome')

@section('content')
    @include('components.navbar')
    <form method="post" action="{{ route('posts.store') }}">
        @csrf
        <div class="form-group mb-3">
            <label for="title">Title</label>
            <input value="{{ old('title') }}" type="text" name="title" class="form-control" id="title" placeholder="Title">
            @error('title')
            <p class="text-danger"> {{ $message }}</p>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="content">Content</label>
            <textarea style="resize:none" name="content" class="form-control" id="content"
                      placeholder="Content">{{ old('content') }}</textarea>
            @error('content')
            <p class="text-danger"> {{ $message }}</p>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="image">Image</label>
            <input value="{{ old('image') }}" type="text" name="image" class="form-control" id="image" placeholder="Image">
            @error('image')
            <p class="text-danger"> {{ $message }}</p>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="category">Category</label>
            <select class="form-select" name="category_id" id="category">
                <option selected value="">Open this select menu</option>
                @foreach($categories as $category)
                    <option
                        {{ old('category_id') == $category->id ? 'selected' : '' }}
                        value="{{$category->id}}">{{$category->title}}</option>
                @endforeach
            </select>
            @error('category_id')
            <p class="text-danger"> {{ $message }}</p>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="tags">Tags</label>
            <select multiple class="form-select" name="tags[]" id="tags">
                @foreach($tags as $tag)
                    <option value="{{$tag->id}}">{{$tag->title}}</option>
                @endforeach
            </select>
            @error('tags')
            <p class="text-danger"> {{ $message }}</p>
            @enderror
        </div>

        <a href="{{ route('posts.index') }}" class="btn btn-primary ">Back</a>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
@endsection
