@extends('layout.user')

@section('container')
<!-- Header Start -->
<div class="container-fluid bg-breadcrumb" style="background-image: url('{{ URL::asset('Template/img/bg1.png')}}');">
    <div class="container text-center py-5" style="max-width: 900px;">
        <h3 class="text-white display-3 mb-4">Data Jemaat</h3>
        <ol class="breadcrumb justify-content-center mb-0">
        </ol>    
    </div>
</div>
<!-- Header End -->

<div class="container">
    <div class="input-group mb-3 mt-4 position-relative">
        <input type="text" class="form-control" id="searchInput" placeholder="Cari Jemaat">
        <div class="dropdown-menu w-100" id="dropdownMenu" style="display: none; max-height: 200px; overflow-y: auto; position: absolute; top: 100%; left: 0; z-index: 1000;">
        </div>
    </div>
    <div class="table-responsive">
        <table class="table" id="myTable">
            <thead class="bg-light">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Keluarga</th>
                    <th scope="col">Sektor</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Detail</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sektorOrder = [
                    'Wijk I', 'Wijk II', 'Wijk III', 'Wijk IV', 'Wijk V',
                    'Wijk VI', 'Wijk VII', 'Wijk VIII', 'Wijk IX', 'Wijk X', 'Wijk XI'
                ];

                // Convert collection to array
                $dataArray = $data->toArray();

                // Sort data by sektor
                usort($dataArray, function($a, $b) use ($sektorOrder) {
                    $posA = array_search($a['sektor'], $sektorOrder);
                    $posB = array_search($b['sektor'], $sektorOrder);
                    return $posA - $posB;
                });

                // Convert back to collection if needed
                $data = collect($dataArray);

                $nomor = 1;
                ?>
                @foreach ($data as $row)
                <tr>
                    <td>{{ $nomor }}</td>
                    <td>{{ $row['namakeluarga'] }}</td>
                    <td>{{ $row['sektor'] }}</td>
                    <td>{{ $row['alamat'] }}</td>
                    <td><a href="{{ url('viewdatajemaat/'.$row['id']) }}" class="btn btn-primary ml-3 mb-2">View</a></td>
                </tr>
                <?php $nomor++; ?>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<script>
// Add event listener to search input
document.getElementById('searchInput').addEventListener('input', function() {
    let filter = this.value.toLowerCase();
    let dropdownMenu = document.getElementById('dropdownMenu');
    let rows = document.querySelectorAll('#myTable tbody tr');
    let matches = [];

    // Find matches
    rows.forEach(row => {
        let nama = row.cells[1].textContent.toLowerCase();
        if (nama.startsWith(filter) && filter !== '') {
            matches.push(row.cells[1].textContent);
        }
    });

    // Clear previous dropdown menu items
    dropdownMenu.innerHTML = '';

    // Populate dropdown menu with matches
    if (matches.length > 0) {
        matches.forEach(match => {
            let div = document.createElement('div');
            div.className = 'dropdown-item';
            div.textContent = match;
            div.addEventListener('click', function() {
                document.getElementById('searchInput').value = match;
                filterTable(match);
                dropdownMenu.style.display = 'none';
            });
            dropdownMenu.appendChild(div);
        });
        dropdownMenu.style.display = 'block';
    } else {
        dropdownMenu.style.display = 'none';
    }
});

// Function to filter table based on search input
function filterTable(query) {
    let filter = query.toLowerCase();
    let rows = document.querySelectorAll('#myTable tbody tr');

    // Show or hide rows based on filter
    rows.forEach(row => {
        let nama = row.cells[1].textContent.toLowerCase();
        let isVisible = nama.startsWith(filter);
        row.style.display = isVisible ? '' : 'none';
    });
}

// Hide dropdown when clicking outside
document.addEventListener('click', function(event) {
    let dropdownMenu = document.getElementById('dropdownMenu');
    let searchInput = document.getElementById('searchInput');
    if (!dropdownMenu.contains(event.target) && !searchInput.contains(event.target)) {
        dropdownMenu.style.display = 'none';
    }
});
</script>

<!-- Registration Section -->
<div class="container mt-5 mb-5">
    <div class="row align-items-center">
        <!-- QR Code di sebelah kiri -->
        <div class="col-md-4 text-center mb-4">
            <div class="card shadow-sm">
                <div class="card-body p-4">
                    <h5 class="card-title mb-3">Scan untuk Daftar</h5>
                    <div id="qrcode" class="mb-3" style="background: white; padding: 20px; border-radius: 10px;">
                        <!-- QR code akan di-generate dengan JavaScript -->
                    </div>
                    <p class="text-muted small">Scan QR Code untuk mengisi form pendaftaran</p>
                </div>
            </div>
        </div>

        <!-- Tombol di sebelah kanan -->
        <div class="col-md-8">
            <div class="card shadow-sm border-primary">
                <div class="card-body p-4">
                    <h5 class="card-title mb-3">Daftar Sebagai Jemaat</h5>
                    <p class="card-text text-muted mb-4">
                        Apakah Anda ingin mendaftarkan keluarga Anda sebagai jemaat baru dalam gereja? 
                        Silakan isi form pendaftaran dan data Anda akan ditinjau oleh admin sebelum ditampilkan di daftar jemaat resmi.
                    </p>
                    <div class="d-flex gap-3">
                        <a href="{{ url('pendaftaran-jemaat') }}" class="btn btn-primary">
                            <i class="fas fa-user-plus"></i> Daftar Sekarang
                        </a>
                        <a href="#" class="btn btn-outline-primary btn-lg" data-bs-toggle="modal" data-bs-target="#qrModal">
                            <i class="fas fa-qrcode"></i> Lihat QR Lebih Besar
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal untuk QR yang lebih besar -->
<div class="modal fade" id="qrModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">QR Code Pendaftaran Jemaat</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body text-center">
                <div id="qrcodeModal" style="background: white; padding: 30px; border-radius: 10px;">
                    <!-- QR code akan di-generate dengan JavaScript -->
                </div>
                <p class="text-muted mt-3 mb-0">Scan dengan ponsel Anda untuk membuka form pendaftaran</p>
            </div>
        </div>
    </div>
</div>

<!-- QR Code Generator Script -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>
<script>
    // Generate QR Code untuk halaman utama
    new QRCode(document.getElementById('qrcode'), {
        text: '{{ url('pendaftaran-jemaat') }}',
        width: 200,
        height: 200,
        colorDark: '#1f3a93',
        colorLight: '#ffffff',
        correctLevel: QRCode.CorrectLevel.H
    });

    // Generate QR Code untuk modal
    new QRCode(document.getElementById('qrcodeModal'), {
        text: '{{ url('pendaftaran-jemaat') }}',
        width: 250,
        height: 250,
        colorDark: '#1f3a93',
        colorLight: '#ffffff',
        correctLevel: QRCode.CorrectLevel.H
    });
</script>

@endsection
