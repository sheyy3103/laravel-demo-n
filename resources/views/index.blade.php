@extends('layout')
@section('main')
<div class="jumbotron">
    <h1 class="display-3">Hello everyone</h1>
    <p class="lead">Hehe</p>
    <hr class="my-2">
    <p class="lead">
        <a class="btn btn-info btn-lg rounded-0" href="{{ route('admin.index') }}" role="button">Go to admin page</a>
    </p>
</div>
@endsection
