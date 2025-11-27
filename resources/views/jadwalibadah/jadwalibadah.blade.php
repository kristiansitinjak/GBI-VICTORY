@extends('layout.admin')
@section('content')
    
<div class="container">
    <a href="{{ url('admin/tambahjadwalibadah') }}" class="btn btn-success mb-3">Tambah Data jadwal Ibadah</a>
    <h1>Daftar jadwal Ibadah</h1>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nama Ibadah</th>
                <th>Ayat ALkitab</th>
                <th>Tanggal</th>
                <th>Deskripsi</th>
                <th>Pengkhotbah</th>
                <th>Aksi</th> <!-- Kolom untuk tombol edit dan hapus -->
            </tr>
        </thead>
        <tbody>
            @foreach ($allJadwalibadah as $jadwalibadah)
            <tr>
                <td>{{ $jadwalibadah->namaibadah }}</td>
                <td>{{ $jadwalibadah->ayatalkitab }}</td>
                <td>{{ $jadwalibadah->tanggal }}</td>
                <td>{{ $jadwalibadah->deskripsi }}</td>
                <td>{{ $jadwalibadah->pengkhotbah }}</td>
                <td> <!-- Kolom untuk tombol edit dan hapus -->
                    <a href="{{ url('/admin/editjadwalibadah/'.$jadwalibadah->id)}}" class="btn btn-primary ml-3 mb-2">Edit</a>
                    <form action="{{ url('/admin/hapusjadwalibadah/'.$jadwalibadah->id)}}" method="post"> 
                        @csrf
                        @method('DELETE') <!-- Method DELETE untuk hapus -->
                        <button type="submit" class="btn btn-danger ml-3 delete-btn">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
