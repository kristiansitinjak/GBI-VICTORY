<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <style>
        @page {
            margin: 10mm 8mm;
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

        /* ── JUDUL ── */
        .judul {
            text-align: center;
            font-size: 14pt;
            font-weight: bold;
            margin-bottom: 2mm;
        }

        .kode-kkj {
            text-align: center;
            font-size: 8pt;
            margin-bottom: 3mm;
        }

        /* ── INFO KELUARGA ── */
        .info-wrap {
            display: table;
            width: 100%;
            margin-bottom: 3mm;
        }

        .info-left {
            display: table-cell;
            width: 55%;
            vertical-align: top;
        }

        .info-right {
            display: table-cell;
            width: 45%;
            vertical-align: top;
            font-size: 6.5pt;
            padding-left: 5mm;
        }

        .info-row {
            display: table;
            width: 100%;
            margin-bottom: 1mm;
        }

        .info-label {
            display: table-cell;
            width: 25mm;
            font-weight: bold;
        }

        .info-colon {
            display: table-cell;
            width: 3mm;
        }

        .info-value {
            display: table-cell;
            border-bottom: 0.5pt solid #000;
            padding-bottom: 0.5mm;
        }

        /* ── TABEL 1: DATA ANGGOTA ── */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 3mm;
        }

        th, td {
            border: 0.5pt solid #000;
            padding: 1.5mm 1mm;
            text-align: center;
            vertical-align: middle;
            font-size: 6.5pt;
        }

        th {
            background-color: #e8e8e8;
            font-weight: bold;
            font-size: 6pt;
        }

        td.td-left {
            text-align: left;
            padding-left: 1.5mm;
        }

        /* Baris kosong untuk isi manual */
        .baris-kosong td {
            height: 6mm;
        }

        /* ── BAGIAN BAWAH ── */
        .bottom-wrap {
            display: table;
            width: 100%;
            margin-top: 2mm;
        }

        .keterangan {
            display: table-cell;
            width: 65%;
            vertical-align: top;
            font-size: 5.8pt;
            line-height: 1.5;
        }

        .foto-ttd {
            display: table-cell;
            width: 35%;
            vertical-align: top;
            text-align: right;
        }

        .foto-box {
            display: inline-block;
            border: 0.5pt solid #000;
            width: 28mm;
            height: 35mm;
            text-align: center;
            vertical-align: top;
            font-size: 6pt;
            padding-top: 5mm;
            margin-right: 3mm;
        }

        .ttd-box {
            display: inline-block;
            vertical-align: top;
            text-align: center;
            font-size: 6pt;
        }

        .ttd-line {
            border-top: 0.5pt solid #000;
            width: 40mm;
            margin-top: 15mm;
        }

        /* ── HELPER ── */
        .text-center { text-align: center; }
        .fw-bold { font-weight: bold; }
        .border-bottom-only { border: none; border-bottom: 0.5pt solid #000; }
    </style>
</head>
<body>

    <!-- JUDUL -->
    <div class="judul">Kartu Keluarga Jemaat</div>
    <div class="kode-kkj">
        Kode : KKJ {{ $keluarga->nomor_keluarga }} &nbsp;&nbsp;&nbsp; (*) diisi sekretariat
    </div>

    <!-- INFO KELUARGA -->
    <div class="info-wrap">
        <div class="info-left">
            <table style="border:none; margin:0; width:100%;">
                <tr>
                    <td style="border:none; width:22mm; font-weight:bold; padding:0.5mm 0;">Gereja Bethel Indonesia (GBI) Victory Sibolga</td>
                </tr>
            </table>
            <div class="info-row">
                <span class="info-label">Nama</span>
                <span class="info-colon">:</span>
                <span class="info-value">{{ $keluarga->namakeluarga }}</span>
            </div>
            <div class="info-row">
                <span class="info-label">Alamat</span>
                <span class="info-colon">:</span>
                <span class="info-value">{{ $keluarga->alamat }}</span>
            </div>
            <div class="info-row">
                <span class="info-label">Sektor</span>
                <span class="info-colon">:</span>
                <span class="info-value">{{ $keluarga->sektor }}</span>
            </div>
            <div class="info-row">
                <span class="info-label">Telepon</span>
                <span class="info-colon">:</span>
                <span class="info-value">{{ $keluarga->telepon ?? '-' }}</span>
            </div>
        </div>
        <div class="info-right">
            <strong>Catatan:</strong><br>
            1. Bila ada KESALAHAN atau PERUBAHAN data, mohon memberitahukan ke Sekretariat.<br>
            2. Untuk penggembalan dan pertumbuhan kerohanian, saudara dan keluarga disarankan bergabung dengan salah satu Community Of Love yang ada di wilayah saudara.
        </div>
    </div>

    <!-- TABEL 1: DATA IDENTITAS ANGGOTA -->
    <table>
        <thead>
            <tr>
                <th rowspan="2" style="width:6mm;">No.</th>
                <th rowspan="2" style="width:35mm;">Nama</th>
                <th rowspan="2" style="width:8mm;">Klm<br>(L/P)</th>
                <th rowspan="2" style="width:10mm;">Hklg<br>(1s/d7)</th>
                <th rowspan="2" style="width:10mm;">Status<br>(1s/d9)</th>
                <th rowspan="2" style="width:18mm;">TpLahir</th>
                <th rowspan="2" style="width:16mm;">Tgl Lahir</th>
                <th rowspan="2" style="width:14mm;">Terdft<br>sbg Jemaat</th>
                <th rowspan="2" style="width:10mm;">Jns<br>Pkrj</th>
                <th rowspan="2">Perusahaan / Alamat / Telp.</th>
                <th rowspan="2" style="width:12mm;">Penddk<br>(0 s/d 5)</th>
            </tr>
        </thead>
        <tbody>
            @php
                $hklgMap = [
                    'Kepala Keluarga' => '1-Suami',
                    'Pasangan'        => '2-Istri',
                    'Anak'            => '3-Anak',
                ];
                $pendidikanMap = [
                    'SD'        => '1',
                    'SMP/SLTP'  => '2',
                    'SMA/SLTA'  => '3',
                    'Akademi'   => '4',
                    'Universitas/Institut' => '5',
                    'TK'        => '0',
                ];
                $no = 1;
            @endphp

            @foreach($keluarga->anggota as $anggota)
            <tr>
                <td>{{ $no++ }}</td>
                <td class="td-left">{{ $anggota->nama_lengkap }}</td>
                <td>{{ $anggota->jenis_kelamin }}</td>
                <td>{{ $hklgMap[$anggota->hubungan_keluarga] ?? $anggota->hubungan_keluarga }}</td>
                <td>{{ $anggota->tgl_nikah ? '2' : '1' }}</td>
                <td class="td-left">{{ $anggota->tempat_lahir ?? '-' }}</td>
                <td>{{ $anggota->tanggal_lahir ? date('d/m/Y', strtotime($anggota->tanggal_lahir)) : '-' }}</td>
                <td>{{ $keluarga->created_at ? date('d/m/Y', strtotime($keluarga->created_at)) : '-' }}</td>
                <td>{{ $anggota->pekerjaan ? '-' : '-' }}</td>
                <td class="td-left">{{ $anggota->pekerjaan ?? '-' }}</td>
                <td>{{ $pendidikanMap[$anggota->pendidikan] ?? '-' }}</td>
            </tr>
            @endforeach

            {{-- Baris kosong sisa (minimal 8 baris total) --}}
            @for($i = $keluarga->anggota->count(); $i < 8; $i++)
            <tr class="baris-kosong">
                <td>&nbsp;</td>
                <td></td><td></td><td></td><td></td>
                <td></td><td></td><td></td><td></td>
                <td></td><td></td>
            </tr>
            @endfor
        </tbody>
    </table>

    <!-- TABEL 2: STATUS GEREJAWI -->
    <table>
        <thead>
            <tr>
                <th rowspan="2" style="width:6mm;">No.</th>
                <th colspan="3">Diserahkan</th>
                <th colspan="3">Baptisan Selam</th>
                <th rowspan="2" style="width:10mm;">BptRK<br>(S/B)</th>
                <th colspan="3">Pernikahan</th>
                <th colspan="3">Kematian</th>
                <th rowspan="2" style="width:12mm;">KgtRhn<br>(1s/d7)</th>
                <th rowspan="2" style="width:12mm;">JbtGrj<br>(1s/d7)</th>
            </tr>
            <tr>
                <th style="width:12mm;">Tgl</th>
                <th style="width:20mm;">Gereja</th>
                <th style="width:18mm;">Pendeta</th>
                <th style="width:12mm;">Tgl</th>
                <th style="width:20mm;">Gereja</th>
                <th style="width:18mm;">Pendeta</th>
                <th style="width:12mm;">Tgl</th>
                <th style="width:20mm;">Gereja</th>
                <th style="width:18mm;">Pendeta</th>
                <th style="width:12mm;">Tgl</th>
                <th style="width:20mm;">Gereja</th>
                <th style="width:18mm;">Pendeta</th>
            </tr>
        </thead>
        <tbody>
            @php $no2 = 1; @endphp
            @foreach($keluarga->anggota as $anggota)
            <tr>
                <td>{{ $no2++ }}</td>
                {{-- Diserahkan --}}
                <td></td><td>GBI Victory Sibolga</td><td></td>
                {{-- Baptisan Selam --}}
                <td>{{ $anggota->tgl_baptis ? date('d/m/Y', strtotime($anggota->tgl_baptis)) : '' }}</td>
                <td>{{ $anggota->tgl_baptis ? 'GBI Victory Sibolga' : '' }}</td>
                <td></td>
                {{-- BptRK --}}
                <td>{{ $anggota->tgl_sidi ? 'S' : 'B' }}</td>
                {{-- Pernikahan --}}
                <td>{{ $anggota->tgl_nikah ? date('d/m/Y', strtotime($anggota->tgl_nikah)) : '' }}</td>
                <td>{{ $anggota->tgl_nikah ? 'GBI Victory Sibolga' : '' }}</td>
                <td></td>
                {{-- Kematian --}}
                <td></td><td></td><td></td>
                {{-- Kegiatan & Jabatan --}}
                <td></td><td></td>
            </tr>
            @endforeach

            @for($i = $keluarga->anggota->count(); $i < 8; $i++)
            <tr class="baris-kosong">
                <td>&nbsp;</td>
                <td></td><td></td><td></td>
                <td></td><td></td><td></td>
                <td></td>
                <td></td><td></td><td></td>
                <td></td><td></td><td></td>
                <td></td><td></td>
            </tr>
            @endfor
        </tbody>
    </table>

    <!-- BAGIAN BAWAH: KETERANGAN + FOTO + TTD -->
    <div class="bottom-wrap">
        <div class="keterangan">
            <strong>Keterangan dan Petunjuk</strong><br>
            <strong>Klm</strong> (Kelamin) &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: (L-Laki-Laki; P-Perempuan)<br>
            <strong>Hklg</strong> (Hubungan Keluarga) : (1-Suami, 2-Istri, 3-Anak, 4-Org Tua, 5-Saudara/Family, 6-Pegawai/Pembantu, 7-Org lain)<br>
            <strong>St</strong> (Status) &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: (1-Belum/Tidak Menikah, 2-Menikah, 3-Cerai 4-Duda/Janda)<br>
            <strong>Jns Pkrj</strong> (Jenis Pekerjaan) &nbsp;: (0-Tdk bekerja, 1-Pgnegeri, 2-PgwSwasta, 3-UsahaSendiri, 4-Pensiuan, 5-TNI/POLRI, 6-Dokter, 7-Hamba Tuhan, 8-Pelajar/Mahasiswa)<br>
            <strong>Pnddk</strong> (Pendidikan Formal) : (0-TK/PlayGround, 1-SD, 2-SLTP, 3-SLTA, 4-Tkt Akademi 5-Tkt Univ/Institut)<br>
            <strong>BptRK</strong> (Baptisan Roh Kudus) : (S-Sudah, B-Belum)<br>
            <strong>KgtRhn</strong> (Kegiatan Rohani) &nbsp;: (1-Community Of Love, 2-Doa, 3-WBI, 4-Dws Muda, 5-Youth, 6-Sekolah Minggu, 7-Lansia)<br>
            <strong>JbtGrj</strong> (Jabatan Gereja) &nbsp;&nbsp;&nbsp;&nbsp;: (1-Aktivis, 2-Pengerja, 3-Diaken/ones/Majelis, 4-Gembala Sidang, 5-Fulltimer/Staff Gembala)
        </div>
        <div class="foto-ttd">
            <div class="foto-box">
                Pas Foto<br>
                Suami Istri/Sendiri<br>
                4 x 3
            </div>
            <div class="ttd-box">
                Sibolga, {{ date('d F Y') }}<br><br><br><br><br>
                <div class="ttd-line"></div>
                Koordinator GBI Victory Sibolga<br>
                Pdp. ___________________
            </div>
        </div>
    </div>

</body>
</html>
