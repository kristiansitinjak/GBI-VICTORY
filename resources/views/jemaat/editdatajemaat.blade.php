@extends('layout.admin')

@section('content')
<div class="container-fluid py-4">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow border-0">
                <div class="card-header bg-warning text-white d-flex justify-content-between align-items-center">
                    <h5 class="mb-0 fw-bold"><i class="fas fa-edit me-2"></i> Edit Data: {{ $datajemaat->nama_lengkap }}</h5>
                    <a href="{{ url('admin/datajemaat/view/'.$datajemaat->id) }}" class="btn btn-light btn-sm text-warning fw-bold">
                        <i class="fas fa-arrow-left"></i> Kembali
                    </a>
                </div>

                <form action="{{ url('/admin/updatedatajemaat/'.$datajemaat->id) }}" method="POST">
                    @csrf
                    <div class="card-body p-4">
                        @if($datajemaat->hubungan_keluarga == 'Kepala Keluarga')
                            <div class="alert alert-info small">
                                <i class="fas fa-info-circle me-1"></i> <strong>Info:</strong> Mengubah Alamat atau Sektor pada Kepala Keluarga akan otomatis mengubah data seluruh anggota keluarga lainnya.
                            </div>
                        @endif

                        <div class="row">
                            <!-- Data Identitas -->
                            <div class="col-md-6 mb-3">
                                <label class="fw-bold">Nama Lengkap (Sesuai KTP)</label>
                                <input type="text" name="nama_lengkap" class="form-control" value="{{ $datajemaat->nama_lengkap }}" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="fw-bold">Hubungan Keluarga</label>
                                <select name="hubungan_keluarga" class="form-select bg-light" required>
                                    <option value="Kepala Keluarga" {{ $datajemaat->hubungan_keluarga == 'Kepala Keluarga' ? 'selected' : '' }}>Kepala Keluarga</option>
                                    <option value="Pasangan" {{ $datajemaat->hubungan_keluarga == 'Pasangan' ? 'selected' : '' }}>Pasangan (Istri/Suami)</option>
                                    <option value="Anak" {{ $datajemaat->hubungan_keluarga == 'Anak' ? 'selected' : '' }}>Anak</option>
                                </select>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="fw-bold">Tempat Lahir</label>
                                <input type="text" name="tempat_lahir" class="form-control" value="{{ $datajemaat->tempat_lahir }}">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="fw-bold">Tanggal Lahir</label>
                                <input type="date" name="tanggal_lahir" class="form-control" value="{{ $datajemaat->tanggal_lahir }}">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="fw-bold">Jenis Kelamin</label>
                                <select name="jenis_kelamin" class="form-select">
                                    <option value="L" {{ $datajemaat->jenis_kelamin == 'L' ? 'selected' : '' }}>Laki-laki</option>
                                    <option value="P" {{ $datajemaat->jenis_kelamin == 'P' ? 'selected' : '' }}>Perempuan</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="fw-bold">No. HP / WhatsApp</label>
                                <input type="text" name="telepon" class="form-control only-number" value="{{ $datajemaat->telepon }}" maxlength="15">
                            </div>

                            <hr class="my-3">

                            <!-- Data Alamat & Sektor -->
                            <div class="col-md-6 mb-3">
                                <label class="fw-bold">Sektor</label>
                                @php
                                    $sektorList = [
                                        'FA Pintu Angin - Mela',
                                        'FA Ketapang - K. Keterapung',
                                        'FA Simare-mare - Sibolga Julu',
                                        'FA Kota',
                                        'FA Parombuman',
                                        'FA Pandan',
                                    ];
                                @endphp
                                <select class="form-select border-primary" name="sektor" required>
                                    <option value="">-- Pilih Sektor --</option>
                                    @foreach($sektorList as $sektor)
                                        <option value="{{ $sektor }}" {{ $datajemaat->sektor == $sektor ? 'selected' : '' }}>
                                            {{ $sektor }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="fw-bold">Alamat Domisili</label>
                                <input type="text" name="alamat" class="form-control border-primary" value="{{ $datajemaat->alamat }}" required>
                            </div>

                            <hr class="my-3">

                            <!-- Data Status Gerejawi -->
                            <h6 class="fw-bold text-primary mb-3"><i class="fas fa-church me-1"></i> Status Gerejawi</h6>
                            <div class="col-md-4 mb-3">
                                <label class="small fw-bold">Tanggal Baptis</label>
                                <input type="date" name="tgl_baptis" class="form-control" value="{{ $datajemaat->tgl_baptis }}">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="small fw-bold">Tanggal Sidi</label>
                                <input type="date" name="tgl_sidi" class="form-control" value="{{ $datajemaat->tgl_sidi }}">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="small fw-bold">Tanggal Nikah</label>
                                <input type="date" name="tgl_nikah" class="form-control" value="{{ $datajemaat->tgl_nikah }}">
                            </div>
                        </div>
                    </div>
                    <div class="card-footer bg-white p-3 d-flex justify-content-between">
                        <button type="reset" class="btn btn-outline-secondary px-4">Reset</button>
                        <button type="submit" class="btn btn-warning px-5 fw-bold shadow-sm text-white">
                            <i class="fas fa-save me-1"></i> Update Data
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    document.querySelectorAll('.only-number').forEach(i => {
        i.oninput = function() { this.value = this.value.replace(/[^0-9]/g, ''); };
    });
</script>
@endsection