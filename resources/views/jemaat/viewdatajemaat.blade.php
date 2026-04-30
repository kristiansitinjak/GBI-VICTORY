@extends('layout.admin')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card card-outline card-primary shadow">
                <div class="card-header d-flex justify-content-between align-items-center bg-white py-3">
                    <h3 class="card-title fw-bold text-primary">
                        <i class="fas fa-users me-2"></i> Detail Keluarga: {{ $keluarga->namakeluarga }}
                    </h3>
                    <div class="ms-auto">
                        <a href="{{ url('admin/datajemaat') }}" class="btn btn-outline-secondary btn-sm me-2">
                            <i class="fas fa-arrow-left"></i> Kembali
                        </a>
                    </div>
                </div>

                <div class="card-body">

                    {{-- Alert sukses / error --}}
                    @if(session('status'))
                        <div class="alert alert-success alert-dismissible fade show">
                            <i class="fas fa-check-circle me-1"></i> {{ session('status') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif
                    @if(session('error'))
                        <div class="alert alert-danger alert-dismissible fade show">
                            <i class="fas fa-exclamation-circle me-1"></i> {{ session('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    <!-- Ringkasan Informasi Keluarga -->
                    <div class="row mb-4 bg-light p-3 rounded border">
                        <div class="col-md-3">
                            <label class="text-muted small fw-bold">Nomor Keluarga</label>
                            <p class="fw-bold mb-0">
                                <span class="badge bg-primary fs-6">{{ $keluarga->nomor_keluarga }}</span>
                            </p>
                        </div>
                        <div class="col-md-3 border-start">
                            <label class="text-muted small fw-bold">Nama Keluarga</label>
                            <p class="fw-bold mb-0">{{ $keluarga->namakeluarga }}</p>
                        </div>
                        <div class="col-md-3 border-start">
                            <label class="text-muted small fw-bold">Sektor</label>
                            <p class="mb-0"><span class="badge bg-info">{{ $keluarga->sektor }}</span></p>
                        </div>
                        <div class="col-md-3 border-start">
                            <label class="text-muted small fw-bold">Alamat Domisili</label>
                            <p class="mb-0">{{ $keluarga->alamat }}</p>
                        </div>
                    </div>

                    <!-- Tabel Detail Anggota Keluarga -->
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover align-middle">
                            <thead class="table-dark text-center">
                                <tr>
                                    <th rowspan="2" class="align-middle">Hubungan</th>
                                    <th rowspan="2" class="align-middle">Nama Lengkap</th>
                                    <th rowspan="2" class="align-middle">L/P</th>
                                    <th rowspan="2" class="align-middle">Tempat, Tgl Lahir</th>
                                    <th rowspan="2" class="align-middle">Pendidikan / Pekerjaan</th>
                                    <th colspan="3">Status Gerejawi</th>
                                    <th rowspan="2" class="align-middle">Aksi</th>
                                </tr>
                                <tr>
                                    <th>Baptis</th>
                                    <th>Sidi</th>
                                    <th>Nikah</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($keluarga->anggota as $anggota)
                                <tr class="{{ $anggota->hubungan_keluarga == 'Kepala Keluarga' ? 'table-primary fw-bold' : '' }}">
                                    <td class="text-center small">
                                        @if($anggota->hubungan_keluarga == 'Kepala Keluarga')
                                            <span class="badge bg-primary">KK</span>
                                        @elseif($anggota->hubungan_keluarga == 'Pasangan')
                                            <span class="badge bg-success">Pasangan</span>
                                        @else
                                            <span class="badge bg-secondary">Anak</span>
                                        @endif
                                    </td>
                                    <td>{{ $anggota->nama_lengkap }}</td>
                                    <td class="text-center">{{ $anggota->jenis_kelamin }}</td>
                                    <td>
                                        {{ $anggota->tempat_lahir ?? '-' }},<br>
                                        <small>{{ $anggota->tanggal_lahir ? date('d M Y', strtotime($anggota->tanggal_lahir)) : '-' }}</small>
                                    </td>
                                    <td>
                                        <span class="badge bg-secondary">{{ $anggota->pendidikan ?? '-' }}</span><br>
                                        <small class="text-muted">{{ $anggota->pekerjaan ?? '-' }}</small>
                                    </td>
                                    <td class="text-center small">{{ $anggota->tgl_baptis ? date('d/m/Y', strtotime($anggota->tgl_baptis)) : '-' }}</td>
                                    <td class="text-center small">{{ $anggota->tgl_sidi ? date('d/m/Y', strtotime($anggota->tgl_sidi)) : '-' }}</td>
                                    <td class="text-center small">{{ $anggota->tgl_nikah ? date('d/m/Y', strtotime($anggota->tgl_nikah)) : '-' }}</td>
                                    <td class="text-center">
                                        {{-- Edit anggota (ID = datajemaats.id) --}}
                                        <a href="{{ url('admin/datajemaat/edit/' . $anggota->id) }}"
                                           class="btn btn-warning btn-xs mb-1" title="Edit">
                                            <i class="fas fa-edit text-white"></i>
                                        </a>

                                        {{-- Hapus anggota (kecuali KK) --}}
                                        @if($anggota->hubungan_keluarga != 'Kepala Keluarga')
                                            <form action="{{ url('admin/datajemaat/destroy-anggota/' . $anggota->id) }}"
                                                  method="POST" style="display:inline;"
                                                  onsubmit="return confirm('Hapus anggota ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-xs" title="Hapus">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="9" class="text-center text-muted">Belum ada anggota keluarga.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <!-- Hapus Seluruh Keluarga -->
                    <div class="mt-3 text-end">
                        <form action="{{ url('admin/datajemaat/destroy/' . $keluarga->id) }}"
                              method="POST"
                              onsubmit="return confirm('Hapus SELURUH keluarga {{ $keluarga->namakeluarga }}? Semua anggota akan ikut terhapus!')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger btn-sm">
                                <i class="fas fa-trash-alt me-1"></i> Hapus Seluruh Keluarga
                            </button>
                        </form>
                    </div>
                </div>

                <div class="card-footer d-flex justify-content-between bg-white">
                    <span class="small text-muted">ID Keluarga: #{{ $keluarga->id }} &nbsp;|&nbsp; {{ $keluarga->nomor_keluarga }}</span>
                    <span class="small text-muted">Terakhir diperbarui: {{ $keluarga->updated_at->diffForHumans() }}</span>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .table th { font-size: 0.75rem; text-transform: uppercase; letter-spacing: 0.5px; }
    .btn-xs { padding: 2px 7px; font-size: 0.75rem; }
</style>
@endsection