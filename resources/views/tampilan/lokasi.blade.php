@extends('layout.user')

@section('container')

<!-- Header -->
<div class="page-header-lokasi">
    <p class="subtitle">GBI Victory Sibolga</p>
    <h1>Lokasi Gereja</h1>
    <div class="gold-divider"></div>
</div>

<!-- Lokasi Section -->
<section class="lokasi-section">

    <!-- Map -->
    <div class="lokasi-map-wrap">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4180.20435865153!2d98.77210289370609!3d1.7410976836290395!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x302ef5a2cdd25e5b%3A0x5adbd1e14a705751!2sGBI%20Jemaat%20VICTORY%2C%20Sibolga%20Kota!5e0!3m2!1sid!2sid!4v1772803511740!5m2!1sid!2sid"
            allowfullscreen=""
            loading="lazy"
            referrerpolicy="no-referrer-when-downgrade">
        </iframe>
    </div>

    <!-- Info Cards -->
    <div class="lokasi-info-grid">

        <div class="lokasi-info-card">
            <div class="linfo-icon"><i class="fa fa-map-marker-alt"></i></div>
            <div class="linfo-body">
                <h5>Alamat</h5>
                <p>Jl. Com. Yos Sudarso No.35, Kota Beringin,<br>Sibolga Kota, Kota Sibolga,<br>Sumatera Utara 22513</p>
                <a href="https://maps.google.com/?q=GBI+Jemaat+VICTORY+Sibolga" target="_blank" class="linfo-link">
                    <i class="fa fa-directions me-1"></i> Petunjuk Arah
                </a>
            </div>
        </div>

        <div class="lokasi-info-card">
            <div class="linfo-icon"><i class="fa fa-phone-alt"></i></div>
            <div class="linfo-body">
                <h5>Telepon</h5>
                <p>082366897979</p>
                <a href="tel:082366897979" class="linfo-link">
                    <i class="fa fa-phone me-1"></i> Hubungi Kami
                </a>
            </div>
        </div>

        <div class="lokasi-info-card">
            <div class="linfo-icon"><i class="fa fa-envelope"></i></div>
            <div class="linfo-body">
                <h5>Email</h5>
                <p>gbivictorysibolga@gmail.com</p>
                <a href="mailto:gbivictorysibolga@gmail.com" class="linfo-link">
                    <i class="fa fa-paper-plane me-1"></i> Kirim Email
                </a>
            </div>
        </div>

        <div class="lokasi-info-card">
            <div class="linfo-icon"><i class="fa fa-clock"></i></div>
            <div class="linfo-body">
                <h5>Jam Ibadah</h5>
                <p>Minggu: 08.00 & 17.00 WIB<br>Rabu: 19.00 WIB</p>
                <a href="{{ url('/jadwalibadah') }}" class="linfo-link">
                    <i class="fa fa-calendar me-1"></i> Lihat Jadwal
                </a>
            </div>
        </div>

    </div>
</section>

@endsection