@extends('layout.admin')

@section('content')
<div class="container">
    <a href="{{url('admin/faq')}}" class="btn btn-success mb-3">back</a>
    <div class="row">
        <div class="col-md-6">
            <form action="{{ url('/admin/updatefaq/'.$faq->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="nama">Pertanyaan</label>
                    <input name="pertanyaan" type="text" class="form-control @error('pertanyaan') is-invalid @enderror" id="pertanyaan" placeholder="Pertanyaan" value="{{ $faq->pertanyaan }}">
                    @error('pertanyaan')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="deskripsi">Jawaban</label>
                    <textarea name="jawaban" class="form-control @error('jawaban') is-invalid @enderror" id="jawaban" rows="3">{{ $faq->jawaban }}</textarea>
                    @error('jawaban')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <button class="btn btn-primary update-btn" type="submit">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection


