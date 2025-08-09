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
            <!-- <p>Kontrol panel untuk administrasi buku kerja guru</p> -->
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

            <div class="card" onclick="totalBk()">
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
                      <td>{{ \Carbon\Carbon::parse($data->created_at)->translatedFormat('d F Y') }}</td>
                      <td>
                        <div class="dropdown show">
                          <a class="btn btn-primary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Aksi
                          </a>

                          <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <a class="dropdown-item text-info" href="#">Detail</a>
                            <a class="dropdown-item text-danger" href="#">Hapus</a>
                          </div>
                        </div>
                      </td>

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
      function totalBk(){
        window.location.href = '/bk';
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
          <div class="card shadow-sm p-3">
            <div class="container-fluid">
                <div class="dashboard-header text-center">
                <h1>Dashboard</h1>
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
                          <th>Kategori</th>
                          <th>Kelas</th>
                          <th>Semester</th>
                          <th>TP</th>
                          <th>Indikator</th>
                          <th>Aksi</th>
                          </tr>
                      </thead>
                      <tbody>
                        @foreach ($bkPendingNow as $nomor => $data)
                        @php
                            $nomor += 1
                        @endphp
                        <tr>
                          <td>{{ $nomor }}</td>
                          <td>{{ $data->nama_guru }}</td>
                          <td>
                            <a href="{{ asset('uploads/dokumen/' . $data->nama_file) }}" target="_blank">
                              {{ $data->judul }}
                            </a>
                          </td>
                          @if ($data->kategori == 'bk1')
                          <td>Buku Kerja 1</td>
                          @elseif ($data->kategori == 'bk2')
                          <td>Buku Kerja 2</td>
                          @elseif ($data->kategori == 'bk3')
                          <td>Buku Kerja 3</td>
                          @else
                          <td>Buku Kerja 4</td>
                          @endif
                          <td>{{ $data->kelas }}</td>
                          <td>{{ $data->semester }}</td>
                          <td>{{ $data->tp }}</td>
                          <td>{{ $data->nama_indikator }}</td>
                          <td>
                            <div class="btn-group">
                                <button type="button" id="dropdownMenuButton" class="btn btn-sm btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Aksi
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item text-success" style="cursor: pointer;" onclick="setujuiDokumen({{ $data->idBk }})"><i class="fas fa-check"></i> Setujui</a>
                                    <a onclick="tolakDokumen({{ $data->idBk }})" class="dropdown-item text-danger" style="cursor: pointer;"><i class="fas fa-times"></i> Tolak</a>
                                </div>
                            </div>
                          </td>
                        </tr>
                        <!-- Modal Catatan -->
                        <div class="modal fade" id="noteModal" tabindex="-1" role="dialog" aria-labelledby="noteModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <form id="formCatatan" action="{{ route('catatan', ['id' => $data->id]) }}" method="POST">
                                    @csrf
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="noteModalLabel">Catatan / Komentar</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span>&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <textarea id="catatan-text" name="catatan" class="form-control">{{ $data->catatan }}</textarea>
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-secondary" data-dismiss="modal" type="button">Tutup</button>
                                            <button id="btnSaveNote" type="submit" class="btn btn-primary">Simpan</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        @endforeach
                      </tbody>
                      </table>
                  </div>
                </div>
                
                {{-- Riwayat Persetujuan --}}
                <!-- <div class="mb-5">
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
                        @foreach ($bkNow as $nomor => $data)
                        @php
                            $nomor += 1
                        @endphp
                        <tr>
                          <td>{{ $nomor }}</td>
                          <td>{{ $data->nama_guru }}</td>
                          <td>{{ $data->judul }}</td>
                          @if ($data->status == 'approve')
                            <td><span class="badge badge-success">Disetujui</span></td>
                          @elseif ($data->status == 'pending')
                            <td><span class="badge badge-warning">Menunggu</span></td>
                          @else
                            <td><span class="badge badge-danger">Ditolak</span></td>
                          @endif
                          <td>{{ \Carbon\Carbon::parse($data->created_at)->translatedFormat('d F Y') }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                    </table>
                </div>
                </div> -->
    
                {{-- Progres Dokumen --}}
                <div>
                  <h4>📈 Progres Buku Kerja Guru</h4>
                  <div class="table-responsive">
                      <table class="table table-responsive table-sm">
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
                          @foreach($progresGuru as $row)
                          <tr>
                              <td>{{ $row['nama'] }}</td>
                              <td>{{ $row['total'] }}</td>
                              <td>{{ $row['approve'] }}</td>
                              <td>{{ $row['decline'] }}</td>
                              <td>{{ $row['pending'] }}</td>
                          </tr>
                          @endforeach
                      </tbody>
                      </table>
                  </div>
                </div>
            </div>

          </div>
        </section>
        <script>
          function tolakDokumen(id){
            Swal.fire({
              title: 'Apakah Anda yakin?',
              text: 'Dokumen akan ditolak!',
              input: 'textarea',
              inputLabel: 'Catatan (wajib diisi)',
              inputPlaceholder: 'Tulis catatan di sini...',
              inputAttributes: {
                'aria-label': 'Tulis catatan di sini'
              },
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Ya, tolak!',
              cancelButtonText: 'Batal',
              preConfirm: (catatan) => {
                if (!catatan || catatan.trim() === '') {
                  Swal.showValidationMessage('Catatan tidak boleh kosong!');
                  return false;
                }
                return catatan;
              }
            }).then((result) => {
              if (result.isConfirmed) {
                let catatan = encodeURIComponent(result.value);
                window.location.href = '/tolak-dokumen/' + id + '?catatan=' + catatan;
              }
            });
          }
          function setujuiDokumen(id){
            Swal.fire({
              title: 'Apakah Anda yakin?',
              text: 'Dokumen akan disetujui!',
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Ya, setujui!',
              cancelButtonText: 'Batal',
            }).then((result) => {
              if (result.isConfirmed) {
                window.location.href = '/setujui-dokumen/' + id;
              }
            });
          }
      </script>
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
                <div class="card shadow-sm p-3">
                  <div class="dashboard-header text-center">
                    <h1>Dashboard</h1>
                  </div>

                  {{-- Tampilan Role: Kepala Sekolah --}}
                  
                  <div class="mt-5">
                    <ul class="list-unstyled mb-3">
                        <li style="display: flex; align-items: center; font-weight: bold; font-size: 1.1rem;">
                            <span style="color: #28a745; font-size: 1.3em; margin-right: 0.5em;"><i class="fas fa-check-circle"></i></span>
                            Dokumen Menunggu Pengesahan
                        </li>
                    </ul>
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
                          @foreach ($dokumenKepsek as $nomor => $data)
                          @php
                              $nomor += 1
                          @endphp
                            <tr>
                              <td>{{ $nomor }}</td>
                              <td>{{ $data->nama_guru }}</td>
                              <td>{{ $data->judul }}</td>
                              <td>{{ \Carbon\Carbon::parse($data->updated_at)->translatedFormat('d F Y') }}</td>
                              <td>
                                  <button class="btn btn-sm btn-info" data-toggle="modal" data-target="#principalApprovalModal"
                                          data-id="{{ $data->id }}"
                                          data-guru="{{ $data->nama_guru }}"
                                          data-dokumen="{{ $data->judul }}"
                                          onclick="showData(this)"
                                          data-file="{{ asset('uploads/dokumen/' . $data->nama_file) }}">
                                  <i class="fas fa-eye"></i> Tinjau
                                  </button>
                              </td>
                            </tr>
                            @endforeach
                        </tbody>
                        </table>
                    </div>
                  </div>

                  <!-- Modal Kepala Sekolah -->
                  <div class="modal fade" id="principalApprovalModal" tabindex="-1" role="dialog" aria-labelledby="principalApprovalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <form method="POST" id="principal-approval-form">
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
                            <div class="mb-3">
                                <label>Berkas Dokumen:</label>
                                <div id="principal-modal-file-link"></div>
                            </div>
                            </div>
                            <div class="modal-footer">
                            <button type="submit" name="action" value="validate" class="btn btn-success">
                                <i class="fas fa-check"></i> Sahkan
                            </button>
                            <button type="submit" name="action" value="decline" class="btn btn-danger">
                                <i class="fas fa-times"></i> Tolak
                            </button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            </div>
                        </div>
                        </form>
                    </div>
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
        
        <script>
          function showData(data){
            const guruName = data.getAttribute('data-guru');
            const dokumenTitle = data.getAttribute('data-dokumen');
            const fileLink = data.getAttribute('data-file');
            const documentId = data.getAttribute('data-id');
            const form = document.getElementById('principal-approval-form');
            const route = "{{ route('validasi', ['id' => 'ID_REPLACE']) }}".replace('ID_REPLACE', documentId);

            document.getElementById('principal-modal-guru-name').textContent = guruName;
            document.getElementById('principal-modal-dokumen-title').textContent = dokumenTitle;
            document.getElementById('principal-modal-file-link').innerHTML = `<a href="${fileLink}" target="_blank">Lihat Dokumen</a>`;
            document.getElementById('principal-modal-document-id').value = documentId;
            form.action = route;
          }
        </script>


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
        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box">
            <span class="info-box-icon bg-success elevation-1"><i class="fas fa-check-circle"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Disetujui</span>
              <span class="info-box-number">{{ $jmlBkGuruApprove }} Dokumen</span>
              
            </div>
          </div>
        </div>
        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box">
            <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-check-circle"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Disahkan</span>
              <span class="info-box-number">{{ $jmlBkGuruValidate }} Dokumen</span>
              
            </div>
          </div>
        </div>

        <!-- Info Box: Dokumen Menunggu Persetujuan -->
        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box mb-3">
            <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-clock"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Menunggu</span>
              <span class="info-box-number">{{ $jmlBkGuruPending }} Dokumen</span>
              
            </div>
          </div>
        </div>

        <!-- Info Box: Dokumen Ditolak -->
        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box mb-3">
            <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-times-circle"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Ditolak</span>
              <span class="info-box-number">{{ $jmlBkGuruDecline }} Dokumen</span>
              
            </div>
          </div>
        </div>
      </div>

      <!-- Grafik Pie Chart Dokumen -->
      <div class="row mb-4">
        <div class="col-12 col-md-8 mx-auto">
          <div class="card">
            <div class="card-header bg-white">
              <h5 class="card-title mb-0">Grafik Status Dokumen</h5>
            </div>
            <div class="card-body">
              <canvas id="dokumenPieChart" height="120"></canvas>
            </div>
          </div>
        </div>
      </div>
      <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
      <script>
        document.addEventListener('DOMContentLoaded', function () {
          var ctx = document.getElementById('dokumenPieChart').getContext('2d');
          var dokumenPieChart = new Chart(ctx, {
            type: 'pie',
            data: {
              labels: ['Disetujui', 'Disahkan', 'Menunggu', 'Ditolak'],
              datasets: [{
                data: [
                  {{ $jmlBkGuruApprove }},
                  {{ $jmlBkGuruValidate }},
                  {{ $jmlBkGuruPending }},
                  {{ $jmlBkGuruDecline }}
                ],
                backgroundColor: [
                  '#28a745', // Disetujui - green
                  '#007bff', // Disahkan - blue
                  '#ffc107', // Menunggu - yellow
                  '#dc3545'  // Ditolak - red
                ],
                borderWidth: 1
              }]
            },
            options: {
              responsive: true,
              plugins: {
                legend: {
                  display: true,
                  position: 'bottom'
                },
                tooltip: {
                  enabled: true
                }
              }
            }
          });
        });
      </script>
    </div><!--/. container-fluid -->
  </section>
</x-layout>


{{-- End Guru --}}
@endif
