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
          <h1>Dashboard Guru</h1>
          <p>Unggah dan pantau status buku kerja Anda</p>
        </div>

        {{-- Form Upload Dokumen --}}
        <div class="card mb-4">
          <div class="card-header bg-primary text-white">
            <strong>📤 Unggah Dokumen Baru</strong>
          </div>
          <div class="card-body">
            <form method="POST" action="/guru/upload-dokumen" enctype="multipart/form-data">
              @csrf
              <div class="form-group">
                <label for="judul">Judul Dokumen</label>
                <input type="text" name="judul" id="judul" class="form-control" placeholder="Contoh: RPP Bahasa Indonesia" required>
              </div>
              <div class="form-group">
                <label for="kategori">Kategori</label>
                <select name="kategori" id="kategori" class="form-control" required>
                  <option value="">-- Pilih Kategori --</option>
                  <option value="RPP">RPP</option>
                  <option value="Silabus">Silabus</option>
                  <option value="Prota">Program Tahunan</option>
                  <option value="Promes">Program Semester</option>
                </select>
              </div>
              <div class="form-group">
                <label for="file">File Dokumen (PDF)</label>
                <input type="file" name="file" id="file" class="form-control-file" accept="application/pdf" required>
              </div>
              <button type="submit" class="btn btn-success"><i class="fas fa-upload"></i> Unggah Dokumen</button>
            </form>
          </div>
        </div>

        {{-- Daftar Dokumen Guru --}}
        <div class="card">
          <div class="card-header bg-secondary text-white">
            <strong>📚 Dokumen Saya</strong>
          </div>
          <div class="card-body table-responsive">
            <table class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Judul</th>
                  <th>Kategori</th>
                  <th>Tanggal Upload</th>
                  <th>Status</th>
                  <th>Catatan</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                  <td>RPP Bahasa Indonesia</td>
                  <td>RPP</td>
                  <td>2025-05-17</td>
                  <td><span class="badge badge-success">Disahkan</span></td>
                  <td><button class="btn btn-sm btn-info" data-toggle="modal" data-target="#noteModal" data-catatan="Dokumen sudah baik dan lengkap.">Lihat</button></td>
                </tr>
                <tr>
                  <td>2</td>
                  <td>Silabus IPS</td>
                  <td>Silabus</td>
                  <td>2025-05-15</td>
                  <td><span class="badge badge-warning">Menunggu Verifikasi</span></td>
                  <td>-</td>
                </tr>
              </tbody>
            </table>
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
  <!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Bootstrap JS Bundle (dengan Popper.js) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
  $('#noteModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget);
    var catatan = button.data('catatan') || 'Tidak ada catatan.';
    var modal = $(this);
    modal.find('#catatan-text').text(catatan);
  });
</script>


</x-layout>
