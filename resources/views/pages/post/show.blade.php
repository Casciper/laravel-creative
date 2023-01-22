@extends('welcome')

@section('content')
    @include('components.navbar')
    <div class="link-container d-flex justify-content-start mb-2" style="position: relative; left: -0.25rem">
        <a href="{{ route('posts.index') }}" class="btn btn-primary m-1">Back</a>
        <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary m-1">Edit</a>

        <form action="{{ route('posts.destroy', $post->id) }}" method="post">
            @csrf
            @method('delete')
            <button class="btn btn-danger m-1" type="submit">Delete</button>
        </form>
    </div>

    <ul class="list-group list-group-flush">
        <li class="list-group-item">
            <b>Пост</b> {{ $post->id }}<br>
            <b>Категория</b>: {{ $post->category->title }}<br>
            <b>Название</b>: {{ $post->title }}<br>
            <b>Контент</b>: {{ $post->content }}<br>
            <b>Изображение</b>: {{ $post->image }}<br>
            <b>Лайки</b>: {{ $post->likes }}
        </li>
    </ul>
@endsection
