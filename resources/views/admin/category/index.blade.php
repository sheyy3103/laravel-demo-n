@extends('admin.layout')
@section('in')
    <div class="container-fluid px-5 py-3">
        <div class="d-flex align-items-center justify-content-between pb-3">
            <p class="h1 font-weight-bold text-secondary text-uppercase">List categories</p>
            <div class="">
                <a href="{{ route('category.create') }}" class="btn btn-outline-success rounded-0 btn-lg">Add a new
                    category</a>
                <a href="{{ route('category.deleted') }}" class="btn btn-outline-warning rounded-0 btn-lg">Deleted list</a>
            </div>
        </div>
        <table class="table table-borderless table-hover">
            <thead>
                <tr>
                    <th scope="col" style="width: 5%">Serial</th>
                    <th scope="col" class="text-center">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Status</th>
                    <th scope="col" class="text-center">Total products</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $item)
                    <tr>
                        <th scope="row" class="pl-4" style="width: 5%">{{ $loop->iteration }}</th>
                        <td class="text-center">{{ $item->id }}</td>
                        <td>{{ $item->name }}</td>
                        <td>
                            <span class="badge badge-{{ $item->status ? 'danger' : 'success' }} rounded-0">
                                {{ $item->status ? 'Hidden' : 'Display' }}</span>
                        </td>
                        <td scope="col" class="text-center">{{ $item->products->count() }}</td>
                        <td class="w-25 text-right">
                            <form action="{{ route('category.destroy', $item->id) }}" method="POST">
                                @csrf @method('DELETE')
                                <a href="{{ route('category.edit', $item->id) }}"
                                    class="btn btn-outline-info rounded-0">Edit</a>
                                <button type="submit" class="btn btn-outline-danger rounded-0">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $categories->links() }}
    </div>
@endsection
