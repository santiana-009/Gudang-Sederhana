<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Latihan Laravel</title>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/login.css') }}" rel="stylesheet">
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <style>
       .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .b-example-divider {
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
      }

      .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
      }

      .bi {
        vertical-align: -.125em;
        fill: currentColor;
      }

      .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
      }

      .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
      }
    </style>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid justify-content-center">
      <a class="navbar-brand">Gudang</a>
    </div>
  </nav>
  <main class="form-signin w-100 m-auto">
        @if(session()->has('loginError'))
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
              {{ session('loginError')}}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        @endif
        <div class="card bg-light mt-5">
          <div class="card-body">
          <h1 class="h3 mb-3 fw-normal text-center">Login</h1>
          <form action="/login" method="POST">
              @csrf
              <div class="form-floating">
                  <input type="username" name="username" class="form-control @error('username') is-invalid @enderror" id="username" 
                  placeholder="username" autofocus required value="{{ old('username') }}">
                  <label for="username">username</label>
                  @error('username')
                      <div class="invalid-feedback">
                          {{ $message }}
                      </div>
                  @enderror
              </div>
              <div class="form-floating">
                  <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                  <label for="password">Password</label>
              </div>
              <button class="w-100 btn btn-md btn-dark" type="submit">Login</button>
          </form>
          </div>
        </div>
      </main>>
  </body>
</html>