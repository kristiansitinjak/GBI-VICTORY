@extends('layout.admin')
@section('content')

<div class="container">
    <a href="{{ url('/admin/tambahwarta') }}" class="btn btn-success mb-3">Tambah Warta</a>
    <h1>Warta Jemaat</h1>
    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Judul</th>
                    <th scope="col">Keterangan</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Photo</th>
                    <th scope="col">File</th>
                    <th scope="col">Aksi</th> <!-- Kolom untuk tombol edit dan hapus -->
                </tr>
            </thead>
            <tbody>
                @foreach ($allWarta as $warta)
                <tr>
                    <td>{{ $warta->judul }}</td>
                    <td>{{ $warta->keterangan }}</td>
                    <td>{{ $warta->tanggal }}</td>
                    <td><img src="{{ URL::asset('Admin/photo/'.$warta->photo) }}" class="img-thumbnail" alt="Image" width="150" height="100"></td>
                    <td class="text-center">
                        <a href="{{ asset('assets/file-warta/'.$warta->pdf) }}" download> {{ $warta->pdf }}</a>
                    </td>
                    <td> <!-- Kolom untuk tombol edit dan hapus -->
                        <a href="{{ url('/admin/editwarta/'.$warta->id)}}" class="btn btn-primary mb-2">Edit</a>
                        <form action="{{ url('/admin/hapuswarta/'.$warta->id)}}" method="post">
                            @csrf
                            @method('DELETE') <!-- Method DELETE untuk hapus -->
                            <button type="submit" class="btn btn-danger delete-btn">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection