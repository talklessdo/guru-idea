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
  
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Bootstrap Bundle dengan Popper.js -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

<script>
  $('#principalApprovalModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget);
    var docId = button.data('id');
    var guruName = button.data('guru');
    var dokumenTitle = button.data('dokumen');

    var modal = $(this);
    modal.find('#principal-modal-document-id').val(docId);
    modal.find('#principal-modal-guru-name').text(guruName);
    modal.find('#principal-modal-dokumen-title').text(dokumenTitle);
  });
</script>


</x-layout>
