@extends('layout')

@section('content')

        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <div><img src="/{{$image->image}}" class="img-thumbnail" alt=""></div>
                    <form action="/change/{{$image->id}}" enctype="multipart/form-data" method="post">
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
