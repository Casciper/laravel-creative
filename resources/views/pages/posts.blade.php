@extends('welcome')

@section('content')
    @include('components.navbar')
    <ul class="list-group list-group-flush">
        @foreach($posts as $post)
            <li class="list-group-item">
                Пост {{ $post->id }}<br>
                {{ $post->title }}<br>
                {{ $post->content }}<br>
                {{ $post->likes }}
            </li>
        @endforeach
    </ul>
@endsection
