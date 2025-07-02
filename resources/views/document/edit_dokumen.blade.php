<x-layout title="Edit Dokumen">
    <div class="app-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="text-center">
                    <h1 class="custom-title">Edit Dokumen</h1>
                </div>

                <div class="card mb-4 mt-4">
                    <div class="card-header bg-warning text-white">
                        <strong>✏️ Edit Dokumen</strong>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('update_dokumen', ['slug' => $dokumen->slug]) }}" enctype="multipart/form-data">
                            @csrf

                            <input type="hidden" name="nama_guru" value="{{ auth()->user()->name }}">
                            <input type="hidden" name="guru_id" value="{{ auth()->user()->id }}">

                            <div class="form-group">
                                <label for="judul">Judul Dokumen</label>
                                <input type="text" name="judul" id="judul" class="form-control" value="{{ $dokumen->judul }}" required>
                            </div>

                            <div class="form-group">
                                <label for="mapel">Mata Pelajaran</label>
                                <select name="mata_pelajaran" id="mapel" class="form-control" required>
                                    <option value="">-- Pilih Mata Pelajaran --</option>
                                    <option value="Bahasa Indonesia" {{ $dokumen->mata_pelajaran == 'Bahasa Indonesia' ? 'selected' : '' }}>Bahasa Indonesia</option>
                                    <option value="Bahasa Inggris" {{ $dokumen->mata_pelajaran == 'Bahasa Inggris' ? 'selected' : '' }}>Bahasa Inggris</option>
                                    <option value="Matematika" {{ $dokumen->mata_pelajaran == 'Matematika' ? 'selected' : '' }}>Matematika</option>
                                    <option value="Matematika Tingkat Lanjut" {{ $dokumen->mata_pelajaran == 'Matematika Tingkat Lanjut' ? 'selected' : '' }}>Matematika Tingkat Lanjut</option>
                                    <option value="Fisika" {{ $dokumen->mata_pelajaran == 'Fisika' ? 'selected' : '' }}>Fisika</option>
                                    <option value="Kimia" {{ $dokumen->mata_pelajaran == 'Kimia' ? 'selected' : '' }}>Kimia</option>
                                    <option value="Biologi" {{ $dokumen->mata_pelajaran == 'Biologi' ? 'selected' : '' }}>Biologi</option>
                                    <option value="Ekonomi" {{ $dokumen->mata_pelajaran == 'Ekonomi' ? 'selected' : '' }}>Ekonomi</option>
                                    <option value="Akidah Akhlak" {{ $dokumen->mata_pelajaran == 'Akidah Akhlak' ? 'selected' : '' }}>Akidah Akhlak</option>
                                    <option value="Fiqih" {{ $dokumen->mata_pelajaran == 'Fiqih' ? 'selected' : '' }}>Fiqih</option>
                                    <option value="Al-Qur'an Hadits" {{ $dokumen->mata_pelajaran == "Al-Qur'an Hadits" ? 'selected' : '' }}>Al-Qur'an Hadits</option>
                                    <option value="Bahasa Arab" {{ $dokumen->mata_pelajaran == 'Bahasa Arab' ? 'selected' : '' }}>Bahasa Arab</option>
                                    <option value="Penjaskes" {{ $dokumen->mata_pelajaran == 'Penjaskes' ? 'selected' : '' }}>Penjaskes</option>
                                    <option value="Informatika" {{ $dokumen->mata_pelajaran == 'Informatika' ? 'selected' : '' }}>Informatika</option>
                                    <option value="Seni Budaya" {{ $dokumen->mata_pelajaran == 'Seni Budaya' ? 'selected' : '' }}>Seni Budaya</option>
                                    <option value="Sejarah Kebudayaan Islam" {{ $dokumen->mata_pelajaran == 'Sejarah Kebudayaan Islam' ? 'selected' : '' }}>Sejarah Kebudayaan Islam</option>
                                    <option value="Sejarah Indonesia" {{ $dokumen->mata_pelajaran == 'Sejarah Indonesia' ? 'selected' : '' }}>Sejarah Indonesia</option>
                                    <option value="Pendidikan Pancasila" {{ $dokumen->mata_pelajaran == 'Pendidikan Pancasila' ? 'selected' : '' }}>Pendidikan Pancasila</option>
                                    <option value="Prakarya" {{ $dokumen->mata_pelajaran == 'Prakarya' ? 'selected' : '' }}>Prakarya</option>
                                    <option value="Bahasa Sunda" {{ $dokumen->mata_pelajaran == 'Bahasa Sunda' ? 'selected' : '' }}>Bahasa Sunda</option>
                                </select>

                            </div>

                            <div class="form-group">
                                <label for="semester">Semester</label>
                                <select name="semester" id="semester" class="form-control" required>
                                    <option value="">-- Pilih Semester --</option>
                                    <option value="Ganjil" {{ $dokumen->semester == 'Ganjil' ? 'selected' : '' }}>Ganjil</option>
                                    <option value="Genap" {{ $dokumen->semester == 'Genap' ? 'selected' : '' }}>Genap</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="tp">Tahun Pelajaran</label>
                                <select name="tp" id="tp" class="form-control" required>
                                    <option value="">-- Pilih Tahun Pelajaran --</option>
                                    <option value="2024/2025" {{ $dokumen->tp == '2024/2025' ? 'selected' : '' }}>2024/2025</option>
                                    <option value="2025/2026" {{ $dokumen->tp == '2025/2026' ? 'selected' : '' }}>2025/2026</option>
                                    <option value="2026/2027" {{ $dokumen->tp == '2026/2027' ? 'selected' : '' }}>2026/2027</option>
                                    <option value="2027/2028" {{ $dokumen->tp == '2027/2028' ? 'selected' : '' }}>2027/2028</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Kelas</label><br>
                                @foreach (['x' => 'X (Sepuluh)', 'xi' => 'XI (Sebelas)', 'xii' => 'XII (Dua Belas)'] as $value => $label)
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="kelas" value="{{ $value }}" {{ $dokumen->kelas == $value ? 'checked' : '' }}>
                                        <label class="form-check-label">{{ $label }}</label>
                                    </div>
                                @endforeach
                            </div>

                            {{-- Kategori --}}
                            <div class="form-group">
                                <label for="kategori">Kategori</label>
                                <select id="kategori" name="kategori" class="form-control" onchange="updateIndikator()" required>
                                    <option value="">-- Pilih Kategori --</option>
                                    <option value="bk1" {{ $dokumen->kategori == 'bk1' ? 'selected' : '' }}>Buku Kerja 1</option>
                                    <option value="bk2" {{ $dokumen->kategori == 'bk2' ? 'selected' : '' }}>Buku Kerja 2</option>
                                    <option value="bk3" {{ $dokumen->kategori == 'bk3' ? 'selected' : '' }}>Buku Kerja 3</option>
                                    <option value="bk4" {{ $dokumen->kategori == 'bk4' ? 'selected' : '' }}>Buku Kerja 4</option>
                                </select>
                            </div>

                            {{-- Indikator --}}
                            <div class="form-group">
                                <label for="indikator_id">Indikator</label>
                                <select id="indikator_id" name="indikator_id" class="form-control" required>
                                    <option value="">-- Pilih Indikator --</option>
                                    {{-- Isi otomatis via JavaScript --}}
                                </select>
                            </div>


                            <div class="form-group">
                                <label for="file">Ganti File Dokumen (PDF)</label>
                                <input type="file" name="file" id="file" class="form-control-file" accept="application/pdf">
                                <small class="form-text text-muted">Biarkan kosong jika tidak ingin mengganti file.</small>
                            </div>

                            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Perbarui Dokumen</button>
                        </form>
                    </div>
                </div>
            </div>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Terjadi kesalahan:</strong>
                    <ul class="mb-0 mt-1">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

        </section>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
    const indikatorData = {
        bk1: @json($indikator1),
        bk2: @json($indikator2),
        bk3: @json($indikator3),
        bk4: @json($indikator4),
    };

    const selectedKategori = "{{ $dokumen->kategori }}";
    const selectedIndikatorId = "{{ $dokumen->indikator_id }}";

    function updateIndikator() {
        const kategori = document.getElementById('kategori').value;
        const indikatorSelect = document.getElementById('indikator_id');

        // Kosongkan dulu isi select
        indikatorSelect.innerHTML = '<option value="">-- Pilih Indikator --</option>';

        if (kategori && indikatorData[kategori]) {
            indikatorData[kategori].forEach(item => {
                const option = document.createElement('option');
                option.value = item.id;
                option.textContent = item.nama_indikator;

                // jika sedang edit dan cocok, tandai selected
                if (item.id == selectedIndikatorId) {
                    option.selected = true;
                }

                indikatorSelect.appendChild(option);
            });
        }
    }

    // Panggil saat halaman pertama kali dimuat (untuk edit data)
    document.addEventListener('DOMContentLoaded', updateIndikator);
</script>
</x-layout>
