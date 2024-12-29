<style>
  .img {
    width: 20px;
  }
</style>
<nav id="sidebarMenu" class="col-md-2 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3 sidebar-sticky">
      <h6 class="sidbar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
        <span>Incoming</span>
      </h6>
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link {{ Request::is('incoming/create') ? 'active' : '' }}" href="/incoming/create">
            <img src="{{ asset('png/form.png') }}" alt="Icon" class="align-text-bottom img">
              Form Incoming
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('incoming') ? 'active' : '' }}" href="/incoming">
            <img src="{{ asset('png/list2.png') }}" alt="Icon" class="align-text-bottom img">
              List Incoming
          </a>
        </li>
      </ul>
      <h6 class="sidbar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
        <span>Outgoing</span>
      </h6>
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link {{ Request::is('outgoing/create') ? 'active' : '' }}" href="/outgoing/create">
            <img src="{{ asset('png/form.png') }}" alt="Icon" class="align-text-bottom img">
              Form Outgoing
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('outgoing') ? 'active' : '' }}" href="/outgoing">
            <img src="{{ asset('png/list2.png') }}" alt="Icon" class="align-text-bottom img">
              List Outgoing
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('outgoing_end') ? 'active' : '' }}" href="/outgoing_end">
            <img src="{{ asset('png/list2.png') }}" alt="Icon" class="align-text-bottom img">
              List Outgoing ~END
          </a>
        </li>
      </ul>
      <h6 class="sidbar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
        <span>Goods</span>
      </h6>
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link {{ Request::is('items/create') ? 'active' : '' }}" href="/items/create">
            <img src="{{ asset('png/box.png') }}" alt="Icon" class="align-text-bottom img">
              Add Items
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('items') ? 'active' : '' }}" href="/items">
            <img src="{{ asset('png/list.png') }}" alt="Icon" class="align-text-bottom img">
              List Items
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('typeitem') ? 'active' : '' }}" href="/typeitem">
            <img src="{{ asset('png/list.png') }}" alt="Icon" class="align-text-bottom img">
              List Type Items
          </a>
        </li>
      </ul>
      <h6 class="sidbar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
        <span>Admin</span>
      </h6>
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link {{ Request::is('user') ? 'active' : '' }}" href="/user">
            <img src="{{ asset('png/user.png') }}" alt="Icon" class="align-text-bottom img">
              User
          </a>
        </li>
    </div>
</nav>
{{-- {{ Request::is('dashboard/posts*') ? 'active' : '' }} --}}