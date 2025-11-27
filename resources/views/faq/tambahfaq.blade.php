@extends('layout.admin')

@section('content')
    
<div class="container">
    <h1 class="my-4">Tambah Faq</h1>
    <form action="/admin/tambahfaq" method="POST">
        @csrf
        <div class="mb-3">
            <label for="pertanyaan" class="form-label">Pertanyaan</label>
            <input type="text" class="form-control @error('pertanyaan') is-invalid @enderror" id="pertanyaan" name="pertanyaan" placeholder="Masukkan pertanyaan">
            @error('pertanyaan')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="jawaban" class="form-label">Jawaban</label>
            <textarea class="form-control @error('jawaban') is-invalid @enderror" id="jawaban" name="jawaban" placeholder="Masukkan jawaban"></textarea>
            @error('jawaban')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
