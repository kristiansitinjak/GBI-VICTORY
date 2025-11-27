@extends('layout.admin')

@section('content')
<div class="container">
    <h1 class="my-4">Tambah Warta</h1>
    <form action="/admin/tambahwarta" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="judul">Judul:</label><br>
            <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul" name="judul" placeholder="Masukkan judul warta"><br>
            @error('judul')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="keterangan">Keterangan:</label><br>
            <textarea id="keterangan" class="form-control @error('keterangan') is-invalid @enderror" name="keterangan" rows="4" cols="50" placeholder="Masukkan keterangan warta"></textarea><br>
            @error('keterangan')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="tanggal">Tanggal:</label><br>
            <input type="date" class="form-control @error('tanggal') is-invalid @enderror" id="tanggal" name="tanggal"><br>
            @error('tanggal')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="photo">Photo:</label><br>
            <input type="file" class="form-control @error('photo') is-invalid @enderror" id="photo" name="photo"><br><br>
            @error('photo')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="pdf">File PDF:</label><br>
            <input type="file" class="form-control @error('pdf') is-invalid @enderror" id="pdf" name="pdf"><br><br>
            @error('pdf')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection