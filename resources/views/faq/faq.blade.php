@extends('layout.admin')

@section('content')
<div class="container">
    <a href="{{ url('admin/tambahfaq/') }}" class="btn btn-success mb-3">Tambah FAQ</a>
    <h1>Daftar FAQ</h1>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Pertanyaan</th>
                <th>Jawaban</th>
                <th>Aksi</th> <!-- Tambahkan kolom untuk tombol aksi -->
            </tr>
        </thead>
        <tbody>
            @foreach ($allFaq as $faq)
            <tr>
                <td>{{ $faq->pertanyaan }}</td>
                <td>{{ $faq->jawaban }}</td>
                <td>
                    <a href="{{ url('/admin/editfaq/'.$faq->id)}}" class="btn btn-primary">Edit</a>
                    <form action="{{ url('/admin/hapusfaq/'.$faq->id)}}" method="post" > 
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger ml-2 delete-btn">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
