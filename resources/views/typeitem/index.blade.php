@extends('main')
@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-typeitem-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">List Type Items</h1>
    </div>

    @if (session()->has('success'))
    <div class="alert alert-success col-lg-8" role="alert">
        {{ session('success') }}
    </div>
    @endif
    <div class="col-lg-8">
        <div class="row justify-content-center mb-3">
            <div class="col-md-6">
                <form action="/typeitem">
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
                        <th scope="col">Type Name</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($typeitems as $typeitem)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $typeitem->name}}</td>
                            <td>
                                <form action="/typeitem/{{ $typeitem->id }}" method="POST" class="d-inline">
                                @method('delete')
                                @csrf
                                <button class="badge bg-danger border-0" onclick="return confirm('Are you sure?')">X</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $typeitems->links() }}

            <div class="col-md-5">
                <form method="POST" action="/typeitem" class="mb-5">
                    @csrf
                    <div class="card bg-light mb-3">
                        <div class="card-body">
                                    <label for="name" class="form-label">New Type</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" required autofocus value="{{ old('name') }}">
                                    @error('name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
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