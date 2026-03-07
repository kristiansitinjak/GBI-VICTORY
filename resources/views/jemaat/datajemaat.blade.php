@extends('layout.admin')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card card-outline card-primary shadow">
                <div class="card-header d-flex justify-content-between align-items-center bg-white py-3">
                    <h3 class="card-title fw-bold text-primary">
                        <i class="fas fa-users me-2"></i> Daftar Seluruh Jemaat Aktif
                    </h3>
                    <div class="ms-auto">
                        <a href="{{ url('admin/tambahdatajemaat') }}" class="btn btn-success btn-sm shadow-sm">
                            <i class="fas fa-user-plus"></i> Tambah Data Jemaat
                        </a>
                    </div>
                </div>

                <div class="card-body">
                    @if(session('status'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="fas fa-check-circle me-2"></i> {{ session('status') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <!-- Form Pencarian -->
                    <form method="GET" action="{{ url('admin/datajemaat') }}" class="mb-4">
                        <div class="input-group shadow-sm">
                            <input type="text" name="search" class="form-control" placeholder="Cari berdasarkan Nama Keluarga, Sektor, atau Alamat..." value="{{ request('search') }}">
                            <button class="btn btn-primary px-4" type="submit">
                                <i class="fas fa-search me-1"></i> Cari
                            </button>
                        </div>
                    </form>

                    <div class="table-responsive">
                        <table class="table table-bordered table-hover align-middle">
                            <thead class="table-dark text-center">
                                <tr>
                                    <th width="5%">No</th>
                                    <th>Nama Keluarga</th>
                                    <th>Sektor</th>
                                    <th>Telepon</th>
                                    <th>Alamat</th>
                                    <th width="20%">Aksi & Dokumen</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($allDatajemaat as $datajemaat)
                                <tr>
                                    <td class="text-center fw-bold text-muted">{{ $loop->iteration + $allDatajemaat->firstItem() - 1 }}</td>
                                    <td>
                                        <span class="text-primary fw-bold">{{ $datajemaat->namakeluarga }}</span>
                                    </td>
                                    <td class="text-center">
                                        <span class="badge bg-info px-3">{{ $datajemaat->sektor }}</span>
                                    </td>
                                    <td class="text-center">
                                        <a href="https://wa.me{{ preg_replace('/[^0-9]/', '', $datajemaat->telepon) }}" target="_blank" class="text-decoration-none text-dark">
                                            {{ $datajemaat->telepon ?? '-' }}
                                        </a>
                                    </td>
                                    <td><small class="text-muted">{{ Str::limit($datajemaat->alamat, 50) }}</small></td>
                                    <td class="text-center">
                                        <div class="btn-group" role="group">
                                            <!-- TOMBOL VIEW DETAIL (BARU) -->
                                            <a href="{{ url('/admin/datajemaat/view/'.$datajemaat->id) }}" 
                                               class="btn btn-sm btn-info text-white" title="Lihat Detail Lengkap">
                                                <i class="fas fa-eye"></i>
                                            </a>

                                            <!-- Tombol Cetak KTA -->
                                            <a href="{{ route('jemaat.cetak-kta', $datajemaat->id) }}" 
                                               class="btn btn-sm btn-dark" target="_blank" title="Cetak KTA">
                                                <i class="fas fa-id-card"></i>
                                            </a>

                                            <!-- Tombol Edit -->
                                            <a href="{{ url('/admin/editdatajemaat/'.$datajemaat->id) }}" 
                                               class="btn btn-sm btn-warning" title="Edit">
                                                <i class="fas fa-edit text-white"></i>
                                            </a>

                                            <!-- Tombol Hapus -->
                                            <form action="{{ url('/admin/hapusdatajemaat/'.$datajemaat->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" 
                                                        onclick="return confirm('Yakin ingin menghapus seluruh data keluarga {{ $datajemaat->namakeluarga }}?')">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="6" class="text-center py-4 text-muted italic">
                                        <i class="fas fa-folder-open fa-2x mb-2"></i><br>
                                        Tidak ada data jemaat ditemukan.
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination Links -->
                    <div class="d-flex justify-content-between align-items-center mt-3 px-2">
                        <div class="small text-muted">
                            Menampilkan {{ $allDatajemaat->firstItem() }} sampai {{ $allDatajemaat->lastItem() }} dari {{ $allDatajemaat->total() }} jemaat
                        </div>
                        <div>
                            {{ $allDatajemaat->links() }}
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-white border-top-0 text-end small">
                    <span class="badge bg-secondary">Total: {{ $allDatajemaat->total() }} Kepala Keluarga</span>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    /* Membuat tampilan pagination lebih compact */
    .pagination { margin-bottom: 0; font-size: 0.8rem; }
    .table-hover tbody tr:hover { background-color: rgba(13, 110, 253, 0.05); }
    .btn-group .btn { margin: 0 1px; border-radius: 4px !important; }
    .card-title { font-size: 1.1rem; }
</style>
@endsection
