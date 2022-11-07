@extends('layout')

@section('content')
    <div class="container" align="center">
        <h1 align="center">My gallery</h1>
        <div class="row">

            @foreach($images as $image)
            <div class="col-md-3 gallery-item">
                    <div><img src="{{$image}}" class="img-thumbnail" alt=""></div>
                    <a href="/show" class="btn btn-success my-button">info</a>
                    <a href="/create" class="btn btn-success my-button">Add</a>
                    <a href="/edit" class="btn btn-warning my-button">Edit</a>
                    <a href="#" class="btn btn-danger my-button">delete</a>
            </div>
            @endforeach


        </div>
    </div>
@endsection
