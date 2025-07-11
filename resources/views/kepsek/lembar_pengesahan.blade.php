<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Lembar Pengesahan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 50px;
        }
        .header {
            text-align: center;
            line-height: 1.5;
        }
        .kop {
            font-weight: bold;
            text-transform: uppercase;
        }
        .content {
            margin-top: 80px;
            text-align: justify;
        }
        .signature {
            margin-top: 260px;
            width: 100%;
            display: flex;
            justify-content: flex-end;
        }
        .signature-block {
            text-align: left;
        }
        hr {
            border: none;
            border-top: 3px solid #222;
            margin: 24px 0;
        }
        .signature-block {
            position: relative;
            min-height: 180px;
        }
        .ttd-nama {
            position: relative;
            z-index: 3;
            text-align: left;
        }
        .signature-qr {
            display: flex;
            justify-content: left;
            align-items: center;
            margin: 16px 0 8px 0;
            position: static;
            width: 120px;
            height: 120px;
        }
        .btn-print {
            display: inline-block;
            padding: 8px 18px;
            background: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            font-size: 1rem;
            cursor: pointer;
            margin-bottom: 18px;
        }
        .btn-print:hover {
            background: #0056b3;
        }

        
        @media print {
            body {
                margin: 0;
                font-size: 11pt;
                background: none !important;
            }
            .header img {
                width: 80px !important;
                height: 90px !important;
                margin-bottom: 5px !important;
                margin-top: 50px !important;
            }
            .header, .kop, .content, .signature, .signature-block {
                color: #000 !important;
                background: none !important;
                box-shadow: none !important;
                border: none !important;
            }
            .content {
                margin-top: 50px;
            }
            .signature {
                margin-top: 100px;
            }
            /* Hilangkan tombol, input, dan elemen interaktif lain jika ada */
            button, .sig-btns, #signature-pad, #signature-result, #qrcode {
                display: none !important;
            }
            hr {
                border-top: 2px solid #000 !important;
            }
            .signature-img {
                opacity: 1 !important;
            }
            .signature-qr {
                opacity: 1 !important;
            }
            .btn-print {
                display: none !important;
            }
        }
    </style>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
</head>
<body>
<button class="btn-print" onclick="downloadPDF()">Unduh PDF</button>
    <div id="pengesahan-area">
        <div class="header">
            <img src="{{ asset('img/icon-quantum.png') }}" alt="Logo" style="width: 100px; height: 115px; margin-bottom: 10px; margin-top: 50px;">
            <div class="kop">YAYASAN QUANTUM ISLAMIC DEVELOPMENT ENTERPRENEURSHIP AREA</div>
            <div class="kop">MADRASAH ALIYAH (MA) QUANTUM IDEA</div>
            <div>Jl. Camar, No. 101, Rt. 03, Rw. 07, Kel. Jatiraden, Kec. Jatisampurna, Kota Bekasi, 17433</div>
            <div>Telp. 021-2281-3215 | Email: quantumislamicdea@gmail.com | Website: quantumidea.id</div>
            <div>No. Izin Operasional: 0052/IPM/2017 | NSM: 131232750027 | NPSN: 69976366</div>
            <hr>
            <h2 style="margin-top: 50px;">LEMBAR PENGESAHAN</h2>
        </div>
        <div class="content">
            <p>Buku Kerja Guru ini disusun sebagai panduan pelaksanaan tugas profesional guru Madrasah Aliyah (MA) Quantum Idea dalam rangka meningkatkan mutu pembelajaran, administrasi kelas, dan layanan pendidikan kepada peserta didik. Dokumen ini memuat perangkat perencanaan pembelajaran, penilaian, program pengembangan diri, serta administrasi pendukung lain sesuai ketentuan yang berlaku.</p>
            <p>Dengan ini, Buku Kerja Guru Tahun Pelajaran 2023/2024 disahkan untuk digunakan sebagai acuan resmi di lingkungan MA Quantum Idea.</p>
        </div>
        <div class="signature">
            <div class="signature-block">
                <p>Ditetapkan di: Kota Bekasi</p>
                <p>Pada tanggal: 10 Juli 2023</p>
                <p><strong>Kepala Madrasah,</strong></p>
                <div id="signature-qr" class="signature-qr"></div>
                <p class="ttd-nama"><strong>H. M. Amin Tahmid, S. Ag. MM.</strong></p>
                <p class="ttd-nip">NIP: 196710212005011001</p>
            </div>
        </div>
    </div>
<script>
window.addEventListener('DOMContentLoaded', function() {
    var qrData = 'Nama: H. M. Amin Tahmid, S. Ag. MM.\nNIP: 196710212005011001';
    new QRCode(document.getElementById('signature-qr'), {
        text: qrData,
        width: 120,
        height: 120
    });
});

function downloadPDF() {
    const area = document.getElementById('pengesahan-area');
    html2canvas(area, { scale: 2 }).then(function(canvas) {
        const imgData = canvas.toDataURL('image/png');
        const pdf = new window.jspdf.jsPDF({
            orientation: 'portrait',
            unit: 'pt',
            format: 'a4'
        });

        const pageWidth = pdf.internal.pageSize.getWidth();
        const pageHeight = pdf.internal.pageSize.getHeight();

        const margin = 40; // margin kiri dan kanan
        const imgWidth = pageWidth - 2 * margin;
        const imgHeight = canvas.height * imgWidth / canvas.width;

        let y = 0;
        // if (imgHeight < pageHeight) {
        //     y = (pageHeight - imgHeight) / 2; // center secara vertikal jika tinggi kurang
        // }

        pdf.addImage(imgData, 'PNG', margin, y, imgWidth, imgHeight);
        pdf.save('lembar-pengesahan.pdf');
    });
}

</script>

</body>
</html>
