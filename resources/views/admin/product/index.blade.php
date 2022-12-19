@extends('admin.layout')
@section('in')
    <div class="container-fluid py-3 px-5">
        <div class="d-flex align-items-center justify-content-between pb-3">
            <p class="h1 text-secondary font-weight-bold text-uppercase">list products</p>
            <div class="">
                <a href="{{ route('product.create') }}" class="btn btn-lg btn-outline-success rounded-0">Add a new
                    product</a>
                <a href="{{ route('product.deleted') }}" class="btn btn-lg btn-outline-warning rounded-0">
                    Deleted list
                </a>
            </div>
        </div>
        <table class="table table-hover table-borderless">
            <thead>
                <tr>
                    <th scope="col" style="width: 5%">Serial</th>
                    <th scope="col" class="text-center">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Sale price</th>
                    <th scope="col">Image</th>
                    <th scope="col">Status</th>
                    <th scope="col">Description</th>
                    <th scope="col">Catergory</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $item)
                    <tr>
                        <th scope="row" class="pl-4" style="width: 5%">{{ $loop->iteration }}</th>
                        <td class="text-center">{{ $item->id }}</td>
                        <td>{{ $item->name }}</td>
                        <td>
                            {!! $item->sale_price == 0 ? "<span class='text-danger'>" : "<del class='text-muted'>" !!}{{ number_format($item->price) }}<small
                                {{ $item->sale_price == 0 ? '' : 'hidden' }}>$</small>{!! $item->sale_price == 0 ? '</span>' : '</del>' !!}
                        </td>
                        <td>
                            <span
                                class="{{ $item->sale_price == 0 ? 'text-muted' : 'text-danger' }}">{{ number_format($item->sale_price) }}<small
                                    {{ $item->sale_price > 0 ? '' : 'hidden' }}>$</small></span>
                        </td>
                        <td><img src="{{ url('uploads') }}/{{ $item->image }}" alt="" height="75px"
                                width="auto"></td>
                        <td>
                            <span class="badge badge-{{ $item->status == 0 ? 'success' : 'danger' }} rounded-0">
                                {{ $item->status == 0 ? 'In stock' : 'Out of stock' }}
                            </span>
                        </td>
                        <td>
                            <span class="text-truncated">{{ $item->description }}</span>
                        </td>
                        <td>
                            {{ $item->category->name }}
                        </td>
                        <td class="text-right w-25">
                            <form action="{{ route('product.destroy', $item->id) }}" method="POST">
                                @method('DELETE') @csrf
                                <a href="{{ route('product.edit', $item->id) }}" class="btn btn-outline-info rounded-0">Update</a>
                                <button type="submit" class="btn btn-outline-danger rounded-0">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $products->links() }}
    </div>
@endsection
