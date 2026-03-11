@extends('layout.user')

@section('container')

<style>
    .detail-header {
        background: linear-gradient(135deg, #0D1B4B 60%, #1a3080 100%);
        padding: 70px 0 50px;
        text-align: center;
        position: relative;
        overflow: hidden;
    }
    .detail-header::before {
        content: '';
        position: absolute;
        top: -60px; right: -60px;
        width: 280px; height: 280px;
        border-radius: 50%;
        border: 36px solid rgba(201,168,76,0.12);
        pointer-events: none;
    }
    .detail-header .breadcrumb-label {
        color: #F0D080;
        font-size: 0.8rem;
        letter-spacing: 3px;
        text-transform: uppercase;
        margin-bottom: 10px;
        position: relative;
    }
    .detail-header h1 {
        font-family: 'Playfair Display', Georgia, serif;
        font-size: 2.2rem;
        color: #fff;
        max-width: 700px;
        margin: 0 auto;
        line-height: 1.35;
        position: relative;
    }
    .gold-divider {
        width: 60px; height: 3px;
        background: #C9A84C;
        margin: 16px auto 0;
        border-radius: 2px;
        position: relative;
    }

    .detail-wrapper {
        max-width: 960px;
        margin: 50px auto 80px;
        padding: 0 24px;
    }

    /* Surat Card */
    .surat-card {
        background: #fff;
        border-radius: 20px;
        box-shadow: 0 6px 40px rgba(13,27,75,0.10);
        overflow: hidden;
    }

    .surat-topbar {
        background: #0D1B4B;
        padding: 18px 36px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 10px;
    }
    .surat-topbar .church-name {
        color: #F0D080;
        font-family: 'Playfair Display', Georgia, serif;
        font-size: 1rem;
        font-weight: 700;
        letter-spacing: 0.5px;
    }
    .surat-topbar .warta-label {
        background: #C9A84C;
        color: #0D1B4B;
        font-size: 0.72rem;
        font-weight: 700;
        padding: 4px 14px;
        border-radius: 20px;
        letter-spacing: 1.5px;
        text-transform: uppercase;
    }

    .surat-content {
        padding: 40px 40px 36px;
    }

    /* Title + Date Row */
    .surat-title-row {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        gap: 24px;
        margin-bottom: 32px;
        padding-bottom: 24px;
        border-bottom: 2px solid #F0EDE6;
    }
    .surat-title-row h2 {
        font-family: 'Playfair Display', Georgia, serif;
        font-size: 1.75rem;
        color: #0D1B4B;
        line-height: 1.35;
        max-width: 560px;
    }
    .surat-date-col {
        text-align: right;
        flex-shrink: 0;
    }
    .surat-date-col .date-label {
        font-size: 0.72rem;
        color: #7A7A7A;
        letter-spacing: 2px;
        text-transform: uppercase;
        display: block;
        margin-bottom: 4px;
    }
    .surat-date-col .date-value {
        font-size: 1rem;
        font-weight: 700;
        color: #0D1B4B;
    }
    .surat-date-col .date-value i { color: #C9A84C; margin-right: 5px; }

    /* Body: image left + text right */
    .surat-body {
        display: grid;
        grid-template-columns: 300px 1fr;
        gap: 36px;
        align-items: start;
    }
    .surat-img-wrap {
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 4px 20px rgba(13,27,75,0.12);
        position: relative;
    }
    .surat-img-wrap img {
        width: 100%;
        display: block;
        object-fit: cover;
    }
    .img-caption {
        position: absolute;
        bottom: 0; left: 0; right: 0;
        background: linear-gradient(transparent, rgba(13,27,75,0.75));
        padding: 24px 14px 12px;
        color: #F0D080;
        font-size: 0.78rem;
        font-weight: 600;
        letter-spacing: 0.5px;
    }
    .surat-text h4 {
        font-family: 'Playfair Display', Georgia, serif;
        font-size: 1rem;
        color: #0D1B4B;
        margin-bottom: 14px;
        display: flex;
        align-items: center;
        gap: 10px;
    }
    .surat-text h4::after {
        content: '';
        flex: 1;
        height: 1px;
        background: #E8E4DC;
    }
    .surat-text p {
        font-size: 0.97rem;
        color: #2C2C2C;
        line-height: 1.9;
        text-align: justify;
    }

    .surat-divider {
        border: none;
        border-top: 1px dashed #DDD;
        margin: 32px 0;
    }

    /* Download Section */
    .download-section {
        background: #F7F5F0;
        border-radius: 12px;
        padding: 24px 28px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 20px;
        flex-wrap: wrap;
    }
    .download-info {
        display: flex;
        align-items: center;
        gap: 16px;
    }
    .pdf-icon {
        width: 52px; height: 52px;
        background: #0D1B4B;
        border-radius: 10px;
        display: flex; align-items: center; justify-content: center;
        flex-shrink: 0;
    }
    .pdf-icon i { color: #F0D080; font-size: 1.4rem; }
    .download-info .doc-name {
        font-weight: 700;
        color: #0D1B4B;
        font-size: 0.95rem;
    }
    .download-info .doc-desc {
        font-size: 0.8rem;
        color: #7A7A7A;
        margin-top: 2px;
    }
    .btn-download {
        background: #C9A84C;
        color: #0D1B4B !important;
        border: none;
        border-radius: 10px;
        padding: 12px 28px;
        font-size: 0.9rem;
        font-weight: 700;
        text-decoration: none !important;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        transition: background 0.2s, transform 0.2s;
    }
    .btn-download:hover {
        background: #B8943A;
        transform: translateY(-2px);
    }

    .back-row {
        margin-top: 32px;
        text-align: center;
    }
    .btn-back {
        color: #0D1B4B !important;
        text-decoration: none !important;
        font-size: 0.88rem;
        font-weight: 600;
        display: inline-flex;
        align-items: center;
        gap: 6px;
        border: 2px solid #0D1B4B;
        padding: 10px 24px;
        border-radius: 8px;
        transition: background 0.2s, color 0.2s;
    }
    .btn-back:hover {
        background: #0D1B4B;
        color: #fff !important;
    }

    @media (max-width: 700px) {
        .surat-body { grid-template-columns: 1fr; }
        .surat-title-row { flex-direction: column; }
        .surat-date-col { text-align: left; }
        .surat-content { padding: 24px 20px; }
        .detail-header h1 { font-size: 1.6rem; }
        .surat-topbar { padding: 14px 20px; }
    }
</style>

<!-- Header -->
<div class="detail-header">
    <p class="breadcrumb-label">GBI Victory &mdash; Warta Jemaat</p>
    <h1>{{ $warta->judul }}</h1>
    <div class="gold-divider"></div>
</div>

<!-- Content -->
<div class="detail-wrapper">
    <div class="surat-card">

        <!-- Top Bar -->
        <div class="surat-topbar">
            <span class="church-name">Gereja Bethel Indonesia Victory</span>
            <span class="warta-label">Warta Jemaat</span>
        </div>

        <!-- Surat Content -->
        <div class="surat-content">

            <!-- Title + Date -->
            <div class="surat-title-row">
                <h2>{{ $warta->judul }}</h2>
                <div class="surat-date-col">
                    <span class="date-label">Tanggal Terbit</span>
                    <div class="date-value">
                        <i class="fa fa-calendar-alt"></i>
                        {{ \Carbon\Carbon::parse($warta->tanggal)->translatedFormat('d F Y') }}
                    </div>
                </div>
            </div>

            <!-- Image Left + Keterangan Right -->
            <div class="surat-body">
                <div class="surat-img-wrap">
                    <img src="{{ URL::asset('Admin/photo/'.$warta->photo) }}" alt="{{ $warta->judul }}">
                    <div class="img-caption">{{ $warta->judul }}</div>
                </div>
                <div class="surat-text">
                    <h4>Keterangan</h4>
                    <p>{{ $warta->keterangan }}</p>
                </div>
            </div>

            <!-- Download -->
            @if($warta->pdf)
                <hr class="surat-divider">
                <div class="download-section">
                    <div class="download-info">
                        <div class="pdf-icon">
                            <i class="fa fa-file-pdf"></i>
                        </div>
                        <div>
                            <div class="doc-name">Dokumen Warta Jemaat</div>
                            <div class="doc-desc">Unduh dokumen lengkap dalam format PDF</div>
                        </div>
                    </div>
                    <a href="{{ asset('assets/file-warta/'.$warta->pdf) }}" download class="btn-download">
                        <i class="fa fa-download"></i> Unduh Dokumen
                    </a>
                </div>
            @endif

        </div>
    </div>

    <!-- Back Button -->
    <div class="back-row">
        <a href="{{ url('/warta') }}" class="btn-back">
            <i class="fa fa-arrow-left"></i> Kembali ke Daftar Warta
        </a>
    </div>
</div>

@endsection
