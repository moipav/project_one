@extends('layout')

@section('content')
    <div class="container" align="center">
        <h1 align="center">My gallery</h1>
        <div class="row">
            @foreach($images as $image)
            <div class="col-md-3 gallery-item">
                    <div><img src="{{$image->image}}" class="img-thumbnail" alt=""></div>
                    <a href="/show/{{$image->id}}" class="btn btn-success my-button">info</a>
                    <a href="/edit/{{$image->id}}" class="btn btn-warning my-button">Edit</a>
                    <a href="/delete/{{$image->id}}" onclick="return confirm('are you sure')" class="btn btn-danger my-button">delete</a>
            </div>
            @endforeach


        </div>
    </div>
@endsection
