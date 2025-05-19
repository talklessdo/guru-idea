@php
  $user = Auth::user();
  $role = $user->role ?? 'guru';
@endphp

<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand -->
  <a href="/" class="brand-link">
    <img src="{{ asset('img/icon-quantum.png') }}" alt="Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">GuruIDEA</span>
  </a>

  <div class="sidebar">
    <!-- User Panel -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="{{ asset('admin/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">{{ $user->name }}</a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" role="menu" data-accordion="false">
        
        {{-- Menu Umum --}}
        <li class="nav-item">
          <a href="javascript:void(0)" class="nav-link">
            <i class="nav-icon fas fa-chart-line"></i>
            <p>Dashboard</p>
          </a>
        </li>

        {{-- ADMIN --}}
        @if($role === 'admin')
          <li class="nav-item"><a href="#" class="nav-link"><i class="nav-icon fas fa-users"></i><p>Manajemen Guru</p></a></li>
          <li class="nav-item"><a href="#" class="nav-link"><i class="nav-icon fas fa-book"></i><p>Buku Kerja</p></a></li>
          <li class="nav-item"><a href="#" class="nav-link"><i class="nav-icon fas fa-check-square"></i><p>Penilaian</p></a></li>
          <li class="nav-item"><a href="#" class="nav-link"><i class="nav-icon fas fa-cogs"></i><p>Pengaturan</p></a></li>

        {{-- GURU --}}
        @elseif($role === 'guru')
          <li class="nav-item"><a href="#" class="nav-link"><i class="nav-icon fas fa-book-open"></i><p>Buku Kerja Saya</p></a></li>
          <li class="nav-item"><a href="#" class="nav-link"><i class="nav-icon fas fa-tasks"></i><p>Tugas Saya</p></a></li>
          <li class="nav-item"><a href="#" class="nav-link"><i class="nav-icon fas fa-file-alt"></i><p>Laporan</p></a></li>

        {{-- KURIKULUM --}}
        @elseif($role === 'kurikulum')
          <li class="nav-item"><a href="#" class="nav-link"><i class="nav-icon fas fa-inbox"></i><p>Dokumen Masuk</p></a></li>
          <li class="nav-item"><a href="#" class="nav-link"><i class="nav-icon fas fa-history"></i><p>Riwayat Persetujuan</p></a></li>
          <li class="nav-item"><a href="#" class="nav-link"><i class="nav-icon fas fa-chart-pie"></i><p>Laporan Progres</p></a></li>

        {{-- KEPALA SEKOLAH --}}
        @elseif($role === 'kepala_sekolah')
          <li class="nav-item"><a href="#" class="nav-link"><i class="nav-icon fas fa-file-signature"></i><p>Dokumen Final</p></a></li>
          <li class="nav-item"><a href="#" class="nav-link"><i class="nav-icon fas fa-book-reader"></i><p>Laporan Buku Kerja</p></a></li>
          <li class="nav-item"><a href="#" class="nav-link"><i class="nav-icon fas fa-user-cog"></i><p>Profil</p></a></li>
        @endif

      </ul>
    </nav>
  </div>
</aside>
