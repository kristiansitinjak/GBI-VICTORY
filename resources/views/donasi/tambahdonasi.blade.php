@extends('layout.admin')

@section('content')
<div class="container">
    <h1 class="my-4">Tambah Daftar Donasi</h1>
    <form action="/admin/tambahdonasi" method="POST">
        @csrf
        <div class="mb-3">
            <label for="namapemberi" class="form-label">Nama Pemberi</label>
            <input type="text" class="form-control @error('namapemberi') is-invalid @enderror" id="namapemberi" name="namapemberi" value="{{ old('namapemberi') }}" placeholder="Masukkan nama pemberi">
            @error('namapemberi')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="tanggal" class="form-label">Tanggal</label>
            <input type="date" class="form-control @error('tanggal') is-invalid @enderror" id="tanggal" name="tanggal" value="{{ old('tanggal') }}" placeholder="Pilih tanggal donasi">
            @error('tanggal')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="jenis" class="form-label">Jenis Donasi</label>
            <select class="form-control @error('jenis') is-invalid @enderror" id="jenis" name="jenis">
                <option value="" disabled selected>Pilih jenis donasi</option>
                <option value="Pembangunan" {{ old('jenis') == 'Pembangunan' ? 'selected' : '' }}>Pembangunan</option>
                <option value="DanaPensiun" {{ old('jenis') == 'DanaPensiun' ? 'selected' : '' }}>Dana Pensiun</option>
                <option value="PeduliMasyarakat" {{ old('jenis') == 'PeduliMasyarakat' ? 'selected' : '' }}>Peduli Masyarakat</option>
                <option value="Lansia" {{ old('jenis') == 'Lansia' ? 'selected' : '' }}>Lansia</option>
                <option value="SekolahMinggu" {{ old('jenis') == 'SekolahMinggu' ? 'selected' : '' }}>Sekolah Minggu</option>
                <option value="RemajaNaposo" {{ old('jenis') == 'RemajaNaposo' ? 'selected' : '' }}>Remaja/Naposobulung</option>
                <option value="Lainnya" {{ old('jenis') == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
            </select>
            @error('jenis')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="jumlahdonasi" class="form-label">Jumlah Donasi</label>
            <input type="number" class="form-control @error('jumlahdonasi') is-invalid @enderror" id="jumlahdonasi" name="jumlahdonasi" value="{{ old('jumlahdonasi') }}" placeholder="Masukkan jumlah donasi">
            @error('jumlahdonasi')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
