<x-layout title="Buku Kerja">
    <link rel="stylesheet" href="//cdn.datatables.net/2.3.2/css/dataTables.dataTables.min.css">
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

         .custom-title {
            font-family: 'Arial', sans-serif; /* Pilih font yang elegan */
            color: #800000; /* Coklat Maroon */
            font-size: 3rem; /* Ukuran teks besar */
            font-weight: bold; /* Membuat teks tebal */
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.3); /* Efek bayangan halus */
            margin-top: 20px; /* Memberikan jarak atas */
            letter-spacing: 2px; /* Memberikan jarak antar huruf */
            line-height: 1.4; /* Jarak antar baris */
        }
        .table {
            width: 100%; /* Mengisi seluruh lebar container */
            table-layout: auto; /* Membuat kolom menyesuaikan dengan isi */
        }

        /* Agar teks dalam kolom tidak membungkus */
        .table td, .table th {
            white-space: nowrap; /* Menjaga teks tetap pada satu baris */
            padding: 8px; /* Memberikan padding agar tidak terlalu rapat */
        }

        /* Responsif, menambahkan scroll horizontal jika tabel terlalu lebar */
        .table-responsive {
            width: 100%;
            overflow-x: auto; /* Mengaktifkan scroll horizontal */
        }

        /* Tambahkan aturan responsif untuk perangkat kecil */
        @media (max-width: 768px) {
            .table td, .table th {
                font-size: 12px; /* Menyesuaikan ukuran font untuk layar kecil */
                padding: 5px; /* Mengurangi padding pada layar kecil */
            }
        }

        #catatan-text {
            white-space: pre-wrap; /* Mengizinkan teks multi-baris */
            word-wrap: break-word; /* Membatasi kata agar tidak keluar dari container */
            word-break: break-word; /* Memecah kata yang panjang menjadi beberapa baris */
            overflow-wrap: break-word; /* Menjaga kata yang panjang agar tidak memanjang ke luar */
        }

        
    </style>

    <div class="app-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="text-center">
                    <h1 class="custom-title">Buku Kerja</h1>
                </div>

                {{-- Daftar Dokumen Guru --}}
                <div class="card mt-4">
                    <div class="card-header bg-warning text-white">
                        <strong>📚 Dokumen</strong>
                    </div>
                    <div class="card-body table-responsive">
                        <div class="table-responsive">
                            <table id="tabel" class="table table-bordered table-hover" >
                                <thead>
                                    <tr class="text-center">
                                        <th>#</th>
                                        <th class="{{ auth()->user()->role == 'guru' ? 'd-none' : '' }}">Nama Guru</th>
                                        <th>Judul</th>
                                        <th>Mata Pelajaran</th>
                                        <th>Kelas</th>
                                        <th>Kategori</th>
                                        <th>Tanggal</th>
                                        <th>Status</th>
                                        <th>Catatan</th>
                                        <th>Tindakan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $no => $item)
                                    <tr>
                                        <td><?= $no + 1; ?></td>
                                        <td class="{{ auth()->user()->role == 'guru' ? 'd-none' : '' }}">{{ $item->nama_guru }}</td>
                                        <td>{{ $item->judul }}</td>
                                        <td>{{ $item->mata_pelajaran }}</td>
                                        <td class="text-center">{{ strtoupper($item->kelas) }}</td>
                                        @if ($item->kategori == '1')
                                                <td>Buku Kerja 1</td>
                                            @elseif ($item->kategori == '2')
                                                <td>Buku Kerja 2</td> 
                                            @elseif ($item->kategori == '3')
                                                <td>Buku Kerja 3</td> 
                                            @else
                                                <td>Buku Kerja 4</td> 
                                            @endif
                                        @php
                                            $tglString = new DateTime($item->created_at);
                                            $locale = 'id_ID'; // Bahasa Indonesia
                                            $fmt = new IntlDateFormatter($locale, IntlDateFormatter::LONG, IntlDateFormatter::NONE);
                                            $fmt->setPattern('EEEE, dd MMMM yyyy');
                                        @endphp
                                        <td>{{ $fmt->format($tglString) }}</td>
                
                                        @if ($item->status == "pending")
                                            <td><span class="badge badge-warning">Menunggu</span></td>
                                        @elseif ($item->status == "approve")
                                            <td><span class="badge badge-success">Disetujui</span></td>
                                        @elseif ($item->status == "validate")
                                            <td><span class="badge badge-primary">Disahkan</span></td>
                                        @else
                                            <td><span class="badge badge-danger">Ditolak</span></td>
                                        @endif
                                        <td style="text-align: center;">
                                            @if ($item->catatan !== null && $item->catatan !== '')
                                                <button class="btn btn-sm btn-info" data-toggle="modal" data-target="#noteModal"  onclick="catatan('{{ $item->catatan }}')">Lihat</button>
                                            @else
                                                -
                                            @endif
                                        </td>
                                        <td>
                                            <!-- Tombol Lihat -->
                                            <a href="{{ asset('uploads/dokumen/' . $item->nama_file) }}" target="_blank" class="btn btn-primary btn-sm" title="Lihat">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            

                                            <!-- Tombol Detail -->
                                            <button type="button" class="btn btn-info btn-sm" 
                                                data-toggle="modal" 
                                                data-target="#detailModal" 
                                                title="Detail"
                                                onclick="showDetailModal(this)"
                                                data-judul="{{ $item->judul }}"
                                                data-mata_pelajaran="{{ $item->mata_pelajaran }}"
                                                data-semester="{{ $item->semester }}"
                                                data-tp="{{ $item->tp }}"
                                                data-kategori="{{ $item->kategori }}"
                                                data-nama_indikator="{{ $item->nama_indikator }}"
                                                data-kelas="{{ strtoupper($item->kelas) }}"
                                            >
                                                <i class="fas fa-info-circle"></i>
                                            </button>

                                            <!-- Modal (hanya satu di halaman, di luar loop) -->
                                            @if ($loop->first)
                                            <div class="modal fade" id="detailModal" tabindex="-1" role="dialog" aria-labelledby="detailModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="detailModalLabel">Detail Dokumen</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p><strong>Judul:</strong> <span id="modal-judul"></span></p>
                                                            <p><strong>Mata Pelajaran:</strong> <span id="modal-mata_pelajaran"></span></p>
                                                            <p><strong>Semester:</strong> <span id="modal-semester"></span></p>
                                                            <p><strong>Tahun Pelajaran:</strong> <span id="modal-tp"></span></p>
                                                            <p><strong>Kategori:</strong> <span id="modal-kategori"></span></p>
                                                            <p><strong>Indikator:</strong> <span id="modal-nama_indikator"></span></p>
                                                            <p><strong>Kelas:</strong> <span id="modal-kelas"></span></p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @endif

                                            <script>
                                            function showDetailModal(btn) {
                                                // Ambil data dari atribut tombol
                                                var judul = btn.getAttribute('data-judul');
                                                var mataPelajaran = btn.getAttribute('data-mata_pelajaran');
                                                var semester = btn.getAttribute('data-semester');
                                                var tp = btn.getAttribute('data-tp');
                                                var kategori = btn.getAttribute('data-kategori');
                                                var namaIndikator = btn.getAttribute('data-nama_indikator');
                                                var kelas = btn.getAttribute('data-kelas');

                                                // Konversi kategori ke label
                                                let kategoriLabel = '';
                                                if (kategori === '1') {
                                                    kategoriLabel = 'Buku Kerja 1';
                                                } else if (kategori === '2') {
                                                    kategoriLabel = 'Buku Kerja 2';
                                                } else if (kategori === '3') {
                                                    kategoriLabel = 'Buku Kerja 3';
                                                } else {
                                                    kategoriLabel = 'Buku Kerja 4';
                                                }

                                                // Set data ke modal
                                                document.getElementById('modal-judul').textContent = judul;
                                                document.getElementById('modal-mata_pelajaran').textContent = mataPelajaran;
                                                document.getElementById('modal-semester').textContent = semester;
                                                document.getElementById('modal-tp').textContent = tp;
                                                document.getElementById('modal-kategori').textContent = kategoriLabel;
                                                document.getElementById('modal-nama_indikator').textContent = namaIndikator;
                                                document.getElementById('modal-kelas').textContent = kelas;
                                            }
                                            </script>
                                            @if (auth()->user()->role == 'guru')
                                            
                                                <!-- Tombol Edit -->
                                                <a href="{{ route('edit_dokumen', ['slug' => $item->slug]) }}" class="btn btn-warning btn-sm {{ $item->status == 'validate' || $item->status == 'approve' ? 'd-none' : '' }}" title="Edit">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                    
                                                <!-- Tombol Hapus -->
                                                <a onclick="hapusDokumen({{ $item->idBK }},'{{ $item->judul }}')" class="btn btn-danger btn-sm" title="Hapus">
                                                    <i class="fas fa-trash"></i>
                                                </a>
                                            @endif
                                        </td>
                                    </tr>
                                        
                                    @endforeach
                                </tbody>
                            </table>
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

@if (session('error'))
    <script>
        Swal.fire({
            title: "Berhasil!",
            text: "{{ session('error') }}",
            icon: "success"
        });
    </script>
    @elseif (session('warning'))
    <script>
        Swal.fire({
            title: "Berhasil!",
            text: "{{ session('warning') }}",
            icon: "success"
        });
    </script>
    @elseif (session('success'))
    <script>
        Swal.fire({
            title: "Berhasil!",
            text: "{{ session('success') }}",
            icon: "success"
        });
    </script>
@endif
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
<script src="//cdn.datatables.net/2.3.2/js/dataTables.min.js"></script>
<script>
    let table = new DataTable('#tabel');
  function catatan(data){
    const modalBody = document.getElementById("catatan-text");
    modalBody.textContent = data || 'Tidak ada catatan.';
  }

  function hapusDokumen(id, judul){
    Swal.fire({
      title: 'Apakah Anda yakin?',
      html: '<strong>' + judul + '</strong> akan dihapus!',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Ya, hapus!',
      cancelButtonText: 'Batal',
    }).then((result) => {
      if (result.isConfirmed) {
        window.location.href = '/delete_dokumen/' + id;
      }
    });
  }
</script>
</x-layout>

