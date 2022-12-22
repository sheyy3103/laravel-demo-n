@extends('layout')
@section('main')
    <div class="container py-3">
        <div class="card shadow-lg p-3 rounded-0 px-5" style="">
            <div class="d-flex justify-content-between align-items-center" style="margin: 0; padding: 0 2vh; width: 100%">
                <p class="h2 text-secondary font-weight-bold text-uppercase py-3">shopping cart</p>
                <p class="h5 text-secondary ">{{ $totalProduct }} items</p>
            </div>
            <div class="row border-bottom border-top">
                <div class="row align-items-center" style="margin: 0; padding: 2vh 2vh; width: 100%">
                    <div class="col font-weight-bold">Image</div>
                    <div class="col font-weight-bold">Name</div>
                    <div class="col font-weight-bold">Price</div>
                    <div class="col font-weight-bold">Quantity</div>
                    <div class="col-2 font-weight-bold">Total</div>
                    <div class="col-1 font-weight-bold"></div>
                </div>
            </div>
            @foreach ($data as $item)
                <div class="row border-bottom">
                    <div class="row align-items-center" style="margin: 0; padding: 2vh 2vh; width: 100%">
                        <div class="col">
                            <img src="{{ url('uploads') }}/{{ $item['image'] }}" alt="" height="100px"
                                width="auto">
                        </div>
                        <div class="col">{{ $item['name'] }}</div>
                        <div class="col">
                            <span class="text-danger">
                                {{ number_format($item['price'], 2, '.', ',') }}
                                <small>$</small>
                            </span>
                        </div>
                        <div class="col mt-3">
                            <form action="{{ route('cart.update', $item['product_id']) }}" method="post">
                                @csrf
                                <div class="form-group d-flex m-0">
                                    <label for=""></label>
                                    <input type="text" class="w-50 rounded-0 pl-2 form-control" name="quantity"
                                        style="" value="{{ $item['quantity'] }}">
                                    <button type="submit" class="btn btn-outline-info rounded-0 btn-sm"><i
                                            class="fa-regular fa-pen-to-square"></i></button>
                                </div>
                                @error('quantity')
                                    <small class="text-danger">{{ $message }}</small>
                                    <br>
                                @enderror
                            </form>
                        </div>
                        <div class="col-2">
                            <span class="text-danger">
                                {{ number_format($item['price'] * $item['quantity'], 2, '.', ',') }}
                                <small>$</small>
                            </span>
                        </div>
                        <div class="col-1 text-right mt-3">
                            <form action="{{ route('cart.delete', $item['product_id']) }}" method="post">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-outline-secondary border-0 rounded-0"
                                    onclick="return confirm('Are you sure about detele this item?')">&#10005;</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="row" style="margin: 0; padding: 2vh 0; width: 100%">
                <div class="text-uppercase h4 font-weight-bold col">Total all</div>
                <div class="text-danger col-2">
                    {{ number_format($total, 2, '.', ',') }}
                    <small>$</small>
                </div>
                <div class="col-1"></div>
            </div>
            <div class="row">
                <div class="col-12">
                    <a href="{{ route('checkout') }}"
                        class="btn btn-warning rounded-0 btn-lg btn-block {{ $totalProduct ? '' : 'disabled' }}">
                        <i class="fa-solid fa-money-check"></i>
                        Checkout
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
