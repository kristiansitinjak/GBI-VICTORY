@extends('layout.admin')

@section('content')
<div class="container">
    <a href="{{url('admin/galeri')}}" class="btn btn-success mb-3">back</a>
    <div class="row">
        <div class="col-md-6">
            <form action="{{ url('/admin/updategaleri/'.$galeri->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="nama">Gambar</label>
                    <input name="gambar" type="file" class="form-control @error('gambar') is-invalid @enderror" id="gambar" placeholder="gambar" value="{{ $galeri->gambar }}">
                    @error('gambar')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="judul">Judul</label>
                    <input name="judul" type="text" class="form-control @error('judul') is-invalid @enderror" id="judul" placeholder="judul" value="{{ $galeri->judul }}">
                    @error('judul')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="kategori">Kategori</label>
                    <select name="kategori" class="form-control">
                        <option value="pastoral" {{ $galeri->kategori == 'pastoral' ? 'selected' : '' }}>Pastoral</option>
                        <option value="kegiatan" {{ $galeri->kategori == 'kegiatan' ? 'selected' : '' }}>Kegiatan</option>
                    </select>
                </div>
                <button class="btn btn-primary update-btn" type="submit ">Submit</button>
            </form>
        </div>
        <div class="col-md-6">
        </div>
    </div>
</div>
@endsection
