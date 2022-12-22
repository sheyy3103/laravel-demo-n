@extends('layout')
@section('main')
    <div class=" container-fluid my-5">
        <div class="row justify-content-center ">
            <div class="col-xl-10">
                <div class="card shadow-lg rounded-0">
                    <div class="row justify-content-center align-items-center mb-0 pt-3">
                        <h2 class="card-title text-uppercase mb-0"><b>Checkout</b></h2>
                    </div>
                    <form action="{{ route('order') }}" method="post">
                        @csrf
                        <div class="row justify-content-center pb-4">
                            <div class="col-5">
                                <div class="card border-0">
                                    <div class="card-header bg-transparent pl-0">
                                        <p class="card-text text-muted mt-md-4 mb-2 text-uppercase h3">
                                            payment details
                                        </p>
                                    </div>
                                    <div class="card-body p-0 pt-3">
                                        <div class="form-group">
                                            <label for="" class="h5 text-muted mb-1">Name: </label>
                                            <input type="text" class="form-control rounded-0 mt-1" name="name"
                                                placeholder="Enter name..." value="{{ Auth::user()->name }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="h5 text-muted mb-1">Address: </label>
                                            <input type="text" class="form-control rounded-0 mt-1" name="address"
                                                placeholder="Enter address...">
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="h5 text-muted mb-1">Email address: </label>
                                            <input type="email" class="form-control rounded-0 mt-1" name="email"
                                                placeholder="Enter phone number..." value="{{ Auth::user()->email }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="h5 text-muted mb-1">Phone number: </label>
                                            <input type="text" class="form-control rounded-0 mt-1" name="phone"
                                                placeholder="Enter phone number..." value="{{ Auth::user()->phone }}">
                                        </div>
                                        <div class="form-group">
                                          <label for="" class="h5 text-muted mb-1">Note:</label>
                                          <textarea class="form-control rounded-0 mt-1" name="note" rows="2"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-5">
                                <div class="card border-0 ">
                                    <div class="card-header bg-transparent">
                                        <p class="card-text text-muted mt-md-4 mb-2 pl-0 text-uppercase h3">
                                            your order
                                        </p>
                                    </div>
                                    <div class="card-body pt-0">
                                        @foreach ($data as $item)
                                            <div class="row justify-content-between align-items-center border-bottom py-2">
                                                <div class="col-auto col-md-7">
                                                    <div class="media flex-column flex-sm-row">
                                                        <img class=" img-fluid"
                                                            src="{{ url('uploads') }}/{{ $item['image'] }}" width="62"
                                                            height="62">
                                                        <div class="media-body my-auto">
                                                            <div class="row ">
                                                                <div class="col-auto">
                                                                    <p class="mb-0 ml-2"><b>{{ $item['name'] }}</b></p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class=" pl-0 col-auto my-auto pt-3">
                                                    <p class="">{{ $item['quantity'] }}</p>
                                                </div>
                                                <div class=" pl-0 col-auto my-auto pt-3">
                                                    <p class="text-danger">
                                                        {{ number_format($item['price'] * $item['quantity'], 2, '.', ',') }}
                                                        <small>$</small>
                                                    </p>
                                                </div>
                                            </div>
                                        @endforeach
                                        <div class="row">
                                            <div class="col border-bottom">
                                                <div
                                                    class="row justify-content-between align-items-center my-3">
                                                    <div class="col-4">
                                                        <p class="h5"><b>Total</b></p>
                                                    </div>
                                                    <div class="col-auto">
                                                        <p class="text-danger h5">
                                                            {{ number_format($total, 2, '.', ',') }}
                                                            <small>$</small>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-10">
                                <button type="submit" class="btn btn-outline-danger btn-lg btn-block rounded-0">
                                    <i class="fa-solid fa-store"></i>
                                    &nbsp;Order instantly
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection
