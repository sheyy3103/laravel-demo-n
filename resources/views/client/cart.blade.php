@extends('layout')
@section('main')
    <div class="container-fluid py-3 px-5">
        <p class="h1 text-danger text-secondary font-weight-bold text-uppercase py-3">cart</p>
        <table class="table table-borderless table-striped table-active">
            <thead>
                <tr>
                    <th scope="col" class="">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Image</th>
                    <th scope="col">Price</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Total</th>
                    <th scope="col" style="width: 5%"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($product as $item)
                    @if (isset($data[$item->id]))
                        <tr>
                            <th class="pl-3">{{ $data[$item->id]['product_id'] }}</th>
                            <td>{{ $data[$item->id]['name'] }}</td>
                            <td><img src="{{ url('uploads') }}/{{ $data[$item->id]['image'] }}" alt=""
                                    height="75px" width="auto"></td>
                            <td class="text-danger">
                                {{ number_format($data[$item->id]['price'], 2, '.', ',') }}
                                <small>$</small>
                            </td>
                            <td class="w-25">
                                <form action="{{ route('cart.update', $data[$item->id]['product_id']) }}" method="post">
                                    @csrf
                                    <div class="form-group d-flex m-0">
                                        <label for=""></label>
                                        <input type="text" class="w-25 rounded-0 pl-2 border-0" name="quantity"
                                            style="" value="{{ $data[$item->id]['quantity'] }}">
                                        <button type="submit" class="btn btn-outline-info rounded-0 btn-sm"><i class="fa-regular fa-pen-to-square"></i></button>
                                    </div>
                                    @error('quantity')
                                        <small class="text-danger">{{ $message }}</small>
                                        <br>
                                    @enderror
                                </form>
                            </td>
                            <td class="text-danger">
                                {{ number_format($data[$item->id]['price'] * $data[$item->id]['quantity'], 2, '.', ',') }}
                                <small>$</small>
                            </td>
                            <td class="text-right" style="width: 5%">
                                <form action="{{ route('cart.delete', $data[$item->id]['product_id']) }}" method="post">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger border-0 rounded-0"><i class="fa fa-trash"
                                            aria-hidden="true"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endif
                @endforeach
                <tr>
                    <td colspan="5" class="text-uppercase h2 font-weight-bold pl-5">Total all</td>
                    <td class="text-danger" colspan="2">
                        {{ number_format($total, 2, '.', ',') }}
                        <small>$</small>
                    </td>
                </tr>
            </tbody>
        </table>
        {{-- {{ $cart->links() }} --}}
    </div>
@endsection
