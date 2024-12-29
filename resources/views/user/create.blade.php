@extends('main')
@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Add User</h1>
    </div>

    <div class="col-lg-4">
        <form method="POST" action="/user" class="mb-5">
            @csrf
            <div class="card bg-light mb-4">
                <div class="card-body ">
                    <div class="row mb-5">
                        <div class="col">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" required autofocus value="{{ old('name') }}">
                            <input type="hidden" value="0" name="qty_item">
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" required autofocus value="{{ old('username') }}">
                            @error('username')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required autofocus value="{{ old('password') }}">
                            @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col">
                            <label for="password2" class="form-label">Re Password</label>
                            <input type="password" class="form-control @error('password2') is-invalid @enderror" id="password2" name="password2" required autofocus value="{{ old('password2') }}">
                            @error('password2')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="justify-content-center mt-2">
                        <button class="btn btn-dark" style="width: 30%" type="submit">Add User</button>
                    </div>
                </div>
            </div>
        </form>
        <script src="{{ asset('js/user/create.js') }}"></script>
    </div>
@endsection