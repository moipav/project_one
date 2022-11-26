@extends('layout')

@section('content')
    @foreach($posts as $post)
        <p>{{$post->id}}</p>
        <h2>{{$post->title}}</h2>
        <p>{{$post->content}}</p>
        <hr>
    @endforeach
    {{$posts->links()}}
@endsection
