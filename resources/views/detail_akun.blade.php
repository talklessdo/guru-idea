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
        background-color: #e28743; /* Indigo-600 */
        color: white;
        font-weight: 600;
        font-size: 1rem;
        text-align: center;
        border-radius: 0.75rem;
        text-decoration: none;
        box-shadow: 0 4px 12px rgba(79, 70, 229, 0.3);
        transition: background-color 0.3s ease, box-shadow 0.3s ease;
        }

        .btn-back:hover,
        .btn-back:focus {
        background-color: #e28843d7; /* Indigo-700 */
        box-shadow: 0 6px 18px rgba(67, 56, 202, 0.4);
        outline: none;
        color: yellow;
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
        onerror="this.onerror=null;this.src='https://storage.googleapis.com/workspace-0f70711f-8b4e-4d94-86f1-2a93ccde5887/image/586e165e-5b02-4353-aa39-0469b4cca578.png';"
      />

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
      </div>
      <a href="/manage_guru" class="btn-back" aria-label="Kembali ke Dashboard">← Kembali ke Manajemen Guru</a>    
    </section>
  </main>
  
</x-layout>

