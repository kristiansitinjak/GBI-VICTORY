@extends('layout.user')

@section('container')

<style>
    .page-header-warta {
        background: linear-gradient(135deg, #0D1B4B 60%, #1a3080 100%);
        padding: 80px 0 60px;
        text-align: center;
        position: relative;
        overflow: hidden;
    }
    .page-header-warta::before {
        content: '';
        position: absolute;
        top: -60px; right: -60px;
        width: 300px; height: 300px;
        border-radius: 50%;
        border: 40px solid rgba(201,168,76,0.12);
        pointer-events: none;
    }
    .page-header-warta h1 {
        font-family: 'Playfair Display', Georgia, serif;
        font-size: 3rem;
        color: #fff;
        letter-spacing: 1px;
        position: relative;
    }
    .page-header-warta .subtitle {
        color: #F0D080;
        font-size: 0.85rem;
        margin-bottom: 10px;
        letter-spacing: 3px;
        text-transform: uppercase;
        position: relative;
    }
    .gold-divider {
        width: 60px; height: 3px;
        background: #C9A84C;
        margin: 14px auto 0;
        border-radius: 2px;
    }
    .warta-section {
        max-width: 1200px;
        margin: 0 auto;
        padding: 60px 24px 80px;
    }
    .section-label {
        text-align: center;
        margin-bottom: 48px;
    }
    .section-label span {
        font-size: 0.78rem;
        letter-spacing: 4px;
        text-transform: uppercase;
        color: #C9A84C;
        font-weight: 600;
    }
    .section-label h2 {
        font-family: 'Playfair Display', Georgia, serif;
        font-size: 2rem;
        color: #0D1B4B;
        margin-top: 6px;
    }
    .warta-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(290px, 1fr));
        gap: 32px;
    }
    .warta-card {
        background: #fff;
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 4px 24px rgba(13,27,75,0.10);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        display: flex;
        flex-direction: column;
    }
    .warta-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 12px 40px rgba(13,27,75,0.16);
    }
    .wcard-img {
        width: 100%; height: 210px;
        overflow: hidden;
        position: relative;
    }
    .wcard-img img {
        width: 100%; height: 100%;
        object-fit: cover;
        transition: transform 0.4s ease;
    }
    .warta-card:hover .wcard-img img { transform: scale(1.06); }
    .wcard-badge {
        position: absolute;
        top: 14px; right: 14px;
        background: #0D1B4B;
        color: #F0D080;
        font-size: 0.72rem;
        font-weight: 600;
        padding: 4px 12px;
        border-radius: 20px;
        letter-spacing: 1px;
    }
    .wcard-body {
        padding: 22px 24px 26px;
        display: flex;
        flex-direction: column;
        flex: 1;
    }
    .wcard-title {
        font-family: 'Playfair Display', Georgia, serif;
        font-size: 1.1rem;
        color: #0D1B4B;
        font-weight: 700;
        margin-bottom: 10px;
        line-height: 1.4;
    }
    .wcard-desc {
        font-size: 0.88rem;
        color: #7A7A7A;
        line-height: 1.65;
        flex: 1;
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
    .wcard-footer {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-top: 18px;
        padding-top: 14px;
        border-top: 1px solid #F0EDE6;
    }
    .wcard-date { font-size: 0.8rem; color: #7A7A7A; }
    .wcard-date i { margin-right: 4px; color: #C9A84C; }
    .btn-baca {
        background: #0D1B4B;
        color: #fff !important;
        border: none;
        border-radius: 8px;
        padding: 8px 18px;
        font-size: 0.82rem;
        font-weight: 600;
        text-decoration: none !important;
        display: inline-flex;
        align-items: center;
        gap: 6px;
        transition: background 0.2s, color 0.2s;
    }
    .btn-baca:hover { background: #C9A84C; color: #0D1B4B !important; }
    .empty-state {
        text-align: center;
        padding: 80px 20px;
        color: #7A7A7A;
        grid-column: 1 / -1;
    }
    .empty-state i { font-size: 3rem; color: #DDD; margin-bottom: 16px; display: block; }
</style>

<div class="page-header-warta">
    <p class="subtitle">GBI Victory Sibolga</p>
    <h1>Warta Jemaat</h1>
    <div class="gold-divider"></div>
</div>

<section class="warta-section">
    <div class="section-label">
        <span>Informasi Terkini</span>
        <h2>Edisi Warta Jemaat</h2>
    </div>

    <div class="warta-grid">
        @forelse ($dataWarta as $item)
            @php
                $formattedDate = \Carbon\Carbon::parse($item->tanggal)->translatedFormat('d F Y');
            @endphp
            <div class="warta-card">
                <div class="wcard-img">
                    <img src="{{ URL::asset('Admin/photo/'.$item->photo) }}" alt="{{ $item->judul }}">
                    <span class="wcard-badge">{{ \Carbon\Carbon::parse($item->tanggal)->format('d M Y') }}</span>
                </div>
                <div class="wcard-body">
                    <h3 class="wcard-title">{{ $item->judul }}</h3>
                    <p class="wcard-desc">{{ $item->keterangan }}</p>
                    <div class="wcard-footer">
                        <span class="wcard-date">
                            <i class="fa fa-calendar-alt"></i>{{ $formattedDate }}
                        </span>
                        <a href="{{ url('/warta/'.$item->id) }}" class="btn-baca">
                            Baca Selengkapnya <i class="fa fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        @empty
            <div class="empty-state">
                <i class="fa fa-newspaper"></i>
                <p>Belum ada warta jemaat tersedia.</p>
            </div>
        @endforelse
    </div>
</section>

@endsection