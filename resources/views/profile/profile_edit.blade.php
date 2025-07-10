<x-layout>
  <style>
    .container {
      width: 90%;
      margin: 0 auto;
      padding: 3rem 1.5rem 4rem;
      font-family: 'Inter', sans-serif;
      color: #374151;
      background: #ffffff;
      min-height: 100vh;
      display: flex;
      justify-content: center;
      align-items: flex-start;
    }
    .card {
      background-color: #f9fafb;
      border-radius: 16px;
      box-shadow: 0 6px 20px rgba(0,0,0,0.08);
      padding: 2.5rem 3rem;
      width: 100%;
      max-width: 500px;
      display: flex;
      flex-direction: column;
      gap: 2rem;
      align-items: center; /* Tambahkan ini agar konten di tengah */
    }
    .profile-img {
      width: 200px;
      height: 200px;
      border-radius: 50%;
      object-fit: cover;
      box-shadow: 0 8px 20px rgba(0,0,0,0.12);
      border: 4px solid #e28743;
      aspect-ratio: 1 / 1;
      cursor: pointer;
      display: block;
      margin-left: auto;
      margin-right: auto;
    }
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
      background-color: #d32f2f;
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
      background-color: #b71c1c;
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
    .profile-info {
      display: flex;
      flex-direction: column;
      justify-content: flex-start;
    }
    .profile-name {
      font-weight: 900;
      font-size: 2.25rem;
      color: #1f2937;
      margin-bottom: 0.5rem;
    }
    .details-grid {
      display: grid;
      grid-template-columns: 1fr;
      gap: 1.5rem 2.5rem;
    }
    .detail-item {
      display: flex;
      flex-direction: column;
    }
    .detail-label {
      font-weight: 700;
      font-size: 0.875rem;
      color: #6b7280;
      margin-bottom: 0.25rem;
      text-transform: uppercase;
      letter-spacing: 0.06em;
      user-select: none;
    }
    .detail-value {
      font-weight: 600;
      font-size: 1.125rem;
      color: #111827;
      word-break: break-word;
      padding: 0.5rem 0.75rem;
      border: 1px solid #e5e7eb;
      border-radius: 0.5rem;
      background: #fff;
    }
    .btn-back {
      display: inline-block;
      margin-top: 2.5rem;
      padding: 0.75rem 1.5rem;
      background-color: #873e23;
      color: white;
      font-weight: 600;
      font-size: 1rem;
      text-align: center;
      border-radius: 0.75rem;
      text-decoration: none;
      box-shadow: 0 4px 12px rgba(135, 62, 35, 0.3);
      transition: background-color 0.3s ease, box-shadow 0.3s ease;
    }
    .btn-back:hover,
    .btn-back:focus {
      background-color: #a14b2c;
      box-shadow: 0 6px 18px rgba(161, 75, 44, 0.4);
      outline: none;
      color: #f6e2d3;
    }
    .btn-edit {
      display: inline-block;
      margin-top: 2.5rem;
      padding: 0.75rem 1.5rem;
      background-color: #2563eb;
      color: white;
      font-weight: 600;
      font-size: 1rem;
      text-align: center;
      border-radius: 0.75rem;
      text-decoration: none;
      box-shadow: 0 4px 12px rgba(37, 99, 235, 0.3);
      transition: background-color 0.3s ease, box-shadow 0.3s ease;
      border: none;
      cursor: pointer;
    }
    .btn-edit:hover,
    .btn-edit:focus {
      background-color: #1e40af;
      box-shadow: 0 6px 18px rgba(30, 64, 175, 0.4);
      outline: none;
      color: #dbeafe;
    }
  </style>
  <main class="container" role="main" aria-label="Edit Akun">
    <section class="card">
      <img 
        src="{{ $akun->photo !== null ? 'uploads/photos/'.$akun->photo : 'img/person.png'}}" 
        alt="Foto profil pengguna dengan latar belakang netral, memperlihatkan wajah jelas" 
        class="profile-img" 
        width="200" height="200"
        loading="lazy"
        onclick="openModal(this.src)"        
      />
      <div id="imgModal" class="modal" onclick="closeModal(event)">
        <span class="close" onclick="closeModal(event)">&times;</span>
        <img class="modal-content" id="modalImage">
        <div style="text-align: center; margin-top: 1rem;">
          <button type="button" onclick="document.getElementById('fileInput').click()" class="change-photo-btn">
            <i class="fas fa-camera"></i> Ganti Foto
          </button>
          <form id="uploadForm" action="{{ route('upload.photo', ['id' => $akun->id]) }}" method="POST" enctype="multipart/form-data">
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
          <button type="button" class="delete-photo-danger {{ $akun->photo == null ? 'd-none' : ''}}" data-id="{{ $akun->id }}" onclick="deletePhoto(this)">
            <i class="fas fa-trash"></i> Hapus Foto
          </button>
        </div>
      </div>
      <form action="/update-profile" method="POST">
        @csrf
        <div class="profile-info">
          <h1 class="profile-name">Edit Akun</h1>
          <div class="details-grid">
            <div class="detail-item">
              <label class="detail-label">Nama</label>
              <input type="text" name="name" class="detail-value" value="{{ old('name', $akun->name) }}" required>
              @error('name')
                <span style="color: red" class="text-sm">{{ $message }}</span>
              @enderror
            </div>
            <div class="detail-item">
              <label class="detail-label">Email</label>
              <input type="email" name="email" class="detail-value" value="{{ old('email', $akun->email) }}" required>
              @error('email')
                <span style="color: red" class="text-sm">{{ $message }}</span>
              @enderror
            </div>
            <div class="detail-item">
              <label class="detail-label">Password Baru</label>
              <input type="password" name="password" class="detail-value" autocomplete="new-password">
              @error('password')
                <span style="color: red" class="text-sm">{{ $message }}</span>
              @enderror
            </div>
            <div class="detail-item">
              <label class="detail-label">Konfirmasi Password</label>
              <input type="password" name="password_confirmation" class="detail-value" autocomplete="new-password">
              @error('password_confirmation')
                <span style="color: red" class="text-sm">{{ $message }}</span>
              @enderror
            </div>
          </div>
          <button type="submit" class="btn-edit" aria-label="Simpan Perubahan">
            <i class="fas fa-save" style="margin-right: 0.5rem;"></i> Simpan
          </button>
        </div>
      </form>
      <a href="/profile" class="btn-back" aria-label="Kembali"><i class="fas fa-arrow-left" style="margin-right: 0.5rem;"></i> Kembali</a>
    </section>
  </main>
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