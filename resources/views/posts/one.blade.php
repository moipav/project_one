@extends('layout');

@section('content')
    <h2>{{$post->title}}</h2>
    <p>{{$post->content}}</p>
    <a href="/posts/edit/{{$post->id}}" class="btn btn-success">Изменить</a>
    <a href="{{route('all.posts')}}" class="btn btn-success">Назад</a>
    <a href="/posts/delete/{{$post->id}}" class="btn btn-danger" onclick="return confirm('are you sure')">Удалить</a>

    @if(isset($post->comments))
        <div data-spy="scroll"  data-offset="0">
            @foreach($post->comments as $comment)
                {{--            <p>{{$comment}}</p>--}}
                <h4 id="{{$comment->user->name}}">{{$comment->user->name}}</h4>
                <p>{{$comment->body}}</p>
            @endforeach
        </div>
    @endif
@endsection
