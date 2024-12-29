@extends('main')
@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-barcod-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">List barcod: {{$item->no_item}}</h1>
    </div>

    @if (session()->has('success'))
    <div class="alert alert-success col-lg-8" role="alert">
        {{ session('success') }}
    </div>
    @endif
    <div class="col-lg-8">
        <div class="row justify-content-center mb-3">
            <div class="col-md-6">
                <form action="/barcods/{{$item->no_item}}">
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
                        <th scope="col">Po Item</th>
                        <th scope="col">no Bracode</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($barcods as $barcod)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $barcod->po_item}}</td>
                            <td>{{ $barcod->no_brcd}}</td>
                            <td>
                                <form action="/barcods/{{ $barcod->id }}" method="POST" class="d-inline">
                                @method('delete')
                                @csrf
                                <button class="badge bg-danger border-0" onclick="return confirm('Are you sure?')">X</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $barcods->links() }}

            <div class="col-5">
                <form method="POST" action="/barcods" class="mb-5">
                    @csrf
                    <div class="card bg-light mb-3">
                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col">
                                    <label for="po_item" class="form-label">Po Item</label>
                                    <input type="text" class="form-control @error('po_item') is-invalid @enderror" id="po_item" name="po_item" required value="{{ old('po_item') }}">
                                    <input type="hidden" value="{{$item->no_item}}" name="no_item">
                                    @error('po_item')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col">
                                    <label for="no_brcd" class="form-label">No Barcode</label>
                                    <input type="text" class="form-control @error('no_brcd') is-invalid @enderror" id="no_brcd" name="no_brcd" required value="{{ old('no_brcd') }}">
                                    @error('no_brcd')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="justify-content-center mt-2">
                                <button class="btn btn-dark" style="width: 30%" type="submit">Add</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection