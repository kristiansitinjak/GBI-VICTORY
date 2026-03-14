@extends('layout.user')

@section('container')

<!-- Header -->
<div class="page-header-pendaftaran">
    <p class="subtitle">GBI Victory Sibolga</p>
    <h1>Pendaftaran Jemaat</h1>
    <div class="gold-divider"></div>
    <nav aria-label="breadcrumb" class="mt-3">
        <ol class="breadcrumb justify-content-center mb-0">
            <li class="breadcrumb-item"><a href="/" class="text-warning">Home</a></li>
            <li class="breadcrumb-item active text-white">Pendaftaran</li>
        </ol>
    </nav>
</div>

<section class="pendaftaran-section">

    <!-- Alert Success -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show mb-4">
            <i class="fa fa-check-circle me-2"></i>{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <!-- Alert Error -->
    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show mb-4">
            <i class="fa fa-exclamation-circle me-2"></i><strong>Terdapat kesalahan:</strong>
            <ul class="mb-0 mt-1">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <!-- Form Card -->
    <div class="form-card">
        <div class="form-card-header">
            <div class="form-header-icon"><i class="fa fa-file-alt"></i></div>
            <div>
                <h2>Formulir Data Jemaat</h2>
                <p>Kolom dengan tanda <span class="text-danger fw-bold">*</span> wajib diisi. Kolom lainnya bersifat opsional.</p>
            </div>
        </div>

        <form action="{{ url('pendaftaran-jemaat') }}" method="POST" id="formPendaftaran">
            @csrf

            <!-- Info Umum -->
            <div class="form-section">
                <div class="form-section-title">
                    <i class="fa fa-map-marker-alt"></i> Informasi Umum
                </div>
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label-custom">Sektor (Wijk) <span class="text-danger">*</span></label>
                        <select class="form-select border-soft" name="sektor" required>
                            <option value="">-- Pilih Sektor --</option>
                            @foreach(['I','II','III','IV','V','VI','VII','VIII','IX','X','XI'] as $roman)
                                <option value="Wijk {{ $roman }}" {{ old('sektor') == 'Wijk '.$roman ? 'selected' : '' }}>
                                    Wijk {{ $roman }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label-custom">Alamat Lengkap <span class="text-danger">*</span></label>
                        <input type="text" name="alamat" class="form-control border-soft"
                               placeholder="Contoh: Jl. Merdeka No. 10"
                               value="{{ old('alamat') }}" required>
                    </div>
                </div>
            </div>

            <!-- Tabel Anggota -->
            <div class="form-section">
                <div class="form-section-title">
                    <i class="fa fa-users"></i> Data Anggota Keluarga
                </div>

                <div class="table-responsive shadow-sm rounded">
                    <table class="table table-bordered align-middle text-center"
                           id="tabelJemaat" style="min-width: 1400px; font-size: 0.85rem;">
                        <thead>
                            <tr class="thead-main">
                                <th rowspan="2">NO</th>
                                <th rowspan="2" style="min-width:200px;">NAMA LENGKAP (Sesuai KTP)</th>
                                <th rowspan="2">Tempat Lahir</th>
                                <th rowspan="2">Tanggal Lahir</th>
                                <th rowspan="2" style="min-width:65px;">L/P</th>
                                <th rowspan="2">Pendidikan</th>
                                <th rowspan="2">Pekerjaan</th>
                                <th rowspan="2" style="min-width:130px;">No. HP</th>
                                <th colspan="3">STATUS GEREJAWI</th>
                                <th rowspan="2" style="width:60px;">Aksi</th>
                            </tr>
                            <tr class="thead-sub">
                                <th>Baptis</th>
                                <th>Sidi</th>
                                <th>Nikah</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- ══════════════════════════════ -->
                            <!-- A. KEPALA KELUARGA            -->
                            <!-- ══════════════════════════════ -->
                            <tr class="row-category">
                                <td colspan="12">A. Kepala Keluarga</td>
                            </tr>
                            <tr>
                                <td class="fw-bold text-muted">1</td>
                                <td><input type="text" name="kk[nama]" class="form-control form-control-sm border-soft" required placeholder="Nama K.Keluarga *" value="{{ old('kk.nama') }}"></td>
                                <td><input type="text" name="kk[tempat_lahir]" class="form-control form-control-sm border-soft" value="{{ old('kk.tempat_lahir') }}"></td>
                                <td><input type="date" name="kk[tgl_lahir]" class="form-control form-control-sm border-soft" value="{{ old('kk.tgl_lahir') }}"></td>
                                <td>
                                    <select name="kk[jk]" class="form-select form-select-sm border-soft">
                                        <option value="L" {{ old('kk.jk') == 'L' ? 'selected' : '' }}>L</option>
                                        <option value="P" {{ old('kk.jk') == 'P' ? 'selected' : '' }}>P</option>
                                    </select>
                                </td>
                                <td><input type="text" name="kk[pendidikan]" class="form-control form-control-sm border-soft" value="{{ old('kk.pendidikan') }}"></td>
                                <td><input type="text" name="kk[pekerjaan]" class="form-control form-control-sm border-soft" value="{{ old('kk.pekerjaan') }}"></td>
                                <td><input type="text" name="kk[hp]" class="form-control form-control-sm border-soft only-number" required placeholder="No.Handphone *" maxlength="15" value="{{ old('kk.hp') }}"></td>
                                <td><input type="date" name="kk[tgl_baptis]" class="form-control form-control-sm border-soft" value="{{ old('kk.tgl_baptis') }}"></td>
                                <td><input type="date" name="kk[tgl_sidi]" class="form-control form-control-sm border-soft" value="{{ old('kk.tgl_sidi') }}"></td>
                                {{-- Kolom nikah langsung aktif, tidak perlu checkbox --}}
                                <td><input type="date" name="kk[tgl_nikah]" class="form-control form-control-sm border-soft" value="{{ old('kk.tgl_nikah') }}"></td>
                                <td>-</td>
                            </tr>

                            <!-- ══════════════════════════════ -->
                            <!-- B. PASANGAN (langsung aktif)  -->
                            <!-- ══════════════════════════════ -->
                            <tr class="row-category">
                                <td colspan="12">B. Pasangan (Istri/Suami) — <small class="text-muted">Opsional, isi jika ada</small></td>
                            </tr>
                            <tr>
                                <td class="fw-bold text-muted">1</td>
                                <td><input type="text" name="pasangan[nama]" class="form-control form-control-sm border-soft" placeholder="Nama Pasangan (opsional)" value="{{ old('pasangan.nama') }}"></td>
                                <td><input type="text" name="pasangan[tempat_lahir]" class="form-control form-control-sm border-soft" value="{{ old('pasangan.tempat_lahir') }}"></td>
                                <td><input type="date" name="pasangan[tgl_lahir]" class="form-control form-control-sm border-soft" value="{{ old('pasangan.tgl_lahir') }}"></td>
                                <td>
                                    <select name="pasangan[jk]" class="form-select form-select-sm border-soft">
                                        <option value="P" {{ old('pasangan.jk', 'P') == 'P' ? 'selected' : '' }}>P</option>
                                        <option value="L" {{ old('pasangan.jk') == 'L' ? 'selected' : '' }}>L</option>
                                    </select>
                                </td>
                                <td><input type="text" name="pasangan[pendidikan]" class="form-control form-control-sm border-soft" value="{{ old('pasangan.pendidikan') }}"></td>
                                <td><input type="text" name="pasangan[pekerjaan]" class="form-control form-control-sm border-soft" value="{{ old('pasangan.pekerjaan') }}"></td>
                                <td><input type="text" name="pasangan[hp]" class="form-control form-control-sm border-soft only-number" placeholder="No.Handphone" maxlength="15" value="{{ old('pasangan.hp') }}"></td>
                                <td><input type="date" name="pasangan[tgl_baptis]" class="form-control form-control-sm border-soft" value="{{ old('pasangan.tgl_baptis') }}"></td>
                                <td><input type="date" name="pasangan[tgl_sidi]" class="form-control form-control-sm border-soft" value="{{ old('pasangan.tgl_sidi') }}"></td>
                                <td><input type="date" name="pasangan[tgl_nikah]" class="form-control form-control-sm border-soft" value="{{ old('pasangan.tgl_nikah') }}"></td>
                                <td>-</td>
                            </tr>

                            <!-- ══════════════════════════════ -->
                            <!-- C. ANAK                       -->
                            <!-- ══════════════════════════════ -->
                            <tr class="row-category">
                                <td colspan="12">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <span>C. Anak — <small class="text-muted">Opsional, isi jika ada</small></span>
                                        <button type="button" class="btn-tambah-anak" onclick="tambahAnak()">
                                            <i class="fa fa-plus-circle me-1"></i> Tambah Baris Anak
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
                                <td>
                                    <select name="anak[{{$i}}][jk]" class="form-select form-select-sm border-soft">
                                        <option value="L" selected>L</option>
                                        <option value="P">P</option>
                                    </select>
                                </td>
                                <td><input type="text" name="anak[{{$i}}][pendidikan]" class="form-control form-control-sm border-soft"></td>
                                <td><input type="text" name="anak[{{$i}}][pekerjaan]" class="form-control form-control-sm border-soft"></td>
                                <td><input type="text" name="anak[{{$i}}][hp]" class="form-control form-control-sm border-soft only-number" maxlength="15"></td>
                                <td><input type="date" name="anak[{{$i}}][tgl_baptis]" class="form-control form-control-sm border-soft"></td>
                                <td><input type="date" name="anak[{{$i}}][tgl_sidi]" class="form-control form-control-sm border-soft"></td>
                                <td><input type="date" name="anak[{{$i}}][tgl_nikah]" class="form-control form-control-sm border-soft"></td>
                                <td>
                                    <button type="button" class="btn-hapus-baris" onclick="hapusBaris(this)">
                                        <i class="fa fa-trash-alt"></i>
                                    </button>
                                </td>
                            </tr>
                            @endfor
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Submit -->
            <div class="form-footer">
                <a href="{{ url('/') }}" class="btn-batal">
                    <i class="fa fa-undo me-1"></i> Batal
                </a>
                <button type="submit" class="btn-kirim">
                    <i class="fa fa-paper-plane me-2"></i> Kirim Pendaftaran
                </button>
            </div>
        </form>
    </div>
</section>

<script>
    function tambahAnak() {
        let count = document.querySelectorAll('.baris-anak').length + 1;
        const row = document.createElement('tr');
        row.className = 'baris-anak';
        row.innerHTML = `
            <td class="nomor-anak fw-bold text-muted">${count}</td>
            <td><input type="text" name="anak[${count}][nama]" class="form-control form-control-sm border-soft" placeholder="Nama Anak"></td>
            <td><input type="text" name="anak[${count}][tempat_lahir]" class="form-control form-control-sm border-soft"></td>
            <td><input type="date" name="anak[${count}][tgl_lahir]" class="form-control form-control-sm border-soft"></td>
            <td>
                <select name="anak[${count}][jk]" class="form-select form-select-sm border-soft">
                    <option value="L" selected>L</option>
                    <option value="P">P</option>
                </select>
            </td>
            <td><input type="text" name="anak[${count}][pendidikan]" class="form-control form-control-sm border-soft"></td>
            <td><input type="text" name="anak[${count}][pekerjaan]" class="form-control form-control-sm border-soft"></td>
            <td><input type="text" name="anak[${count}][hp]" class="form-control form-control-sm border-soft only-number" maxlength="15"></td>
            <td><input type="date" name="anak[${count}][tgl_baptis]" class="form-control form-control-sm border-soft"></td>
            <td><input type="date" name="anak[${count}][tgl_sidi]" class="form-control form-control-sm border-soft"></td>
            <td><input type="date" name="anak[${count}][tgl_nikah]" class="form-control form-control-sm border-soft"></td>
            <td><button type="button" class="btn-hapus-baris" onclick="hapusBaris(this)"><i class="fa fa-trash-alt"></i></button></td>
        `;
        document.getElementById('container-anak').appendChild(row);
        initOnlyNumber();
    }

    function hapusBaris(btn) {
        btn.closest('tr').remove();
        updateNomor();
    }

    function updateNomor() {
        document.querySelectorAll('.nomor-anak').forEach((td, i) => td.innerText = i + 1);
    }

    function initOnlyNumber() {
        document.querySelectorAll('.only-number').forEach(i => {
            i.oninput = function () { this.value = this.value.replace(/[^0-9]/g, ''); };
        });
    }

    initOnlyNumber();
</script>

@endsection