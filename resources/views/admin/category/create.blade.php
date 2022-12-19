@extends('admin.layout')
@section('in')
    <div class="container">
        <p class="h1 py-3 text-success text-uppercase text-center font-weight-bold">add a new category</p>
        <form action="{{ route('category.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="" class="h5">Category's name: </label>
                <input type="text" name="name" class="form-control rounded-0" placeholder="">
                @error('name')
                    <small class="help-text text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="" class="h5">Status: </label>
                <div class="form-check">
                    <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="status" value="0" checked>
                        Display
                    </label>
                </div>
                <div class="form-check">
                    <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="status" value="1" >
                        Hidden
                    </label>
                </div>
            </div>
            <button type="submit" class="btn btn-outline-success rounded-0">Add instantly</button>
        </form>
    </div>
@endsection
