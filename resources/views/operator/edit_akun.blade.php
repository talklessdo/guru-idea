<x-layout>
  <style>
    /* Container */
    .container {
      width: 95%;
      margin: 0 auto;
      padding: 3rem 1.5rem 4rem;
      font-family: 'Inter', sans-serif;
      color: #374151; /* gray-700 */
      background: #ffffff;
      min-height: 100vh;
      display: flex;
      justify-content: center;
      align-items: flex-start;
    }

    /* Card */
    .card {
      background-color: #f9fafb; /* gray-50 */
      border-radius: 16px;
      box-shadow: 0 6px 20px rgba(0,0,0,0.08);
      padding: 2.5rem 3rem;
      width: 100%;
      max-width: 850px;
      display: grid;
      grid-template-columns: 220px 1fr;
      gap: 3rem 2.5rem;
    }

    /* Profile image */
    .profile-img {
      width: 200px;
      height: 200px;
      border-radius: 50%;
      object-fit: cover;
      box-shadow: 0 8px 20px rgba(0,0,0,0.12);
      border: 4px solid #e28743; /* Indigo-600 */
      aspect-ratio: 1 / 1;
      cursor: pointer;
    }

    /* Profile info panel */
    .profile-info {
      display: flex;
      flex-direction: column;
      justify-content: flex-start;
    }

    .profile-name {
      font-weight: 900;
      font-size: 2.75rem;
      color: #1f2937; /* gray-800 */
      margin-bottom: 0.25rem;
    }

    .profile-email {
      font-weight: 500;
      font-size: 1.125rem;
      color: #6b7280; /* gray-500 */
      margin-bottom: 2rem;
      word-break: break-word;
    }

    /* Details grid */
    .details-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
      gap: 1.75rem 2.5rem;
    }

    .detail-item {
      display: flex;
      flex-direction: column;
    }

    .detail-label {
      font-weight: 700;
      font-size: 0.875rem;
      color: #6b7280; /* gray-500 */
      margin-bottom: 0.25rem;
      text-transform: uppercase;
      letter-spacing: 0.06em;
      user-select: none;
    }

    .detail-value {
      font-weight: 600;
      font-size: 1.125rem;
      color: #111827; /* gray-900 */
      word-break: break-word;
    }

    /* Responsive adjustments */
    @media (max-width: 768px) {
      .card {
        grid-template-columns: 1fr;
        padding: 2rem 1.5rem;
      }
      .profile-img {
        width: 160px;
        height: 160px;
        margin: 0 auto 2rem;
        border-width: 3px;
      }
      .profile-info {
        align-items: center;
        text-align: center;
      }
      .details-grid {
        grid-template-columns: 1fr 1fr;
        gap: 1.5rem 1.5rem;
      }
      .detail-label,
      .detail-value {
        font-size: 1rem;
      }
    }

    @media (max-width: 420px) {
      .details-grid {
        grid-template-columns: 1fr;
        gap: 1.5rem 0;
      }
    }
    .btn-back {
          display: inline-block;
          margin-top: 2.5rem;
          padding: 0.75rem 1.5rem;
          background-color: #873e23; /* coklat utama */
          color: white;
          font-weight: 600;
          font-size: 1rem;
          text-align: center;
          border-radius: 0.75rem;
          text-decoration: none;
          box-shadow: 0 4px 12px rgba(135, 62, 35, 0.3); /* shadow senada coklat */
          transition: background-color 0.3s ease, box-shadow 0.3s ease;
      }

      .btn-back:hover,
      .btn-back:focus {
          background-color: #a14b2c; /* coklat lebih terang */
          box-shadow: 0 6px 18px rgba(161, 75, 44, 0.4);
          outline: none;
          color: #f6e2d3; /* warna krem lembut, lebih nyaman dibaca */
      }

      .btn-edit {
          display: inline-block;
          margin-top: 2.5rem;
          padding: 0.75rem 1.5rem;
          background-color: #2563eb; /* Blue-600 (medium biru) */
          color: white;
          font-weight: 600;
          font-size: 1rem;
          text-align: center;
          border-radius: 0.75rem;
          text-decoration: none;
          box-shadow: 0 4px 12px rgba(37, 99, 235, 0.3); /* shadow biru lembut */
          transition: background-color 0.3s ease, box-shadow 0.3s ease;
      }

      .btn-edit:hover,
      .btn-edit:focus {
          background-color: #1e40af; /* Blue-800 (biru gelap) */
          box-shadow: 0 6px 18px rgba(30, 64, 175, 0.4);
          outline: none;
          color: #dbeafe; /* biru muda lembut untuk teks hover */
      }


        /* untuk foto profile */
        .modal {
          display: none;
          position: fixed;
          z-index: 9999;
          padding-top: 60px;
          left: 0; top: 0;
          width: 100%; height: 100%;
          overflow: auto;
          background-color: rgba(0, 0, 0, 0.8);
        }

        .modal-content {
          display: block;
          margin: auto;
          max-width: 90%;
          max-height: 80vh;
          height: auto;
          width: auto;
          object-fit: contain;
          border-radius: 10px;
          box-shadow: 0 0 15px rgba(0,0,0,0.5);
        }

        .change-photo-btn {
          background-color: #873e23;
          color: white;
          padding: 0.6rem 1.5rem;
          font-size: 1rem;
          border: none;
          border-radius: 0.5rem;
          cursor: pointer;
          transition: background-color 0.3s ease;
          font-family: 'Poppins', sans-serif;
          display: inline-flex;
          align-items: center;
          gap: 0.5rem;
        }

        .change-photo-btn i {
          font-size: 1.1rem;
        }

        .change-photo-btn:hover {
          background-color: #a14b2c;
        }

        .delete-photo-danger {
            background-color: #d32f2f;  /* Merah terang untuk menunjukkan bahaya */
            color: white;
            padding: 0.6rem 1.5rem;
            font-size: 1rem;
            border: none;
            border-radius: 0.5rem;
            cursor: pointer;
            transition: background-color 0.3s ease;
            font-family: 'Poppins', sans-serif;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .delete-photo-danger i {
            font-size: 1.1rem;
        }

        .delete-photo-danger:hover {
            background-color: #b71c1c;  /* Merah lebih gelap saat hover */
        }


        .close {
          position: absolute;
          top: 15px;
          right: 35px;
          color: #ffffff;
          font-size: 30px;
          font-weight: bold;
          cursor: pointer;
        }

  </style>


  <main class="container" role="main" aria-label="Halaman Detail Akun">
    <section class="card" aria-describedby="desc-detail-akun">
      
      <img 
        src="{{ $dataGuru->photo !== null ? 'uploads/photos/'.$dataGuru->photo : 'img/person.png'}}" 
        alt="Foto profil pengguna dengan latar belakang netral, memperlihatkan wajah jelas" 
        class="profile-img" 
        width="200" height="200"
        loading="lazy"
        onclick="openModal(this.src)"
      />
      <div id="imgModal" class="modal" onclick="closeModal(event)">
        <span class="close" onclick="closeModal(event)">&times;</span>
        <img class="modal-content" id="modalImage">

        <!-- Tombol Ganti Foto -->
        <div style="text-align: center; margin-top: 1rem;">
          <button type="button" onclick="document.getElementById('fileInput').click()" class="change-photo-btn">
            <i class="fas fa-camera"></i> Ganti Foto
          </button>
          <form id="uploadForm" action="{{ route('upload.photo', ['id' => $dataGuru->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
              <input 
                  type="file" 
                  id="fileInput" 
                  style="display: none;" 
                  name="photo"
                  accept=".jpg, .jpeg, .png" 
                  onchange="ganti()"
              />
            </form>
        </div>
        <div style="text-align: center; margin-top: 1rem;">
          <button type="button" class="delete-photo-danger {{ $dataGuru->photo == null ? 'd-none' : ''}}" data-id="{{ $dataGuru->id }}" onclick="deletePhoto(this)">
            <i class="fas fa-trash"></i> Hapus Foto
          </button>
        </div>
      </div>


      <form action="/update_guru/{{ $dataGuru->id }}" method="POST">
        @csrf
        {{-- @method('PUT') --}}
        @if ($errors->any())
    <div class="alert alert-danger">
        <strong>Terjadi kesalahan!</strong>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

        <div class="profile-info">
        <h1 class="profile-name">Edit Akun</h1>
        <p class="profile-email">{{ $dataGuru->role }}</p>

        <div class="details-grid">
            <div class="detail-item">
                <label class="detail-label">Nama</label>
                <input type="text" name="name" class="detail-value" value="{{ old('name', $dataGuru->name) }}" required>
                @error('name')
                    <span style="color: red" class="text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="detail-item"> 
                <label class="detail-label">Email</label>
                <input type="email" name="email" class="detail-value" value="{{ old('email', $dataGuru->email) }}" >
                @error('email')
                    <span style="color: red" class="text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="detail-item">
                <label class="detail-label">NIK</label>
                <input type="text" inputmode="numeric" pattern="[0-9]*"  oninput="this.value = this.value.replace(/[^0-9]/g, '')" name="nik" class="detail-value" value="{{ old('nik', $dataGuru->nik) }}">
                @error('nik')
                    <span style="color: red" class="text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="detail-item">
                <label class="detail-label">NUPTK</label>
                <input type="text" inputmode="numeric" pattern="[0-9]*"  oninput="this.value = this.value.replace(/[^0-9]/g, '')" name="nuptk" class="detail-value" value="{{ old('nuptk', $dataGuru->nuptk) }}">
                @error('nuptk')
                    <span style="color: red" class="text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="detail-item">
                <label class="detail-label">Status Pegawai</label>
                <select name="status_pegawai" class="detail-value">
                    <option value="PNS" {{ old('status_pegawai', $dataGuru->status_pegawai) == 'PNS' ? 'selected' : '' }}>PNS</option>
                    <option value="Non PNS" {{ old('status_pegawai', $dataGuru->status_pegawai) == 'Non PNS' ? 'selected' : '' }}>Non PNS</option>
                </select>
                @error('status_pegawai')
                    <span style="color: red" class="text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="detail-item">
                <label class="detail-label">NIP</label>
                <input type="text" inputmode="numeric" pattern="[0-9]*"  oninput="this.value = this.value.replace(/[^0-9]/g, '')" name="nip" class="detail-value" value="{{ old('nip', $dataGuru->nip) }}">
                @error('nip')
                    <span style="color: red" class="text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="detail-item">
                <label class="detail-label">Jenis Kelamin</label>
                <select name="jk" class="detail-value">
                    <option value="">-- Pilih --</option>
                    <option value="Laki-laki" {{ old('jk', $dataGuru->jk) == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                    <option value="Perempuan" {{ old('jk', $dataGuru->jk) == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                </select>
                @error('jk')
                    <span style="color: red" class="text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="detail-item">
                <label class="detail-label">Tempat Lahir</label>
                <input type="text" name="tempat_lahir" class="detail-value" value="{{ old('tempat_lahir', $dataGuru->tempat_lahir) }}">
                @error('tempat_lahir')
                    <span style="color: red" class="text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="detail-item">
                <label class="detail-label">Tanggal Lahir</label>
                <input type="date" name="tanggal_lahir" class="detail-value" value="{{ old('tanggal_lahir', $dataGuru->tanggal_lahir) }}">
                @error('tanggal_lahir')
                    <span style="color: red" class="text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="detail-item">
                <label class="detail-label">Nomor HP</label>
                <input type="text" inputmode="numeric" pattern="[0-9]*"  oninput="this.value = this.value.replace(/[^0-9]/g, '')" minlength="12" maxlength="13" name="nomor_hp" class="detail-value" value="{{ old('nomor_hp', $dataGuru->nomor_hp) }}">
                @error('nomor_hp')
                    <span style="color: red" class="text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="detail-item">
                <label class="detail-label">Tugas</label>
                <input type="text" name="tugas" class="detail-value" value="{{ old('tugas', $dataGuru->tugas) }}">
                @error('tugas')
                    <span style="color: red" class="text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="detail-item">
                <label class="detail-label">Penempatan</label>
                <input type="text" name="penempatan" class="detail-value" value="{{ old('penempatan', $dataGuru->penempatan) }}">
                @error('penempatan')
                    <span style="color: red" class="text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="detail-item">
                <label class="detail-label">Total Jam</label>
                <input type="text" inputmode="numeric" pattern="[0-9]*"  oninput="this.value = this.value.replace(/[^0-9]/g, '')" name="total_jtm" class="detail-value" value="{{ old('total_jtm', $dataGuru->total_jtm) }}">
                @error('total_jtm')
                    <span style="color: red" class="text-sm">{{ $message }}</span>
                @enderror
            </div>

        </div>

        <button type="submit" class="btn-edit" aria-label="Simpan Perubahan">
            <i class="fas fa-save" style="margin-right: 0.5rem;"></i> Simpan
        </button>
        </div>
    </form>
      <a href="/detail_guru-{{ $dataGuru->id }}" class="btn-back" aria-label="Kembali"><i class="fas fa-arrow-left" style="margin-right: 0.5rem;"></i> Kembali</a>    
    </section>
  </main>
  @if (session('success'))
      <script>
        Swal.fire({
          title: "Berhasil!",
          text: `{{ session('success') }}`,
          icon: "success"
        });
      </script>
  @endif
  <script>
    function openModal(src) {
      const modal = document.getElementById("imgModal");
      const modalImg = document.getElementById("modalImage");
      modal.style.display = "block";
      modalImg.src = src;
    }

    function closeModal() {
      document.getElementById("imgModal").style.display = "none";
    }

    function ganti() {
      // Submit form secara otomatis saat file dipilih
      document.getElementById('uploadForm').submit();
    }
    

    function deletePhoto(hapus){
      const id = hapus.getAttribute('data-id');
      Swal.fire({
        title: "Apakah Anda yakin?",
        text: "Foto profil akan dihapus!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Ya, hapus!",
        cancelButtonText: "Batal",
      }).then((result) => {
        if (result.isConfirmed) {
          window.location.href = '/delete-photo/' + id;
        }
      });
    }
  </script>

</x-layout>

