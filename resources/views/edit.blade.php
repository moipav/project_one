@extends('layout')

@section('content')

        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <h1>Edit image</h1>
                    <form action="" enctype="multipart/form-data">
                        <div class="form-control">
                            <input type="file" name="image">
                        </div>
                        <button type="submit" class="btn btn-success">send</button>
                    </form>
                </div>
            </div>
        </div>
@endsection
