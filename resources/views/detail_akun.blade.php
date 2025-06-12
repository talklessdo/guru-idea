<x-layout>
  <style>
    /* Container */
    .container {
      max-width: 900px;
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
        src="https://storage.googleapis.com/workspace-0f70711f-8b4e-4d94-86f1-2a93ccde5887/image/7596e646-8c8f-4087-8b21-f1eb653654ef.png" 
        alt="Foto profil pengguna dengan latar belakang netral, memperlihatkan wajah jelas" 
        class="profile-img" 
        width="200" height="200"
        loading="lazy"
        onclick="openModal(this.src)"
        onerror="this.onerror=null;this.src='https://storage.googleapis.com/workspace-0f70711f-8b4e-4d94-86f1-2a93ccde5887/image/586e165e-5b02-4353-aa39-0469b4cca578.png';"
      />
      <div id="imgModal" class="modal" onclick="closeModal(event)">
        <span class="close" onclick="closeModal(event)">&times;</span>
        <img class="modal-content" id="modalImage">

        <!-- Tombol Ganti Foto -->
        <div style="text-align: center; margin-top: 1rem;">
          <button type="button" class="change-photo-btn">
            <i class="fas fa-camera"></i> Ganti Foto
          </button>
        </div>

      </div>


      <div class="profile-info">
        <h1 class="profile-name" id="desc-detail-akun">Detail Akun</h1>
        <p class="profile-email">{{ $guru->role }}</p>    

        <div class="details-grid" role="list">
          <div class="detail-item" role="listitem">
            <span class="detail-label">Nama</span>
            <span class="detail-value">{{ $guru->name }}</span>
          </div>
          <div class="detail-item" role="listitem">
            <span class="detail-label">Email</span>
            <span class="detail-value">{{ $guru->email }}</span>
          </div>
          <div class="detail-item" role="listitem">
            <span class="detail-label">NIK</span>
            <span class="detail-value">{{ $guru->nik }}</span>
          </div>
          <div class="detail-item" role="listitem">
            <span class="detail-label">NUPTK</span>
            <span class="detail-value">{{ $guru->nuptk }}</span>
          </div>
          <div class="detail-item" role="listitem">
            <span class="detail-label">Status Pegawai</span>
            <span class="detail-value">{{ $guru->status_pegawai }}</span>
          </div>
          <div class="detail-item" role="listitem">
            <span class="detail-label">NIP</span>
            <span class="detail-value">{{ $guru->nip }}</span>
          </div>
          <div class="detail-item" role="listitem">
            <span class="detail-label">Jenis Kelamin</span>
            <span class="detail-value">{{ $guru->jk }}</span>
          </div>
          <div class="detail-item" role="listitem">
            <span class="detail-label">Tempat Lahir</span>
            <span class="detail-value">{{ $guru->tempat_lahir }}</span>
          </div>
          <div class="detail-item" role="listitem">
            <span class="detail-label">Tanggal Lahir</span>
            <span class="detail-value">{{ $guru->tanggal_lahir }}</span>
          </div>
          <div class="detail-item" role="listitem">
            <span class="detail-label">Nomor HP</span>
            <span class="detail-value">{{ $guru->nomor_hp }}</span>
          </div>
          <div class="detail-item" role="listitem">
            <span class="detail-label">Tugas</span>
            <span class="detail-value">{{ $guru->tugas }}</span>
          </div>
          <div class="detail-item" role="listitem">
            <span class="detail-label">Mata Pelajaran</span>
            <span class="detail-value">{{ $guru->mata_pelajaran }}</span>
          </div>
          <div class="detail-item" role="listitem">
            <span class="detail-label">Penempatan</span>
            <span class="detail-value">{{ $guru->penempatan }}</span>
          </div>
          <div class="detail-item" role="listitem">
            <span class="detail-label">Total Jam</span>
            <span class="detail-value">{{ $guru->total_jtm }}</span>
          </div>
        </div>
        <a href="/manage_guru" class="btn-edit" aria-label="Edit">
          <i class="fas fa-edit" style="margin-right: 0.5rem;"></i> Edit
        </a>
    
      </div>
      <a href="/manage_guru" class="btn-back" aria-label="Kembali"><i class="fas fa-arrow-left" style="margin-right: 0.5rem;"></i> Kembali</a>    
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
  </script>

</x-layout>

