@extends('layout')
@section('main')
    <div class="container-fluid px-5">
        <p class="h1 text-center text-uppercase text-danger font-weight-bold py-3">all product</p>
        <div class="row">
            <div class="col-lg-3">
                <p class="h2 font-weight-bold text-uppercase text-secondary">Filter</p>
                <form method="GET" class="w-75">
                    <div class="form-group">
                        <label for="">Search by name: </label>
                        <input class="form-control mr-sm-2 rounded-0" type="text" placeholder="Search" name="keyword">
                    </div>
                    {{-- <div class="form-group">
                        <label for="">Search by category: </label>
                        <select class="custom-select rounded-0" name="category_id" id="">
                            <option value="">Select</option>
                            @foreach ($categories as $item)
                                <option value="{{ $item->id }}" {{ $item->id == request()->category_id ? 'selected' : '' }}>{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div> --}}
                    <div class="form-group">
                        <label for="">Filter: </label>
                        <select class="custom-select rounded-0" name="order" id="">
                            <option value="price_DESC">Price (High - Low)</option>
                            <option value="price_ASC">Price (Low - High)</option>
                            <option value="name_ASC">Name (A-Z)</option>
                            <option value="name_DESC">Name (A-Z)</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-outline-secondary btn-block rounded-0">Filter</button>
                </form>
            </div>
            <div class="col-lg-9">
                <div class="row">
                    @foreach ($products as $item)
                        <div class="col-4">
                            <a href="#" class="card rounded-0 text-dark text-decoration-none"
                                title="{{ $item->name }}">
                                <img class="card-img-top rounded-0" src="{{ url('uploads') }}/{{ $item->image }}"
                                    alt="">
                                <div class="card-img-overlay">
                                    <span
                                        class=" float-right badge badge-{{ $item->status ? 'danger' : 'success' }} rounded-0">{{ $item->status ? 'Out of stock' : 'In stock' }}
                                    </span>
                                </div>
                                <div class="card-body">
                                    <div class="d-flex align-items-end">
                                        <h5 class="card-title my-0">
                                            <span>{{ $item->name }}&nbsp;</span>
                                        </h5>
                                        <small>({{ $item->category->name }})</small>
                                    </div>
                                    @if ($item->sale_price)
                                        <p class="card-text py-2">Price:
                                            <del class="text-muted">{{ $item->price }}</del>
                                            <span class="text-danger">{{ $item->sale_price }}<small>$</small></span>
                                            <small>({{ number_format((1 - $item->sale_price / $item->price) * 100, 2, '.', ',') }}%)</small>
                                        </p>
                                    @else
                                        <p class="card-text py-2">Price:
                                            <span class="text-danger">{{ $item->price }}<small>$</small></span>
                                            <small>(0%)</small>
                                        </p>
                                    @endif
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
