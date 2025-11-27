@extends('layout.admin')

@section('content')
<div class="container">
    <a href="{{ url('admin/donasi') }}" class="btn btn-success mb-3">Kembali</a>
    <div class="row">
        <div class="col-md-6">
            <form action="{{ url('/admin/updatedonasi/'.$donasi->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="namapemberi">Nama Pemberi</label>
                    <input name="namapemberi" type="text" class="form-control @error('namapemberi') is-invalid @enderror" id="namapemberi" placeholder="Masukkan nama pemberi" value="{{ $donasi->namapemberi }}">
                    @error('namapemberi')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="tanggal">Tanggal</label>
                    <input name="tanggal" type="date" class="form-control @error('tanggal') is-invalid @enderror" id="tanggal" placeholder="Pilih tanggal donasi" value="{{ $donasi->tanggal }}">
                    @error('tanggal')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="jenis">Jenis Donasi</label>
                    <select name="jenis" class="form-control @error('jenis') is-invalid @enderror" id="jenis">
                        <option value="" disabled>Pilih jenis donasi</option>
                        <option value="Pembangunan" {{ $donasi->jenis == 'pembangunan' ? 'selected' : '' }}>Pembangunan</option>
                        <option value="Dana Pensiun" {{ $donasi->jenis == 'danapensiun' ? 'selected' : '' }}>Dana Pensiun</option>
                        <option value="Peduli Masyarakat" {{ $donasi->jenis == 'pedulimasyarakat' ? 'selected' : '' }}>Peduli Masyarakat</option>
                        <option value="Lansia" {{ $donasi->jenis == 'lansia' ? 'selected' : '' }}>Lansia</option>
                        <option value="Sekolah Minggu" {{ $donasi->jenis == 'sekolahminggu' ? 'selected' : '' }}>Sekolah Minggu</option>
                        <option value="Remaja/Naposo" {{ $donasi->jenis == 'remajanaposo' ? 'selected' : '' }}>Remaja/Naposo</option>
                        <option value="Lainnya" {{ $donasi->jenis == 'lainnya' ? 'selected' : '' }}>Lainnya</option>
                    </select>
                    @error('jenis')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="jumlahdonasi">Jumlah Donasi</label>
                    <input name="jumlahdonasi" type="number" class="form-control @error('jumlahdonasi') is-invalid @enderror" id="jumlahdonasi" placeholder="Masukkan jumlah donasi" value="{{ $donasi->jumlahdonasi }}">
                    @error('jumlahdonasi')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div> 
                <button class="btn btn-primary update-btn" type="submit">Submit</button>
            </form>
        </div>
        <div class="col-md-6">
            <!-- Kolom kanan kosong untuk layout yang seimbang -->
        </div>
    </div>
</div>
@endsection