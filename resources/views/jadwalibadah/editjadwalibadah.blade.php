@extends('layout.admin')

@section('content')
<div class="container">
    <a href="{{url('admin/jadwalibadah')}}" class="btn btn-success mb-3">back</a>
    <div class="row">
        <div class="col-md-6">
            <form action="{{ url('/admin/updatejadwalibadah/'.$jadwalibadah->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="namaibadah">Nama Ibadah</label>
                    <input name="namaibadah" type="text" class="form-control @error('namaibadah') is-invalid @enderror" id="namaibadah" placeholder="Nama" value="{{ $jadwalibadah->namaibadah }}">
                    @error('namaibadah')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="ayatalkitab">Ayat Alkitab</label>
                    <input name="ayatalkitab" type="text" class="form-control @error('ayatalkitab') is-invalid @enderror" id="ayatalkitab" placeholder="Ayat Alkitab" value="{{ $jadwalibadah->ayatalkitab }}">
                    @error('ayatalkitab')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="tanggal">Tanggal</label>
                    <input name="tanggal" type="date" class="form-control @error('tanggal') is-invalid @enderror" id="tanggal" value="{{ $jadwalibadah->tanggal }}">
                    @error('tanggal')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="deskripsi">Deskripsi</label>
                    <textarea name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" rows="3">{{ $jadwalibadah->deskripsi }}</textarea>
                    @error('deskripsi')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="pengkhotbah">Pengkhotbah</label>
                    <input name="pengkhotbah" type="text" class="form-control @error('pengkhotbah') is-invalid @enderror" id="pengkhotbah" placeholder="Ayat Alkitab" value="{{ $jadwalibadah->pengkhotbah }}">
                    @error('pengkhotbah')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                
                <button class="btn btn-primary update-btn" type="submit ">Submit</button>
            </form>
        </div>
        <div class="col-md-6">
        </div>
    </div>
</div>
@endsection


