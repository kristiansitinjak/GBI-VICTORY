@extends('layout.admin')

@push('script')
<script>
    $(document).ready(function() {
        $('#jumlahAnak').change(function() {
            var numAnak = $(this).val();
            var html = '';
            for (var i = 2; i <= numAnak; i++) {
                html += '<div class="form-group">';
                html += '<label for="namaanak' + i + '" class="form-label">Nama Anak ' + i + '</label>';
                html += '<input type="text" class="form-control @error("namaanak.' + (i-1) + '") is-invalid @enderror" id="namaanak' + i + '" name="namaanak[]" placeholder="Masukkan Nama Anak">';
                html += '@error("namaanak.' + (i-1) + '")';
                html += '<div class="alert alert-danger">{{ $message }}</div>';
                html += '@enderror';
                html += '</div>';
            }
            $('#additionalFields').html(html);
        });
    });
</script>
@endpush

@section('content')
<div class="container">
    <h1 class="my-4">Tambah Data Jemaat</h1>
    <form action="/admin/tambahdatajemaat" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
            <div class="mb-3">
                <label for="namakeluarga" class="form-label">Nama Keluarga</label>
                <input type="text" class="form-control @error('namakeluarga') is-invalid @enderror" id="namakeluarga" name="namakeluarga" placeholder="Masukkan Nama Keluarga">
                @error('namakeluarga')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="sektor" class="form-label">Sektor</label>
                <select class="form-control @error('sektor') is-invalid @enderror" id="sektor" name="sektor">
                    <option value="">Pilih Sektor</option>
                    <option value="Wijk I">Wijk I</option>
                    <option value="Wijk II">Wijk II</option>
                    <option value="Wijk III">Wijk III</option>
                    <option value="Wijk IV">Wijk IV</option>
                    <option value="Wijk V">Wijk V</option>
                    <option value="Wijk VI">Wijk VI</option>
                    <option value="Wijk VII">Wijk VII</option>
                    <option value="Wijk VIII">Wijk VIII</option>
                    <option value="Wijk IX">Wijk IX</option>
                    <option value="Wijk X">Wijk X</option>
                    <option value="Wijk XI">Wijk XI</option>
                </select>
                @error('sektor')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" placeholder="Masukkan Alamat">
                @error('alamat')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="namaayah" class="form-label">Nama Ayah</label>
                <input type="text" class="form-control @error('namaayah') is-invalid @enderror" id="namaayah" name="namaayah" placeholder="Masukkan Nama Ayah">
                @error('namaayah')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="namaibu" class="form-label">Nama Ibu</label>
                <input type="text" class="form-control @error('namaibu') is-invalid @enderror" id="namaibu" name="namaibu" placeholder="Masukkan Nama Ibu">
                @error('namaibu')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="jumlahAnak">Jumlah Anak</label>
                <select class="form-control" id="jumlahAnak" name="jumlahAnak">
                    @for ($i = 1; $i <= 30; $i++)
                        <option value="{{ $i }}">{{ $i }}</option>
                    @endfor
                </select>
            </div>
            <div id="anak">
                <div class="form-group">
                    <label for="namaanak1" class="form-label">Nama Anak 1</label>
                    <input type="text" class="form-control @error('namaanak.0') is-invalid @enderror" id="namaanak1" name="namaanak[]" placeholder="Masukkan Nama Anak">
                    @error('namaanak.0')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div id="additionalFields"></div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>
@endsection
