@extends('admin.layout')
@section('in')
    <div class="container">
        <p class="h1 py-3 text-success text-uppercase text-center font-weight-bold">add a new product</p>
        <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="" class="h5">Product's name: </label>
                <input type="text" name="name" class="form-control rounded-0" placeholder=""
                    value="{{ old('name') }}">
                @error('name')
                    <small class="help-text text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="" class="h5">Price: </label>
                <input type="text" name="price" class="form-control rounded-0" placeholder=""
                    value="{{ old('price') }}">
                @error('price')
                    <small class="help-text text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="" class="h5">Sale price: </label>
                <input type="text" name="sale_price" class="form-control rounded-0" placeholder=""
                    value="{{ old('sale_price') ? old('sale_price') : '0' }}">
                @error('sale_price')
                    <small class="help-text text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="" class="h5">Image: </label>
                <input type="file" class="form-control border-0 rounded-0 pl-0" placeholder="" name="image">
                @error('image')
                    <small class="help-text text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="" class="h5">Status: </label>
                <div class="form-check">
                    <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="status" value="0" checked>
                        In stock
                    </label>
                </div>
                <div class="form-check">
                    <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="status" value="1">
                        Out of stock
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label for="" class="h5">Description: </label>
                <textarea class="form-control rounded-0" name="description" rows="3"></textarea>
            </div>
            <div class="form-group">
                <label for="" class="h5">Category</label>
                <select class="form-control custom-select rounded-0" name="category_id">
                    @foreach ($categories as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-outline-success rounded-0">Add instantly</button>
        </form>
    </div>
@endsection
