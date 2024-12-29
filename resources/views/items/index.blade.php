@extends('main')
@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">List Items</h1>
    </div>

    @if (session()->has('success'))
    <div class="alert alert-success col-lg-8" role="alert">
        {{ session('success') }}
    </div>
    @endif
    <div class="col-lg-8">
        <div class="row justify-content-center mb-3">
            <div class="col-md-6">
                <form action="/items">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Search.." name="search" 
                        value="{{ request('search') }}">
                        <button class="btn btn-dark" type="submit">search</button>
                    </div>
                </form>
            </div>
        </div>
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th scope="col">NO</th>
                        <th scope="col">Name Item</th>
                        <th scope="col">Type Item</th>
                        <th scope="col">No Item</th>
                        <th scope="col">Qty</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($items as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->name_item}}</td>
                            <td>{{ $item->typeitem->name}}</td>
                            <td>{{ $item->no_item}}</td>
                            <td>{{ $item->qty_item}}</td>
                            <td>
                                <a href="/items/{{$item->id}}/edit" class="badge bg-warning"><img src="{{ asset('png/edit.png') }}" alt="Icon" class="imgic"></a>
                                @if ($item->brcd_item)
                                    <a href="/barcods/{{$item->no_item}}" class="badge bg-primary"><img src="{{ asset('png/barcode.png') }}" alt="Icon" class="imgic"></a>
                                @endif
                                <form action="/items/{{ $item->id }}" method="POST" class="d-inline">
                                @method('delete')
                                @csrf
                                <button class="badge bg-danger border-0" onclick="return confirm('Are you sure?')">X</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $items->links() }}
        </div>
    </div>
@endsection