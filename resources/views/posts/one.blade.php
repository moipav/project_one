@extends('layout');

@section('content')
    <h2>{{$post->title}}</h2>
    <p>{{$post->content}}</p>
    <a href="/posts/edit/{{$post->id}}" class="btn btn-success">Изменить</a>
    <a href="{{route('all.posts')}}" class="btn btn-success">Назад</a>
    <a href="/posts/delete/{{$post->id}}" class="btn btn-danger" onclick="return confirm('are you sure')">Удалить</a>
    <s
@endsection
