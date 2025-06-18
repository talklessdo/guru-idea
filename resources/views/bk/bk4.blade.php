<x-layout>
    <div class="container card bg-white">
        <h1 class="title text-warning">📘 Buku Kerja 4</h1>

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
            <div id="point1" style="cursor: pointer" class="card cardPoint d-none" onclick="openPoin1()">📋Daftar Evaluasi Diri Kerja Guru</div>
            <div style="cursor: pointer" class="card cardPoint d-none" id="point2" onclick="openPoin2()">🛠️Program Tindak Lanjut Kinerja</div>
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
                            <table id="tables" class="table table-bordered table-hover" >
                                <thead>
                                    <tr class="text-center">
                                        <th>#</th>
                                        <th>Judul</th>
                                        <th>Mata Pelajaran</th>
                                        <th>Tanggal</th>
                                        <th>Status</th>
                                        <th>Tindakan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. A, necessitatibus?</td>
                                        <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Porro incidunt natus odio sapiente, rem excepturi.</td>
                                        <td>tannggal</td>
                                        <td><span class="badge badge-warning">Menunggu</span></td>                                    
                                        <td style="width: 15%" class="text-center">
                                            <!-- Tombol Lihat -->
                                            <a href="" target="_blank" class="btn btn-info btn-sm" title="Lihat">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            
                                            <!-- Tombol Edit -->
                                            <a href="" class="btn btn-warning btn-sm" title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </a>
                
                                            <!-- Tombol Hapus -->
                                            <form action="" method="POST" style="display:inline;" onsubmit="return confirm('Apakah Anda yakin ingin menghapus dokumen ini?');">
                                                @csrf
                                                <button type="submit" class="btn btn-danger btn-sm" title="Hapus">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
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
        // Indikator 1
        const poinLabel = document.getElementById('poinLabel');
        const point1 = document.getElementById('point1').innerHTML;
        const point2 = document.getElementById('point2').innerHTML;

        // const kelas = document.getElementById('kelas').value;
        // const semester = document.getElementById('semester').value;
        // const tp = document.getElementById('tp').value;
        const indikators = document.querySelectorAll(".cardPoint");
        const opsi = document.querySelectorAll(".opsi");
        opsi.forEach(pilih => {
            pilih.addEventListener('change', () => {
                // Cek apakah semua select sudah memiliki nilai
                // .every mengembalikan semua nilai menjadi true
                // .some mengembalikan sebagian nilai menjadi true

                // catatan
                const nilaiTerisi = Array.from(opsi)
                .filter(select => select.value !== "")    // hanya yang terisi
                .map(select => select.value);             // ambil nilainya
                
                
                const semuaTerisi = Array.from(opsi).every(nilaiPoin => nilaiPoin.value !== "");
                
                
                
                if (semuaTerisi) {
                    indikators.forEach(element => {
                        element.classList.remove('d-none');
                    });
                }else{
                    indikators.forEach(element => {
                        element.classList.add('d-none');
                    });

                }
            });
        });

        function openPoin1(){
            const kelas = document.getElementById('kelas').value;
            const semester = document.getElementById('semester').value;
            const tp = document.getElementById('tp').value;
            const modal = new bootstrap.Modal(document.getElementById('poin'));
            modal.show();
            poinLabel.innerHTML = point1 + " " + "(" + kelas + "/" + semester + ") " + tp;
        }
        function openPoin2(){
            const kelas = document.getElementById('kelas').value;
            const semester = document.getElementById('semester').value;
            const tp = document.getElementById('tp').value;
            const modal = new bootstrap.Modal(document.getElementById('poin'));
            modal.show();
            poinLabel.innerHTML = point2 + " " + "(" + kelas + "/" + semester + ") " + tp;
        }
    </script>
</x-layout>
