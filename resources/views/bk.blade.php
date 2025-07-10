<x-layout title="Buku Kerja">

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
                    <table id="example1" class="table table-bordered table-hover" >
                    <thead>
                        <tr class="text-center">
                            <th>#</th>
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
                            <td>{{ $item->judul }}</td>
                            <td>{{ $item->mata_pelajaran }}</td>
                            <td class="text-center">{{ strtoupper($item->kelas) }}</td>
                            @if ($item->kategori == 'bk1')
                                <td>Buku Kerja 1</td>
                            @elseif ($item->kategori == 'bk2')
                                <td>Buku Kerja 2</td> 
                            @elseif ($item->kategori == 'bk3')
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
                                @if ($item->catatan !== null)
                                    <button class="btn btn-sm btn-info" data-toggle="modal" data-target="#noteModal"  onclick="catatan('{{ $item->catatan }}')">Lihat</button>
                                @else
                                    -
                                @endif
                            </td>
                            <td>
                                <!-- Tombol Lihat -->
                                <a href="{{ asset('uploads/dokumen/' . $item->nama_file) }}" target="_blank" class="btn btn-info btn-sm" title="Lihat">
                                    <i class="fas fa-eye"></i>
                                </a>
                                
                                <!-- Tombol Edit -->
                                <a href="{{ route('edit_dokumen', ['slug' => $item->slug]) }}" class="btn btn-warning btn-sm" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
    
                                <!-- Tombol Hapus -->
                                <a onclick="hapusDokumen({{ $item->id }})" class="btn btn-danger btn-sm" title="Hapus">
                                    <i class="fas fa-trash"></i>
                                </a>
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
            title: "Good job!",
            text: "{{ session('error') }}",
            icon: "success"
        });
    </script>
    @elseif (session('warning'))
    <script>
        Swal.fire({
            title: "Good job!",
            text: "{{ session('warning') }}",
            icon: "success"
        });
    </script>
@endif

<script>
    
    $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });

  function catatan(data){
    const modalBody = document.getElementById("catatan-text");
    modalBody.textContent = data || 'Tidak ada catatan.';
  }

  function hapusDokumen(id){
    Swal.fire({
      title: 'Apakah Anda yakin?',
      text: 'Dokumen akan dihapus!',
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

