<x-layout>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;700;800&display=swap');

        /* Reset & base */
        * {
            box-sizing: border-box;
        }
        
        a {
            color: inherit;
            text-decoration: none;
        }

        /* Container & layout */
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem 1rem 4rem;
        }

        header {
            position: sticky;
            top: 0;
            background: white;
            border-bottom: 1px solid #e5e7eb;
            box-shadow: 0 1px 3px rgb(0 0 0 / 0.05);
            z-index: 10;
            padding: 1rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .logo {
            font-weight: 800;
            font-size: 1.5rem;
            color: #111827;
            letter-spacing: -0.025em;
        }

        /* Hero section with background image and overlay */
        .hero {
            position: relative;
            text-align: center;
            padding: 6rem 1rem 6rem;
            color: #f9fafb;
            background-image: linear-gradient(
                rgba(17, 24, 39, 0.65),
                rgba(17, 24, 39, 0.65)
              ),
              url('img/bg-kelas.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            border-radius: 1rem;
            box-shadow: 0 10px 24px rgb(0 0 0 / 0.35);
        }
        .hero h1 {
            font-weight: 800;
            font-size: 3.5rem;
            line-height: 1.1;
            margin-bottom: 1rem;
            color: #fef3ec; /* Warna putih krem lembut, senada dengan #873e23 */
            text-shadow: 0 2px 10px rgba(135, 62, 35, 0.6); /* Bayangan senada */
        }

        .hero p {
            font-weight: 400;
            font-size: 1.25rem;
            max-width: 600px;
            margin: 0 auto;
            color: #f0dbd3; /* Abu kecoklatan lembut */
            text-shadow: 0 1px 8px rgba(135, 62, 35, 0.5); /* Bayangan senada */
        }

        .hero button {
            margin-top: 2.5rem;
            background-color: #873e23; /* Warna utama */
            color: #ffffff; /* Warna teks putih agar kontras */
            font-weight: 700;
            font-size: 1.125rem;
            padding: 0.75rem 2.5rem;
            border-radius: 0.75rem;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
            box-shadow: 0 5px 15px rgba(135, 62, 35, 0.4); /* Bayangan senada */

        }
        .hero button:hover,
        .hero button:focus {
            background-color: #a64a2c; /* Versi lebih terang dari #873e23 */
            outline: none;
        }

        /* Teacher Management Card */
        .card {
            background: white;
            border-radius: 0.75rem;
            box-shadow: 0 4px 8px rgb(0 0 0 / 0.05);
            padding: 2.5rem 2rem;
            margin-top: 3rem;
        }
        .card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
            flex-wrap: wrap;
            gap: 1rem;
        }
        .card-header h2 {
            font-weight: 700;
            font-size: 1.75rem;
            color: #111827;
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }
        .icon-teacher {
            width: 32px;
            height: 32px;
            stroke: #374151;
            stroke-width: 1.8;
            fill: none;
            stroke-linecap: round;
            stroke-linejoin: round;
        }
        .btn-add {
            background-color: #111827;
            color: white;
            font-weight: 600;
            padding: 0.5rem 1.5rem;
            font-size: 1rem;
            border-radius: 0.75rem;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            white-space: nowrap;
        }
        .btn-add:hover,
        .btn-add:focus {
            background-color: #4b5563;
            outline: none;
        }
        .btn-add svg {
            stroke: white;
            stroke-width: 2;
        }

        /* Search input */
        .search-wrapper {
            flex-grow: 1;
            max-width: 320px;
            position: relative;
        }
        .search-wrapper label {
            position: absolute;
            left: 12px;
            top: 50%;
            transform: translateY(-50%);
            color: #9ca3af;
            pointer-events: none;
            font-size: 1rem;
        }
        .search-input {
            width: 100%;
            padding: 0.5rem 0.5rem 0.5rem 2.5rem;
            font-size: 1rem;
            border: 1.5px solid #d1d5db;
            border-radius: 0.75rem;
            color: #374151;
            transition: border-color 0.3s ease;
        }
        .search-input:focus {
            outline: none;
            border-color: #111827;
            box-shadow: 0 0 6px 1px rgba(17,24,39, 0.3);
        }
        .search-icon {
            position: absolute;
            left: 8px;
            top: 50%;
            width: 20px;
            height: 20px;
            stroke: #9ca3af;
            stroke-width: 2;
            transform: translateY(-50%);
            pointer-events: none;
        }

        /* Teacher Table */
        .table-wrapper {
            width: 100%;
            overflow-x: auto;
            -webkit-overflow-scrolling: touch; /* untuk smooth scrolling di iOS */
            border-radius: 0.5rem; /* opsional supaya agak rounded */
        /* Bisa juga tambahkan padding bawah jika ingin */
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 600px; /* buat tabel minimal lebar agar scroll muncul saat perlu */
        }
        thead tr {
            background: transparent;
        }
        th, td {
            border-bottom: 1px solid #ddd;
            white-space: nowrap; /* agar konten kolom tidak wrap */
            text-align: left;
            padding: 1rem 1rem 1rem 1.25rem;
            font-weight: 600;
            font-size: 1rem;
            color: #4b5563;
            vertical-align: middle;
        }
        tbody tr {
            background: #f9fafb;
            border-radius: 0.75rem;
            box-shadow: 0 1px 2px rgb(0 0 0 / 0.05);
            transition: background-color 0.3s ease;
        }
        tbody tr:hover {
            background-color: #e5e7eb;
        }
        tbody td {
            font-weight: 500;
            color: #374151;
            padding-left: 1.5rem;
        }

        /* Action buttons in table */
        .btn-action {
            background: transparent;
            border: none;
            cursor: pointer;
            padding: 0.25rem;
            margin-left: 0.5rem;
            border-radius: 0.5rem;
            transition: background-color 0.3s ease;
        }
        .btn-action:focus,
        .btn-action:hover {
            background-color: #d1d5db;
            outline: none;
        }
        .btn-action svg {
            width: 20px;
            height: 20px;
            stroke: #6b7280;
            stroke-width: 1.8;
            stroke-linecap: round;
            stroke-linejoin: round;
        }
        .btn-action:hover svg,
        .btn-action:focus svg {
            stroke: #111827;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .hero h1 {
                font-size: 2.5rem;
            }
            .card-header h2 {
                font-size: 1.5rem;
                flex-basis: 100%;
            }
            th, td {
                font-size: 0.9rem;
                padding: 0.75rem 0.75rem 0.75rem 1rem;
            }
            .search-wrapper {
                max-width: 100%;
                flex-grow: 1;
            }
            .btn-add {
                flex-shrink: 0;
            }
        }
    </style>

    <main class="container" role="main">
        <section class="hero" aria-label="Page introduction">
            <h1>Manajemen Guru</h1>
            <p>Kelola data guru MA Quantum IDEA</p>
            <button type="button" aria-label="Add new teacher" id="addTeacherBtn">Lihat Guru</button>
        </section>

        <section id="tableSection" class="card" aria-labelledby="teacher-management-title">
            <div class="card-header">
                <h2 id="teacher-management-title">
                    <svg class="icon-teacher" viewBox="0 0 24 24" aria-hidden="true" focusable="false">
                      <circle cx="12" cy="7" r="4"></circle>
                      <path d="M5.5 21a7.5 7.5 0 0 1 13 0"></path>
                    </svg>
                    Daftar Guru
                </h2>
                <div class="search-wrapper">
                    {{-- <label for="teacherSearchInput">Cari Guru</label> --}}
                    <input type="search" id="teacherSearchInput" class="search-input" placeholder="Cari berdasarkan nama, mata pelajaran, atau email" aria-describedby="teacherSearchDesc" aria-label="Cari guru" autocomplete="off" />
                    <svg class="search-icon" viewBox="0 0 24 24" fill="none" aria-hidden="true" focusable="false">
                        <circle cx="11" cy="11" r="7" stroke="currentColor" stroke-width="2"/>
                        <line x1="16.6569" y1="16.6569" x2="21" y2="21" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                    </svg>
                </div>
                <button class="btn-add" type="button" id="addTeacherBtn2" aria-label="Add new teacher">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" width="20" height="20" aria-hidden="true" focusable="false">
                        <line x1="12" y1="5" x2="12" y2="19" />
                        <line x1="5" y1="12" x2="19" y2="12" />
                    </svg>
                    Tambah Guru
                </button>
            </div>

            <div class="table-wrapper" style="overflow-x: auto;">
  <table role="table" aria-describedby="teacher-management-title">
      <thead>
          <tr>
              <th scope="col" id="th-no">No</th>
              <th scope="col" id="th-name">Nama</th>
              <th scope="col" id="th-email">Email</th>
              <th scope="col" id="th-role">Role</th>
              <th scope="col" id="th-actions">Aksi</th>
          </tr>
      </thead>
      <tbody id="teacherTableBody">
          <!-- Rows inserted by JS -->
      </tbody>
  </table>
</div>

        </section>
    </main>

    <script>
        (() => {
            // Sample initial data
            let teachers = [
                @foreach ($user as $no =>$item)
                    { no: '{{ $item->id }}', name: '{{ $item->name }}', role: '{{ $item->role }}', email: '{{ $item->email }}' },
                @endforeach
            ];

            let filteredTeachers = [...teachers];

            const tableBody = document.getElementById('teacherTableBody');
            const searchInput = document.getElementById('teacherSearchInput');

            // Render table rows
            function renderTeachers() {
                tableBody.innerHTML = '';
                if (filteredTeachers.length === 0) {
                    const tr = document.createElement('tr');
                    const td = document.createElement('td');
                    td.colSpan = 4;
                    td.style.textAlign = 'center';
                    td.style.fontStyle = 'italic';
                    td.style.color = '#9ca3af';
                    td.textContent = 'Data guru tidak ditemukan.';
                    tr.appendChild(td);
                    tableBody.appendChild(tr);
                    return;
                }
                filteredTeachers.forEach(teacher => {
                    const tr = document.createElement('tr');

                    // Nomor
                    const tdNo = document.createElement('td');
                    tdNo.textContent = teacher.no;
                    tdNo.setAttribute('data-label', 'No');
                    tr.appendChild(tdNo);

                    // Name
                    const tdName = document.createElement('td');
                    tdName.textContent = teacher.name;
                    tdName.setAttribute('data-label', 'Nama');
                    tr.appendChild(tdName);

                    // Email
                    const tdEmail = document.createElement('td');
                    tdEmail.textContent = teacher.email;
                    tdEmail.setAttribute('data-label', 'Email');
                    tr.appendChild(tdEmail);

                    // Role
                    const tdRole = document.createElement('td');
                    tdRole.textContent = teacher.role;
                    tdRole.setAttribute('data-label', 'Role');
                    tr.appendChild(tdRole);

                    // Actions
                    const tdActions = document.createElement('td');
                    tdActions.setAttribute('data-label', 'Aksi');

                    // Edit button
                    const btnEdit = document.createElement('button');
                    btnEdit.className = 'btn-action';
                    btnEdit.title = 'Edit';
                    btnEdit.setAttribute('aria-label', `Edit ${teacher.name}`);
                    btnEdit.innerHTML = `
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5h2m-1-1v2m-8 8v6a2 2 0 002 2h6l5-5 4-4-5-5-4 4z"/>
                        </svg>
                    `;
                    btnEdit.addEventListener('click', () => editTeacher(teacher.id));
                    tdActions.appendChild(btnEdit);

                    // Detail
                    const btnDetail = document.createElement('button');
                    btnDetail.className = 'btn-action';
                    btnDetail.title = 'Detail';
                    btnDetail.setAttribute('aria-label', `Detail ${teacher.name}`);
                    btnDetail.innerHTML = `
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        </svg>
                    `;
                    function detailGuru(){
                        window.location.href = `/detail_guru-${teacher.no}`;
                    }
                    btnDetail.addEventListener('click', detailGuru);
                    tdActions.appendChild(btnDetail);

                    // Delete button
                    const btnDelete = document.createElement('button');
                    btnDelete.className = 'btn-action';
                    btnDelete.title = 'Hapus';
                    btnDelete.setAttribute('aria-label', `Hapus ${teacher.name}`);
                    btnDelete.innerHTML = `
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    `;
                    btnDelete.addEventListener('click', () => deleteTeacher(teacher.id));
                    tdActions.appendChild(btnDelete);

                    tr.appendChild(tdActions);
                    tableBody.appendChild(tr);
                });
            }

            // Add / Edit form prompt
            function promptTeacherData(existing = null) {
                const name = prompt('Masukkan nama guru:', existing ? existing.name : '');
                if (name === null) return null;
                const subject = prompt('Masukkan mata pelajaran:', existing ? existing.subject : '');
                if (subject === null) return null;
                const email = prompt('Masukkan email:', existing ? existing.email : '');
                if (email === null) return null;
                return { name: name.trim(), subject: subject.trim(), email: email.trim() };
            }

            // Add new teacher
            function scrollTeacher() {
                const target = document.getElementById("tableSection");
                    if (target) {
                        target.scrollIntoView({ behavior: "smooth" });
                    }
            }

            function addTeacher() {
                alert('hai');
            }

            // Edit teacher by ID
            function editTeacher(id) {
                const teacher = teachers.find(t => t.id === id);
                if (!teacher) return;
                const data = promptTeacherData(teacher);
                if (!data) return;
                if (!data.name || !data.subject || !data.email) {
                    alert('Data tidak lengkap, edit guru dibatalkan.');
                    return;
                }
                teacher.name = data.name;
                teacher.subject = data.subject;
                teacher.email = data.email;
                applyFilter();
            }

            // Delete teacher by ID
            function deleteTeacher(id) {
                if (confirm('Apakah Anda yakin ingin menghapus guru ini?')) {
                    teachers = teachers.filter(t => t.id !== id);
                    applyFilter();
                }
            }

            // Filter teachers based on search input
            function applyFilter() {
                const query = searchInput.value.trim().toLowerCase();
                if (!query) {
                    filteredTeachers = [...teachers];
                } else {
                    filteredTeachers = teachers.filter(t => (
                        t.name.toLowerCase().includes(query) ||
                        t.email.toLowerCase().includes(query) ||
                        t.role.toLowerCase().includes(query)
                    ));
                }
                renderTeachers();
            }

            // Bind buttons
            document.getElementById('addTeacherBtn').addEventListener('click', scrollTeacher);
            document.getElementById('addTeacherBtn2').addEventListener('click', addTeacher);

            // Bind search input
            searchInput.addEventListener('input', () => {
                applyFilter();
            });

            // Initial render
            renderTeachers();
        })();
    </script>
</x-layout>

