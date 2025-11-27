@extends('layout.user')

@section('container')
 <!-- Header Start -->
<div class="container-fluid bg-breadcrumb" style="background-image: url('{{ URL::asset('Template/img/bg1.png')}}');">
    <div class="container text-center py-5" style="max-width: 900px;">
        <h3 class="text-white display-3 mb-4">Jadwal Ibadah</h3>
        <ol class="breadcrumb justify-content-center mb-0">
        </ol>    
    </div>
</div>
<!-- Header End -->

<div class="container">
    <div class="row justify-content-center">
        @foreach ($dataJadwalibadah as $item)
        <div class="col-lg-4 col-md-6 col-sm-12 mb-4 mt-4">
            <div class="card h-100">
                <img src="{{ asset('Template/img/alkitab.jpg') }}" class="card-img-top" alt="Sermon Thumbnail">
                <div class="card-body">
                    <div class="sermons-cata">
                        <a href="#" data-toggle="tooltip" data-placement="top" title="Video"><i class="fa fa-video-camera" aria-hidden="true"></i></a>
                        <a href="#" data-toggle="tooltip" data-placement="top" title="Audio"><i class="fa fa-headphones" aria-hidden="true"></i></a>
                        <a href="#" data-toggle="tooltip" data-placement="top" title="Docs"><i class="fa fa-file" aria-hidden="true"></i></a>
                        <a href="#" data-toggle="tooltip" data-placement="top" title="Download"><i class="fa fa-cloud-download" aria-hidden="true"></i></a>
                    </div>
                    <h4 class="card-title">{{ $item->namaibadah }}</h4>
                    <div class="sermons-meta-data">
                        <p><i class="fa fa-user" aria-hidden="true"></i> Sermon From: <span>{{ $item->pengkhotbah }}</span></p>
                        <p><i class="fa fa-tag" aria-hidden="true"></i> Categories: <span>{{ $item->deskripsi }}</span></p>
                        <p><i class="fa fa-calendar" aria-hidden="true"></i> {{ $item->tanggal }}</p>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>


@endsection




