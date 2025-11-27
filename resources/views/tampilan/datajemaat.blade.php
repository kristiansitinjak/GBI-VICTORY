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
@endsection
