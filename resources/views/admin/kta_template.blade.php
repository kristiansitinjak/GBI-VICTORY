<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <style>
        @page {
            margin: 8mm 10mm;
            size: A4 landscape;
        }

        * { box-sizing: border-box; }

        body {
            font-family: 'DejaVu Sans', Arial, sans-serif;
            font-size: 7pt;
            color: #000;
            margin: 0;
            padding: 0;
        }

        /* ══════════════════════════════
           PAGE BREAK
        ══════════════════════════════ */
        .page-break {
            page-break-after: always;
        }

        /* ══════════════════════════════
           HALAMAN 1 - DEPAN
        ══════════════════════════════ */

        /* Border luar kartu */
        .halaman-depan {
            width: 100%;
            padding: 5mm;
        }

        /* Header halaman depan */
        .depan-header {
            display: table;
            width: 100%;
            border-bottom: 1.5pt solid #000;
            padding-bottom: 3mm;
            margin-bottom: 4mm;
        }
        .depan-logo {
            display: table-cell;
            width: 20mm;
            vertical-align: middle;
            text-align: center;
        }
        .depan-logo img {
            height: 18mm;
            width: auto;
        }
        .depan-judul {
            display: table-cell;
            vertical-align: middle;
            text-align: center;
        }
        .depan-judul .kkj-title {
            font-size: 13pt;
            font-weight: bold;
            letter-spacing: 1pt;
        }
        .depan-judul .kkj-sub {
            font-size: 10pt;
            font-weight: bold;
            letter-spacing: 0.5pt;
        }
        .depan-judul .kkj-gereja {
            font-size: 8pt;
            margin-top: 1mm;
        }

        /* Nomor KKJ */
        .nomor-kkj {
            display: table;
            width: 100%;
            margin-bottom: 4mm;
        }
        .nomor-kkj-left {
            display: table-cell;
            width: 50%;
            font-size: 7pt;
        }
        .nomor-kkj-right {
            display: table-cell;
            width: 50%;
            font-size: 7pt;
            text-align: right;
        }
        .nomor-box {
            border: 0.5pt solid #000;
            padding: 1mm 2mm;
            font-size: 7pt;
        }

        /* Info utama depan */
        .depan-body {
            display: table;
            width: 100%;
            margin-bottom: 5mm;
        }
        .depan-info {
            display: table-cell;
            width: 70%;
            vertical-align: top;
        }
        .depan-foto {
            display: table-cell;
            width: 30%;
            vertical-align: top;
            text-align: center;
            padding-left: 5mm;
        }
        .foto-box {
            border: 0.5pt solid #000;
            width: 30mm;
            height: 38mm;
            display: inline-block;
            text-align: center;
            font-size: 6pt;
            padding-top: 14mm;
            color: #555;
        }
        .foto-label {
            font-size: 6pt;
            color: #555;
            margin-top: 1mm;
        }

        /* Baris info */
        .info-row {
            display: table;
            width: 100%;
            margin-bottom: 2mm;
        }
        .info-no {
            display: table-cell;
            width: 5mm;
            font-size: 7pt;
            vertical-align: top;
        }
        .info-label {
            display: table-cell;
            width: 30mm;
            font-size: 7pt;
            vertical-align: top;
        }
        .info-colon {
            display: table-cell;
            width: 3mm;
            font-size: 7pt;
            vertical-align: top;
        }
        .info-value {
            display: table-cell;
            font-size: 7pt;
            vertical-align: top;
            border-bottom: 0.5pt solid #000;
            padding-bottom: 0.5mm;
        }

        /* Anggota FA */
        .anggota-fa {
            margin-bottom: 4mm;
        }
        .anggota-fa-label {
            font-size: 7pt;
            font-weight: bold;
            margin-bottom: 1mm;
        }
        .anggota-fa-box {
            border: 0.5pt solid #000;
            padding: 1.5mm 2mm;
            font-size: 7pt;
            min-height: 8mm;
        }

        /* TTD halaman depan */
        .depan-ttd {
            display: table;
            width: 100%;
            margin-top: 5mm;
            border-top: 0.5pt solid #000;
            padding-top: 3mm;
        }
        .depan-ttd-left {
            display: table-cell;
            width: 50%;
            vertical-align: top;
            font-size: 6.5pt;
        }
        .depan-ttd-right {
            display: table-cell;
            width: 50%;
            vertical-align: top;
            text-align: center;
            font-size: 6.5pt;
        }
        .ttd-line {
            border-top: 0.5pt solid #000;
            width: 50mm;
            margin: 12mm auto 1mm auto;
        }

        /* Petunjuk */
        .petunjuk-box {
            border: 0.5pt solid #000;
            padding: 3mm;
            font-size: 6pt;
            line-height: 1.7;
            margin-top: 4mm;
        }
        .petunjuk-title {
            font-size: 7pt;
            font-weight: bold;
            text-align: center;
            margin-bottom: 2mm;
            text-transform: uppercase;
            letter-spacing: 0.5pt;
        }

        /* ══════════════════════════════
           HALAMAN 2 - BELAKANG (TABEL)
        ══════════════════════════════ */
        .halaman-belakang {
            width: 100%;
        }

        /* Header halaman belakang */
        .belakang-header {
            display: table;
            width: 100%;
            border-bottom: 1pt solid #000;
            padding-bottom: 2mm;
            margin-bottom: 3mm;
        }
        .belakang-header-left {
            display: table-cell;
            width: 70%;
            vertical-align: middle;
        }
        .belakang-header-right {
            display: table-cell;
            width: 30%;
            vertical-align: middle;
            text-align: right;
            font-size: 6.5pt;
        }
        .belakang-title {
            font-size: 10pt;
            font-weight: bold;
        }
        .belakang-sub {
            font-size: 6.5pt;
            color: #333;
        }

        /* Section title */
        .section-title {
            font-size: 7pt;
            font-weight: bold;
            border: 0.5pt solid #000;
            border-bottom: none;
            padding: 1mm 2mm;
            text-transform: uppercase;
            letter-spacing: 0.3pt;
        }
        .section-title.kk   { background: #d0d8f0; }
        .section-title.ps   { background: #d0ecd0; }
        .section-title.anak { background: #f0e4c8; }
        .section-title.lain { background: #e8d8f0; }

        /* Tabel */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 3mm;
            font-size: 6pt;
        }
        th, td {
            border: 0.5pt solid #000;
            padding: 1mm 0.8mm;
            text-align: center;
            vertical-align: middle;
        }
        th {
            font-weight: bold;
            font-size: 5.5pt;
            text-transform: uppercase;
        }
        th.kk-h   { background-color: #dce6f8; }
        th.ps-h   { background-color: #dcf0dc; }
        th.anak-h { background-color: #f8edd8; }
        th.lain-h { background-color: #ecdcf8; }

        td.td-left {
            text-align: left;
            padding-left: 1.5mm;
        }
        tr.baris-kosong td {
            height: 5mm;
        }

        /* TTD halaman belakang */
        .belakang-ttd {
            display: table;
            width: 100%;
            margin-top: 3mm;
            border-top: 0.5pt solid #000;
            padding-top: 2mm;
        }
        .belakang-ttd-left {
            display: table-cell;
            width: 55%;
            vertical-align: bottom;
            font-size: 6pt;
            color: #555;
        }
        .belakang-ttd-right {
            display: table-cell;
            width: 45%;
            vertical-align: top;
            text-align: center;
            font-size: 6.5pt;
        }
        .ttd-line-right {
            border-top: 0.5pt solid #000;
            width: 55mm;
            margin: 12mm auto 1mm auto;
        }
    </style>
</head>
<body>

{{-- ══════════════════════════════════════════════
     HALAMAN 1 — DEPAN
══════════════════════════════════════════════ --}}
<div class="halaman-depan">

    <!-- HEADER -->
    <div class="depan-header">
        <div class="depan-logo">
            <img src="{{ public_path('Template/img/logo-gbi-victory.png') }}">
        </div>
        <div class="depan-judul">
            <div class="kkj-title">KARTU KELUARGA JEMAAT (KKJ)</div>
            <div class="kkj-sub">GEREJA BETHEL INDONESIA</div>
            <div class="kkj-gereja">GBI Victory Sibolga</div>
        </div>
    </div>

    <!-- NOMOR KKJ -->
    <div class="nomor-kkj">
        <div class="nomor-kkj-left">
            <span class="nomor-box">
                NOMOR KKJ &nbsp;: &nbsp; {{ $keluarga->nomor_keluarga }} &nbsp;&nbsp;
                <em style="font-size:5.5pt; color:#666;">(isi petugas Gereja)</em>
            </span>
        </div>
        <div class="nomor-kkj-right">
            <span style="font-size:6pt; color:#555;">Halaman 1</span>
        </div>
    </div>

    <!-- BODY: INFO + FOTO -->
    <div class="depan-body">
        <div class="depan-info">

            <div class="info-row">
                <span class="info-label" style="font-weight:bold;">NAMA JEMAAT</span>
                <span class="info-colon">:</span>
                <span class="info-value">{{ $keluarga->namakeluarga }}</span>
            </div>
            <div class="info-row">
                <span class="info-label" style="font-weight:bold;">ALAMAT</span>
                <span class="info-colon">:</span>
                <span class="info-value">{{ $keluarga->alamat }}</span>
            </div>
            <div class="info-row">
                <span class="info-label" style="font-weight:bold;">KELURAHAN/DESA</span>
                <span class="info-colon">:</span>
                <span class="info-value">&nbsp;</span>
            </div>
            <div class="info-row">
                <span class="info-label" style="font-weight:bold;">KECAMATAN</span>
                <span class="info-colon">:</span>
                <span class="info-value">&nbsp;</span>
            </div>
            <div class="info-row">
                <span class="info-label" style="font-weight:bold;">KB/KOTA</span>
                <span class="info-colon">:</span>
                <span class="info-value">&nbsp;</span>
            </div>
            <div class="info-row">
                <span class="info-label" style="font-weight:bold;">TELEPON/HP</span>
                <span class="info-colon">:</span>
                <span class="info-value">{{ $keluarga->telepon ?? '-' }}</span>
            </div>
            <div class="info-row">
                <span class="info-label" style="font-weight:bold;">SEKTOR / WIJK</span>
                <span class="info-colon">:</span>
                <span class="info-value">{{ $keluarga->sektor }}</span>
            </div>
            <div class="info-row">
                <span class="info-label" style="font-weight:bold;">ANGGOTA FA DI</span>
                <span class="info-colon">:</span>
                <span class="info-value">&nbsp;</span>
            </div>

        </div>
        <div class="depan-foto">
            <div class="foto-box">Pas Foto<br>3 x 4</div>
            <div class="foto-label">Pas Photo 3x4</div>
        </div>
    </div>

    <!-- TTD HALAMAN DEPAN -->
    <div class="depan-ttd">
        <div class="depan-ttd-left">
            <strong>Petunjuk Pengisian Kartu Keluarga Jemaat (KKJ)</strong><br>
            Yang mengisi KKJ adalah formulir untuk menjadi anggota terdaftar di GBI.<br>
            Pada saat menyerahkan formulir KKJ ini ke Petugas Gereja, diharapkan:<br>
            &nbsp;&nbsp;a. Bagi jemaat yang SUDAH memiliki kartu anggota gereja, menyerahkan fotocopi kartu anggota masing-masing<br>
            &nbsp;&nbsp;b. Bagi jemaat yang BELUM memiliki kartu anggota jemaat, harap menyerahkan pas photo 3x4 cm (2 lembar), fotocopy akte
            baptisan (bila sudah dibaptis) dan surat keterangan pindah atau keluar dari gereja lama<br>
            Satu keluarga/satu rumah cukup mengisi 1 (satu) lembar KKJ saja<br>
            Siapa saja yang sudah memenuhi ketentuan nomor 1 diatas (tidak harus kepala keluarga atau sudah berkeluarga) bisa
            mengisi dan menyerahkan formulir KKJ ini<br>
            Semua jiwa / orang yang ada di alamat KKJ, termasuk mereka yang belum menjadi ANAK TUHAN, dicantumkan dihalaman
            pengisian data (halaman 2)<br>
            Data yang meminta KKJ (yang tercantum di halaman 1) dituliskan dibaris pertama (nomor 1)
        </div>
        <div class="depan-ttd-right">
            Sibolga, {{ date('d F Y') }}<br>
            Tanda tangan<br>
            <div class="ttd-line"></div>
            {{ $keluarga->namakeluarga }}<br>
            <small style="font-size:5.5pt;">Nama lengkap</small>
        </div>
    </div>

</div>

{{-- PAGE BREAK --}}
<div class="page-break"></div>

{{-- ══════════════════════════════════════════════
     HALAMAN 2 — BELAKANG (TABEL DATA)
══════════════════════════════════════════════ --}}
<div class="halaman-belakang">

    <!-- HEADER BELAKANG -->
    <div class="belakang-header">
        <div class="belakang-header-left">
            <div class="belakang-title">Kartu Keluarga Jemaat — Data Anggota</div>
            <div class="belakang-sub">GBI Victory Sibolga &nbsp;|&nbsp; KKJ : {{ $keluarga->nomor_keluarga }}</div>
        </div>
        <div class="belakang-header-right">
            Halaman 2
        </div>
    </div>

    @php
        $kk       = $keluarga->anggota->firstWhere('hubungan_keluarga', 'Kepala Keluarga');
        $pasangan = $keluarga->anggota->firstWhere('hubungan_keluarga', 'Pasangan');
        $anakList = $keluarga->anggota->where('hubungan_keluarga', 'Anak')->values();

        $pendidikanMap = [
            'SD'                   => 'SD',
            'SMP/SLTP'             => 'SMP',
            'SMA/SLTA'             => 'SMA',
            'Akademi'              => 'Akd',
            'Universitas/Institut' => 'Univ',
            'TK'                   => 'TK',
        ];

        // Kolom header tabel (sama untuk 3 tabel)
        $cols = ['No.','Nama Lengkap (Sesuai KTP)','Tempat Lahir','Tgl Lahir (Tgl/Bln/Thn)','Jenis Kelamin (L/P)','Pendidikan','Pekerjaan','No. HP','Diserahkan (Tgl/Bln/Thn)','Dibaptis (Tgl/Bln/Thn)','Nikah (Tgl/Bln/Thn)'];
    @endphp

    <!-- ══ A. KEPALA KELUARGA ══ -->
    <div class="section-title kk">A. Kepala Keluarga</div>
    <table>
        <thead>
            <tr>
                <th class="kk-h" style="width:5mm;">No.</th>
                <th class="kk-h" style="width:42mm;">Nama Lengkap<br>(Sesuai KTP)</th>
                <th class="kk-h" style="width:18mm;">Tempat Lahir</th>
                <th class="kk-h" style="width:16mm;">Tgl Lahir<br>(Tgl/Bln/Thn)</th>
                <th class="kk-h" style="width:10mm;">Jenis<br>Kelamin<br>(L/Pr)</th>
                <th class="kk-h" style="width:14mm;">Pendidikan</th>
                <th class="kk-h">Pekerjaan</th>
                <th class="kk-h" style="width:20mm;">No. HP</th>
                <th class="kk-h" style="width:16mm;">Diserahkan<br>(Tgl/Bln/Thn)</th>
                <th class="kk-h" style="width:16mm;">Dibaptis<br>(Tgl/Bln/Thn)</th>
                <th class="kk-h" style="width:16mm;">Nikah<br>(Tgl/Bln/Thn)</th>
            </tr>
        </thead>
        <tbody>
            @if($kk)
            <tr>
                <td>1</td>
                <td class="td-left">{{ $kk->nama_lengkap }}</td>
                <td class="td-left">{{ $kk->tempat_lahir ?? '-' }}</td>
                <td>{{ $kk->tanggal_lahir ? date('d/m/Y', strtotime($kk->tanggal_lahir)) : '-' }}</td>
                <td>{{ $kk->jenis_kelamin }}</td>
                <td>{{ $pendidikanMap[$kk->pendidikan] ?? ($kk->pendidikan ?? '-') }}</td>
                <td class="td-left">{{ $kk->pekerjaan ?? '-' }}</td>
                <td>{{ $kk->no_hp ?? ($keluarga->telepon ?? '-') }}</td>
                <td></td>
                <td>{{ $kk->tgl_baptis ? date('d/m/Y', strtotime($kk->tgl_baptis)) : '-' }}</td>
                <td>{{ $kk->tgl_nikah ? date('d/m/Y', strtotime($kk->tgl_nikah)) : '-' }}</td>
            </tr>
            @else
            <tr class="baris-kosong">
                <td>1</td><td></td><td></td><td></td><td></td>
                <td></td><td></td><td></td><td></td><td></td><td></td>
            </tr>
            @endif
        </tbody>
    </table>

    <!-- ══ B. PASANGAN ══ -->
    <div class="section-title ps">B. Pasangan (Istri / Suami)</div>
    <table>
        <thead>
            <tr>
                <th class="ps-h" style="width:5mm;">No.</th>
                <th class="ps-h" style="width:42mm;">Nama Lengkap<br>(Sesuai KTP)</th>
                <th class="ps-h" style="width:18mm;">Tempat Lahir</th>
                <th class="ps-h" style="width:16mm;">Tgl Lahir<br>(Tgl/Bln/Thn)</th>
                <th class="ps-h" style="width:10mm;">Jenis<br>Kelamin<br>(L/Pr)</th>
                <th class="ps-h" style="width:14mm;">Pendidikan</th>
                <th class="ps-h">Pekerjaan</th>
                <th class="ps-h" style="width:20mm;">No. HP</th>
                <th class="ps-h" style="width:16mm;">Diserahkan<br>(Tgl/Bln/Thn)</th>
                <th class="ps-h" style="width:16mm;">Dibaptis<br>(Tgl/Bln/Thn)</th>
                <th class="ps-h" style="width:16mm;">Nikah<br>(Tgl/Bln/Thn)</th>
            </tr>
        </thead>
        <tbody>
            @if($pasangan)
            <tr>
                <td>1</td>
                <td class="td-left">{{ $pasangan->nama_lengkap }}</td>
                <td class="td-left">{{ $pasangan->tempat_lahir ?? '-' }}</td>
                <td>{{ $pasangan->tanggal_lahir ? date('d/m/Y', strtotime($pasangan->tanggal_lahir)) : '-' }}</td>
                <td>{{ $pasangan->jenis_kelamin }}</td>
                <td>{{ $pendidikanMap[$pasangan->pendidikan] ?? ($pasangan->pendidikan ?? '-') }}</td>
                <td class="td-left">{{ $pasangan->pekerjaan ?? '-' }}</td>
                <td>{{ $pasangan->no_hp ?? '-' }}</td>
                <td></td>
                <td>{{ $pasangan->tgl_baptis ? date('d/m/Y', strtotime($pasangan->tgl_baptis)) : '-' }}</td>
                <td>{{ $pasangan->tgl_nikah ? date('d/m/Y', strtotime($pasangan->tgl_nikah)) : '-' }}</td>
            </tr>
            @else
            <tr class="baris-kosong">
                <td>1</td><td></td><td></td><td></td><td></td>
                <td></td><td></td><td></td><td></td><td></td><td></td>
            </tr>
            @endif
        </tbody>
    </table>

    <!-- ══ C. ANAK ══ -->
    <div class="section-title anak">C. Anak</div>
    <table>
        <thead>
            <tr>
                <th class="anak-h" style="width:5mm;">No.</th>
                <th class="anak-h" style="width:42mm;">Nama Lengkap<br>(Sesuai KTP)</th>
                <th class="anak-h" style="width:18mm;">Tempat Lahir</th>
                <th class="anak-h" style="width:16mm;">Tgl Lahir<br>(Tgl/Bln/Thn)</th>
                <th class="anak-h" style="width:10mm;">Jenis<br>Kelamin<br>(L/Pr)</th>
                <th class="anak-h" style="width:14mm;">Pendidikan</th>
                <th class="anak-h">Pekerjaan</th>
                <th class="anak-h" style="width:20mm;">No. HP</th>
                <th class="anak-h" style="width:16mm;">Diserahkan<br>(Tgl/Bln/Thn)</th>
                <th class="anak-h" style="width:16mm;">Dibaptis<br>(Tgl/Bln/Thn)</th>
                <th class="anak-h" style="width:16mm;">Nikah<br>(Tgl/Bln/Thn)</th>
            </tr>
        </thead>
        <tbody>
            @forelse($anakList as $idx => $anak)
            <tr>
                <td>{{ $idx + 1 }}</td>
                <td class="td-left">{{ $anak->nama_lengkap }}</td>
                <td class="td-left">{{ $anak->tempat_lahir ?? '-' }}</td>
                <td>{{ $anak->tanggal_lahir ? date('d/m/Y', strtotime($anak->tanggal_lahir)) : '-' }}</td>
                <td>{{ $anak->jenis_kelamin }}</td>
                <td>{{ $pendidikanMap[$anak->pendidikan] ?? ($anak->pendidikan ?? '-') }}</td>
                <td class="td-left">{{ $anak->pekerjaan ?? '-' }}</td>
                <td>{{ $anak->no_hp ?? '-' }}</td>
                <td></td>
                <td>{{ $anak->tgl_baptis ? date('d/m/Y', strtotime($anak->tgl_baptis)) : '-' }}</td>
                <td>{{ $anak->tgl_nikah ? date('d/m/Y', strtotime($anak->tgl_nikah)) : '-' }}</td>
            </tr>
            @empty
            @endforelse
            {{-- Minimal 4 baris kosong --}}
            @for($i = $anakList->count(); $i < 4; $i++)
            <tr class="baris-kosong">
                <td>{{ $i + 1 }}</td><td></td><td></td><td></td><td></td>
                <td></td><td></td><td></td><td></td><td></td><td></td>
            </tr>
            @endfor
        </tbody>
    </table>

    <!-- ══ D. ORANG LAIN YANG TINGGAL SERUMAH ══ -->
    <div class="section-title lain">D. Orang Lain Yang Tinggal Serumah</div>
    <table>
        <thead>
            <tr>
                <th class="lain-h" style="width:5mm;">No.</th>
                <th class="lain-h">Nama Lengkap (Sesuai KTP)</th>
                <th class="lain-h" style="width:18mm;">Tempat Lahir</th>
                <th class="lain-h" style="width:16mm;">Tgl Lahir<br>(Tgl/Bln/Thn)</th>
                <th class="lain-h" style="width:10mm;">Jenis<br>Kelamin<br>(L/Pr)</th>
                <th class="lain-h" style="width:14mm;">Pendidikan</th>
                <th class="lain-h" style="width:25mm;">Pekerjaan</th>
            </tr>
        </thead>
        <tbody>
            @for($i = 0; $i < 4; $i++)
            <tr class="baris-kosong">
                <td>{{ $i + 1 }}</td><td></td><td></td><td></td><td></td><td></td><td></td>
            </tr>
            @endfor
        </tbody>
    </table>

    <!-- TTD HALAMAN BELAKANG -->
    <div class="belakang-ttd">
        <div class="belakang-ttd-left">
            Sibolga, {{ date('d F Y') }}<br>
            Tanda tangan Kepala Keluarga<br><br><br>
            <div style="border-top:0.5pt solid #000; width:50mm; margin-top:10mm; padding-top:1mm;">
                {{ $keluarga->namakeluarga }}
            </div>
        </div>
        <div class="belakang-ttd-right">
            Ketua FA Sektor ___________<br>
            <div class="ttd-line-right"></div>
            ___________________________
        </div>
    </div>

</div>

</body>
</html>