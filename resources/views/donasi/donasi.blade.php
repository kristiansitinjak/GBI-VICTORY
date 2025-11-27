@extends('layout.admin')
@section('content')
    
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <a href="{{ url('admin/tambahdonasi') }}" class="btn btn-success mb-3">Tambah Daftar Donasi</a>
        </div>
    </div>
    <h1>Daftar Donasi</h1>
    <div class="col-md- text-right">
        <h1>Jumlah Donasi: Rp. {{ number_format($JumlahDonasi), 0 }}</h1>
    </div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nama Pemberi</th>
                <th>Tanggal</th>
                <th>Jenis</th>
                <th>Jumlah Donasi</th>
                <th>Aksi</th> <!-- Kolom untuk tombol edit dan hapus -->
            </tr>
        </thead>
        <tbody>
            @foreach ($allDonasi as $donasi)
            <tr>
                <td>{{ $donasi->namapemberi }}</td>
                <td>{{ $donasi->tanggal }}</td>
                <td>{{ $donasi->jenis }}</td>
                <td>Rp. {{ number_format($donasi->jumlahdonasi), 0}}</td>
                
                <td> <!-- Kolom untuk tombol edit dan hapus -->
                    <a href="{{ url('/admin/editdonasi/'.$donasi->id)}}" class="btn btn-primary ml-3 mb-2">Edit</a>
                    <form action="{{ url('/admin/hapusdonasi/'.$donasi->id)}}" method="post"> 
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
