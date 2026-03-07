@extends('layout.user')

@section('container')
<!-- Header Start -->
<div class="container-fluid bg-breadcrumb" style="background-image: url('{{ URL::asset('Template/img/bg1.png')}}');">
    <div class="container text-center py-5" style="max-width: 900px;">
        <h3 class="text-white display-3 mb-4">Pendaftaran Jemaat</h3>
        <ol class="breadcrumb justify-content-center mb-0">
            <li class="breadcrumb-item"><a href="/" class="text-white">Home</a></li>
            <li class="breadcrumb-item active text-white">Pendaftaran</li>
        </ol>    
    </div>
</div>
<!-- Header End -->

<div class="container-fluid py-5">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card shadow border-0">
                <div class="card-body p-4">
                    <h4 class="card-title mb-4 text-primary text-center fw-bold">FORMULIR DATA JEMAAT</h4>
                    
                    <!-- Tampilkan notifikasi sukses jika ada session 'status' dari controller -->
                    @if(session('status'))
                        <div class="alert alert-success alert-dismissible fade show mb-4">
                            {{ session('status') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    
                    <!-- Tampilkan error validasi jika ada -->
                    @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show mb-4">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <!-- Catatan wajib isi -->
                    <p class="text-muted text-center mb-4">Catatan: Kolom dengan tanda <span class="text-danger">*</span> wajib diisi.</p>

                    <form action="{{ url('pendaftaran-jemaat') }}" method="POST" id="formPendaftaran">
                        @csrf

                        <!-- Informasi Umum -->
                        <div class="row mb-4">
                            <div class="col-md-6 mb-3">
                                <label class="fw-bold text-dark">Sektor (Wijk) <span class="text-danger">*</span></label>
                                <select class="form-select border-soft" name="sektor" required>
                                    <option value="">-- Pilih Sektor --</option>
                                    @foreach(['I', 'II', 'III', 'IV', 'V', 'VI', 'VII', 'VIII', 'IX', 'X', 'XI'] as $roman)
                                        <option value="Wijk {{ $roman }}">Wijk {{ $roman }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="fw-bold text-dark">Alamat Lengkap <span class="text-danger">*</span></label>
                                <input type="text" name="alamat" class="form-control border-soft" placeholder="Contoh: Jl. Merdeka No. 10" required>
                            </div>
                        </div>

                        <div class="table-responsive shadow-sm rounded">
                            <table class="table table-bordered align-middle text-center" id="tabelJemaat" style="min-width: 1400px; font-size: 0.85rem;">
                                <thead class="table-light text-uppercase fw-bold">
                                    <tr style="background-color: #f8f9fa;">
                                        <th rowspan="2" style="width: 40px; border-bottom: 1px solid #dee2e6;">NO</th>
                                        <th rowspan="2" style="min-width: 200px; border-bottom: 1px solid #dee2e6;">NAMA LENGKAP (Sesuai KTP)</th>
                                        <th rowspan="2" style="border-bottom: 1px solid #dee2e6;">Tempat Lahir</th>
                                        <th rowspan="2" style="border-bottom: 1px solid #dee2e6;">Tanggal Lahir</th>
                                        <th rowspan="2" style="border-bottom: 1px solid #dee2e6;">L/P</th>
                                        <th rowspan="2" style="border-bottom: 1px solid #dee2e6;">Pendidikan</th>
                                        <th rowspan="2" style="border-bottom: 1px solid #dee2e6;">Pekerjaan</th>
                                        <th rowspan="2" style="min-width: 130px; border-bottom: 1px solid #dee2e6;">No. HP</th>
                                        <th colspan="3" style="border-bottom: 1px solid #dee2e6;">STATUS GEREJAWI</th>
                                        <th rowspan="2" style="width: 60px; border-bottom: 1px solid #dee2e6;">Aksi</th>
                                    </tr>
                                    <tr style="background-color: #f8f9fa;">
                                        <th style="font-size: 0.75rem;">Baptis</th>
                                        <th style="font-size: 0.75rem;">Sidi</th>
                                        <th style="font-size: 0.75rem;">Nikah</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- A. KEPALA KELUARGA -->
                                    <tr class="row-category fw-bold text-start text-uppercase">
                                        <td colspan="12">A. Kepala Keluarga</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold text-muted">1</td>
                                        <td><input type="text" name="kk[nama]" class="form-control form-control-sm border-soft" required placeholder="Nama K.Keluarga *"></td>
                                        <td><input type="text" name="kk[tempat_lahir]" class="form-control form-control-sm border-soft"></td>
                                        <td><input type="date" name="kk[tgl_lahir]" class="form-control form-control-sm border-soft"></td>
                                        <td><select name="kk[jk]" class="form-select form-select-sm border-soft"><option value="L" selected>L</option><option value="P">P</option></select></td>
                                        <td><input type="text" name="kk[pendidikan]" class="form-control form-control-sm border-soft"></td>
                                        <td><input type="text" name="kk[pekerjaan]" class="form-control form-control-sm border-soft"></td>
                                        <td><input type="text" name="kk[hp]" class="form-control form-control-sm border-soft only-number" required placeholder="No.Handphone *" maxlength="15"></td>
                                        <td><input type="date" name="kk[tgl_baptis]" class="form-control form-control-sm border-soft"></td>
                                        <td><input type="date" name="kk[tgl_sidi]" class="form-control form-control-sm border-soft"></td>
                                        <td>
                                            <div class="d-flex flex-column align-items-center">
                                                <div class="form-check mb-1">
                                                    <input type="checkbox" class="form-check-input" id="check_nikah_kk" onchange="toggleMekanismeNikah(this)">
                                                    <label class="form-check-label small text-muted" for="check_nikah_kk">Sudah Nikah</label>
                                                </div>
                                                <input type="date" name="kk[tgl_nikah]" id="tgl_nikah_kk" class="form-control form-control-sm border-soft" disabled>
                                            </div>
                                        </td>
                                        <td>-</td>
                                    </tr>

                                    <!-- B. PASANGAN -->
                                    <tr class="row-category fw-bold text-start text-uppercase">
                                        <td colspan="12">B. Pasangan (Istri/Suami)</td>
                                    </tr>
                                    <tr id="rowPasangan" class="row-disabled">
                                        <td class="fw-bold text-muted">1</td>
                                        <td><input type="text" name="pasangan[nama]" id="namaPasangan" class="form-control form-control-sm border-soft" disabled placeholder="Nama Pasangan *"></td>
                                        <td><input type="text" name="pasangan[tempat_lahir]" class="form-control form-control-sm border-soft" disabled></td>
                                        <td><input type="date" name="pasangan[tgl_lahir]" class="form-control form-control-sm border-soft" disabled></td>
                                        <td><select name="pasangan[jk]" class="form-select form-select-sm border-soft" disabled><option value="P" selected>P</option><option value="L">L</option></select></td>
                                        <td><input type="text" name="pasangan[pendidikan]" class="form-control form-control-sm border-soft" disabled></td>
                                        <td><input type="text" name="pasangan[pekerjaan]" class="form-control form-control-sm border-soft" disabled></td>
                                        <td><input type="text" name="pasangan[hp]" id="hpPasangan" class="form-control form-control-sm border-soft only-number" disabled placeholder="No.Handphone *" maxlength="15"></td>
                                        <td><input type="date" name="pasangan[tgl_baptis]" class="form-control form-control-sm border-soft" disabled></td>
                                        <td><input type="date" name="pasangan[tgl_sidi]" class="form-control form-control-sm border-soft" disabled></td>
                                        <td><input type="date" name="pasangan[tgl_nikah]" id="tgl_nikah_ps" class="form-control form-control-sm border-soft" disabled></td>
                                        <td>-</td>
                                    </tr>

                                    <!-- C. ANAK -->
                                    <tr class="row-category fw-bold text-start text-uppercase">
                                        <td colspan="12">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <span>C. Anak (Opsional)</span>
                                                <button type="button" class="btn btn-success btn-sm px-3 shadow-sm btn-action" onclick="tambahAnak()">
                                                    <i class="fas fa-plus-circle me-1"></i> Tambah Baris Anak
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                                <tbody id="container-anak">
                                    @for($i=1; $i<=2; $i++)
                                    <tr class="baris-anak">
                                        <td class="nomor-anak fw-bold text-muted">{{ $i }}</td>
                                        <td><input type="text" name="anak[{{$i}}][nama]" class="form-control form-control-sm border-soft" placeholder="Nama Anak"></td>
                                        <td><input type="text" name="anak[{{$i}}][tempat_lahir]" class="form-control form-control-sm border-soft"></td>
                                        <td><input type="date" name="anak[{{$i}}][tgl_lahir]" class="form-control form-control-sm border-soft"></td>
                                        <td><select name="anak[{{$i}}][jk]" class="form-select form-select-sm border-soft"><option value="L" selected>L</option><option value="P">P</option></select></td>
                                        <td><input type="text" name="anak[{{$i}}][pendidikan]" class="form-control form-control-sm border-soft"></td>
                                        <td><input type="text" name="anak[{{$i}}][pekerjaan]" class="form-control form-control-sm border-soft"></td>
                                        <td><input type="text" name="anak[{{$i}}][hp]" class="form-control form-control-sm border-soft only-number" maxlength="15"></td>
                                        <td><input type="date" name="anak[{{$i}}][tgl_baptis]" class="form-control form-control-sm border-soft"></td>
                                        <td><input type="date" name="anak[{{$i}}][tgl_sidi]" class="form-control form-control-sm border-soft"></td>
                                        <td><input type="date" name="anak[{{$i}}][tgl_nikah]" class="form-control form-control-sm border-soft"></td>
                                        <td>
                                            <button type="button" class="btn btn-outline-danger btn-sm border-0" onclick="hapusBaris(this)">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    @endfor
                                </tbody>
                            </table>
                        </div>

                        <div class="mt-5 d-flex justify-content-between align-items-center">
                            <a href="{{ url('/') }}" class="btn-batal-formulir"><i class="fas fa-undo"></i> Batal</a>
                            <button type="submit" class="btn btn-primary px-5 py-3 fw-bold shadow"><i class="fas fa-paper-plane me-2"></i> KIRIM PENDAFTARAN</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Mekanisme sinkronisasi Nikah KK dengan Baris Pasangan
    function toggleMekanismeNikah(checkbox) {
        const rowPs = document.getElementById('rowPasangan');
        const inputsPs = rowPs.querySelectorAll('input, select');
        const tglNikahKK = document.getElementById('tgl_nikah_kk');
        const tglNikahPS = document.getElementById('tgl_nikah_ps');
        
        if (checkbox.checked) {
            rowPs.classList.remove('row-disabled');
            tglNikahKK.disabled = false;
            inputsPs.forEach(i => {
                i.disabled = false;
                if(i.id === 'namaPasangan' || i.id === 'hpPasangan') i.required = true;
            });
            // Set pasangan gender opposite to kk
            const kkJkSelect = document.querySelector('select[name="kk[jk]"]');
            const psJkSelect = document.querySelector('select[name="pasangan[jk]"]');
            const kkJk = kkJkSelect.value;
            psJkSelect.value = (kkJk === 'L') ? 'P' : 'L';
        } else {
            rowPs.classList.add('row-disabled');
            tglNikahKK.disabled = true;
            tglNikahKK.value = '';
            inputsPs.forEach(i => {
                i.disabled = true;
                i.required = false;
                if (i.tagName === 'SELECT') {
                    i.selectedIndex = 0;
                } else {
                    i.value = '';
                }
            });
        }
    }

    // Sync pasangan gender with kk gender when changed
    document.querySelector('select[name="kk[jk]"]').addEventListener('change', function() {
        const checkbox = document.getElementById('check_nikah_kk');
        if (checkbox.checked) {
            const psJkSelect = document.querySelector('select[name="pasangan[jk]"]');
            psJkSelect.value = (this.value === 'L') ? 'P' : 'L';
        }
    });

    // Sync tgl_nikah
    document.getElementById('tgl_nikah_kk').addEventListener('change', function() {
        const checkbox = document.getElementById('check_nikah_kk');
        if (checkbox.checked) {
            document.getElementById('tgl_nikah_ps').value = this.value;
        }
    });
    document.getElementById('tgl_nikah_ps').addEventListener('change', function() {
        const checkbox = document.getElementById('check_nikah_kk');
        if (checkbox.checked) {
            document.getElementById('tgl_nikah_kk').value = this.value;
        }
    });

    function tambahAnak() {
        let count = document.querySelectorAll('.baris-anak').length + 1;
        const row = document.createElement('tr');
        row.className = 'baris-anak';
        row.innerHTML = `
            <td class="nomor-anak fw-bold text-muted">${count}</td>
            <td><input type="text" name="anak[${count}][nama]" class="form-control form-control-sm border-soft" placeholder="Nama Anak"></td>
            <td><input type="text" name="anak[${count}][tempat_lahir]" class="form-control form-control-sm border-soft"></td>
            <td><input type="date" name="anak[${count}][tgl_lahir]" class="form-control form-control-sm border-soft"></td>
            <td><select name="anak[${count}][jk]" class="form-select form-select-sm border-soft"><option value="L" selected>L</option><option value="P">P</option></select></td>
            <td><input type="text" name="anak[${count}][pendidikan]" class="form-control form-control-sm border-soft"></td>
            <td><input type="text" name="anak[${count}][pekerjaan]" class="form-control form-control-sm border-soft"></td>
            <td><input type="text" name="anak[${count}][hp]" class="form-control form-control-sm border-soft only-number" maxlength="15"></td>
            <td><input type="date" name="anak[${count}][tgl_baptis]" class="form-control form-control-sm border-soft"></td>
            <td><input type="date" name="anak[${count}][tgl_sidi]" class="form-control form-control-sm border-soft"></td>
            <td><input type="date" name="anak[${count}][tgl_nikah]" class="form-control form-control-sm border-soft"></td>
            <td><button type="button" class="btn btn-outline-danger btn-sm border-0" onclick="hapusBaris(this)"><i class="fas fa-trash-alt"></i></button></td>
        `;
        document.getElementById('container-anak').appendChild(row);
        initOnlyNumber();
    }

    function hapusBaris(btn) { btn.closest('tr').remove(); updateNomor(); }
    function updateNomor() { document.querySelectorAll('.nomor-anak').forEach((td, i) => td.innerText = i + 1); }
    function initOnlyNumber() {
        document.querySelectorAll('.only-number').forEach(i => {
            i.oninput = function() { this.value = this.value.replace(/[^0-9]/g, ''); };
        });
    }
    initOnlyNumber();
</script>

<style>
    /* Menghilangkan garis hitam kaku */
    .table-bordered { border: 1px solid #dee2e6 !important; }
    .table-bordered td, .table-bordered th { border: 1px solid #dee2e6 !important; }
    
    /* Border input yang lembut */
    .border-soft {
        border: 1px solid #ced4da !important;
        border-radius: 4px !important;
        transition: border-color 0.2s;
    }
    .border-soft:focus {
        border-color: #0d6efd !important;
        box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.1) !important;
    }

    /* Row Kategori (Header A, B, C) */
    .row-category {
        background-color: #d1d1ff !important;
        color: #333;
        border-bottom: 2px solid #dee2e6 !important;
    }
    .row-category td { padding: 10px 15px !important; }

    /* State Row Disabled (Pasangan) */
    .row-disabled {
        opacity: 0.5;
        background-color: #f8f9fa !important;
    }

    .btn-action { border-radius: 20px; font-size: 0.75rem; }
    .btn-batal-formulir { 
        color: #dc3545; border: 1px solid #dc3545; padding: 10px 30px; 
        border-radius: 5px; text-decoration: none; font-weight: bold;
    }
    .btn-batal-formulir:hover { background: #dc3545; color: #fff; }

    /* Pastikan breadcrumb link berwarna putih */
    .breadcrumb-item a {
        color: white !important;
    }
    .breadcrumb-item.active {
        color: white !important;
    }
</style>
@endsection