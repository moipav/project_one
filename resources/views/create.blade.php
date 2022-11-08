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
                <h1>Addi image</h1>
                <form action="/create" method="post" enctype="multipart/form-data">
                    {{@csrf_field()}}
                    <div class="form-control">
                        <input type="file" name="image">
                    </div>
                    <button type="submit" class="btn btn-success" >send</button>
                </form>
            </div>
        </div>
    </div>
@endsection
