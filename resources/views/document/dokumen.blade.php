<x-layout title="Upload Dokumen">
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
        /* Menggunakan Flexbox untuk memastikan card dalam row memiliki tinggi yang sama */
        .row {
            display: flex;
            flex-wrap: wrap;
        }

        .col-md-3 {
            display: flex;
            flex-direction: column; /* Membuat card mengisi seluruh ruang vertikal */
        }

        .card.equal-height {
            display: flex;
            flex-direction: column;
            height: 100%; /* Membuat card mengisi seluruh ruang yang ada */
        }

        .card-body {
            flex-grow: 1; /* Membuat bagian card-body tumbuh untuk mengisi ruang yang tersisa */
        }

    </style>

    <div class="app-wrapper">
        <section class="content">
        <div class="container-fluid">
            <div class="text-center">
                <h1 class="custom-title">Upload Dokumen</h1>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <!-- Daftar Rencana Pembelajaran -->
                    <div class="card equal-height">
                        <div class="card-header">
                        <h3 class="card-title">Buku Kerja 1</h3>
                        </div>
                        <div class="card-body">
                        <ul>
                            <li>Capaian Pembelajaran (CP)</li>
                            <li>Tujuan Pembelajaran (TP)</li>
                            <li>Alur Tujuan Pembelajaran (ATP)</li>
                            <li>Modul Pembelajaran</li>
                            <li>Kriteria Ketercapaian Tujuan Pembelajaran</li>
                            <li>Program Remedial Pengayaan</li>
                        </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <!-- Daftar Rencana Pembelajaran -->
                    <div class="card equal-height">
                        <div class="card-header">
                        <h3 class="card-title">Buku Kerja 2</h3>
                        </div>
                        <div class="card-body">
                        <ul>
                            <li>Kode Etik Guru</li>
                            <li>Ikrar Guru</li>
                            <li>Tata Tertib</li>
                            <li>Pembiasaan Guru</li>
                            <li>Kalender Pendidikan</li>
                            <li>Analisis Alokasi Waktu</li>
                            <li>Program Tahunan</li>
                            <li>Program Semester</li>
                            <li>Jurnal Agenda Guru</li>
                        </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <!-- Daftar Rencana Pembelajaran -->
                    <div class="card equal-height">
                        <div class="card-header">
                        <h3 class="card-title">Buku Kerja 3</h3>
                        </div>
                        <div class="card-body">
                        <ul>
                            <li>Daftar Hadir Siswa</li>
                            <li>Daftar Nilai</li>
                            <li>Penilaian Kepribadian Siswa</li>
                            <li>Analisis Hasil Penilaian</li>
                            <li>Program Remedial dan Pengayaan</li>
                            <li>Daftar Buku Guru & Siswa</li>
                            <li>Jadwal Mengajar</li>
                            <li>Daya Serap Siswa</li>
                            <li>Kumpulan Kisi Kisi Soal</li>
                            <li>Kumpulan Soal</li>
                            <li>Analisis Butir Soal</li>
                            <li>Perbaikan Soal</li>
                        </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <!-- Daftar Rencana Pembelajaran -->
                    <div class="card equal-height">
                        <div class="card-header">
                        <h3 class="card-title">Buku Kerja 4</h3>
                        </div>
                        <div class="card-body">
                        <ul>
                            <li>Daftar Evaluasi Diri Kerja Guru</li>
                            <li>Program Tindak Lanjut Kinerja</li>
                        </ul>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Form Upload Dokumen --}}
            <div class="card mb-4 mt-4">
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
                            <option value="Matematika Tingkat Lanjut">Matematika Tingkat Lanjut</option>
                            <option value="Fisika">Fisika</option>
                            <option value="Kimia">Kimia</option>
                            <option value="Biologi">Biologi</option>
                            <option value="Ekonomi">Ekonomi</option>
                            <option value="Akidah Akhlak">Akidah Akhlak</option>
                            <option value="Fiqih">Fiqih</option>
                            <option value="Al-Qur'an Hadits">Al-Qur'an Hadits</option>
                            <option value="Bahasa Arab">Bahasa Arab</option>
                            <option value="Penjaskes">Penjaskes</option>
                            <option value="Informatika">Informatika</option>
                            <option value="Seni Budaya">Seni Budaya</option>
                            <option value="Sejarah Kebudayaan Islam">Sejarah Kebudayaan Islam</option>
                            <option value="Sejarah Indonesia">Sejarah Indonesia</option>
                            <option value="Pendidikan Pancasila">Pendidikan Pancasila</option>
                            <option value="Prakarya">Prakarya</option>
                            <option value="Bahasa Sunda">Bahasa Sunda</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="semester">Semester</label>
                        <select name="semester" id="semester" class="form-control" required>
                            <option value="">-- Pilih Semester --</option>
                            <option value="Ganjil">Ganjil</option>
                            <option value="Genap">Genap</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="tp">Tahun Pelajaran</label>
                        <select name="tp" id="tp" class="form-control" required>
                            <option value="">-- Pilih Tahun Pelajaran --</option>
                            <option value="2024/2025">2024/2025</option>
                            <option value="2025/2026">2025/2026</option>
                            <option value="2026/2027">2026/2027</option>
                            <option value="2027/2028">2027/2028</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Kelas</label><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="kelas" id="kelasX" value="x">
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
                                <option value="{{ $item->id }}">{{ $item->nama_indikator }}</option>
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
                        @error('file')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                        @if(session('error'))
                            <div class="text-danger">{{ session('error') }}</div>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-success"><i class="fas fa-upload"></i> Unggah Dokumen</button>
                </form>
            </div>
            </div>

        </div>
        </section>
    </div>
    @if(session('success'))
    <script>
        alert("{{ session('success') }}");
        window.location.href = "/bk";
    </script>
    @endif
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>



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

