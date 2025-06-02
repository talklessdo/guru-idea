<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>GuruIDEA | Login</title>
  <link rel="shortcut icon" href="{{ asset('img/icon-quantum.png') }}" type="image/x-icon">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ 'admin' }}/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{ 'admin' }}/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ 'css' }}/styles.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.22.0/dist/sweetalert2.min.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.22.0/dist/sweetalert2.all.min.js"></script>
</head>

<style>
  /* Pastikan card login tetap berada di atas halaman */
  .login-box {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 100%;
    max-width: 400px; /* Sesuaikan ukuran card */
  }

  /* Set z-index tinggi untuk SweetAlert */
  .swal2-popup {
    z-index: 9999999 !important;  /* Pastikan SweetAlert berada di atas form login */
  }

  /* Jika SweetAlert modal menutupi halaman, setel posisi body */
  body {
    overflow: hidden; /* Mencegah body bergulir saat SweetAlert muncul */
}




</style>
<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <div class="pt-3 pb-3" onclick="testing()"><img src="{{ asset('img/icon-quantum.png') }}" alt="" width="85"></div>
      <h3><b>MA Quantum IDEA</b></h3>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Aplikas Buku Kerja Guru</p>

      <form id="login-form" action="/login" method="post">
        @csrf
        <div class="input-group mb-3">
          <input type="email" name="email" class="form-control @error('email') is-invalid 
          @enderror" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
          @error('email')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control @error('password') is-invalid
          @enderror" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
          @error('password')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
        </div>
      </form>

      <div class="social-auth-links text-center mt-2 mb-3">
        <button type="submit" class="btn btn-block btn-primary" onclick="document.getElementById('login-form').submit();">
          <i class="fas fa-sign-in-alt mr-2"></i> Masuk
        </button>
      </div>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="{{ 'admin' }}/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="{{ 'admin' }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="{{ 'admin' }}/dist/js/adminlte.min.js"></script>
 @if (session('error'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Gagal Login',
                text: '{{ session('error') }}',
                willClose: () => {
                // Optional: Set focus back to email input after alert is closed
                document.querySelector('input[name="email"]').focus();
            }
            });
        </script>
  @endif
</body>
</html>
