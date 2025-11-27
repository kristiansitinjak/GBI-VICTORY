@extends('layout.user')

@section('container')

<style>

.national-item,
.international-item {
    position: relative;
}

.national-info,
.international-info {
    position: absolute;
    bottom: 8%;
    width: 100%;
}

</style>

    <!-- Header Start -->
    <div class="container-fluid bg-breadcrumb" style="background-image: url('{{ URL::asset('Template/img/bg1.png')}}');">
        <div class="container text-center py-5" style="max-width: 900px;">
            <h3 class="text-white display-3 mb-4">Galeri</h3>
            <ol class="breadcrumb justify-content-center mb-0">
            </ol>
        </div>
    </div>
    <!-- Header End -->

    <!-- Explore Tour Start -->
    <div class="container-fluid ExploreTour py-5">
    <div class="container py-5">
        <div class="mx-auto text-center mb-5" style="max-width: 900px;">
            <h5 class="section-title px-3">-</h5>
            <h1 class="mb-4">Galeri</h1>
            <p class="mb-0">Galeri dari HKBP Sabungan Siborong Borong berisi tentang kegiatan gereja dan kunjungan Pastoral. Dalam galeri ini, Anda akan menemukan momen-momen yang mengabadikan berbagai kegiatan gereja yang diadakan di HKBP Sabungan Siborong Borong, serta kunjungan pastoral yang dilakukan oleh gereja tersebut. Setiap gambar menceritakan cerita tentang kebersamaan, ibadah, pelayanan, dan berbagai kegiatan lainnya yang dilakukan oleh jemaat dan pemimpin gereja dalam memperkuat iman dan mengembangkan pelayanan gereja. Dengan galeri ini, kami berharap dapat membagikan kegembiraan, inspirasi, dan semangat pelayanan gereja kepada semua yang melihatnya.</p>
        </div>
        <div class="tab-class text-center">
            <ul class="nav nav-pills d-inline-flex justify-content-center mb-5">
                <li class="nav-item">
                    <a class="d-flex mx-3 py-2 border border-primary bg-light rounded-pill active" data-bs-toggle="pill" href="#kegiatan">
                        <span class="text-dark" style="width: 250px;">Kegiatan Gereja</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="d-flex py-2 mx-3 border border-primary bg-light rounded-pill" data-bs-toggle="pill" href="#pastoral">
                        <span class="text-dark" style="width: 250px;">Pastoral</span>
                    </a>
                </li>
            </ul>
            <div class="tab-content">
                <div id="kegiatan" class="tab-pane fade show p-0 active">
                    <div class="card mb-5">
                        <div class="card-body">
                            <p class="mb-0">"Kegiatan Gereja HKBP Sabungan Siborong Borong meliputi berbagai aktivitas yang dirancang untuk memperkuat iman dan membangun komunitas jemaat. Setiap minggu, gereja mengadakan ibadah rutin yang diikuti oleh kegiatan pendukung seperti kelompok doa dan studi Alkitab. Selain itu, gereja juga menyelenggarakan event spesial seperti seminar, retret, dan kegiatan kebersamaan yang menginspirasi serta memotivasi jemaat untuk terus berkembang dalam iman. Perayaan besar seperti Natal, Paskah, dan Hari Jadi Gereja dirayakan dengan penuh suka cita melalui kebaktian, drama, konser, dan berbagai kegiatan lainnya yang melibatkan seluruh anggota jemaat. Kegiatan gereja juga mencakup dokumentasi dari momen penting seperti naik sidi dan baptisan, yang menjadi tonggak bersejarah dalam perjalanan rohani jemaat. Dalam setiap kegiatan, gereja berusaha menciptakan momen kebersamaan yang hangat dan bermakna bagi semua yang terlibat."</p>
                        </div>
                    </div>
                    <div class="row g-4">
                        @foreach ($dataGaleri->where('kategori', 'kegiatan') as $item)
                        <div class="col-md-6 col-lg-4">
                            <div class="national-item">
                                <img src="{{ URL::asset('Admin/gambar/' .$item->gambar) }}" class="img-fluid w-100 rounded" style="width: 500px; height: 300px;" alt="Image">
                                <div class="national-info">
                                    <h5 class="text-white text-uppercase mb-2">{{ $item->judul }}</h5>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div id="pastoral" class="tab-pane fade p-0">
    <div class="card mb-5">
        <div class="card-body">
            <p class="mb-0">"Kategori Pastoral HKBP Sabungan Siborong Borong mendokumentasikan berbagai aktivitas pelayanan sosial yang dilakukan oleh gereja untuk mendukung dan menguatkan jemaat serta masyarakat. Pelayanan pastoral mencakup kegiatan pergi melayat untuk memberikan dukungan dan penghiburan kepada keluarga yang berduka, menjenguk jemaat yang sakit untuk memberikan doa dan semangat, serta memberikan donasi kepada mereka yang terkena bencana alam. Setiap dokumentasi menangkap momen kebersamaan dan kasih sayang yang ditunjukkan oleh pemimpin gereja dan jemaat dalam menghadapi situasi sulit. Dengan melihat dokumentasi ini, kami berharap dapat menyebarkan semangat kepedulian dan solidaritas kepada semua yang melihatnya, menunjukkan bahwa gereja selalu hadir untuk membantu dan mendukung komunitasnya."</p>
        </div>
    </div>
    <div class="row g-4">
        @foreach ($dataGaleri->where('kategori', 'pastoral') as $item)
        <div class="col-md-6 col-lg-4">
            <div class="national-item">
                <img src="{{ URL::asset('Admin/gambar/' .$item->gambar) }}" class="img-fluid w-100 rounded" style="width: 500px; height: 300px;" alt="Image">
                <div class="national-info">
                    <h5 class="text-white text-uppercase mb-2">{{ $item->judul }}</h5>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

            </div>
        </div>
    </div>
</div>
    <!-- Explore Tour End -->
@endsection

