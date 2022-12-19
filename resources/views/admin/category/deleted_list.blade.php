@extends('admin.layout')
@section('in')
    <div class="container-fluid px-5 py-3">
        <div class="pt-3"><a href="{{ route('category.index') }}">&laquo; List Categories</a></div>
        <p class="h1 font-weight-bold text-warning text-uppercase text-center pb-3">Deleted list categories</p>
        <table class="table ">
            <thead>
                <tr>
                    <th scope="col" style="width: 5%">Serial</th>
                    <th scope="col" class="text-center">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Status</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $item)
                    <tr>
                        <th scope="row" class="pl-4" style="width: 5%">{{ $loop->iteration }}</th>
                        <td class="text-center">{{ $item->id }}</td>
                        <td>{{ $item->name }}</td>
                        <td><span
                                class="badge badge-{{ $item->status ? 'danger' : 'success' }} rounded-0">{{ $item->status ? 'Hidden' : 'Display' }}</span>
                        </td>
                        <td class="w-25 text-right">
                            <form action="{{ route('category.delete', $item->id) }}" method="POST">
                                @csrf @method('DELETE')
                                <a href="{{ route('category.restore', $item->id) }}"
                                    class="btn btn-outline-info rounded-0">Restore</a>
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
