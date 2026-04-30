@extends('layout.user')

@section('container')
    <style>


        /*--------------------------------------------------------------
        # Frequently Asked Questions
        --------------------------------------------------------------*/
        .faq .faq-list {
            padding: 0 100px;
        }

        .faq .faq-list ul {
            padding: 0;
            list-style: none;
        }

        .faq .faq-list li+li {
            margin-top: 15px;
        }

        .faq .faq-list li {
            padding: 20px;
            background: #fff;
            border-radius: 4px;
            position: relative;
        }

        .faq .faq-list a {
            display: block;
            position: relative;
            font-family: "Poppins", sans-serif;
            font-size: 16px;
            line-height: 24px;
            font-weight: 500;
            padding: 0 30px;
            outline: none;
            cursor: pointer;
        }

        .faq .faq-list .icon-help {
            font-size: 24px;
            position: absolute;
            right: 0;
            left: 20px;
            color: #76b5ee;
        }

        .faq .faq-list .icon-show,
        .faq .faq-list .icon-close {
            font-size: 24px;
            position: absolute;
            right: 0;
            top: 0;
        }

        .faq .faq-list p {
            margin-bottom: 0;
            padding: 10px 0 0 0;
        }

        .faq .faq-list .icon-show {
            display: none;
        }

        .faq .faq-list a.collapsed {
            color: #343a40;
        }

        .faq .faq-list a.collapsed:hover {
            color: #1977cc;
        }

        .faq .faq-list a.collapsed .icon-show {
            display: inline-block;
        }

        .faq .faq-list a.collapsed .icon-close {
            display: none;
        }

        @media (max-width: 1200px) {
            .faq .faq-list {
                padding: 0;
            }
        }


        /*--------------------------------------------------------------
        # Sections General
        --------------------------------------------------------------*/
        section {
            /* padding: 80px 0; */
        }

        .section-bg {
            background-color: #f2f2f2;
        }

        .section-title {
            text-align: center;
            padding-bottom: 50px;
        }

        .section-title h2 {
            font-size: 13px;
            letter-spacing: 1px;
            font-weight: 700;
            padding: 8px 20px;
            margin: 0;
            background: #f5f9fc;
            color: #428bca;
            display: inline-block;
            text-transform: uppercase;
            border-radius: 50px;
        }

        .section-title h3 {
            margin: 15px 0 0 0;
            font-size: 32px;
            font-weight: 700;
        }

        .section-title h3 span {
            color: #428bca;
        }

        .section-title p {
            margin: 15px auto 0 auto;
            font-weight: 500;
            color: #919191;
        }

        .img-fluids {
            float: left;
            margin-right: 20px;
            margin-bottom: 20px;
            max-width: 40%;
            height: auto;
        }

        @media (min-width: 1024px) {
            .section-title p {
                width: 50%;
            }
        }
    </style>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <!-- Carousel Start -->
    <div class="carousel-header">
        <div id="carouselId" class="carousel slide" data-bs-ride="carousel">
            <ol class="carousel-indicators">
                <li data-bs-target="#carouselId" data-bs-slide-to="0" class="active"></li>
                <li data-bs-target="#carouselId" data-bs-slide-to="1"></li>
                <li data-bs-target="#carouselId" data-bs-slide-to="2"></li>
            </ol>
            <div class="carousel-inner" role="listbox">
                <div class="carousel-item active">
                    <img src="{{ URL::asset('Template/img/GEREJA1.jpg') }}" class="img-fluid" alt="Image">
                    <div class="carousel-caption">
                        <div class="p-3" style="max-width: 900px;">
                            <h4 class="text-white text-uppercase fw-bold mb-4" style="letter-spacing: 3px;">Horas!!</h4>
                            <h1 class="display-2 text-capitalize text-white mb-4">Selamat Datang Di Gereja Bethel Indonesia Victory!</h1>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="{{URL::asset('Template/img/GEREJA2.jpg')}}" class="img-fluid" alt="Image">
                    <div class="carousel-caption">
                        <div class="p-3" style="max-width: 900px;">
                            <h4 class="text-white text-uppercase fw-bold mb-4" style="letter-spacing: 3px;">Salam Sejahtera!!</h4>
                            <h1 class="display-2 text-capitalize text-white mb-4">Selamat Datang Di Gereja Bethel Indonesia Victory!</h1>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="{{ URL::asset('Template/img/GEREJA3.jpg') }}" class="img-fluid" alt="Image">
                    <div class="carousel-caption">
                        <div class="p-3" style="max-width: 900px;">
                            <h4 class="text-white text-uppercase fw-bold mb-4" style="letter-spacing: 3px;">Salam Sejahtera!!</h4>
                            <h1 class="display-2 text-capitalize text-white mb-4">Selamat Datang Di Gereja Bethel Indonesia Victory!</h1>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselId" data-bs-slide="prev">
                <span class="carousel-control-prev-icon btn bg-primary" aria-hidden="false"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselId" data-bs-slide="next">
                <span class="carousel-control-next-icon btn bg-primary" aria-hidden="false"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <!-- Carousel End -->
    </div>

    <!-- Navbar & Hero End -->



<!-- About Start -->
<div class="container-fluid about py-5 d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="container py-5">
        <div class="row g-5 align-items-center justify-content-center">
            <div class="col-lg-12 text-center" style="background: linear-gradient(rgba(255, 255, 255, .9), rgba(255, 255, 255, .9)); padding: 40px; border-radius: 20px; box-shadow: 0 8px 20px rgba(0,0,0,0.12);">

                <!-- Title sesuai desain yang diminta -->
                <div class="section-header mb-5 pb-5 position-relative">
                    <h5 class="text-uppercase fw-semibold mb-3" 
                        style="font-size: 1.5rem; color: #6c757d; letter-spacing: 4px; font-weight: 600;">
                        SEJARAH GEREJA
                    </h5>
                    
                    <h1 class="display-4 fw-bold text-dark mb-1" style="line-height: 1.05; font-size: 3.8rem; letter-spacing: -0.5px;">
                        SELAMAT DATANG DI GEREJA
                    </h1>
                    <h1 class="display-4 fw-bold text-dark" style="line-height: 1; font-size: 3.8rem; letter-spacing: -0.5px;">
                        BETHEL INDONESIA VICTORY
                    </h1>

                    <!-- Garis dekorasi samping -->
                    <div class="position-absolute top-50 start-0 translate-middle-y" 
                         style="width: 120px; height: 5px; background: #428bca; left: -150px; border-radius: 3px;">
                    </div>
                    <div class="position-absolute top-50 end-0 translate-middle-y" 
                         style="width: 120px; height: 5px; background: #428bca; right: -150px; border-radius: 3px;">
                    </div>
                </div>

                <!-- Naskah / konten teks asli dimasukkan kembali sepenuhnya -->
                <div class="section-intro mb-5 text-start">
                    <img src="{{ URL::asset('Template/img/pexels-adrien-olichon-1257089-13282716.jpg') }}" 
                         alt="Gambar Sejarah Gereja" 
                         class="img-fluids float-start me-4 mb-4 rounded shadow-sm" 
                         style="max-width: 45%; height: auto;">

                    <p style="text-align: justify; line-height: 1.9; font-size: 1.15rem; color: #444;">
                        <span style="font-size: 3.5rem; font-weight: 100; line-height: 1; vertical-align: bottom; color: #428bca;">G</span>ereja Bethel Indonesia Victory Sibolga hadir sebagai bagian dari keluarga besar Sinode Gereja Bethel Indonesia yang memiliki misi untuk membawa transformasi bagi jemaat dan masyarakat di wilayah Sibolga dan sekitarnya. Berdirinya gereja ini didasari oleh kerinduan untuk memenangkan jiwa dan menjadi saluran berkat bagi kota ini melalui pelayanan yang penuh kuasa dan kasih Tuhan.
                        Sejak awal pembentukannya, GBI Victory terus bertumbuh sebagai komunitas jemaat yang dinamis, menekankan pada pertumbuhan rohani melalui ibadah kontemporer dan pemuridan yang kuat. Lokasinya yang strategis di Sibolga menjadikannya sebagai pusat pelayanan yang inklusif, merangkul berbagai latar belakang jemaat untuk bersama-sama mengalami kemenangan (victory) di dalam Kristus. Hingga saat ini, gereja tetap setia menjalankan visi untuk membangun jemaat yang militan dan berdampak bagi lingkungan sekitar.
                    </p>
                </div>

                <div class="section-content mb-5 text-start">
                    <p style="text-align: justify; line-height: 1.9; font-size: 1.15rem; color: #444;">
                        Visi dan Misi GBI Victory Sibolga
                        GBI Victory Sibolga bergerak dengan visi untuk menjadi gereja yang relevan dan berdampak, membawa setiap jemaat pada pengenalan yang mendalam akan Kristus. Misi kami adalah membangun komunitas yang kuat melalui pengajaran firman yang praktis, pujian penyembahan yang kreatif, serta pelayanan yang tulus kepada sesama di kota Sibolga. Kami percaya bahwa setiap orang dipanggil untuk menjadi pemenang dalam setiap aspek kehidupan mereka.
                        Struktur Pelayanan dan Komunitas
                        Untuk mendukung pertumbuhan rohani yang maksimal, GBI Victory Sibolga menyediakan wadah bagi setiap tingkatan usia, mulai dari sekolah minggu (Victory Kids), pelayanan anak muda (Youth Victory), hingga persekutuan kaum wanita dan pria. Fokus utama kami adalah melalui COOL (Community of Love), di mana jemaat dapat saling membangun, memperhatikan, dan bertumbuh bersama dalam kelompok kecil yang hangat dan akrab.
                    </p>
                </div>

                <div class="section-footer text-start">
                    <p style="text-align: justify; line-height: 1.9; font-size: 1.15rem; color: #444;">
                        Sebagai pusat kegiatan ibadah, sosial, dan pendidikan bagi masyarakat, GBI Victory Sibolga telah menjadi lambang kekuatan iman dan pelayanan dalam menghadapi berbagai cobaan. Dengan fondasi sejarah yang kokoh, gereja ini terus menjadi terang bagi dunia sekitarnya, memperkuat komunitasnya, dan memberkati masyarakat yang dilayaninya.
                    </p>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- About End -->
    
<section class="container-fluid py-5 bg-light">
    <div class="container py-5">
        <div class="text-center mb-5">
            <h5 class="section-title px-3">GALERI</h5>
            <h2 class="display-5 fw-bold">Momen Bersama GBI Victory</h2>
            <p class="lead text-muted">Beberapa kenangan indah dari kegiatan dan pelayanan kami</p>
        </div>

        @if($dataGaleri->count() > 0)
            <div class="row g-3 justify-content-center">
                @foreach($dataGaleri as $galeri)
                    <div class="col-6 col-md-4 col-lg-3">
                        <div class="card border-0 shadow-sm h-100 overflow-hidden">
                            <div style="height: 220px; overflow: hidden;">
                                <img src="{{ asset('Admin/gambar/' . $galeri->gambar) }}" 
                                    alt="{{ $galeri->judul }}" 
                                    style="width: 100%; height: 100%; object-fit: cover; transition: transform 0.3s ease;"
                                    onmouseover="this.style.transform='scale(1.05)'"
                                    onmouseout="this.style.transform='scale(1)'">
                            </div>
                            <div class="card-body text-center py-2">
                                <p class="card-text small fw-semibold text-dark mb-0">{{ $galeri->judul }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="text-center mt-5">
                <a href="{{ url('/galeri') }}" class="btn btn-primary btn-lg px-5 py-3 rounded-pill">
                    Lihat Semua Galeri <i class="fa fa-arrow-right ms-2"></i>
                </a>
            </div>

        @else
            <div class="text-center py-4">
                <p class="text-muted fs-5">Galeri sedang dalam proses pengisian.</p>
                <a href="{{ url('/galeri') }}" class="btn btn-outline-primary mt-3">Lihat Galeri Lengkap</a>
            </div>
        @endif

    </div>
</section>

<!-- Lokasi Mini di Home Start -->
<section class="container-fluid py-5 bg-white">
    <div class="container py-5">
        <div class="text-center mb-5">
            <h5 class="section-title px-3 text-uppercase fw-semibold" style="font-size: 1.5rem; color: #6c757d; letter-spacing: 4px;">
                LOKASI GEREJA
            </h5>
            <h2 class="display-5 fw-bold">GBI Victory Sibolga</h2>
            <p class="lead text-muted">Datang dan bergabung bersama kami di lokasi strategis kota Sibolga</p>
        </div>

        <div class="row g-5 align-items-center">
            <!-- Peta Kecil -->
            <div class="col-lg-6">
                <div class="rounded shadow overflow-hidden" style="border-radius: 15px;">
                    <iframe class="w-100" 
                            style="height: 400px; border: 0;" 
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4180.20435865153!2d98.77210289370609!3d1.7410976836290395!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x302ef5a2cdd25e5b%3A0x5adbd1e14a705751!2sGBI%20Jemaat%20VICTORY%2C%20Sibolga%20Kota!5e0!3m2!1sid!2sid!4v1732803511740!5m2!1sid!2sid" 
                            allowfullscreen="" 
                            loading="lazy" 
                            referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
            </div>

            <!-- Info Kontak -->
            <div class="col-lg-6">
                <div class="row g-4">
                    <div class="col-12">
                        <div class="card border-0 shadow-sm p-4 text-center">
                            <i class="fa fa-map-marker-alt fa-4x text-primary mb-3"></i>
                            <h4 class="fw-bold text-dark mb-3">Alamat</h4>
                            <p class="text-muted mb-0">
                                Jl. Com. Yos Sudarso No.35,<br>
                                Kota Beringin, Sibolga Kota,<br>
                                Kota Sibolga, Sumatera Utara 22513
                            </p>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="card border-0 shadow-sm p-4 text-center">
                            <i class="fa fa-phone-alt fa-3x text-primary mb-3"></i>
                            <h5 class="fw-bold text-dark mb-2">Telepon / WA</h5>
                            <p class="text-muted mb-0">0823-6689-7979</p>
                            <a href="https://wa.me/6282366897979?text=Shalom%20GBI%20Victory%2C%20saya%20ingin%20bertanya..." target="_blank" class="btn btn-sm btn-success mt-2">
                                <i class="fab fa-whatsapp me-1"></i></i> Chat WA
                            </a>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="card border-0 shadow-sm p-4 text-center">
                            <i class="fa fa-envelope-open fa-3x text-primary mb-3"></i>
                            <h5 class="fw-bold text-dark mb-2">Email</h5>
                            <p class="text-muted mb-0">gbivictorysibolga@gmail.com</p>
                            <a href="mailto:gbivictorysibolga@gmail.com" class="btn btn-sm btn-outline-primary mt-2">
                                Kirim Email
                            </a>
                        </div>
                    </div>
                </div>

                <div class="text-center mt-4">
                    <a href="{{ url('/lokasi') }}" class="btn btn-primary px-5 py-3 rounded-pill">
                        Lihat Detail Lokasi & Petunjuk Arah
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Lokasi Mini di Home End -->


    <div class="container-fluid bg-light service py-5">
        <div class="container py-5">
            <div class="mx-auto text-center mb-5" style="max-width: 900px;">
                <h5 class="section-title px-3">FAQ</h5>
                <h1 class="mb-0">Frequently Asked Question</h1>
            </div>
            <section id="faq" class="faq section-bg">
                <div class="container">
                    <div class="faq-list">
                        <ul>
                            @php
                                $No = 0;
                            @endphp
                            {{-- @foreach ($faq as $fq) --}}
                            @foreach ($dataFaq as $key => $fq)
                                @php
                                    $current = $loop->iteration;
                                @endphp
                                <li data-aos="fade-up" data-aos-delay="{{  $current }}00">
                                    <i class="fa fa-question-circle-o	icon-help"></i> <a data-bs-toggle="collapse" class="collapse" data-bs-target="#faq-list-{{  $current }}">{{ $fq->pertanyaan }}<i class="fa fa-sort-down	icon-show"></i><i class="fa fa-sort-asc icon-close"></i></a>
                                    <div id="faq-list-{{  $current }}" class="collapse {{  $current == 1 ? 'show' : '' }}" data-bs-parent=".faq-list-{{  $current }}">
                                        <p>
                                            {{ $fq->jawaban }}
                                        </p>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                </div>
            </section>
        </div>
    </div>



    <script>
        function toggleAnswer(element) {
            var answer = element.querySelector('.answer');
            if (answer.style.display === "none") {
                answer.style.display = "block";
            } else {
                answer.style.display = "none";
            }
        }
    </script>

@endsection

