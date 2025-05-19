<x-layout>
  <style>
    .app-wrapper {
      font-family: 'Poppins', sans-serif;
      background: #f4f7ff;
      min-height: 100vh;
      padding: 30px 20px;
    }
    .dashboard-header h1 {
      font-weight: 600;
      font-size: 2.2rem;
      color: #3f51b5;
    }
    .dashboard-header p {
      color: #666;
      margin-bottom: 30px;
    }
    .dashboard-cards {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
      gap: 20px;
    }
    .card {
      background: #fff;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.08);
      display: flex;
      align-items: center;
      transition: all 0.3s ease;
    }
    .card:hover {
      box-shadow: 0 8px 16px rgba(0, 0, 0, 0.15);
    }
    .card-icon {
      width: 50px;
      height: 50px;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 20px;
      color: #fff;
      margin-right: 15px;
    }
    .card-content {
      flex-grow: 1;
    }
    .card-title {
      margin: 0;
      font-size: 0.9rem;
      color: #555;
    }
    .card-value {
      font-size: 1.6rem;
      font-weight: bold;
      color: #333;
    }
    table.table th,
    table.table td {
      vertical-align: middle;
    }
  </style>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />

  <div class="app-wrapper">
    <section class="content">
      <div class="container-fluid">
        <div class="dashboard-header text-center">
          <h1>Dashboard Admin</h1>
          <p>Kontrol panel untuk administrasi buku kerja guru</p>
        </div>

        {{-- Cards --}}
        <div class="dashboard-cards">
          <div class="card">
            <div class="card-icon" style="background: #4caf50;"><i class="fas fa-users"></i></div>
            <div class="card-content">
              <p class="card-title">Total Guru</p>
              <p class="card-value">125</p>
            </div>
          </div>

          <div class="card">
            <div class="card-icon" style="background: #2196f3;"><i class="fas fa-book"></i></div>
            <div class="card-content">
              <p class="card-title">Buku Kerja</p>
              <p class="card-value">340</p>
            </div>
          </div>

          <div class="card">
            <div class="card-icon" style="background: #ff9800;"><i class="fas fa-tasks"></i></div>
            <div class="card-content">
              <p class="card-title">Tugas Selesai</p>
              <p class="card-value">288</p>
            </div>
          </div>

          <div class="card">
            <div class="card-icon" style="background: #f44336;"><i class="fas fa-hourglass-half"></i></div>
            <div class="card-content">
              <p class="card-title">Menunggu Persetujuan</p>
              <p class="card-value">12</p>
            </div>
          </div>
        </div>

        {{-- Tabel Dokumen Terbaru --}}
        <div class="mt-5">
          <h4>Dokumen Terkini</h4>
          <div class="table-responsive">
            <table class="table table-bordered table-hover">
              <thead class="thead-light">
                <tr>
                  <th>#</th>
                  <th>Nama Guru</th>
                  <th>Judul Buku</th>
                  <th>Status</th>
                  <th>Terakhir Diperbarui</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                  <td>Andi Saputra</td>
                  <td>RPP Semester Ganjil</td>
                  <td><span class="badge badge-warning">Menunggu</span></td>
                  <td>2025-05-18</td>
                </tr>
                <tr>
                  <td>2</td>
                  <td>Siti Rahma</td>
                  <td>Silabus PJOK</td>
                  <td><span class="badge badge-success">Disetujui</span></td>
                  <td>2025-05-17</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>

      </div>
    </section>
  </div>
</x-layout>