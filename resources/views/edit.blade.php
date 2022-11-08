@extends('layout')

@section('content')
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <div><img src="/{{$image->image}}" class="img-thumbnail" alt=""></div>
                    <form action="/edit/{{$image->id}}" enctype="multipart/form-data" method="post">
                        {{@csrf_field()}}
                        <div class="form-control">
                            <input type="file" name="image">
                        </div>
                        <button type="submit" class="btn btn-success">send</button>
                    </form>
                </div>
            </div>
        </div>
@endsection
