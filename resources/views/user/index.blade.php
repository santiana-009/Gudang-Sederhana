@extends('main')
@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">List User</h1>
    </div>

    @if (session()->has('success'))
    <div class="alert alert-success col-lg-8" role="alert">
        {{ session('success') }}
    </div>
    @endif
    <div class="col-lg-8">
        <a href="/user/create" class="btn btn-primary mb-3">Create new User</a>
        <div class="row justify-content-center mb-3">
            <div class="col-md-6">
                <form action="/user">
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
                        <th scope="col">Name</th>
                        <th scope="col">Userame</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $user->name}}</td>
                            <td>{{ $user->username}}</td>
                            <td>
                                <a href="/user/{{$user->id}}/edit" class="badge bg-warning"><img src="{{ asset('png/edit.png') }}" alt="Icon" class="imgic"></a>
                                <form action="/user/{{ $user->id }}" method="POST" class="d-inline">
                                    @method('delete')
                                    @csrf
                                    <button class="badge bg-danger border-0" onclick="return confirm('Are you sure?')">X</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $users->links() }}
        </div>
    </div>
@endsection