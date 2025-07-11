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
                              @if ($data->status == 'approve')
                              <td>
                                  <button class="btn btn-sm btn-info" data-toggle="modal" data-target="#principalApprovalModal"
                                          data-id="{{ $data->id }}"
                                          data-guru="{{ $data->nama_guru }}"
                                          data-dokumen="{{ $data->judul }}"
                                          onclick="showData(this)"
                                          data-status="{{ $data->status }}"
                                          data-file="{{ asset('uploads/dokumen/' . $data->nama_file) }}">
                                  <i class="fas fa-eye"></i> Tinjau
                                  </button>
                              </td>
                              @elseif ($data->status == 'decline')
                              <td>
                                  <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#principalApprovalModal"
                                          data-id="{{ $data->id }}"
                                          data-guru="{{ $data->nama_guru }}"
                                          data-dokumen="{{ $data->judul }}"
                                          data-status="{{ $data->status }}"
                                          onclick="showData(this)"
                                          data-file="{{ asset('uploads/dokumen/' . $data->nama_file) }}">
                                  <i class="fas fa-times"></i> Ditolak
                                  </button>
                              </td>
                              @else
                              <td>
                                  <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#principalApprovalModal"
                                          data-id="{{ $data->id }}"
                                          data-guru="{{ $data->nama_guru }}"
                                          data-dokumen="{{ $data->judul }}"
                                          data-status="{{ $data->status }}"
                                          onclick="showData(this)"
                                          data-file="{{ asset('uploads/dokumen/' . $data->nama_file) }}">
                                  <i class="fas fa-check"></i> Disahkan
                                  </button>
                              </td>
                              @endif
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
            const status = data.getAttribute('data-status');
            const form = document.getElementById('principal-approval-form');
            const tindakan = document.querySelectorAll('button[name="action"]');
            const route = "{{ route('validasi', ['id' => 'ID_REPLACE']) }}".replace('ID_REPLACE', documentId);

            document.getElementById('principal-modal-guru-name').textContent = guruName;
            document.getElementById('principal-modal-dokumen-title').textContent = dokumenTitle;
            document.getElementById('principal-modal-file-link').innerHTML = `<a href="${fileLink}" target="_blank">Lihat Dokumen</a>`;
            document.getElementById('principal-modal-document-id').value = documentId;
            form.action = route;
            if (status !== 'approve') {
              tindakan.forEach(tindakan => {
                tindakan.classList.add('d-none');
              });
            } else {
            tindakan.forEach(tindakan => {
                tindakan.classList.remove('d-none');
              });
            }
          }
        </script>


    </x-layout>