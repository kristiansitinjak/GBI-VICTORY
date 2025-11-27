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
                            <h1 class="display-2 text-capitalize text-white mb-4">Selamat Datang Di HKBP Sabungan!</h1>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="{{URL::asset('Template/img/GEREJA2.jpg')}}" class="img-fluid" alt="Image">
                    <div class="carousel-caption">
                        <div class="p-3" style="max-width: 900px;">
                            <h4 class="text-white text-uppercase fw-bold mb-4" style="letter-spacing: 3px;">Horas!!</h4>
                            <h1 class="display-2 text-capitalize text-white mb-4">Selamat Datang Di HKBP Sabungan!</h1>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="{{ URL::asset('Template/img/GEREJA3.jpg') }}" class="img-fluid" alt="Image">
                    <div class="carousel-caption">
                        <div class="p-3" style="max-width: 900px;">
                            <h4 class="text-white text-uppercase fw-bold mb-4" style="letter-spacing: 3px;">Horas!!</h4>
                            <h1 class="display-2 text-capitalize text-white mb-4">Selamat Datang Di HKBP Sabungan!</h1>
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

    <!-- Ayat Harian Start -->
    <div class="container-fluid service py-5">
        <div class="container py-5">
            <div class="mx-auto text-center mb-5" style="max-width: 900px;">
                <h5 class="section-title px-3">Ibadah Minggu</h5>
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <div class="jadwal-ibadah">
                            <h2 class="ibadah-title">Ibadah I</h2>
                            <p class="ibadah-time">Pkl. 09.00 Wib</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="jadwal-ibadah">
                            <h2 class="ibadah-title">Ibadah II</h2>
                            <p class="ibadah-time">Pkl. 11.00 Wib</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="jadwal-ibadah">
                            <h2 class="ibadah-title">Ibadah III</h2>
                            <p class="ibadah-time">Pkl. 17.00 Wib</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            fetch('https://labs.bible.org/api/?passage=votd&type=json')
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Gagal mengambil data: ' + response.status);
                    }
                    return response.json();
                })
                .then(data => {
                    if (data.length > 0) {
                        const verseText = data[0].text;
                        document.getElementById('ayat').textContent = verseText;
                    } else {
                        throw new Error('Data tidak ditemukan.');
                    }
                })
                .catch(error => {
                    console.error(error);
                    if (error.message === 'Failed to fetch') {
                        document.getElementById('ayat').textContent = 'Gagal memuat ayat harian. Terjadi masalah dengan koneksi internet. Silakan coba lagi nanti.';
                    } else {
                        document.getElementById('ayat').textContent = 'Gagal memuat ayat harian. ' + error.message + ' Silakan coba lagi nanti.';
                    }
                });
        });
    </script>
    <!-- Ayat Harian End -->

    <!-- About Start -->
    <div class="container-fluid about py-5 d-flex justify-content-center align-items-center" style="min-height: 100vh;">
        <div class="container py-5">
            <div class="row g-5 align-items-center justify-content-center">
                <div class="col-lg-12 text-center" style="background: linear-gradient(rgba(255, 255, 255, .8), rgba(255, 255, 255, .8)); padding: 30px; border-radius: 15px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
                    <div class="section-header mb-4">
                        <h5 class="section-subtitle" style="font-size: 1.5rem; color: #6c757d; font-weight: 500; text-transform: uppercase; letter-spacing: 2px;">Sejarah Gereja</h5>
                        <h1 class="" style="font-size: 3rem; font-weight: bold; color: #2C3E50;">Selamat Datang di HKBP Sabungan Kota</h1>
                    </div>
                    <div class="section-intro mb-4">
                        <img src="{{ URL::asset('Template/img/pexels-adrien-olichon-1257089-13282716.jpg') }}" alt="Gambar Sejarah Gereja" class="img-fluids float-start me-3 mb-3" style="max-width: 50%; height: auto;">
                        <p style="text-align: justify; line-height: 1.8; font-size: 1.1rem; color: #555;">
                            <span style="font-size: 3rem; font-weight: 100; line-height: 1; vertical-align: bottom;">G</span>ereja HKBP Sabungan Siborongborong berdiri pada tahun 1892 dan saat ini sudah berumur 130 tahun. Awal mula berdirinya gereja ini tidak terlepas dari sejarah berdirinya Gereja Dame Saitnihuta yang didirikan oleh Dr. I. L. Nommensen pada tanggal 20 Mei 1864. Ketika Nommensen mendirikan Gereja Dame Saitnihuta, Raja Naor Hutasoit yang merupakan kelahiran Siborongborong merantau ke Silindung Simorangkir dan memberikan hatinya untuk dibaptis menjadi Kristen. Setelah ia menjadi Kristen, ia kembali ke daerah kelahirannya pada tahun 1885. Ia mengajak saudaranya untuk dibaptis yaitu; Raja Isak Hutasoit, Raja Aristarkus Hutasoit, Raja Elias Hutasoit, Raja Aron Hutasoit, dan Raja Simon Hutasoit, dan mereka membuka perkampungan di Tapian Nauli Siborongborong.
                        </p>
                    </div>
                    <div class="section-content mb-4">
                        <p style="text-align: justify; line-height: 1.8; font-size: 1.1rem; color: #555;">
                            Pada saat itu pemerintah Belanda membuat “Pasanggarahan” di dekat Onangudang Siborongborong. Pemerintah Belanda mengangkat Op. Toga Tunggal Hutasoit menjadi Raja Ihutan Nahor Hutasoit sebagai pengajar di Siborongborong hingga Pohan. Raja Pandua Nahor Hutasoit meminta kepada marga Sihombing, Pohan, dan Marbun untuk mendekatkan tempat tinggal mereka ke pinggir jalan Onangudang. Nommensen mengusulkan agar tempat penginapan tersebut menjadi tempat peribadahan mereka. Setelah jemaat bertambah, Raja Nahor Hutasoit meminta Nommensen untuk mengirim pelayan untuk melayani jemaat. Nommensen mengirim Gr. Eras Simanjuntak sebagai guru untuk melayani mereka. Mereka kemudian sepakat membangun gedung gereja sekaligus gedung sekolah. Mereka membeli satu rumah dari Silando untuk dijadikan gereja dan sekolah di Tapian Nauli Siborongborong, lokasi gereja saat ini. Tanah gereja adalah sumbangan dari Raja Aristarkus Hutasoit. Pada Minggu, 13 Juli 1892, enam pasangan dibaptis oleh Pdt. Ernist Pasaribu dari Paniaran dan gereja diresmikan di Siborongborong.
                        </p>
                        <p style="text-align: justify; line-height: 1.8; font-size: 1.1rem; color: #555;">
                            Pada tahun 1894, Raja Pandua Nahor Hutasoit meminta Nommensen untuk mengirim seorang Pendeta sebagai pengganti Gr. Eras Simanjuntak karena belum adanya Pendeta di Humbang. Nommensen mengirim Pdt. Sett untuk melayani di gereja Siborongborong dan wilayah Humbang. Pdt. Sett meminta agar gedung gereja dipindahkan ke Silaitlait Hariara, sekitar 4 km dari Tapian Nauli Siborongborong. Awalnya, Raja Pandua Nahor Hutasoit tidak menyetujui, tetapi demi perkembangan injil di utara, seperti Paranginan, Hutaginjang, dan Hasundutan, usulan tersebut disetujui. Gereja dipindahkan ke Silaitlait Hariara dan diberi nama “Huria Silaitlait”. Gedung gereja, sekolah, dan tempat tinggal pendeta ditempatkan di Silaitlait.
                        </p>
                        <p style="text-align: justify; line-height: 1.8; font-size: 1.1rem; color: #555;">
                            Huria Silaitlait berkembang baik dalam pelayanan dan pertumbuhan jemaat yang datang untuk dibaptis dan belajar di sekolah Silaitlait. Namun, pada tahun 1900, setelah Pendeta tidak tinggal di Silaitlait dan masyarakat di Siborongborong bertambah, gereja direncanakan untuk dipindahkan kembali ke tempat semula di Tapian Nauli Siborongborong. Gereja berkembang dan jemaat bertambah. Jemaat mengusulkan untuk memperbesar rumah pelayan dan gedung gereja. Argilaus Hutasoit memberikan tanah tambahan dan pada 24 Februari 1917, gereja dipindahkan ke tempat saat ini. Pada tahun 1917, jemaat yang datang beribadah bertambah hingga mencapai 900 jiwa atau 193 kepala keluarga.
                        </p>
                        <p style="text-align: justify; line-height: 1.8; font-size: 1.1rem; color: #555;">
                            Melihat pertambahan jemaat, gedung gereja dibangun lebih besar untuk kenyamanan beribadah. Pada 7 Agustus 1956, Panita Pabalga Gareja (PPG) dibentuk untuk membangun gedung gereja baru. Namun, beberapa jemaat merencanakan mendirikan gereja lain dan membuat peribadahan sendiri di sebuah sekolah. Pada 24 November 1957, Praeses Distrik Humbang meresmikan gereja baru bernama Gereja Kota Siborongborong dan meletakkan batu pertama. Gereja lama diberi nama Gereja Sabungan Siborongborong. Jemaat HKBP Sabungan Siborongborong tetap semangat melanjutkan pembangunan gereja. Pada 22 September 1957, peletakan batu pertama dilakukan. Pada 26 April 1973, jemaat di Silaitlait menyetujui peribadahan sendiri di Silaitlait karena jumlah jemaat mencapai 80 KK.
                        </p>
                    </div>
                    <div class="section-footer">
                        <p style="text-align: justify; line-height: 1.8; font-size: 1.1rem; color: #555;">
                            Sebagai pusat kegiatan ibadah, sosial, dan pendidikan bagi masyarakat, HKBP Sabungan telah menjadi lambang kekuatan iman dan pelayanan dalam menghadapi berbagai cobaan. Dengan fondasi sejarah yang kokoh, gereja ini terus menjadi terang bagi dunia sekitarnya, memperkuat komunitasnya, dan memberkati masyarakat yang dilayaninya.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- About End -->


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

