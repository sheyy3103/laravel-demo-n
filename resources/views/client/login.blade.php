@extends('layout')
@section('main')
    <div class="container">
        <p class="h1 py-3 text-info text-uppercase text-center">Sign in</p>
        <form action="{{ route('signin') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="">Email: </label>
                <input type="email" class="form-control" placeholder="Enter email..." style="border-radius: 0"
                    name="email" value="{{ old('email') }}">
                @error('email')
                    <small class="help-text text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Password: </label>
                <input type="password" class="form-control" placeholder="Confirm password..." style="border-radius: 0"
                    name="password" value="{{ old('password') }}">
                @error('password')
                    <small class="help-text text-danger">{{ $message }}</small>
                @enderror
            </div>
            <button type="submit" class="btn btn-outline-info" style="border-radius: 0">Sign in</button>
        </form>
    </div>
@endsection
