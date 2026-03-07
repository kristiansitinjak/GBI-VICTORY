<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8""")/>>
    <style>
        /* 1. Kunci ukuran halaman PDF agar benar-benar Landscape KTP */
        @page { 
            margin: 0; 
            size: 243.78pt 153.07pt landscape; 
        }
        
        body { 
            margin: 0; 
            padding: 0; 
            width: 243.78pt; 
            height: 153.07pt;
            font-family: 'Helvetica', sans-serif;
            overflow: hidden; /* Mencegah halaman kedua kosong */
        }

        /* 2. Container Utama dengan Background Gambar Anda */
        .card-container {
            width: 100%;
            height: 100%;
            position: relative;
            background-size: 100% 100%;
            background-image: url('{{ public_path("assets/img/bg-kta2.png") }}');
            background-repeat: no-repeat;
        }

        /* 3. Pita Merah di Tengah */
        .red-banner {
            position: absolute;
            top: 50%; /* Letakkan tepat di tengah vertikal */
            left: 0;
            width: 100%;
            height: 40px;
            background-color: rgba(255, 255, 255, 0.35); /* Merah transparan sedikit agar elegan */
            transform: translateY(-50%); /* Geser ke atas setengah tinggi pita */
            z-index: 10;
        }

        .nama-jemaat {
            color: #ffffff;
            font-size: 12pt;
            font-weight: bold;
            text-align: center;
            margin: 0;
            padding-top: 10px;
            letter-spacing: 1px;
        }

        .sub-title {
            color: #ffffff;
            font-size: 6pt;
            text-align: right;
            margin-right: 15px;
            margin-top: -3px;
        }

        /* 4. Info Detail di Bagian Bawah */
        .info-bottom {
            position: absolute;
            bottom: 15px;
            left: 20px;
            font-size: 10pt;
            color: #ffffff; /* Ganti ke #fff jika background gambar Anda gelap */
            line-height: 1.3;
        }

        /* 5. Nomor KTA di Pojok Atas */
        .nomor-id {
            position: absolute;
            top: 10px;
            right: 15px;
            font-size: 7pt;
            color: #ffffff00;
        }
    </style>
</head>
<body>
    <div class="card-container">
        <!-- Nomor KTA -->
        <div class="nomor-id">{{ $nomor_kta }}</div>

        <!-- Pita Merah Tengah -->
        <div class="red-banner">
            <div class="nama-jemaat">{{ $jemaat->namakeluarga }}</div>
            <div class="sub-title">ANGGOTA JEMAAT AKTIF</div>
        </div>

        <!-- Detail Jemaat -->
        <div class="info-bottom">
            Sektor: {{ $jemaat->sektor }}<br>
            Alamat: {{ \Illuminate\Support\Str::limit($jemaat->alamat, 45) }}<br>
            Telp: {{ $jemaat->telepon ?? '-' }}
        </div>
    </div>
</body>
</html>
