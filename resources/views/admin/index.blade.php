@extends('admin.layout')
@section('in')
    <div class="jumbotron">
        <h1 class="display-3">Jumbo heading</h1>
        <p class="lead">Jumbo helper text</p>
        <hr class="my-2">
        <p>More info</p>
        <p class="lead">
            <a class="btn btn-primary btn-lg rounded-0" href="{{ route('index') }}" role="button">Back to home page</a>
        </p>
    </div>
@endsection
