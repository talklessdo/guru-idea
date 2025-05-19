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
        <!-- Tombol untuk memicu modal -->
        <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#approvalModal" data-id="1" data-guru="Ahmad Fauzi" data-dokumen="Program Semester">
        <i class="fas fa-eye"></i> Detail
        </button>
        <!-- Modal -->
        <div class="modal fade" id="approvalModal" tabindex="-1" role="dialog" aria-labelledby="approvalModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <form method="POST" action="">
            @csrf
            <input type="hidden" name="document_id" id="modal-document-id">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="approvalModalLabel">Detail Dokumen</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                {{-- Informasi Dokumen --}}
                <div class="mb-3">
                    <label>Nama Guru:</label>
                    <p id="modal-guru-name" class="font-weight-bold text-primary"></p>
                </div>
                <div class="mb-3">
                    <label>Judul Dokumen:</label>
                    <p id="modal-dokumen-title" class="font-weight-bold text-dark"></p>
                </div>

                {{-- Keterangan Tambahan --}}
                <div class="mb-3">
                    <label for="catatan">Catatan / Komentar:</label>
                    <textarea name="catatan" id="catatan" class="form-control" rows="3" placeholder="Masukkan catatan jika perlu..."></textarea>
                </div>
                </div>
                <div class="modal-footer">
                <button type="submit" name="action" value="approve" class="btn btn-success">
                    <i class="fas fa-check"></i> Setujui
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
    </section>
  </div>
  <!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Bootstrap JS Bundle (dengan Popper.js) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
  $('#approvalModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget)
    var docId = button.data('id')
    var guruName = button.data('guru')
    var dokumenTitle = button.data('dokumen')

    var modal = $(this)
    modal.find('#modal-document-id').val(docId)
    modal.find('#modal-guru-name').text(guruName)
    modal.find('#modal-dokumen-title').text(dokumenTitle)
  })
</script>

</x-layout>
