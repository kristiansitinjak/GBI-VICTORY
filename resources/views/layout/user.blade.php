<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>@yield('title')</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="keywords" content="">
  <meta name="description" content="">

{{-- cssku --}}
  <link rel="stylesheet" href="{{ URL::asset('Aku/aku.css') }}">

  <!-- Google Web Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500;600&family=Roboto&display=swap" rel="stylesheet">

  <!-- Icon Font Stylesheet -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"/>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

  <!-- Libraries Stylesheet -->
  <link href="{{URL::asset('Template/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
  <link href="{{URL::asset('Template/lib/lightbox/css/lightbox.min.css')}}" rel="stylesheet">

  <!-- Customized Bootstrap Stylesheet -->
  <link href="{{URL::asset('Template/css/bootstrap.min.css')}}" rel="stylesheet">

  <!-- Template Stylesheet -->
  <link href="{{URL::asset('Template/css/style.css')}}" rel="stylesheet">
</head>
<body>
   <!-- Spinner Start -->
   <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
    <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
        <span class="sr-only">Loading...</span>
    </div>
</div>
<!-- Spinner End -->

<!-- Topbar Start -->
<div class="container-fluid bg-primary px-5 d-none d-lg-block">
  <div class="row gx-0">
      <div class="col-lg-8 text-center text-lg-start mb-2 mb-lg-0">
          <div class="d-inline-flex align-items-center" style="height: 45px;">
              <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href="https://web.facebook.com/p/HKBP-Sabungan-Siborongborong-100090179947491/?_rdc=1&_rdr"><i class="fab fa-facebook-f fw-normal"></i></a>
              <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href="https://www.instagram.com/rnhkbpsabungansiborongborong/"><i class="fab fa-instagram fw-normal"></i></a>
              <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle" href="https://www.youtube.com/@hkbpsabungansiborongborong3710"><i class="fab fa-youtube fw-normal"></i></a>
          </div>
      </div>
      <div class="col-lg-4 text-center text-lg-end mt-2">
        <div class="dropdown">
            <a href="/admin/login" class="dropdown-toggle text-light" data-bs-toggle="dropdown"><small><i class="fa fa-sign-in-alt me-2"></i> Login</small></a>
            <div class="dropdown-menu rounded">
                <a href="/admin/login" class="dropdown-item"><i class=" fas fa-user-alt me-2"></i> Admin</a>
            </div>
      </div>
      </div>
  </div>
</div>
<!-- Topbar End -->

<!-- Navbar & Hero Start -->
<div class="container-fluid position-relative p-0">
  <nav class="navbar navbar-expand-lg navbar-light px-4 px-lg-5 py-3 py-lg-0">
      <a href="/" class="navbar-brand p-0">
          <h1 class="m-0"><i class="fas fa-church me-3" style="font-size: 1.7rem; "></i><span style="font-size: 30px">HKBP Sabungan Siborong-borong</span></h1>
          {{-- <img src="{{URL::asset('Template/img/logo.png')}}" alt="Logo">  --}}
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
          <span class="fa fa-bars"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
          <div class="navbar-nav ms-auto py-0">
              <a href="/" class="nav-item nav-link">Home</a>
              <a href="/warta" class="nav-item nav-link ">Warta Jemaat</a>
              <a href="/jadwalibadah" class="nav-item nav-link ">Jadwal Ibadah</a>
              <a href="/donasi" class="nav-item nav-link ">Donasi</a>
              <a href="/galeri" class="nav-item nav-link ">Galeri</a>
              <a href="/datajemaat" class="nav-item nav-link ">Data Jemaat</a>
              <a href="/profile" class="nav-item nav-link ">Profil</a>
              <a href="/lokasi" class="nav-item nav-link ">Lokasi</a>
          </div>
      </div>
  </nav>
</div>


    <div class="carousel-header">
      @yield('container')
    </div>


<!-- Navbar & Hero End -->


<!-- Footer Start -->
<div class="container-fluid footer py-2">
  <div class="container py-5">
    <div class="row g-5">
      <!-- Left Section -->
      <div class="col-md-6 col-lg-6 col-xl-8">
        <div class="footer-item d-flex flex-column">
          <h4 class="mb-4 text-white">HKBP SABUNGAN SIBORONGBORONG</h4>
          <a href="https://www.google.co.id/maps/search/Jl.+Tugu+no.+2,+Siaro,+Siborongborong,+Kabupaten+Tapanuli+Utara/@2.2192168,98.973798,16z/data=!3m1!4b1?hl=id&entry=ttu">
            <i class="fas fa-home me-2"></i> Jl. Tugu no. 2, Siaro, Siborongborong, Kabupaten Tapanuli Utara
          </a>
          <a href="tel:0877-3996-3516"><i class="fas fa-phone me-2"></i>0877-3996-3516</a>
          <a href="mailto:siborongboronghkbpsabungan@gmail.com">
            <i class="fas fa-envelope me-2"></i> siborongboronghkbpsabungan@gmail.com
          </a>
          <div class="d-flex align-items-center">
            <i class="fas fa-share fa-2x text-white me-2"></i>
            <a class="btn-square btn btn-primary rounded-circle mx-1" href="https://web.facebook.com/profile.php?id=100090179947491" target="_blank">
              <i class="fab fa-facebook-f"></i>
            </a>
            <a class="btn-square btn btn-primary rounded-circle mx-1" href="https://www.instagram.com/rena_hkbp_sabungan_sbb/" target="_blank">
              <i class="fab fa-instagram"></i>
            </a>
            <a class="btn-square btn btn-primary rounded-circle mx-1" href="https://www.youtube.com/@hkbpsabungansiborongborong3710" target="_blank">
              <i class="fab fa-youtube"></i>
            </a>
          </div>
        </div>
      </div>
      <!-- Right Section -->
      <div class="col-md-6 col-lg-6 col-xl-4">
        <div class="footer-item d-flex flex-column" style="margin-left: -20px;"> <!-- Adjust margin-left here -->
          <h4 class="mb-4 text-white">Useful links</h4>
          <a href="/warta"><i class="fas fa-angle-right me-2"></i> Warta</a>
          <a href="/jadwalibadah"><i class="fas fa-angle-right me-2"></i> Jadwal</a>
          <a href="/donasi"><i class="fas fa-angle-right me-2"></i> Donasi</a>
          <a href="/galeri"><i class="fas fa-angle-right me-2"></i> Galeri</a>
          <a href="/datajemaat"><i class="fas fa-angle-right me-2"></i> Data Jemaat</a>
          <a href="/profile"><i class="fas fa-angle-right me-2"></i> Profil</a>
          <a href="/lokasi"><i class="fas fa-angle-right me-2"></i> Lokasi</a>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Footer End -->


<!-- Copyright Start -->
<div class="container-fluid copyright text-body py-4">
  <div class="container">
      <div class="row g-4 align-items-center">
          <div class="col-md-6 text-center text-md-end mb-md-0">
              <i class="fas fa-copyright me-2"></i>2024 HKBP Sabungan
          </div>
          <div class="col-md-6 text-center text-md-start">
              <!--/*** This template is free as long as you keep the below author’s credit link/attribution link/backlink. ***/-->
              <!--/*** If you'd like to use the template without the below author’s credit link/attribution link/backlink, ***/-->
              <!--/*** you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". ***/-->
              Designed By Kelompok 11 PA-1
          </div>
          </div>
      </div>
  </div>
</div>
<!-- Copyright End -->

<!-- Footer End -->

<!-- Back to Top -->
<a href="#" class="btn btn-primary btn-primary-outline-0 btn-md-square back-to-top"><i class="fa fa-arrow-up"></i></a>


  <!-- JavaScript Libraries -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="{{URL::asset('Template/lib/easing/easing.min.js')}}"></script>
  <script src="{{URL::asset('Template/lib/waypoints/waypoints.min.js')}}"></script>
  <script src="{{URL::asset('Template/lib/owlcarousel/owl.carousel.min.js')}}"></script>
  <script src="{{URL::asset('Template/lib/lightbox/js/lightbox.min.js')}}"></script>

  <!-- Template Javascript -->
  <script src="{{URL::asset('Template/js/main.js')}}"></script>
</body>
</html>
