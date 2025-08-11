<x-layout>
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
        @media print {
            body * { visibility: hidden !important; }
            .print-area, .print-area * { visibility: visible !important; position: static !important; }
            .print-area { position: static !important; left: 0; top: 0; width: 100vw; background: white; }
            .no-print { display: none !important; }
            .d-md-block { display: block !important; }
            .d-md-none { display: none !important; }
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <!-- html2pdf.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
    <div class="app-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="dashboard-header text-center">
                    <h1>Progres Buku Kerja Guru</h1>
                    <p>Statistik dan progres dokumen buku kerja setiap guru</p>
                </div>
                <div class="mb-3 text-right no-print">
                    <button onclick="window.print()" class="btn btn-primary"><i class="fas fa-print"></i> Print</button>
                    <button onclick="downloadPDF()" class="btn btn-danger ml-2"><i class="fas fa-file-pdf"></i> Unduh PDF</button>
                </div>
                @if(!empty($tahunList))
                <div class="mb-4 text-center">
                    <form method="get" action="">
                        <label for="tahun" class="font-weight-bold mr-2">Tahun:</label>
                        <select name="tahun" id="tahun" onchange="this.form.submit()" class="form-control d-inline-block w-auto">
                            @foreach($tahunList as $tahun)
                                <option value="{{ $tahun }}" {{ $tahun == $tahunTerpilih ? 'selected' : '' }}>{{ $tahun }}</option>
                            @endforeach
                        </select>
                    </form>
                </div>
                @endif
                <div class="print-area">
                    <h2 class="text-center mb-4 d-none d-print-block">Laporan Buku Kerja Guru Tahun {{ $tahunTerpilih }}</h2>
                    <div class="mb-5">
                        <div class="card shadow-sm">
                            <div class="card-header bg-primary text-white">
                                <h5 class="mb-0">Tabel Progres Dokumen</h5>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table  table-sm">
                                        <thead>
                                            <tr>
                                                <th>Guru</th>
                                                <th>Total Dokumen</th>
                                                <th>Disetujui</th>
                                                <th>Ditolak</th>
                                                <th>Pending</th>
                                                <th>Disahkan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($progres as $row)
                                            <tr>
                                                <td>{{ $row['nama'] }}</td>
                                                <td>{{ $row['total'] }}</td>
                                                <td>{{ $row['approve'] }}</td>
                                                <td>{{ $row['decline'] }}</td>
                                                <td>{{ $row['pending'] }}</td>
                                                <td>{{ $row['validate'] }}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-5">
                        <div class="card shadow-sm">
                            <div class="card-header bg-success text-white">
                                <h5 class="mb-0">Progres Dokumen Guru Tahun {{ $tahunTerpilih }}</h5>
                            </div>
                            <div class="card-body">
                                <div class="d-none d-md-block">
                                    <canvas id="progresChart" height="120"></canvas>
                                </div>
                                <div class="d-block d-md-none text-center text-muted py-4" style="font-size:1.1rem;">
                                    <i class="fas fa-info-circle fa-lg mb-2"></i><br>
                                    Grafik muncul pada layar desktop
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            // Data untuk grafik
            const labels = @json(array_column($progres, 'nama'));
            const total = @json(array_column($progres, 'total'));
            const approve = @json(array_column($progres, 'approve'));
            const decline = @json(array_column($progres, 'decline'));
            const pending = @json(array_column($progres, 'pending'));
            const validate = @json(array_column($progres, 'validate'));
            const ctx = document.getElementById('progresChart').getContext('2d');
            window.progresChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: [
                        {
                            label: 'Total',
                            data: total,
                            backgroundColor: 'rgba(54, 162, 235, 0.7)',
                            borderColor: 'rgba(54, 162, 235, 1)',
                            borderWidth: 1
                        },
                        {
                            label: 'Disetujui',
                            data: approve,
                            backgroundColor: 'rgba(76, 175, 80, 0.7)',
                            borderColor: 'rgba(76, 175, 80, 1)',
                            borderWidth: 1
                        },
                        {
                            label: 'Ditolak',
                            data: decline,
                            backgroundColor: 'rgba(244, 67, 54, 0.7)',
                            borderColor: 'rgba(244, 67, 54, 1)',
                            borderWidth: 1
                        },
                        {
                            label: 'Pending',
                            data: pending,
                            backgroundColor: 'rgba(255, 193, 7, 0.7)',
                            borderColor: 'rgba(255, 193, 7, 1)',
                            borderWidth: 1
                        },
                        {
                            label: 'Disahkan',
                            data: validate,
                            backgroundColor: 'rgba(0, 0, 128, 0.7)', // navy
                            borderColor: 'rgba(0, 0, 128, 1)', // navy
                            borderWidth: 1
                        }
                    ]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'top',
                        },
                        title: {
                            display: true,
                            text: 'Progres Buku Kerja Guru'
                        },
                        tooltip: {
                            callbacks: {
                                label: function(context) {
                                    let label = context.dataset.label || '';
                                    if (label) {
                                        label += ': ';
                                    }
                                    // pastikan angka bulat
                                    if (Number.isFinite(context.parsed.y)) {
                                        label += Math.round(context.parsed.y);
                                    } else {
                                        label += context.parsed.y;
                                    }
                                    return label;
                                }
                            }
                        }
                    },
                    scales: {
                        x: {
                            stacked: true
                        },
                        y: {
                            beginAtZero: true,
                            stacked: true,
                            ticks: {
                                // pastikan angka bulat di sumbu y
                                callback: function(value) {
                                    return Number.isInteger(value) ? value : '';
                                },
                                    stepSize: 1
                            }
                        }
                    }
                }
            });

            // Fungsi download PDF
            function downloadPDF() {
                // Sembunyikan tombol print/pdf saat export
                document.querySelectorAll('.no-print').forEach(el => el.style.display = 'none');
                // Tampilkan judul print jika perlu
                document.querySelectorAll('.d-print-block').forEach(el => el.classList.remove('d-none'));
                // Render chart ke gambar agar masuk PDF
                const chartCanvas = document.getElementById('progresChart');
                if (window.progresChart) {
                    // Convert chart to image
                    const chartImg = document.createElement('img');
                    chartImg.src = window.progresChart.toBase64Image();
                    chartImg.style.maxWidth = '100%';
                    chartImg.style.margin = '20px 0';
                    chartCanvas.parentNode.insertBefore(chartImg, chartCanvas);
                    chartCanvas.style.display = 'none';
                }
                // Export area
                const element = document.querySelector('.print-area');
                html2pdf().set({
                    margin: 0.5,
                    filename: 'laporan-buku-kerja-guru-{{ $tahunTerpilih }}.pdf',
                    image: { type: 'jpeg', quality: 0.98 },
                    html2canvas: { scale: 2 },
                    jsPDF: { unit: 'in', format: 'a4', orientation: 'portrait' }
                }).from(element).save().then(() => {
                    // Kembalikan tampilan tombol dan chart
                    document.querySelectorAll('.no-print').forEach(el => el.style.display = '');
                    document.querySelectorAll('.d-print-block').forEach(el => el.classList.add('d-none'));
                    if (window.progresChart) {
                        chartCanvas.style.display = '';
                        if (chartCanvas.previousSibling.tagName === 'IMG') {
                            chartCanvas.parentNode.removeChild(chartCanvas.previousSibling);
                        }
                    }
                });
            }
        </script>
    </div>
</x-layout> 