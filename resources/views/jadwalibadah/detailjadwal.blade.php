@extends('layout.user')

@section('container')

<!-- Header -->
<div class="detail-header">
    <p class="breadcrumb-label">GBI Victory &mdash; Jadwal Ibadah</p>
    <h1>{{ $jadwal->namaibadah }}</h1>
    <div class="gold-divider"></div>
</div>

<!-- Content -->
<div class="detail-wrapper">
    <div class="surat-card">

        <!-- Top Bar -->
        <div class="surat-topbar">
            <span class="church-name">Gereja Bethel Indonesia Victory</span>
            <span class="warta-label">Jadwal Ibadah</span>
        </div>

        <!-- Body -->
        <div class="surat-content">

            <!-- Title + Date -->
            <div class="surat-title-row">
                <h2>{{ $jadwal->namaibadah }}</h2>
                <div class="surat-date-col">
                    <span class="date-label">Tanggal Ibadah</span>
                    <div class="date-value">
                        <i class="fa fa-calendar-alt"></i>
                        {{ \Carbon\Carbon::parse($jadwal->tanggal)->translatedFormat('d F Y') }}
                    </div>
                </div>
            </div>

            <!-- Image Left + Info Right -->
            <div class="surat-body">
                <div class="surat-img-wrap">
                    <img src="{{ asset('Template/img/alkitab.jpg') }}" alt="{{ $jadwal->namaibadah }}">
                    <div class="img-caption">{{ $jadwal->namaibadah }}</div>
                </div>
                <div class="surat-text">
                    <h4>Informasi Ibadah</h4>

                    <!-- Info Rows -->
                    <div class="jadwal-info-list">
                        <div class="info-row">
                            <div class="info-icon"><i class="fa fa-church"></i></div>
                            <div>
                                <div class="info-label">Nama Ibadah</div>
                                <div class="info-value">{{ $jadwal->namaibadah }}</div>
                            </div>
                        </div>
                        <div class="info-row">
                            <div class="info-icon"><i class="fa fa-user"></i></div>
                            <div>
                                <div class="info-label">Pengkhotbah</div>
                                <div class="info-value">{{ $jadwal->pengkhotbah }}</div>
                            </div>
                        </div>
                        <div class="info-row">
                            <div class="info-icon"><i class="fa fa-calendar-alt"></i></div>
                            <div>
                                <div class="info-label">Tanggal</div>
                                <div class="info-value">{{ \Carbon\Carbon::parse($jadwal->tanggal)->translatedFormat('d F Y') }}</div>
                            </div>
                        </div>
                        <div class="info-row">
                            <div class="info-icon"><i class="fa fa-tag"></i></div>
                            <div>
                                <div class="info-label">Deskripsi</div>
                                <div class="info-value">{{ $jadwal->deskripsi }}</div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>

    <!-- Back Button -->
    <div class="back-row">
        <a href="{{ url('/jadwalibadah') }}" class="btn-back">
            <i class="fa fa-arrow-left"></i> Kembali ke Jadwal Ibadah
        </a>
    </div>
</div>

@endsection
