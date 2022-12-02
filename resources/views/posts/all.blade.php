@extends('layout')

@section('content')
    @foreach($posts as $post)
        <p>{{$post->id}}</p>
        <h2>{{$post->title}}</h2>
        <p>{{$post->content}}</p>
        @if(isset($post->comments))
            <div data-spy="scroll"  data-offset="0" style="background-color: darkgrey">
                @foreach($post->comments as $comment)
                    {{--            <p>{{$comment}}</p>--}}
                    <h4 id="{{$comment->user->name}}">{{$comment->user->name}}</h4>
                    <p>{{$comment->body}}</p>
                @endforeach
            </div>
        @endif
        <a href="/posts/show/{{$post->id}}" class="btn btn-success">Подробнее</a>
        <a href="/posts/edit/{{$post->id}}" class="btn btn-success">Изменить</a>
        <hr>
    @endforeach
    {{$posts->links()}}
@endsection
