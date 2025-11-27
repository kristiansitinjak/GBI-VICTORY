@extends('layout.user')

@section('container')

 <!-- About Start -->
 <div class="container-fluid bg-breadcrumb"style="background-image: url('{{ URL::asset('Template/img/bg1.png')}}');">
    <div class="container text-center py-5" style="max-width: 900px;">
        <h3 class="text-white display-3 mb-4">Profil Pengurus</h3>
        <ol class="breadcrumb justify-content-center mb-0">
        </ol>    
    </div>
</div>
 <div class="container-fluid about py-5">
    <div class="container py-5">
        <div class="row g-5 align-items-center">
            <div class="col-lg-5">
                <div>
                    <img src="Template/img/fotobersama.jpg" class="img-fluid w-100 h-100" style="border-radius: 4ch; " alt="">
                </div>
            </div>
            <div class="col-lg-7" style="background: linear-gradient(rgba(255, 255, 255, .8), rgba(255, 255, 255, .8)), url(img/about-img-1.png);">
                <h5 class="section-about-title pe-3">Foto</h5>
                <h1 class="mb-4">Parhalaho <span class="text-primary">HKBP HKBP-Sabungan-Siborongborong</span></h1>
                <p class="mb-4">Foto yang ditampilkan adalah salah satu momen dari pelayanan atau Parhalado yang berlokasi di HKBP Sabungan Kota. Parhalado atau pelayanan merupakan bagian penting dalam kehidupan gereja, di mana jemaat berkumpul untuk beribadah, belajar Firman Tuhan, serta saling mendukung dan melayani satu sama lain dalam kehidupan rohani.</p>
                <div class="row gy-2 gx-4 mb-4"></div>
                
            </div>
        </div>
    </div>
</div>
<!-- About End -->

<!-- Travel Guide Start -->
<div class="container-fluid guide py-5">
    <div class="container py-5">
        <div class="mx-auto text-center mb-5" style="max-width: 900px;">
            <h5 class="section-title px-3  ">--</h5>
            <h1 class="mb-0">Pangula Huria</h1>
        </div>
        <div class="row g-4">
            @foreach ($dataPengurus as $item)
            <div class="col-md-6 col-lg-3">
                <div class="guide-item">
                    <div class="guide-img">
                        <div class="guide-img-efects">
                            <img src="{{ URL::asset('Admin/gambar/' .$item->gambar) }}" class="img-fluid rounded-top" style="width: 300px; height: 350px;" alt="Image">
                        </div>
                    </div>                    
                    <div class="guide-title text-center rounded-bottom p-4">
                        <div class="guide-title-inner">
                            <h4 class="mt-3">{{ $item->nama }}</h4>
                            <p class="mb-0">{{ $item->jabatan }}</p>
                        </div>
                    </div>
                </div>
            </div>            
            @endforeach
        </div>
    </div>
</div>
<!-- Travel Guide End -->
@endsection