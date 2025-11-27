@extends('layout.admin')

@section('content')
    

<div class="container">
    <a href="{{url('admin/pengurus')}}" class="btn btn-success m-2">back</a>
    <div class="row m-1">
        <div class="col">
            <form action="{{ url('/admin/updatepengurus/'.$pengurus->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="nama">Gambar</label>
                    <input name="gambar" type="file" class="form-control @error('gambar') is-invalid @enderror" id="gambar" placeholder="gambar" value="{{ $pengurus->gambar }}">
                    @error('gambar')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="deskripsi">Nama</label>
                    <textarea name="nama" class="form-control @error('nama') is-invalid @enderror" id="nama" rows="3">{{ $pengurus->nama }}</textarea>
                    @error('nama')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="deskripsi">Jabatan</label>
                    <textarea name="jabatan" class="form-control @error('jabatan') is-invalid @enderror" id="jabatan" rows="3">{{ $pengurus->jabatan }}</textarea>
                    @error('jabatan')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                
                <button class="btn btn-primary update-btn" type="submit">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection