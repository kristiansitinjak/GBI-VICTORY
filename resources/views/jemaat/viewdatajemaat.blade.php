@extends('layout.admin')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card card-outline card-primary shadow">
                <div class="card-header d-flex justify-content-between align-items-center bg-white py-3">
                    <h3 class="card-title fw-bold text-primary">
                        <i class="fas fa-users me-2"></i> Detail Keluarga: {{ $jemaat->namakeluarga }}
                    </h3>
                    <div class="ms-auto">
                        <a href="{{ url('admin/datajemaat') }}" class="btn btn-outline-secondary btn-sm me-2">
                            <i class="fas fa-arrow-left"></i> Kembali
                        </a>
                        <a href="{{ route('jemaat.cetak-kta', $jemaat->id) }}" class="btn btn-dark btn-sm me-2" target="_blank">
                            <i class="fas fa-id-card"></i> Cetak KTA KK
                        </a>
                    </div>
                </div>

                <div class="card-body">
                    <!-- Ringkasan Informasi Keluarga -->
                    <div class="row mb-4 bg-light p-3 rounded border">
                        <div class="col-md-4">
                            <label class="text-muted small uppercase fw-bold">Nama Keluarga</label>
                            <p class="fw-bold mb-0">{{ $jemaat->namakeluarga }}</p>
                        </div>
                        <div class="col-md-4 border-start border-end">
                            <label class="text-muted small uppercase fw-bold">Sektor / Wijk</label>
                            <p class="mb-0"><span class="badge bg-info">{{ $jemaat->sektor }}</span></p>
                        </div>
                        <div class="col-md-4">
                            <label class="text-muted small uppercase fw-bold">Alamat Domisili</label>
                            <p class="mb-0">{{ $jemaat->alamat }}</p>
                        </div>
                    </div>

                    <!-- Tabel Detail Anggota Keluarga (Sesuai Format Kertas) -->
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover align-middle">
                            <thead class="table-dark text-center">
                                <tr>
                                    <th rowspan="2" class="align-middle">Hubungan</th>
                                    <th rowspan="2" class="align-middle">Nama Lengkap</th>
                                    <th rowspan="2" class="align-middle">L/P</th>
                                    <th rowspan="2" class="align-middle">Tempat, Tgl Lahir</th>
                                    <th rowspan="2" class="align-middle">Pendidikan / Pekerjaan</th>
                                    <th colspan="3">Status Gerejawi (Tanggal)</th>
                                    <th rowspan="2" class="align-middle">Aksi</th>
                                </tr>
                                <tr>
                                    <th>Baptis</th>
                                    <th>Sidi</th>
                                    <th>Nikah</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($keluarga as $anggota)
                                <tr class="{{ $anggota->hubungan_keluarga == 'Kepala Keluarga' ? 'table-primary fw-bold' : '' }}">
                                    <td class="text-center small">{{ $anggota->hubungan_keluarga }}</td>
                                    <td>{{ $anggota->nama_lengkap }}</td>
                                    <td class="text-center">{{ $anggota->jenis_kelamin }}</td>
                                    <td>
                                        {{ $anggota->tempat_lahir ?? '-' }}, <br>
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
                                        <a href="{{ url('admin/editdatajemaat/' . $anggota->id) }}" class="btn btn-warning btn-xs" title="Edit Orang Ini">
                                            <i class="fas fa-edit text-white"></i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="card-footer d-flex justify-content-between bg-white">
                    <span class="small text-muted">ID Keluarga: #{{ $jemaat->id }}</span>
                    <span class="small text-muted">Terakhir diperbarui: {{ $jemaat->updated_at->diffForHumans() }}</span>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .table th { font-size: 0.75rem; text-transform: uppercase; letter-spacing: 0.5px; }
    .btn-xs { padding: 1px 5px; font-size: 0.75rem; }
</style>
@endsection
