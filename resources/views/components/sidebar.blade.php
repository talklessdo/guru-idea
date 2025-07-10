@php
  $user = Auth::user();
  $role = $user->role ?? 'guru';
@endphp
<style>
  .name-wrap {
    word-wrap: break-word; /* untuk memotong kata panjang */
    word-break: break-word; /* alternatif tambahan */
    white-space: normal; /* pastikan teks bisa ke baris berikutnya */
  }
</style>

<aside class="main-sidebar sidebar-dark-warning elevation-4">
  <!-- Brand -->
  <a href="/" class="brand-link ">
    <img src="{{ asset('img/icon-quantum.png') }}" alt="Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">GuruIDEA</span>
  </a>

  <div class="sidebar">
    <!-- User Panel -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="{{ auth()->user()->photo !== null ? 'uploads/photos/'.auth()->user()->photo : 'img/person.png'}}" class="img-circle elevation-2" alt="User Image" style="width:48px; height:48px; object-fit:cover; border-radius:50%; aspect-ratio:1/1;">
      </div>
      <div class="info">
        <a href="/profile" class="d-block name-wrap">{{ $user->name }}</a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" role="menu" data-accordion="false" data-widget="treeview">
        
        {{-- Menu Umum --}}
        <li class="nav-item">
          <x-sidelink href="/dashboard" :active="request()->is('dashboard')">
            <i class="nav-icon fas fa-chart-line"></i>
            <p>Dashboard</p>
          </x-sidelink>
        </li>

        {{-- ADMIN --}}
        @if($role === 'admin')
          <li class="nav-item"><x-sidelink href="/manage_akun" :active="request()->is('manage_akun')"><i class="nav-icon fas fa-users"></i><p>Manajemen Akun</p></x-sidelink></li>
          <li class="nav-item"><x-sidelink href="/bk" :active="request()->is('bk')"><i class="nav-icon fas fa-book-open"></i><p>Buku Kerja</p></x-sidelink></li>          

        {{-- GURU --}}
        @elseif($role === 'guru')
          <li class="nav-item"><x-sidelink href="/bk" :active="request()->is('bk')"><i class="nav-icon fas fa-book-open"></i><p>Buku Kerja Saya</p></x-sidelink></li>
          <li class="nav-item {{ request()->is('bk-1') || request()->is('bk-2') || request()->is('bk-3') || request()->is('bk-4') ? 'menu-open' : '' }}">
            <a href="#" class="nav-link"><i class="nav-icon fas fa-file-alt"></i><p>Laporan<i class="right fas fa-angle-left"></i></p></a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <x-sidelink href="/bk-1" :active="request()->is('bk-1')">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Buku Kerja 1</p>
                </x-sidelink>
              </li>
              <li class="nav-item">
                <x-sidelink href="/bk-2" :active="request()->is('bk-2')">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Buku Kerja 2</p>
                </x-sidelink>
              </li>
              <li class="nav-item">
                <x-sidelink href="/bk-3" :active="request()->is('bk-3')">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Buku Kerja 3</p>
                </x-sidelink>
              </li>
              <li class="nav-item">
                <x-sidelink href="/bk-4" :active="request()->is('bk-4')">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Buku Kerja 4</p>
                </x-sidelink>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <x-sidelink href="/upload_dokumen" :active="request()->is('upload_dokumen')">
              <i class="nav-icon fas fa-upload"></i>
              <p>Upload Dokumen</p>
            </x-sidelink>
          </li>

        {{-- KURIKULUM --}}
        @elseif($role === 'kurikulum')
          <li class="nav-item"><x-sidelink href="/dokumen_masuk" :active="request()->is('dokumen_masuk')"><i class="nav-icon fas fa-inbox"></i><p>Dokumen Masuk</p></x-sidelink></li>
          <li class="nav-item"><x-sidelink href="/riwayat" :active="request()->is('riwayat')"><i class="nav-icon fas fa-history"></i><p>Riwayat Persetujuan</p></x-sidelink></li>
          <li class="nav-item"><x-sidelink href="/progres" :active="request()->is('progres')"><i class="nav-icon fas fa-chart-bar"></i><p>Progres Dokumen</p></x-sidelink></li>

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
