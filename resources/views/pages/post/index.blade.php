@extends('welcome')

@section('content')
    @include('components.navbar')
    <div class="link-container d-flex justify-content-end mb-3">
        <a href="{{ route('posts.create') }}" class="btn btn-primary ">New post</a>
    </div>

    <ul class="list-group list-group-flush mb-5">
        @foreach($posts as $post)
            <li class="list-group-item">
                <b>Пост</b> {{ $post->id }}<br>
                <b>Категория</b>: {{ $post->category->title }}<br>
                <b>Название</b>: {{ $post->title }}<br>
                <b>Контент</b>: {{ $post->content }}<br>
                <b>Лайки</b>: {{ $post->likes }}
                <div class="link-container d-flex justify-content-start mt-1" style="position: relative; left: -0.25rem">
                    <a href="{{ route('posts.show', $post->id) }}" class="btn btn-primary m-1">Show</a>
                    <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary m-1">Edit</a>
                    <form action="{{ route('posts.destroy', $post->id) }}" method="post">
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger m-1" type="submit">Delete</button>
                    </form>
                </div>
            </li>
        @endforeach
    </ul>

    <div>
        {{ $posts->withQueryString()->links() }}
    </div>
@endsection
