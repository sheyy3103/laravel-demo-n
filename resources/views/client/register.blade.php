@extends('layout')
@section('main')
    <div class="container">
        <p class="h1 py-3 text-info text-uppercase text-center">Sign up</p>
        <form action="{{ route('signup') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="">User name: </label>
                <input type="text" class="form-control @error('name') border-danger @enderror" placeholder="Enter user name..." style="border-radius: 0"
                    name="name" value="{{ old('name') }}">
                @error('name')
                    <small class="help-text text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Email address: </label>
                <input type="email" class="form-control @error('email') border-danger @enderror" placeholder="Enter email address..." style="border-radius: 0"
                    name="email" value="{{ old('email') }}">
                @error('email')
                    <small class="help-text text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Phone number: </label>
                <input type="text" class="form-control @error('email') border-danger @enderror" placeholder="Enter phone number..." style="border-radius: 0"
                    name="phone" value="{{ old('phone') }}">
                @error('phone')
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
            <div class="form-group">
                <label for="">Confirm password: </label>
                <input type="password" class="form-control @error('confirm_password') border-danger @enderror" placeholder="Confirm password..." style="border-radius: 0"
                    name="confirm_password" value="{{ old('confirm_password') }}">
                @error('confirm_password')
                    <small class="help-text text-danger">{{ $message }}</small>
                @enderror
            </div>
            <button type="submit" class="btn btn-outline-info" style="border-radius: 0">Sign up</button>
        </form>
    </div>
@endsection
