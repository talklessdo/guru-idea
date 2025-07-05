<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      {{-- <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li> --}}
    </ul>

    <!-- Right navbar links -->
    
    <ul class="navbar-nav ml-auto">
  <li class="nav-item dropdown mr-5">
    <a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="false">
      <i class="fas fa-user-circle"></i>
    </a>
    <div class="dropdown-menu dropdown-menu-right">
      <span class="dropdown-item dropdown-header">
        {{ Auth::user()->name ?? 'User' }}
      </span>
      <div class="dropdown-divider"></div>

      <!-- Link ke edit profil -->
      <a href="/profile" class="dropdown-item">
        <i class="fas fa-user-edit mr-2"></i> Edit Profil
      </a>

      <div class="dropdown-divider"></div>

      <!-- Tombol logout -->
      <a href="#" class="dropdown-item"
         onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        <i class="fas fa-sign-out-alt mr-2"></i> Keluar
      </a>

      <form id="logout-form" action="/logout" method="get" style="display: none;">
        @csrf
      </form>
    </div>
  </li>
</ul>

  </nav>