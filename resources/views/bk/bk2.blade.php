<x-layout title="BuKer 2">
    <div class="container card bg-white">
        <h1 class="title text-warning">📘 Buku Kerja 2</h1>

        <!-- Kelas dan Semester Filter -->
        <div class="filters">
            <select id="kelas" onchange="filterData()">
                <option value="X">Kelas X</option>
                <option value="XI">Kelas XI</option>
                <option value="XII">Kelas XII</option>
            </select>

            <select id="semester" onchange="filterData()">
                <option value="Ganjil">Semester Ganjil</option>
                <option value="Genap">Semester Genap</option>
            </select>
        </div>

        <!-- Daftar Komponen -->
        <div  id="konten-buku-kerja" class="cards">
            @foreach ($bk as $item)
            <div style="cursor: pointer" class="card">{{ $item->nama_indikator }}</div>
            @endforeach
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
    </style>

    <!-- JavaScript -->
    <script>
        
        function filterData() {
            const kelas = document.getElementById("kelas").value;
            const semester = document.getElementById("semester").value;

            console.log("Filter aktif:", kelas, semester);

            // Di sini kamu bisa menambahkan AJAX atau dinamisasi isi sesuai kelas/semester
            // Untuk contoh ini hanya console log
        }

        
    </script>
</x-layout>
