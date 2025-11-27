@extends('layout.admin')

@section('content')
<div class="container">
    <a href="{{ url('/admin/tambahgaleri') }}" class="btn btn-success mb-3">Tambah galeri</a>
    <h1 class="mb-4">Galeri Gereja</h1>
    <div class="row">
        @foreach ($allGaleri as $galeri)
        <div class="col-md-4 mb-4">
            <div class="card shadow">
                <img src="{{ URL::asset('Admin/gambar/'.$galeri->gambar) }}" class="card-img-top" width="300px" height="350px" alt="Image">
                <div class="card-body">
                    <h5 class="card-title">{{ $galeri->judul }}</h5>
                    <p class="card-text">Kategori: {{ $galeri->kategori }}</p>
                </div>
                <div class="card-footer d-flex justify-content-center">
                    <form action="{{ url('/admin/hapusgaleri/'.$galeri->id)}}" method="post"> 
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger mr-2 delete-btn">Delete</button>
                    </form>
                    <a href="{{ url('/admin/editgaleri/'.$galeri->id)}}" class="btn btn-primary ">Edit</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
