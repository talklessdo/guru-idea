@php
        $nomor = 1;
        // Set locale untuk bahasa Indonesia
        setlocale(LC_TIME, 'id_ID.utf8', 'id_ID');

    @endphp
@if (auth()->user()->role == 'admin')
    
    {{-- Admin --}}
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
          cursor: pointer;
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
        /* margin-right: 15px; */
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
    <link rel="stylesheet" href="//cdn.datatables.net/2.3.2/css/dataTables.dataTables.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />

    <div class="app-wrapper">
        <section class="content">
        <div class="container-fluid">
            <div class="dashboard-header text-center">
            <h1>Dashboard Admin</h1>
            <p>Kontrol panel untuk administrasi buku kerja guru</p>
            </div>

            {{-- Cards --}}
            <div class="dashboard-cards text-center">
            <div class="card" onclick="totalGuru()">
                <div class="card-icon" style="background: #6c757d;"><i class="fas fa-users"></i></div>
                <div class="card-content">
                <p class="card-title">Total Akun</p>
                <p class="card-value">{{ $jmlGuru }}</p>
                </div>
            </div>

            <div class="card">
                <div class="card-icon" style="background: #2196f3;"><i class="fas fa-book"></i></div>
                <div class="card-content">
                <p class="card-title">Buku Kerja</p>
                <p class="card-value">{{ $jmlBk }}</p>
                </div>
            </div>

            <div class="card">
                <div class="card-icon" style="background: #4caf50;"><i class="fas fa-tasks"></i></div>
                <div class="card-content">
                <p class="card-title">Tugas Selesai</p>
                <p class="card-value">{{ $jml_tugas_selesai }}</p>
                </div>
            </div>

            <div class="card">
                <div class="card-icon" style="background: #ff9800;"><i class="fas fa-hourglass-half"></i></div>
                <div class="card-content">
                <p class="card-title">Menunggu Persetujuan</p>
                <p class="card-value">{{ $jml_waiting }}</p>
                </div>
            </div>
            </div>

            {{-- Tabel Dokumen Terbaru --}}
            <div class="mt-5">
            <h4>Dokumen Terkini</h4>
            <div class="table-responsive">
                <table id="myTable" class="table table-bordered table-hover">
                  <thead class="thead-light">
                      <tr>
                      <th>#</th>
                      <th>Nama Guru</th>
                      <th>Mata Pelajaran</th>
                      <th>Kategori</th>
                      <th>Kelas</th>
                      <th>Status</th>
                      <th>Tanggal</th>
                      <th>Tindakan</th>
                      </tr>
                  </thead>
                  <tbody>
                    @foreach ($dataBk as $data)
                        
                    <tr>
                      <td>{{ $nomor++ }}</td>
                      <td>{{ $data->nama_guru }}</td>
                      <td>{{ $data->mata_pelajaran }}</td>
                      <td>{{ $data->kategori }}</td>
                      <td>{{ $data->kelas }}</td>
                      <td><span class="badge badge-warning">{{ $data->status }}</span></td>
                      <td>{{ $data->created_at }}</td>
                      <td>2025-05-18</td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
            </div>
            </div>

        </div>
        </section>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/2.3.2/js/dataTables.min.js"></script>
    <script>
      let table = new DataTable('#myTable');
      function totalGuru(){
        window.location.href = '/manage_akun';
      }
      
    </script>
    </x-layout>
    {{-- End Admin --}}
@elseif (auth()->user()->role == 'kurikulum')
    {{-- Kurikulum --}}
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
        font-size: 2rem;
        color: #3f51b5;
        }
        .dashboard-header p {
        color: #666;
        margin-bottom: 30px;
        }
        table.table th,
        table.table td {
        vertical-align: middle;
        }
        .btn-approve {
        background-color: #4caf50;
        color: white;
        }
        .btn-reject {
        background-color: #f44336;
        color: white;
        }
    </style>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />

    <div class="app-wrapper">
        <section class="content">
        <div class="container-fluid">
            <div class="dashboard-header text-center">
            <h1>Dashboard Kurikulum</h1>
            <p>Kelola dan tinjau dokumen buku kerja guru</p>
            </div>

            {{-- Daftar Dokumen Masuk --}}
            <div class="mb-5">
            <h4>📥 Dokumen Menunggu Persetujuan</h4>
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                <thead class="thead-light">
                    <tr>
                    <th>#</th>
                    <th>Nama Guru</th>
                    <th>Judul Dokumen</th>
                    <th>Tanggal Upload</th>
                    <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <td>1</td>
                    <td>Ahmad Fauzi</td>
                    <td>Program Semester</td>
                    <td>2025-05-17</td>
                    <td>
                        <button class="btn btn-sm btn-approve"><i class="fas fa-check"></i> Setujui</button>
                        <button class="btn btn-sm btn-reject"><i class="fas fa-times"></i> Tolak</button>
                    </td>
                    </tr>
                    <tr>
                    <td>2</td>
                    <td>Lina Marlina</td>
                    <td>Silabus IPS</td>
                    <td>2025-05-16</td>
                    <td>
                        <button class="btn btn-sm btn-approve"><i class="fas fa-check"></i> Setujui</button>
                        <button class="btn btn-sm btn-reject"><i class="fas fa-times"></i> Tolak</button>
                    </td>
                    </tr>
                </tbody>
                </table>
            </div>
            </div>

            {{-- Riwayat Persetujuan --}}
            <div class="mb-5">
            <h4>📜 Riwayat Persetujuan</h4>
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                <thead>
                    <tr>
                    <th>#</th>
                    <th>Nama Guru</th>
                    <th>Dokumen</th>
                    <th>Status</th>
                    <th>Tanggal</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <td>1</td>
                    <td>Sri Wulandari</td>
                    <td>RPP Bahasa Indonesia</td>
                    <td><span class="badge badge-success">Disetujui</span></td>
                    <td>2025-05-15</td>
                    </tr>
                    <tr>
                    <td>2</td>
                    <td>Budi Hermawan</td>
                    <td>Silabus Matematika</td>
                    <td><span class="badge badge-danger">Ditolak</span></td>
                    <td>2025-05-14</td>
                    </tr>
                </tbody>
                </table>
            </div>
            </div>

            {{-- Progres Dokumen --}}
            <div>
            <h4>📈 Progres Buku Kerja Guru</h4>
            <div class="table-responsive">
                <table class="table table-borderless table-sm">
                <thead>
                    <tr>
                    <th>Guru</th>
                    <th>Total Dokumen</th>
                    <th>Disetujui</th>
                    <th>Ditolak</th>
                    <th>Pending</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <td>Rina Oktaviani</td>
                    <td>10</td>
                    <td>7</td>
                    <td>1</td>
                    <td>2</td>
                    </tr>
                    <tr>
                    <td>Wawan Setiawan</td>
                    <td>8</td>
                    <td>8</td>
                    <td>0</td>
                    <td>0</td>
                    </tr>
                </tbody>
                </table>
            </div>
            </div>
        </div>
        </section>
    </div>

    </x-layout>
    {{-- End Kurikulum --}}
@elseif (auth()->user()->role == 'kepsek')
{{-- Kepsek --}}
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
            font-size: 2rem;
            color: #3f51b5;
            }
            .dashboard-header p {
            color: #666;
            margin-bottom: 30px;
            }
            table.table th,
            table.table td {
            vertical-align: middle;
            }
            .btn-approve {
            background-color: #4caf50;
            color: white;
            }
            .btn-reject {
            background-color: #f44336;
            color: white;
            }
        </style>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />

        <div class="app-wrapper">
            <section class="content">
            <div class="container-fluid">
                <div class="dashboard-header text-center">
                <h1>Dashboard Kepala Madrasah</h1>
                </div>

                {{-- Tampilan Role: Kepala Sekolah --}}
                <div class="mt-5">
                <h4>✅ Dokumen Menunggu Pengesahan Kepala Sekolah</h4>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                    <thead class="thead-light">
                        <tr>
                        <th>#</th>
                        <th>Nama Guru</th>
                        <th>Judul Dokumen</th>
                        <th>Tanggal Disetujui Kurikulum</th>
                        <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                        <td>1</td>
                        <td>Ahmad Fauzi</td>
                        <td>Program Semester</td>
                        <td>2025-05-17</td>
                        <td>
                            <button class="btn btn-sm btn-info" data-toggle="modal" data-target="#principalApprovalModal"
                                    data-id="1"
                                    data-guru="Ahmad Fauzi"
                                    data-dokumen="Program Semester">
                            <i class="fas fa-eye"></i> Tinjau & Sahkan
                            </button>
                        </td>
                        </tr>
                    </tbody>
                    </table>
                </div>
                </div>

                <!-- Modal Kepala Sekolah -->
                <div class="modal fade" id="principalApprovalModal" tabindex="-1" role="dialog" aria-labelledby="principalApprovalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <form method="POST" action="/kepala-sekolah/sahkan">
                    @csrf
                    <input type="hidden" name="document_id" id="principal-modal-document-id">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="principalApprovalLabel">Pengesahan Dokumen</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <div class="modal-body">
                        <div class="mb-3">
                            <label>Nama Guru:</label>
                            <p id="principal-modal-guru-name" class="font-weight-bold text-primary"></p>
                        </div>
                        <div class="mb-3">
                            <label>Judul Dokumen:</label>
                            <p id="principal-modal-dokumen-title" class="font-weight-bold text-dark"></p>
                        </div>
                        <div class="mb-3">
                            <label for="catatan-kepsek">Catatan Kepala Sekolah:</label>
                            <textarea name="catatan_kepsek" id="catatan-kepsek" class="form-control" rows="3" placeholder="Tambahkan catatan jika perlu..."></textarea>
                        </div>
                        </div>
                        <div class="modal-footer">
                        <button type="submit" name="action" value="approve" class="btn btn-success">
                            <i class="fas fa-check"></i> Sahkan
                        </button>
                        <button type="submit" name="action" value="reject" class="btn btn-danger">
                            <i class="fas fa-times"></i> Tolak
                        </button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        </div>
                    </div>
                    </form>
                </div>
                </div>
            </div>
                <!-- Modal Catatan -->
            <div class="modal fade" id="noteModal" tabindex="-1" role="dialog" aria-labelledby="noteModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="noteModalLabel">Catatan / Komentar</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span>&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                    <p id="catatan-text" class="text-dark font-weight-normal"></p>
                    </div>
                    <div class="modal-footer">
                    <button class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    </div>
                </div>
                </div>
            </div>

            </section>
        </div>
        
        


    </x-layout>
{{-- End Kepsek --}}
@else
{{-- Guru --}}
<x-layout>
  <section class="content">
    <div class="container-fluid">
      <!-- Info Boxes for Buku Kerja Guru -->
      <div class="row" style="cursor: pointer">
        <!-- Info Box: Dokumen Disetujui -->
        <div class="col-12 col-sm-6 col-md-4">
          <div class="info-box">
            <span class="info-box-icon bg-success elevation-1"><i class="fas fa-check-circle"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Disetujui</span>
              <span class="info-box-number">8 Dokumen</span>
              
            </div>
          </div>
        </div>

        <!-- Info Box: Dokumen Menunggu Persetujuan -->
        <div class="col-12 col-sm-6 col-md-4">
          <div class="info-box mb-3">
            <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-clock"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Menunggu</span>
              <span class="info-box-number">5 Dokumen</span>
              
            </div>
          </div>
        </div>

        <!-- Info Box: Dokumen Ditolak -->
        <div class="col-12 col-sm-6 col-md-4">
          <div class="info-box mb-3">
            <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-times-circle"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Ditolak</span>
              <span class="info-box-number">2 Dokumen</span>
              
            </div>
          </div>
        </div>
      </div>


      <!-- Additional row for interactive components -->
      <div class="row">
        <div class="col-md-12">
          <!-- Grafik Penilaian Siswa -->
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Grafik Penilaian Kompetensi Siswa</h3>
            </div>
            <div class="card-body">
              <canvas id="gradingChart" height="180"></canvas>
            </div>
          </div>
        </div>
      </div>

      <!-- Row for Lesson Plan & Activity Section -->
      <div class="row">
        <div class="col-md-6">
          <!-- Daftar Rencana Pembelajaran -->
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Rencana Pembelajaran (RPP)</h3>
            </div>
            <div class="card-body">
              <ul>
                <li>Matematika - Pembahasan Persamaan Linear</li>
                <li>Bahasa Indonesia - Menulis Esai Naratif</li>
                <li>IPA - Eksperimen Pengaruh Cahaya terhadap Tumbuhan</li>
                <li>IPS - Diskusi Sejarah Perjuangan Nasional</li>
              </ul>
            </div>
          </div>
        </div>

        <div class="col-md-6">
          <!-- Aktivitas Kelas -->
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Aktivitas Kelas</h3>
            </div>
            <div class="card-body">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Nama Kegiatan</th>
                    <th>Durasi</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>1</td>
                    <td>Pemaparan Materi</td>
                    <td>60 Menit</td>
                  </tr>
                  <tr>
                    <td>2</td>
                    <td>Diskusi Kelompok</td>
                    <td>30 Menit</td>
                  </tr>
                  <tr>
                    <td>3</td>
                    <td>Tugas Mandiri</td>
                    <td>15 Menit</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>

      <!-- Row for Reflection and Evaluation -->
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Refleksi Pembelajaran</h3>
            </div>
            <div class="card-body">
              <textarea class="form-control" rows="4" placeholder="Tuliskan refleksi mengenai pembelajaran hari ini..."></textarea>
            </div>
          </div>
        </div>
      </div>

    </div><!--/. container-fluid -->
  </section>

  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script>
    // Grafik Penilaian Kompetensi Siswa
    var ctx = document.getElementById('gradingChart').getContext('2d');
    var gradingChart = new Chart(ctx, {
      type: 'line', // Grafik garis
      data: {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
        datasets: [{
          label: 'Penilaian Kompetensi Siswa (%)',
          data: [75, 80, 85, 90, 88, 92],
          borderColor: 'rgba(75, 192, 192, 1)',
          backgroundColor: 'rgba(75, 192, 192, 0.2)',
          fill: true
        }]
      },
      options: {
        responsive: true,
        scales: {
          y: {
            beginAtZero: true,
          }
        }
      }
    });

    
  </script>
</x-layout>


{{-- End Guru --}}
@endif
