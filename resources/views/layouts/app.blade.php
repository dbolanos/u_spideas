<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Spideas') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/sb-admin-2.css')}}" rel="stylesheet">
    <link href="{{ asset('css/sb-admin-2.min.css')}}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <div id="wrapper">

            <!-- Sidebar-->
            <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

              <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('home')}}">
                <div class="sidebar-brand-icon rotate-n-15">
                  <i class="fab fa-battle-net"></i>
                </div>
                <div class="sidebar-brand-text mx-3"> {{ config('app.name', 'U-SPIDEAS') }}</div>
              </a>

              <hr class="sidebar-divider my-0">

              <li class="nav-item active">
                <a class="nav-link" href="{{ route('home')}}">
                  <i class="fas fa-fw fa-tachometer-alt"></i>
                  <span>Inicio</span></a>
              </li>

              <hr class="sidebar-divider">

              <div class="sidebar-heading">
                Menu Principal
              </div>
              @role(['admin'])
              <li class="nav-item">
                <a class="nav-link" href="{{route('all.requests')}}"  aria-expanded="true" aria-controls="collapseTwo">
                  <i class="fas fa-fw fa-boxes"></i>
                  <span>Tramites</span>
                </a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="{{route('all.infrastructures')}}"  aria-expanded="true" aria-controls="collapseUtilities">
                  <i class="fas fa-fw fa-building"></i>
                  <span>Infraestructuras</span>
                </a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="{{route('all.events')}}">
                  <i class="fas fa-fw fa-calendar-alt"></i>
                  <span>Eventos</span></a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="{{route('report')}}">
                  <i class="fas fa-fw fa-chart-bar"></i>
                  <span>Reportes</span></a>
              </li>
              @endrole
              @role(['student'])
              <li class="nav-item">
                <a class="nav-link" href="{{route('my.student.requests')}}">
                  <i class="fas fa-fw fa-archive"></i>
                  <span>Mis Solicitudes</span></a>
              </li>
              @endrole

            </ul>
            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">

              <!-- Main Content -->
              <div id="content">

                <!-- Topbar -->
              @include('partials.topbar')
                <!-- End of Topbar -->

        <main class="py-4">
            <div class="container-fluid">
              @yield('content')
            </div>

        </main>

      </div>
      <footer class="sticky-footer bg-gray-700">
        <div class="container my-auto">
          <div class="copyright text-center my-auto text-gray-100">
            <span><b>Copyright &copy; CAF Projects 2019</b></span>
          </div>
        </div>
      </footer>
      <!-- End of Content Wrapper -->
    </div>
    </div>
  <!-- End of Page Wrapper -->
    <script src="{{ asset('js/sb-admin-2.js')}}"></script>
    <script src="{{ asset('js/sb-admin-2.min.js')}}"></script>
</body>
</html>
