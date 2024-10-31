  @php
    function to_object($array)
    {
        $object = new stdClass();
        foreach ($array as $key => $value) {
            $object->$key = is_array($value) ? to_object($value) : $value;
        }
        return $object;
    }

    $menus = to_object([
        [
            'name' => 'Dashboard',
            'route' => 'dashboard',
            'icon' => 'icon ti ti-home',
        ],
        [
            'name' => 'Jadwal',
            'route' => null,
            'icon' => 'icon ti ti-calendar',
            'children' => [
                [
                    'name' => 'Jadwal Mahasiswa',
                    'route' => null,
                ],
            ],
        ],
        [
            'name' => 'Perkuliahan',
            'route' => null,
            'icon' => 'icon ti ti-list',
            'children' => [
                [
                    'name' => 'Perkuliahan Mahasiswa',
                    'route' => null,
                ],
            ],
        ],
        [
            'name' => 'Ujian',
            'route' => null,
            'icon' => 'icon ti ti-square-check',
            'children' => [
                [
                    'name' => 'Ujian Mahasiswa',
                    'route' => null,
                ],
            ],
        ],
        [
            'name' => 'Presensi',
            'route' => null,
            'icon' => 'icon ti ti-user-check',
            'children' => [
                [
                    'name' => 'Presensi Mahasiswa',
                    'route' => null,
                ],
            ],
        ],
        [
            'name' => 'IRS Mahasiswa',
            'route' => 'students.index',
            'icon' => 'icon ti ti-browser-check',
        ],
    ]);
  @endphp

  <aside class="navbar navbar-vertical navbar-expand-lg" data-bs-theme="dark">
    <div class="container-fluid">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#sidebar-menu"
        aria-controls="sidebar-menu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <h1 class="navbar-brand navbar-brand-autodark">
        <a href="{{ route('dashboard') }}" class="text-decoration-none">
          <x-logo />
        </a>
      </h1>
      <div class="navbar-collapse collapse" id="sidebar-menu">
        <ul class="navbar-nav pt-lg-3">
          @foreach ($menus as $menu)
            @if (isset($menu->children))
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#navbar-base" data-bs-toggle="dropdown"
                  data-bs-auto-close="false" role="button" aria-expanded="false">
                  <span class="nav-link-icon d-md-none d-lg-inline-block">
                    <i class="{{ $menu->icon }}"></i>
                  </span>
                  <span class="nav-link-title">
                    {{ $menu->name }}
                  </span>
                </a>
                <div class="dropdown-menu">
                  <div class="dropdown-menu-columns">
                    <div class="dropdown-menu-column">
                      @foreach ($menu->children as $child)
                        <a class="dropdown-item" href="{{ $child->route ? route($child->route) : '#' }}">
                          {{ $child->name }}
                        </a>
                      @endforeach
                    </div>
                  </div>
                </div>
              </li>
            @else
              <li class="nav-item">
                <a class="nav-link" href="{{ $menu->route ? route($menu->route) : '#' }}">
                  <span class="nav-link-icon d-md-none d-lg-inline-block">
                    <i class="{{ $menu->icon }}"></i>
                  </span>
                  <span class="nav-link-title">
                    {{ $menu->name }}
                  </span>
                </a>
              </li>
            @endif
          @endforeach
        </ul>
      </div>
    </div>
  </aside>
