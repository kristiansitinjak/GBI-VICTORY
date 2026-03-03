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

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow border-0">
                <div class="card-body p-5">
                    <h4 class="card-title mb-4 text-primary">Form Pendaftaran Data Jemaat</h4>

                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    <form action="{{ url('pendaftaran-jemaat') }}" method="POST">
                        @csrf

                        <!-- Nama Keluarga -->
                        <div class="mb-3">
                            <label for="namakeluarga" class="form-label fw-bold">Nama Keluarga</label>
                            <input type="text" class="form-control @error('namakeluarga') is-invalid @enderror" 
                                   id="namakeluarga" name="namakeluarga" placeholder="Contoh: Kel. Sitinjak" 
                                   value="{{ old('namakeluarga') }}" required>
                            @error('namakeluarga')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        <!-- Sektor (MENGGUNAKAN ROMAWI AGAR SESUAI DATABASE) -->
                        <div class="mb-3">
                            <label for="sektor" class="form-label fw-bold">Sektor (Wijk)</label>
                            <select class="form-select @error('sektor') is-invalid @enderror" 
                                    id="sektor" name="sektor" required>
                                <option value="">-- Pilih Sektor --</option>
                                @php
                                    // Daftar Romawi sesuai isi Migration enum di tabel datajemaats
                                    $romans = ['I', 'II', 'III', 'IV', 'V', 'VI', 'VII', 'VIII', 'IX', 'X', 'XI'];
                                @endphp
                                @foreach($romans as $roman)
                                    @php $value = "Wijk $roman"; @endphp
                                    <option value="{{ $value }}" {{ old('sektor') == $value ? 'selected' : '' }}>
                                        {{ $value }}
                                    </option>
                                @endforeach
                            </select>
                            @error('sektor')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                        </div>

                        <!-- Alamat -->
                        <div class="mb-3">
                            <label for="alamat" class="form-label fw-bold">Alamat Lengkap</label>
                            <textarea class="form-control @error('alamat') is-invalid @enderror" 
                                      id="alamat" name="alamat" rows="3" required
                                      placeholder="Masukkan alamat domisili saat ini"
                                      style="resize:none;">{{ old('alamat') }}</textarea>
                            @error('alamat')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                        </div>

                        <!-- Telepon -->
                        <div class="mb-3">
                            <label for="telepon" class="form-label fw-bold">Nomor Telepon/WA</label>
                            <input type="text" class="form-control @error('telepon') is-invalid @enderror"
                                   id="telepon" name="telepon" placeholder="0812xxxxxxxx" 
                                   value="{{ old('telepon') }}">
                            @error('telepon')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        <div class="d-grid gap-2 pt-3">
                            <button type="submit" class="btn btn-primarysubmit">
                                <i class="fas fa-paper-plane me-2"></i> Kirim Pendaftaran
                            </button>
                            <a href="{{ url('/') }}" class="btn btn-outline-secondary py-2">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
