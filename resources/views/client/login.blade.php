@extends('layout')
@section('main')
    <div class="container">
        <p class="h1 py-3 text-info text-uppercase text-center">Sign in</p>
        <form action="{{ route('signin') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @if ($redirect = session('redirect'))
            <input type="hidden" name="action" value="{{ $redirect }}">
            @endif
            <div class="form-group">
                <label for="">Email: </label>
                <input type="email" class="form-control @error('email') border-danger @enderror" placeholder="Enter email..."
                    style="border-radius: 0" name="email" value="{{ old('email') }}">
                @error('email')
                    <small class="help-text text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Password: </label>
                <input type="password" class="form-control @error('password') border-danger @enderror" placeholder="Enter password..." style="border-radius: 0"
                    name="password" value="{{ old('password') }}">
                @error('password')
                    <small class="help-text text-danger">{{ $message }}</small>
                @enderror
            </div>
            <button type="submit" class="btn btn-outline-info" style="border-radius: 0">Sign in</button>
        </form>
    </div>
@endsection
