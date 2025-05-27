<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="shortcut icon" href="{{ asset('img/icon-quantum.png') }}" type="image/x-icon">
    <title>Buku Kerja Guru - Landing Page</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Nunito:wght@400;700&display=swap');

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: 'Nunito', sans-serif;
            background: linear-gradient(135deg, #6b120e 0%, #e49b35 100%);
            color: #fff;
            line-height: 1.6;
        }

        .container {
            max-width: 960px;
            margin: 0 auto;
            padding: 2rem;
        }

        header {
            text-align: center;
            padding-top: 4rem;
            padding-bottom: 5rem;
        }

        header img.logo {
            max-width: 120px;
            margin-bottom: 1.5rem;
            filter: drop-shadow(0 0 5px rgba(0,0,0,0.4));
        }

        header h1 {
            font-size: 3.5rem;
            margin-bottom: 0.5rem;
            text-shadow: 2px 2px 6px rgba(0,0,0,0.4);
        }

        header p {
            font-size: 1.25rem;
            font-weight: 300;
            margin-bottom: 2.5rem;
            text-shadow: 1px 1px 4px rgba(0,0,0,0.3);
        }

        .btn-primary {
            background-color: #e49b35;
            color: #6b120e;
            font-weight: 700;
            padding: 1rem 2.5rem;
            border: none;
            border-radius: 50px;
            cursor: pointer;
            font-size: 1.1rem;
            transition: background-color 0.3s ease, transform 0.3s ease;
            box-shadow: 0 6px 15px rgba(228,155,53,0.5);
            text-transform: uppercase;
            letter-spacing: 1.5px;
        }

        .btn-primary:hover {
            background-color: #bf841d;
            transform: scale(1.05);
            box-shadow: 0 8px 20px rgba(191,132,29,0.7);
        }

        section.features {
            background: rgba(255, 255, 255, 0.12);
            margin-top: -3rem;
            border-radius: 12px;
            padding: 3rem 2rem 5rem;
            box-shadow: 0 16px 48px rgba(0,0,0,0.18);
        }

        section.features h2 {
            text-align: center;
            font-size: 2.8rem;
            margin-bottom: 3rem;
            color: #fff;
            text-shadow: 2px 2px 5px #00000090;
        }

        .feature-list {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            gap: 2rem;
        }

        .feature-item {
            background: rgba(255, 255, 255, 0.1);
            border-radius: 10px;
            flex: 1 1 250px;
            padding: 2rem 1.5rem;
            text-align: center;
            box-shadow: 0 8px 30px rgba(0,0,0,0.15);
            transition: background-color 0.3s ease, transform 0.3s ease, color 0.3s ease;
            color: #fff;
        }

        .feature-item:hover {
            background: #e49b35;
            color: #6b120e;
            transform: translateY(-10px);
            box-shadow: 0 15px 40px rgba(228,155,53,0.6);
        }

        .feature-icon {
            font-size: 3rem;
            margin-bottom: 1.2rem;
            color: #fff;
            transition: color 0.3s ease;
        }

        .feature-item:hover .feature-icon {
            color: #6b120e;
        }

        .feature-title {
            font-size: 1.4rem;
            font-weight: 700;
            margin-bottom: 0.7rem;
        }

        .feature-desc {
            font-weight: 400;
            font-size: 1rem;
            line-height: 1.4;
        }

        footer {
            text-align: center;
            padding: 1rem 0;
            font-size: 0.9rem;
            color: #eee7d1;
            user-select: none;
            margin-top: 3rem;
            text-shadow: 1px 1px 2px #6b120e80;
        }

        @media (max-width: 600px) {
            header h1 {
                font-size: 2.5rem;
            }

            section.features {
                margin-top: -1rem;
                padding: 2rem 1rem 3rem;
            }

            .feature-list {
                flex-direction: column;
                gap: 1.5rem;
            }
        }
    </style>
</head>
<body>
    <header class="container">
        <img class="logo" src="{{ 'img' }}/icon-quantum.png" alt="Quantum Idea Logo" />
        <h1>GuruIDEA</h1>
        <p>GuruIDEA mendukung guru dalam menyusun administrasi dan perencanaan pembelajaran secara mudah dan efektif.</p>
        <button class="btn-primary" onclick="window.location.href='/login'">Pelajari Lebih Lanjut</button>
    </header>

    <section class="features container">
        <h2>Kenapa dengan GuruIDEA?</h2>
        <div class="feature-list">
            <div class="feature-item">
                <div class="feature-icon">📚</div>
                <div class="feature-title">Dokumen Lengkap</div>
                <div class="feature-desc">Semua komponen administrasi pembelajaran seperti RPP, jurnal harian, program semester, dan dokumen lainnya tersedia dalam satu tempat.</div>
            </div>
            <div class="feature-item">
                <div class="feature-icon">⏰</div>
                <div class="feature-title">Hemat Waktu</div>
                <div class="feature-desc">Membantu mempercepat proses administrasi sehingga guru bisa fokus mengajar lebih baik.</div>
            </div>
            <div class="feature-item">
                <div class="feature-icon">💼</div>
                <div class="feature-title">Profesional</div>
                <div class="feature-desc">Membuat laporan dan perencanaan yang rapi, konsisten, dan mudah ditinjau.</div>
            </div>
            <div class="feature-item">
                <div class="feature-icon">💡</div>
                <div class="feature-title">Mudah Digunakan</div>
                <div class="feature-desc">Antarmuka yang sederhana dan intuitif untuk semua jenjang pendidikan.</div>
            </div>
        </div>
    </section>

    <footer>
        &copy; {{ date('Y') }} Guru IDEA. Semua hak cipta dilindungi.
    </footer>
</body>
</html>

