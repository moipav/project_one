@extends('layout')

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <form action="/posts/edit/{{$post->id}}" method="post" name="edit">
                    {{@csrf_field()}}
                    <div class="form-group">
                        <label for="title">title</label>
                            <textarea class="form-control" name="title">{{$post->title}}</textarea>

                        <label for="content">content</label>
                            <textarea class="form-control" name="content">{{$post->content}}</textarea>

                        <button type="submit" name="send" class="btn btn-success">Send</button>
                        <a href="{{route('all.posts')}}" class="btn btn-success">cansel</a>
                        <a href="'/posts/show/'{{$post->id}}" class="btn btn-success">back</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
