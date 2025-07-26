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
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.dataTables.min.css" />

    <div class="app-wrapper">
        <section class="content">
          <div class="card shadow-sm p-3">
            <div class="container-fluid">
                <div class="dashboard-header text-center">
                <h1>Dokumen Masuk</h1>
                <p>Kelola dan tinjau dokumen buku kerja guru yang masuk</p>
                </div>
                {{-- Daftar Dokumen Masuk --}}
                <div class="mb-5">
                  <h4>📥 Dokumen Menunggu Persetujuan</h4>
                  <div class="table-responsive">
                      <table id="dokumenTable" class="table table-bordered table-hover display responsive nowrap" style="width:100%">
                      <thead class="thead-light">
                          <tr>
                          <th>#</th>
                          <th>Nama Guru</th>
                          <th>Judul Dokumen</th>
                          <th>Kategori</th>
                          <th>Indikator</th>
                          <th>Kelas</th>
                          <th>Semester</th>
                          <th>TP</th>
                          <th>Aksi</th>
                          </tr>
                      </thead>
                      <tbody>
                        @foreach ($dokumenMasuk as $nomor => $data)
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
                          <td>{{ $data->nama_indikator }}</td>
                          <td>{{ $data->kelas }}</td>
                          <td>{{ $data->semester }}</td>
                          <td>{{ $data->tp }}</td>
                          <td>
                            <div class="btn-group">
                                <button type="button" id="dropdownMenuButton" class="btn btn-sm btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Aksi
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item text-success" style="cursor: pointer;" onclick="setujuiDokumen({{ $data->id }})"><i class="fas fa-check"></i> Setujui</a>
                                    <a onclick="tolakDokumen({{ $data->id }})" class="dropdown-item text-danger" style="cursor: pointer;"><i class="fas fa-times"></i> Tolak</a>
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
            </div>

          </div>
        </section>
        <script>
          function tolakDokumen(id){
            Swal.fire({
              title: 'Apakah Anda yakin?',
              text: 'Dokumen akan ditolak!',
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Ya, tolak!',
              cancelButtonText: 'Batal',
            }).then((result) => {
              if (result.isConfirmed) {
                window.location.href = '/tolak-dokumen/' + id;
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
          // DataTables JS
          window.addEventListener('DOMContentLoaded', function() {
            var scriptJQ = document.createElement('script');
            scriptJQ.src = 'https://code.jquery.com/jquery-3.7.0.min.js';
            scriptJQ.onload = function() {
              var scriptDT = document.createElement('script');
              scriptDT.src = 'https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js';
              scriptDT.onload = function() {
                var scriptDTRes = document.createElement('script');
                scriptDTRes.src = 'https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js';
                scriptDTRes.onload = function() {
                  $('#dokumenTable').DataTable({
                    responsive: true,
                    language: {
                      url: '//cdn.datatables.net/plug-ins/1.13.6/i18n/id.json'
                    }
                  });
                };
                document.body.appendChild(scriptDTRes);
              };
              document.body.appendChild(scriptDT);
            };
            document.body.appendChild(scriptJQ);
          });
      </script>
    </div>

</x-layout>