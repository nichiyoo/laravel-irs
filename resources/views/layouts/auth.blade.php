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

<body class="bg-white d-flex flex-column">
  <div class="row g-0 flex-fill">
    <div class="col-12 col-lg-6 col-xl-4 border-top-wide border-primary d-flex flex-column justify-content-center">
      <div class="container my-5 container-tight px-lg-5">
        @yield('content')
      </div>
    </div>
    <div class="col-12 col-lg-6 col-xl-8 d-none d-lg-block">
      <div class="bg-cover h-100 min-vh-100" style="background-image: url({{ asset('images/college.jpg') }})"></div>
    </div>
  </div>

  <!-- Tabller JS -->
  <script src="{{ asset('dist/js/tabler.min.js') }}" defer></script>

  <!-- Additional JS -->
  @stack('scripts')
</body>

</html>
