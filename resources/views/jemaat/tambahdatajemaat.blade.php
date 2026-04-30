@extends('layout.admin')

@section('content')
<div class="container-fluid py-4">
    <div class="card shadow border-0">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h5 class="mb-0 fw-bold"><i class="fas fa-user-plus me-2"></i> Tambah Data Keluarga Baru</h5>
            <a href="{{ url('admin/datajemaat') }}" class="btn btn-light btn-sm text-primary fw-bold">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>
        </div>
        
        <form action="{{ url('/admin/tambahdatajemaat') }}" method="POST">
            @csrf
            <div class="card-body">
                <!-- Informasi Umum -->
                <div class="row mb-4">
                    <div class="col-md-6 mb-3">
                        <label class="fw-bold">Sektor <span class="text-danger">*</span></label>
                        <select class="form-select border-primary" name="sektor" required>
                            <option value="">-- Pilih Sektor --</option>
                            <option value="FA Pintu Angin - Mela">FA Pintu Angin - Mela</option>
                            <option value="FA Ketapang - K. Keterapung">FA Ketapang - K. Keterapung</option>
                            <option value="FA Simare-mare - Sibolga Julu">FA Simare-mare - Sibolga Julu</option>
                            <option value="FA Kota">FA Kota</option>
                            <option value="FA Parombuman">FA Parombuman</option>
                            <option value="FA Pandan">FA Pandan</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="fw-bold">Alamat Lengkap <span class="text-danger">*</span></label>
                        <input type="text" name="alamat" class="form-control border-primary" placeholder="Alamat Domisili" required>
                    </div>
                </div>

                <!-- TABEL UTAMA -->
                <div class="table-responsive rounded shadow-sm">
                    <table class="table table-bordered align-middle text-center" style="min-width: 1300px; font-size: 0.85rem;">
                        <thead class="table-dark">
                            <tr>
                                <th rowspan="2" style="width: 50px;">NO</th>
                                <th rowspan="2" style="min-width: 200px;">NAMA LENGKAP (Sesuai KTP)</th>
                                <th rowspan="2">Tempat Lahir</th>
                                <th rowspan="2">Tanggal Lahir</th>
                                <th rowspan="2">L/P</th>
                                <th rowspan="2">Pendidikan</th>
                                <th rowspan="2">Pekerjaan</th>
                                <th rowspan="2">No. HP</th>
                                <th colspan="3">STATUS GEREJAWI</th>
                            </tr>
                            <tr>
                                <th>Baptis</th>
                                <th>Sidi</th>
                                <th>Nikah</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- A. KEPALA KELUARGA -->
                            <tr class="table-primary fw-bold text-start text-uppercase"><td colspan="11">A. Kepala Keluarga</td></tr>
                            <tr>
                                <td>1</td>
                                <td><input type="text" name="kk[nama]" class="form-control form-control-sm" required placeholder="Nama Lengkap"></td>
                                <td><input type="text" name="kk[tempat_lahir]" class="form-control form-control-sm"></td>
                                <td><input type="date" name="kk[tgl_lahir]" class="form-control form-control-sm"></td>
                                <td>
                                    <select name="kk[jk]" class="form-select form-select-sm">
                                        <option value="L">L</option>
                                        <option value="P">P</option>
                                    </select>
                                </td>
                                <td><input type="text" name="kk[pendidikan]" class="form-control form-control-sm"></td>
                                <td><input type="text" name="kk[pekerjaan]" class="form-control form-control-sm"></td>
                                <td><input type="text" name="kk[hp]" class="form-control form-control-sm only-number" required maxlength="15"></td>
                                <td><input type="date" name="kk[tgl_baptis]" class="form-control form-control-sm"></td>
                                <td><input type="date" name="kk[tgl_sidi]" class="form-control form-control-sm"></td>
                                <td><input type="date" name="kk[tgl_nikah]" class="form-control form-control-sm"></td>
                            </tr>

                            <!-- B. PASANGAN -->
                            <tr class="table-primary fw-bold text-start text-uppercase"><td colspan="11">B. Pasangan (Istri/Suami)</td></tr>
                            <tr>
                                <td>1</td>
                                <td><input type="text" name="pasangan[nama]" class="form-control form-control-sm" placeholder="Isi jika ada"></td>
                                <td><input type="text" name="pasangan[tempat_lahir]" class="form-control form-control-sm"></td>
                                <td><input type="date" name="pasangan[tgl_lahir]" class="form-control form-control-sm"></td>
                                <td>
                                    <select name="pasangan[jk]" class="form-select form-select-sm">
                                        <option value="P">P</option>
                                        <option value="L">L</option>
                                    </select>
                                </td>
                                <td><input type="text" name="pasangan[pendidikan]" class="form-control form-control-sm"></td>
                                <td><input type="text" name="pasangan[pekerjaan]" class="form-control form-control-sm"></td>
                                <td><input type="text" name="pasangan[hp]" class="form-control form-control-sm only-number" maxlength="15"></td>
                                <td><input type="date" name="pasangan[tgl_baptis]" class="form-control form-control-sm"></td>
                                <td><input type="date" name="pasangan[tgl_sidi]" class="form-control form-control-sm"></td>
                                <td><input type="date" name="pasangan[tgl_nikah]" class="form-control form-control-sm"></td>
                            </tr>

                            <!-- C. ANAK -->
                            <tr class="table-primary fw-bold text-start text-uppercase">
                                <td colspan="11" class="d-flex justify-content-between align-items-center bg-primary text-white border-0 rounded-0">
                                    <span>C. ANAK (Opsional)</span>
                                    <button type="button" class="btn btn-success btn-sm" onclick="tambahAnak()">
                                        <i class="fas fa-plus"></i> Tambah Baris
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                        <tbody id="container-anak">
                            <!-- JS akan mengisi baris anak di sini -->
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="card-footer bg-white py-3">
                <button type="submit" class="btn btn-primary px-5 fw-bold shadow">
                    <i class="fas fa-save me-2"></i> Simpan Seluruh Keluarga
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    let anakCount = 0;

    function tambahAnak() {
        anakCount++;
        const container = document.getElementById('container-anak');
        const row = document.createElement('tr');
        row.innerHTML = `
            <td>${anakCount}</td>
            <td><input type="text" name="anak[${anakCount}][nama]" class="form-control form-control-sm"></td>
            <td><input type="text" name="anak[${anakCount}][tempat_lahir]" class="form-control form-control-sm"></td>
            <td><input type="date" name="anak[${anakCount}][tgl_lahir]" class="form-control form-control-sm"></td>
            <td>
                <select name="anak[${anakCount}][jk]" class="form-select form-select-sm">
                    <option value="L">L</option>
                    <option value="P">P</option>
                </select>
            </td>
            <td><input type="text" name="anak[${anakCount}][pendidikan]" class="form-control form-control-sm"></td>
            <td><input type="text" name="anak[${anakCount}][pekerjaan]" class="form-control form-control-sm"></td>
            <td><input type="text" name="anak[${anakCount}][hp]" class="form-control form-control-sm only-number" maxlength="15"></td>
            <td><input type="date" name="anak[${anakCount}][tgl_baptis]" class="form-control form-control-sm"></td>
            <td><input type="date" name="anak[${anakCount}][tgl_sidi]" class="form-control form-control-sm"></td>
            <td><input type="date" name="anak[${anakCount}][tgl_nikah]" class="form-control form-control-sm"></td>
        `;
        container.appendChild(row);
        initOnlyNumber();
    }

    function initOnlyNumber() {
        document.querySelectorAll('.only-number').forEach(i => {
            i.oninput = function() { this.value = this.value.replace(/[^0-9]/g, ''); };
        });
    }

    // Load 2 baris anak di awal
    tambahAnak();
    tambahAnak();
</script>

<style>
    .form-control-sm, .form-select-sm { border-radius: 4px; border: 1px solid #ced4da; }
    .table thead th { vertical-align: middle; border-bottom: 2px solid #333; }
    .table-primary { background-color: #d1d1ff !important; color: #333; }
</style>
@endsection