@extends('layout')

@section('content')
    @foreach($posts as $post)
        <p>{{$post->id}}</p>
        <h2>{{$post->title}}</h2>
        <p>{{$post->content}}</p>
        <a href="/posts/show/{{$post->id}}" class="btn btn-success">Подробнее</a>
        <a href="/posts/edit/{{$post->id}}" class="btn btn-success">Изменить</a>
        <hr>
    @endforeach
    {{$posts->links()}}
@endsection
