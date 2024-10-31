<header class="navbar navbar-expand-md d-none d-lg-flex d-print-none">
  <div class="container-xl">

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu"
      aria-controls="navbar-menu" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="flex-row navbar-nav order-md-last">
      <div class="nav-item dropdown">

        <a href="#" class="p-0 nav-link d-flex lh-1 text-reset" data-bs-toggle="dropdown"
          aria-label="Open user menu">

          <img
            src="{{ 'https://ui-avatars.com/api/?name=' . Auth::user()->name . '&background=0054a6&color=fff&size=128' }}"
            alt="avatar" class="avatar avatar-sm">

          <div class="d-none d-xl-block ps-2">
            <div>{{ Auth::user()->name }}</div>
            <div class="mt-1 small text-secondary">{{ Auth::user()->email }}</div>
          </div>
        </a>

        <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
          <a href="#" class="dropdown-item">Status</a>
          <a href="#" class="dropdown-item">Profile</a>
          <a href="#" class="dropdown-item">Feedback</a>

          <div class="dropdown-divider"></div>

          <a href="#" class="dropdown-item">Settings</a>
          <a id="logout" href="{{ route('logout') }}" class="dropdown-item">Logout</a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
          </form>

          <script>
            const logout = document.getElementById('logout');
            logout.addEventListener('click', () => {
              event.preventDefault();
              document.getElementById('logout-form').submit();
            });
          </script>
        </div>
      </div>
    </div>

    <div class="navbar-collapse collapse" id="navbar-menu">
      <div>
        <form action="./" method="get" autocomplete="off" novalidate>
          <div class="input-icon">
            <span class="input-icon-addon">
              <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0" />
                <path d="M21 21l-6 -6" />
              </svg>
            </span>
            <input type="text" value="" class="form-control" placeholder="Search…"
              aria-label="Search in website">
          </div>
        </form>
      </div>
    </div>
  </div>
</header>
