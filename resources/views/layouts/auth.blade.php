<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <!-- Fonts -->
  <link rel="dns-prefetch" href="//fonts.bunny.net">
  <link href="https://fonts.bunny.net/css?family=Inter" rel="stylesheet">

  <!-- Tabller CSS -->
  <link rel="stylesheet" href={{ asset('dist/css/tabler.min.css') }}>
  <link rel="stylesheet" href={{ asset('dist/css/tabler-icons.min.css') }}>
  <link rel="stylesheet" href={{ asset('dist/css/tabler-vendors.min.css') }}>

  <!-- Custom CSS and JS -->
  @vite(['resources/sass/app.scss', 'resources/js/app.js'])

  <!-- Additional CSS -->
  @stack('styles')
</head>

<body class="d-flex flex-column">
  <div class="page page-center" id="backdrop-auth">
    <div class="container py-4 container-tight">
      <div class="card card-md">
        <div class="card-body">
          @yield('content')
        </div>
      </div>
    </div>
  </div>

  <!-- Tabller JS -->
  <script src="{{ asset('dist/js/tabler.min.js') }}" defer></script>

  <!-- Additional JS -->
  @stack('scripts')
</body>

</html>
