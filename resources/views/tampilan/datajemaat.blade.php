@extends('layout.user')

@section('container')

<!-- Header -->
<div class="page-header-jemaat">
    <p class="subtitle">GBI Victory Sibolga</p>
    <h1>Data Jemaat</h1>
    <div class="gold-divider"></div>
</div>

<!-- Search & Table Section -->
<section class="jemaat-section">

    <div class="section-label">
        <span>Direktori Jemaat</span>
        <h2>Daftar Keluarga Jemaat</h2>
    </div>

    <!-- Search Bar -->
    <div class="jemaat-search-wrap">
        <div class="jemaat-search-box">
            <i class="fa fa-search search-icon"></i>
            <input type="text" id="searchInput" placeholder="Cari nama keluarga..." autocomplete="off">
            <div id="dropdownMenu" class="jemaat-dropdown"></div>
        </div>
    </div>

    <!-- Table -->
    <div class="jemaat-table-wrap">
        <div class="table-responsive">
            <table class="jemaat-table" id="myTable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Keluarga</th>
                        <th>Sektor</th>
                        <th>Alamat</th>
                        <th>Telepon</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $sektorOrder = [
                            'Wijk I','Wijk II','Wijk III','Wijk IV','Wijk V',
                            'Wijk VI','Wijk VII','Wijk VIII','Wijk IX','Wijk X','Wijk XI'
                        ];
                        $dataArray = $data->toArray();
                        usort($dataArray, function($a, $b) use ($sektorOrder) {
                            $posA = array_search($a['sektor'], $sektorOrder);
                            $posB = array_search($b['sektor'], $sektorOrder);
                            return $posA - $posB;
                        });
                        $data = collect($dataArray);
                        $nomor = 1;
                    @endphp

                    @forelse ($data as $row)
                    <tr>
                        <td>{{ $nomor++ }}</td>
                        <td>
                            <div class="jemaat-name">
                                <div class="jemaat-avatar">{{ strtoupper(substr($row['namakeluarga'], 0, 1)) }}</div>
                                <span>{{ $row['namakeluarga'] }}</span>
                            </div>
                        </td>
                        <td><span class="sektor-badge">{{ $row['sektor'] }}</span></td>
                        <td class="alamat-cell">{{ $row['alamat'] }}</td>
                        <td>{{ $row['telepon'] ?? '-' }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center py-4 text-muted">Belum ada data jemaat.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</section>

<!-- Registration Section -->
<section class="jemaat-register-section">
    <div class="register-card">
        <!-- QR Code -->
        <div class="register-qr">
            <div class="qr-wrap">
                <h6><i class="fa fa-qrcode"></i> Scan untuk Daftar</h6>
                <div id="qrcode"></div>
                <p>Scan QR Code untuk mengisi form pendaftaran</p>
            </div>
        </div>

        <!-- Info & Button -->
        <div class="register-info">
            <div class="register-icon"><i class="fa fa-users"></i></div>
            <h3>Daftar Sebagai Jemaat Baru</h3>
            <p>Apakah Anda ingin mendaftarkan keluarga Anda sebagai jemaat? Silakan isi form pendaftaran — data akan ditinjau oleh admin sebelum ditampilkan di daftar resmi.</p>
            <div class="register-actions">
                <a href="{{ url('pendaftaran-jemaat') }}" class="btn-daftar">
                    <i class="fa fa-user-plus"></i> Daftar Sekarang
                </a>
                <button class="btn-qr-modal" data-bs-toggle="modal" data-bs-target="#qrModal">
                    <i class="fa fa-qrcode"></i> Lihat QR Besar
                </button>
            </div>
        </div>
    </div>
</section>

<!-- Modal QR -->
<div class="modal fade" id="qrModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content" style="border-radius:16px; overflow:hidden;">
            <div class="modal-header" style="background:#0D1B4B; color:#F0D080; border:none;">
                <h5 class="modal-title"><i class="fa fa-qrcode me-2"></i> QR Code Pendaftaran Jemaat</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body text-center py-4">
                <div id="qrcodeModal" style="display:inline-block; padding:20px; background:#fff; border-radius:12px; box-shadow:0 4px 20px rgba(0,0,0,0.1);"></div>
                <p class="text-muted mt-3 mb-0 small">Scan dengan ponsel untuk membuka form pendaftaran</p>
            </div>
        </div>
    </div>
</div>

<!-- Scripts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>
<script>
    // QR Code
    new QRCode(document.getElementById('qrcode'), {
        text: '{{ url('pendaftaran-jemaat') }}',
        width: 160, height: 160,
        colorDark: '#0D1B4B', colorLight: '#ffffff',
        correctLevel: QRCode.CorrectLevel.H
    });
    new QRCode(document.getElementById('qrcodeModal'), {
        text: '{{ url('pendaftaran-jemaat') }}',
        width: 240, height: 240,
        colorDark: '#0D1B4B', colorLight: '#ffffff',
        correctLevel: QRCode.CorrectLevel.H
    });

    // Search
    const searchInput = document.getElementById('searchInput');
    const dropdownMenu = document.getElementById('dropdownMenu');
    const rows = document.querySelectorAll('#myTable tbody tr');

    searchInput.addEventListener('input', function () {
        const filter = this.value.toLowerCase();
        dropdownMenu.innerHTML = '';
        let matches = [];

        rows.forEach(row => {
            const nameCell = row.querySelector('.jemaat-name span');
            if (!nameCell) return;
            const nama = nameCell.textContent.toLowerCase();
            if (filter && nama.includes(filter)) matches.push(nameCell.textContent);
        });

        if (matches.length > 0) {
            matches.forEach(match => {
                const div = document.createElement('div');
                div.className = 'jemaat-dropdown-item';
                div.innerHTML = `<i class="fa fa-user"></i> ${match}`;
                div.addEventListener('click', () => {
                    searchInput.value = match;
                    filterTable(match);
                    dropdownMenu.style.display = 'none';
                });
                dropdownMenu.appendChild(div);
            });
            dropdownMenu.style.display = 'block';
        } else {
            dropdownMenu.style.display = 'none';
        }

        filterTable(filter);
    });

    function filterTable(query) {
        const filter = query.toLowerCase();
        rows.forEach(row => {
            const nameCell = row.querySelector('.jemaat-name span');
            if (!nameCell) return;
            row.style.display = nameCell.textContent.toLowerCase().includes(filter) ? '' : 'none';
        });
    }

    document.addEventListener('click', function (e) {
        if (!dropdownMenu.contains(e.target) && !searchInput.contains(e.target)) {
            dropdownMenu.style.display = 'none';
        }
    });
</script>

@endsection