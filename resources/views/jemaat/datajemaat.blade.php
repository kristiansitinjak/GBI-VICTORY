@extends('layout.admin')

@section('content')
<div class="container">
    <a href="{{ url('admin/tambahdatajemaat') }}" class="btn btn-success mb-3">Tambah Data Jemaat</a>
    <h1>Daftar Seluruh Jemaat</h1>
    @if($allDatajemaat->isEmpty())
        <p>Maaf, tidak ada data jemaat yang tersedia saat ini.</p>
    @else
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nama Keluarga</th>
                    <th>Sektor</th>
                    <th>Alamat</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($allDatajemaat as $datajemaat)
                <tr>
                    <td>{{ $datajemaat->namakeluarga }}</td>
                    <td>{{ $datajemaat->sektor }}</td>
                    <td>{{ $datajemaat->alamat }}</td>
                    <td>
                        <a href="{{ url('/admin/viewdatajemaat/'.$datajemaat->id) }}" class="btn btn-primary ml-3 mb-2">View</a>
                        <a href="{{ url('/admin/editdatajemaat/'.$datajemaat->id) }}" class="btn btn-warning ml-3 mb-2">Edit</a>
                        <form action="{{ url('/admin/hapusdatajemaat/'.$datajemaat->id) }}" method="post" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger ml-3" onclick="return confirm('Anda yakin ingin menghapus data jemaat ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
