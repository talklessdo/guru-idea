<x-layout title="BuKer 2">
    <div class="container card bg-white">
        <h1 class="title text-warning">📘 Buku Kerja 2</h1>

        <!-- Kelas dan Semester Filter -->
        <div class="filters">
            <select class="opsi" id="kelas">
                <option value="">Pilih Kelas</option>
                <option value="X">Kelas X</option>
                <option value="XI">Kelas XI</option>
                <option value="XII">Kelas XII</option>
            </select>

            <select class="opsi" id="semester" >
                <option value="">Pilih Semester</option>
                <option value="Ganjil">Semester Ganjil</option>
                <option value="Genap">Semester Genap</option>
            </select>

            <select class="opsi" id="tp" >
                <option value="">Tahun Pelajaran</option>
                <option value="2024/2025">2024/2025</option>
                <option value="2025/2026">2025/2026</option>
                <option value="2026/2027">2026/2027</option>
                <option value="2027/2028">2027/2028</option>
            </select>
        </div>

        <!-- Daftar Komponen -->
        <div  id="konten-buku-kerja" class="cards">
            @foreach ($bk as $item)
                <div id="point" style="cursor: pointer" data-poin="{{ $item->id }}" data-nama="{{ $item->nama_indikator }}" class="card cardPoint d-none" onclick="openPoin(this)">{{ $item->nama_indikator }}</div>
            @endforeach
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="poin" tabindex="-1" role="dialog" aria-labelledby="poinLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="poinLabel">Modal title</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body p-2">
                    <div class="table-responsive mb-0">
                        <table id="tables" class="table table-bordered table-hover">
                            <thead>
                                <tr class="text-center">
                                    <th>#</th>
                                    <th>Judul</th>
                                    <th>Mata Pelajaran</th>
                                    <th>Kelas</th>
                                    <th>Tanggal</th>
                                    <th>Tindakan</th>
                                </tr>
                            </thead>
                            <tbody id="table-body">
                                <!-- Akan diisi lewat JavaScript -->
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    
    <!-- CSS -->
    <style>
         #konten-buku-kerja .card {
            background-color: #6b120e;
            color: white; /* Tambahan opsional agar teks terlihat jelas */
            padding: 1rem;
            border-radius: 8px;
            margin: 0.5rem 0;
        }
        .container {
            max-width: 960px;
            margin: 2rem auto;
            font-family: 'Segoe UI', sans-serif;
        }

        .title {
            text-align: center;
            margin-bottom: 1.5rem;
            color: #2a4d69;
        }

        .filters {
            display: flex;
            justify-content: center;
            gap: 1rem;
            margin-bottom: 2rem;
        }

        select {
            padding: 0.5rem;
            font-size: 1rem;
            border-radius: 6px;
            border: 1px solid #ccc;
        }

        .cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
            gap: 1rem;
        }

        .card {
            background: #f0f4f8;
            padding: 1.25rem;
            border-radius: 10px;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.1);
            font-size: 1.1rem;
            transition: all 0.2s ease-in-out;
        }

        .card:hover {
            transform: translateY(-5px);
            background: #d9e9ff;
        }
        .table {
            width: 100%;
            margin: 2rem auto;
            white-space: nowrap;
        }
    </style>

    <!-- JavaScript -->
    <script>
        let selectedPoin = null;
        let selectedNama = '';
        let kelas = '';
        let semester = '';
        let tp = '';

        const poinLabel = document.getElementById('poinLabel');
        const point = document.getElementById('point').innerHTML;

        const opsi = document.querySelectorAll(".opsi");
        const indikators = document.querySelectorAll(".cardPoint"); 

        opsi.forEach(pilih => {
            pilih.addEventListener('change', () => {
                const semuaTerisi = Array.from(opsi).every(select => select.value !== "");

                indikators.forEach(card => {
                    card.classList.toggle('d-none', !semuaTerisi); 
                });

                
            });
        });

        function openPoin(el){
            selectedPoin = el.dataset.poin;
            selectedNama = el.dataset.nama;
            kelas = document.getElementById('kelas').value;
            semester = document.getElementById('semester').value;
            tp = document.getElementById('tp').value;
            const modal = new bootstrap.Modal(document.getElementById('poin'));
            modal.show();
            poinLabel.innerHTML = selectedNama + " " + "(" + kelas + "/" + semester + ") " + tp;

            
             // Ambil data
            const data = @json($data);

            const tbody = document.getElementById('table-body');

            // Hapus data lama sebelum isi ulang
            tbody.innerHTML = '';

            // Filter hanya data yang cocok dengan selectedPoin
            const filteredData = data.filter(item =>
                item.indikator == selectedPoin && item.semester == semester
                && item.tp == tp && item.kelas == kelas.toLowerCase()
            );

            filteredData.forEach((item, index) => {
                // const badgeClass = item.status === "Menunggu" ? "badge-warning" :
                //                 item.status === "Disetujui" ? "badge-success" :
                //                 "badge-secondary";
    
                const row = `
                    <tr>
                        <td>${index + 1}</td>
                        <td>${item.judul}</td>
                        <td>${item.mapel}</td>
                        <td>${item.kelas}</td>
                        <td>${item.tanggal}</td>
                        
                        <td class="text-center" style="width: 15%">
                            <a href="{{ Storage::url('dokumen/') }}${item.lihat}" target="_blank" class="btn btn-info btn-sm" title="Lihat">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="${item.editUrl}" class="btn btn-warning btn-sm" title="Edit">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="${item.hapusUrl}" method="POST" style="display:inline;" onsubmit="return confirm('Apakah Anda yakin ingin menghapus dokumen ini?');">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <button type="submit" class="btn btn-danger btn-sm" title="Hapus">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                `;
    
                tbody.insertAdjacentHTML('beforeend', row);
            });
        }
        // Tabel
        
        document.addEventListener('DOMContentLoaded', function () {
            // Contoh data
            
        });


        
    </script>
</x-layout>
