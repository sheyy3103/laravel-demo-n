@extends('admin.layout')
@section('in')
    <div class="container">
        <p class="h1 py-3 text-info text-uppercase text-center font-weight-bold">Edit "{{ $product->name }}"</p>
        <form action="{{ route('product.update',$product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf @method('PATCH')
            <div class="form-group">
                <label for="" class="h5">Product's name: </label>
                <input type="text" name="name" class="form-control rounded-0" placeholder=""
                    value="{{ $product->name }}">
                @error('name')
                    <small class="help-text text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="" class="h5">Price: </label>
                <input type="text" name="price" class="form-control rounded-0" placeholder=""
                    value="{{ $product->price }}">
                @error('price')
                    <small class="help-text text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="" class="h5">Sale price: </label>
                <input type="text" name="sale_price" class="form-control rounded-0" placeholder=""
                    value="{{ $product->sale_price }}">
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
                <img src="{{ url('uploads') }}/{{ $product->image }}" alt="" height="100px">
            </div>
            <div class="form-group">
                <label for="" class="h5">Status: </label>
                <div class="form-check">
                    <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="status" value="0" {{ $product->status ? '' : 'checked' }}>
                        In stock
                    </label>
                </div>
                <div class="form-check">
                    <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="status" value="1" {{ !$product->status ? '' : 'checked' }}>
                        Out of stock
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label for="" class="h5">Description: </label>
                <textarea class="form-control rounded-0" name="description" rows="3">{{ $product->description }}</textarea>
            </div>
            <div class="form-group">
                <label for="" class="h5">Category</label>
                <select class="form-control custom-select rounded-0" name="category_id">
                    @foreach ($categories as $item)
                        <option value="{{ $item->id }}" {{ $product->category_id == $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-outline-info rounded-0">Edit instantly</button>
        </form>
    </div>
@endsection
