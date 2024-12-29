<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6" href="/">Warehouse</a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="form-control bg-dark w-100 rounded-0 border-0" ><h6 style="color: aliceblue">{{ auth()->user()->name }}</h6></div>
  <div class="navbar-nav">
    <form action="/logout" method="POST">
        @csrf
        <button type="submit" class="nav-link px-3 bg-dark border-0">Logout</button>
    </form>
  </div>
</header>