@extends('layout.admin')

@section('content')
<div class="container">
    <h1 class="my-4">Tambah Jadwal Ibadah</h1>
    <form action="/admin/tambahjadwalibadah" method="POST">
        @csrf
        <div class="mb-3">
            <label for="namaibadah" class="form-label">Nama Ibadah</label>
            <input type="text" class="form-control @error('namaibadah') is-invalid @enderror" id="namaibadah" name="namaibadah" placeholder="Masukkan nama ibadah">
            @error('namaibadah')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="ayatalkitab" class="form-label">Ayat Alkitab</label>
            <input type="text" class="form-control @error('ayatalkitab') is-invalid @enderror" id="ayatalkitab" name="ayatalkitab" placeholder="Masukkan ayat Alkitab">
            @error('ayatalkitab')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="tanggal" class="form-label">Tanggal</label>
            <input type="date" class="form-control @error('tanggal') is-invalid @enderror" id="tanggal" name="tanggal">
            @error('tanggal')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>  
        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" name="deskripsi" rows="3" placeholder="Masukkan deskripsi"></textarea>
            @error('deskripsi')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="pengkhotbah" class="form-label">Pengkhotbah</label>
            <input type="text" class="form-control @error('pengkhotbah') is-invalid @enderror" id="pengkhotbah" name="pengkhotbah" placeholder="Masukkan nama pengkhotbah">
            @error('pengkhotbah')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
 