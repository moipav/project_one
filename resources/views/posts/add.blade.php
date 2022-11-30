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
                <form action="/posts/add" method="post" name="add">
                    {{@csrf_field()}}
                    <div class="form-group">
                        <label for="title">title</label>
                        <textarea class="form-control" name="title" >{{old('title')}}</textarea>

                        <label for="content">content</label>
                        <textarea class="form-control" name="content">{{old('content')}}</textarea>

                        <button type="submit" name="send" class="btn btn-success">Send</button>
                        <a href="{{route('all.posts')}}" class="btn btn-success">cansel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
