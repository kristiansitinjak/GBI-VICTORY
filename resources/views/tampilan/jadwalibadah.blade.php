@extends('layout.user')

@section('container')

<!-- Header -->
<div class="page-header-jadwal">
    <p class="subtitle">GBI Victory Sibolga</p>
    <h1>Jadwal Ibadah</h1>
    <div class="gold-divider"></div>
</div>

<!-- Content -->
<section class="jadwal-section">
    <div class="section-label">
        <span>Jadwal Kebaktian</span>
        <h2>Jadwal Ibadah GBI Victory</h2>
    </div>

    <div class="jadwal-grid">
        @forelse ($dataJadwalibadah as $item)
            @php
                $formattedDate = \Carbon\Carbon::parse($item->tanggal)->translatedFormat('d F Y');
            @endphp
            <div class="jadwal-card">
                <div class="jcard-img">
                    <img src="{{ asset('Template/img/alkitab.jpg') }}" alt="{{ $item->namaibadah }}">
                    <span class="jcard-badge">{{ \Carbon\Carbon::parse($item->tanggal)->format('d M Y') }}</span>
                </div>
                <div class="jcard-body">
                    <h3 class="jcard-title">{{ $item->namaibadah }}</h3>
                    <div class="jcard-meta">
                        <span><i class="fa fa-user"></i> {{ $item->pengkhotbah }}</span>
                        <span><i class="fa fa-tag"></i> {{ $item->deskripsi }}</span>
                        <span><i class="fa fa-calendar-alt"></i> {{ $formattedDate }}</span>
                    </div>
                    <div class="jcard-footer">
                        <a href="{{ url('/jadwalibadah/'.$item->id) }}" class="btn-baca">
                            Lihat Detail <i class="fa fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        @empty
            <div class="empty-state">
                <i class="fa fa-church"></i>
                <p>Belum ada jadwal ibadah tersedia.</p>
            </div>
        @endforelse
    </div>
</section>

@endsection