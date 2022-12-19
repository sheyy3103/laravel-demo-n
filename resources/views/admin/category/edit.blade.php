@extends('admin.layout')
@section('in')
<div class="container">
    <p class="h1 py-3 text-info text-uppercase text-center font-weight-bold">Edit "{{ $category->name }}"</p>
    <form action="{{ route('category.update',$category->id) }}" method="POST">
        @csrf @method('PATCH')
        <div class="form-group">
            <label for="" class="h5">Category's name: </label>
            <input type="text" name="name" class="form-control rounded-0" placeholder="" value="{{ $category->name }}">
        </div>
        <div class="form-group">
            <label for="" class="h5">Status: </label>
            <div class="form-check">
                <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="status" value="0" {{ $category->status ? '' : 'checked' }}>
                    Display
                </label>
            </div>
            <div class="form-check">
                <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="status" value="1" {{ !$category->status ? '' : 'checked' }}>
                    Hidden
                </label>
            </div>
        </div>
        <button type="submit" class="btn btn-outline-info rounded-0">Edit instantly</button>
    </form>
</div>
@endsection
