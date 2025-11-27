@extends('layout.admin')

@section('content')
    

    <a href="{{ url('/admin/tambahpengurus') }}" class="btn btn-success mb-3">Tambah Pengurus</a>
    <h1>Galeri Pengurus Gereja</h1>
    <div class="row">

        @foreach ($allPengurus as $pengurus)
        <div class="col-md-4 mb-4">
            <div class="card">
                <img src="{{ URL::asset('Admin/gambar/'.$pengurus->gambar) }}" class="card-img-top" width="100" height="300" alt="Image">
                <div class="card-body">
                    <h5 class="card-title">{{ $pengurus->nama }}</h5>
                    <p class="card-text">{{ $pengurus->jabatan }}</p>
                </div>
                <div class="card-footer">
                    <a href="{{ url('/admin/editpengurus/'.$pengurus->id)}}" class="btn btn-primary">Edit</a>
                    <form action="{{ url('/admin/hapuspengurus/'.$pengurus->id)}}" method="post"> 
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger ml-9 delete-btn">Delete</button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>


@endsection

