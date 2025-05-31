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
                <form method="POST" action="/upload" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="nama_guru" id="nama_guru" value="{{ auth()->user()->name }}">
                <input type="hidden" name="id_guru" id="id_guru" value="{{ auth()->user()->id }}">
                    <div class="form-group">
                        <label for="judul">Judul Dokumen</label>
                        <input type="text" name="judul" id="judul" class="form-control" placeholder="Contoh: Program Tahunan Fisika" required>
                    </div>
                    <div class="form-group">
                        <label for="mapel">Mata Pelajaran</label>
                        <select name="mapel" id="mapel" class="form-control" required>
                            <option value="">-- Pilih Mata Pelajaran --</option>
                            <option value="Bahasa Indonesia">Bahasa Indonesia</option>
                            <option value="Bahasa Inggris">Bahasa Inggris</option>
                            <option value="Matematika">Matematika</option>
                            <option value="Fisika">Fisika</option>
                            <option value="Kimia">Kimia</option>
                            <option value="Biologi">Biologi</option>
                            <option value="Ekonomi">Ekonomi</option>
                            <option value="Geografi">Geografi</option>
                            <option value="Sosiologi">Sosiologi</option>
                            <option value="Sejarah">Sejarah</option>
                            <option value="PJOK">PJOK</option>
                            <option value="TIK">TIK</option>
                            <option value="Seni Budaya">Seni Budaya</option>
                            <option value="Agama Islam">Agama Islam</option>
                            <option value="Pendidikan Pancasila">Pendidikan Pancasila</option>
                            <option value="Bahasa Arab">Bahasa Arab</option>
                            <option value="Prakarya">Prakarya</option>
                            <option value="BK">Bimbingan Konseling (BK)</option>
                            <option value="Produktif RPL">Produktif RPL</option>
                            <option value="Produktif TKJ">Produktif TKJ</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Kelas</label><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="kelas" id="kelasX" value="x" required>
                            <label class="form-check-label" for="kelasX">X (Sepuluh)</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="kelas" id="kelasXI" value="xi">
                            <label class="form-check-label" for="kelasXI">XI (Sebelas)</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="kelas" id="kelasXII" value="xii">
                            <label class="form-check-label" for="kelasXII">XII (Dua Belas)</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="kategori">Kategori</label>
                        <select onchange="opsi()" name="kategori" id="kategori" class="form-control" required>
                            <option value="">-- Pilih Kategori --</option>
                            <option value="bk1">Buku Kerja 1</option>
                            <option value="bk2">Buku Kerja 2</option>
                            <option value="bk3">Buku Kerja 3</option>
                            <option value="bk4">Buku Kerja 4</option>
                        </select>
                    </div>
                    <div id="indikator1" class="form-group d-none">
                        <label for="indikator1">Indikator</label>
                        <select id="id_indikator1" class="form-control" required>
                            <option value="">-- Pilih Indikator --</option>
                            @foreach ($indikator1 as $item)
                                <option value="{{ $item->kategori }}">{{ $item->nama_indikator }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div id="indikator2" class="form-group d-none">
                        <label for="indikator2">Indikator</label>
                        <select id="id_indikator2" class="form-control" required>
                            <option value="">-- Pilih Indikator --</option>
                            @foreach ($indikator2 as $item)
                                <option value="{{ $item->id }}">{{ $item->nama_indikator }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div id="indikator3" class="form-group d-none">
                        <label for="indikator3">Indikator</label>
                        <select id="id_indikator3" class="form-control" required>
                            <option value="">-- Pilih Indikator --</option>
                            @foreach ($indikator3 as $item)
                                <option value="{{ $item->kategori }}">{{ $item->nama_indikator }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div id="indikator4" class="form-group d-none">
                        <label for="indikator4">Indikator</label>
                        <select id="id_indikator4" class="form-control" required>
                            <option value="">-- Pilih Indikator --</option>
                            @foreach ($indikator4 as $item)
                                <option value="{{ $item->kategori }}">{{ $item->nama_indikator }}</option>
                            @endforeach
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    @if(session('success'))
        alert("{{ session('success') }}");
    @endif

    @if(session('error'))
        alert("{{ session('error') }}");
    @endif

    var indikator1 = document.getElementById('indikator1');
    var indikator2 = document.getElementById('indikator2');
    var indikator3 = document.getElementById('indikator3');
    var indikator4 = document.getElementById('indikator4');

    var indikators1 = document.getElementById('id_indikator1');
    var indikators2 = document.getElementById('id_indikator2');
    var indikators3 = document.getElementById('id_indikator3');
    var indikators4 = document.getElementById('id_indikator4');

    function opsi(){
        var kategori = document.getElementById('kategori');
        var valueKategori = kategori.value;
        if (valueKategori == 'bk1') {
            indikator1.classList.remove('d-none');
            indikator2.classList.add('d-none');
            indikator3.classList.add('d-none');
            indikator4.classList.add('d-none');

            indikators1.setAttribute('name','indikator');
            indikators2.removeAttribute('name');
            indikators3.removeAttribute('name');
            indikators4.removeAttribute('name');

            indikators1.setAttribute('required','');
            indikators2.removeAttribute('required');
            indikators3.removeAttribute('required');
            indikators4.removeAttribute('required');
        }else if(valueKategori == 'bk2'){
            indikator2.classList.remove('d-none');
            indikator1.classList.add('d-none');
            indikator3.classList.add('d-none');
            indikator4.classList.add('d-none');

            indikators2.setAttribute('name','indikator');
            indikators1.removeAttribute('name');
            indikators3.removeAttribute('name');
            indikators4.removeAttribute('name');

            indikators2.setAttribute('required','');
            indikators1.removeAttribute('required');
            indikators3.removeAttribute('required');
            indikators4.removeAttribute('required');
        }else if(valueKategori == 'bk3'){
            indikator3.classList.remove('d-none');
            indikator1.classList.add('d-none');
            indikator2.classList.add('d-none');
            indikator4.classList.add('d-none');

            indikators3.setAttribute('name','indikator');
            indikators1.removeAttribute('name');
            indikators2.removeAttribute('name');
            indikators4.removeAttribute('name');

            indikators3.setAttribute('required','');
            indikators1.removeAttribute('required');
            indikators2.removeAttribute('required');
            indikators4.removeAttribute('required');
        }else if(valueKategori == 'bk4'){
            indikator4.classList.remove('d-none');
            indikator1.classList.add('d-none');
            indikator2.classList.add('d-none');
            indikator3.classList.add('d-none');
            
            indikators4.setAttribute('name','indikator');
            indikators1.removeAttribute('name');
            indikators2.removeAttribute('name');
            indikators3.removeAttribute('name');

            indikators4.setAttribute('required','');
            indikators1.removeAttribute('required');
            indikators2.removeAttribute('required');
            indikators3.removeAttribute('required');
        }else{
            indikator1.classList.add('d-none');
            indikator2.classList.add('d-none');
            indikator3.classList.add('d-none');
            indikator4.classList.add('d-none');

            indikators1.removeAttribute('required');
            indikators2.removeAttribute('required');
            indikators3.removeAttribute('required');
            indikators4.removeAttribute('required');
        }
    }
</script>
</x-layout>

{{-- End Guru --}}
@endif
