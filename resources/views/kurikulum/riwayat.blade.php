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
        .badge-success {
            background-color: #4caf50;
            color: white;
        }
        .badge-warning {
            background-color: #ff9800;
            color: white;
        }
        .badge-danger {
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
            <div class="container-fluid">
                <div class="dashboard-header text-center">
                    <h1>Riwayat Persetujuan</h1>
                    <p>Daftar riwayat persetujuan dokumen buku kerja guru</p>
                </div>
                <div class="mb-5">
                    <div class="card shadow-sm">
                        <div class="card-header bg-primary text-white">
                            <h5 class="mb-0">Tabel Riwayat Persetujuan</h5>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="riwayatTable" class="table table-striped table-hover display responsive nowrap" style="width:100%">
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
                                        @foreach ($riwayat as $nomor => $data)
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
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <script>
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
                            $('#riwayatTable').DataTable({
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