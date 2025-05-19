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


    </x-layout>

{{-- End Guru --}}
@endif
