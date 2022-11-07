@extends('layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <h1>Addi image</h1>
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-control">
                        <input type="file">
                    </div>
                    <button type="submit" class="btn btn-success" name="image">send</button>
                </form>
            </div>
        </div>
    </div>
@endsection
