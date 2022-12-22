@extends('layout')
@section('main')
    <div class="container py-3">
        <div class="card shadow-lg p-3 rounded-0 px-5" style="">
            @foreach ($order as $item)
                <div class="d-flex justify-content-between align-items-center" style="margin: 0; padding: 0 2vh; width: 100%">
                    <p class="h2 text-secondary font-weight-bold text-uppercase py-3">
                        ordered id: {{ $item->id }}
                        <small class="h6">(Note: {{ $item->note }})</small>
                    </p>
                    <p class="h5 text-secondary ">{{ $totalProduct }} items</p>
                </div>
                <div class="row border-bottom border-top">
                    <div class="row align-items-center" style="margin: 0; padding: 2vh 2vh; width: 100%">
                        <div class="col font-weight-bold">Image</div>
                        <div class="col font-weight-bold">Name</div>
                        <div class="col font-weight-bold">Price</div>
                        <div class="col font-weight-bold text-center">Quantity</div>
                        <div class="col font-weight-bold text-right">Total</div>
                    </div>
                </div>
                @foreach ($orderDetails[$item->id] as $value)
                    <div class="row border-bottom">
                        <div class="row align-items-center" style="margin: 0; padding: 2vh 2vh; width: 100%">
                            <div class="col">
                                <img src="{{ url('uploads') }}/{{ $products[$value['product_id']]->image }}" alt=""
                                    height="75px" width="auto">
                            </div>
                            <div class="col">{{ $products[$value['product_id']]['name'] }}</div>
                            <div class="col">
                                <span class="text-danger">
                                    {{ number_format($value['price'], 2, '.', ',') }}
                                    <small>$</small>
                                </span>
                            </div>
                            <div class="col mt-3 text-center">
                                <span>{{ $value['quantity'] }}</span>
                            </div>
                            <div class="col text-right">
                                <span class="text-danger">
                                    {{ number_format($value['total'], 2, '.', ',') }}
                                    <small>$</small>
                                </span>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="row justify-content-between" style="margin: 0; padding: 2vh 0; width: 100%">
                    <div class="text-uppercase h4 font-weight-bold col">Total all</div>
                    <div class="col"></div>
                    <div class="col"></div>
                    <div class="col"></div>
                    <div class="col text-right">
                        <span class="text-danger">
                            {{ number_format($totalPrice, 2, '.', ',') }}
                            <small>$</small>
                        </span>
                    </div>
                </div>
            @endforeach
            {{ $order->links() }}
        </div>
    </div>
@endsection
