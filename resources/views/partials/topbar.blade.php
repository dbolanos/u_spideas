
<nav class="navbar navbar-expand navbar-light bg-gradient-primary topbar mb-4 static-top shadow">

  <!-- Sidebar Toggle (Topbar) -->
  <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
    <i class="fa fa-bars"></i>
  </button>


  <!-- Topbar Navbar -->
  <ul class="navbar-nav ml-auto">
    @guest
      <li class="nav-item">
          <a class="nav-link text-gray-100" href="/">Inicio</a>
      </li>
        <li class="nav-item">
            <a class="nav-link text-gray-100" href="{{ route('login') }}">Iniciar Sesión</a>
        </li>
        @if (Route::has('register'))
            <li class="nav-item">
                <a class="nav-link text-gray-100" href="{{ route('register') }}">Registrarse</a>
            </li>
        @endif
    @else
    <!-- Nav Item - User Information -->
    <li class="nav-item dropdown no-arrow">
      <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <span>  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-100"></i></span>
        <span class="mr-2 d-none d-lg-inline text-gray-600 small">  {{ Auth::user()->name }}</span>

      </a>
      <!-- Dropdown - User Information -->
      <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">

        <a class="dropdown-item" href="{{ route('logout') }}" data-toggle="modal" data-target="#logoutModal"
        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
          <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
          Logout
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>

      </div>
    </li>
    @endguest

  </ul>

</nav>
