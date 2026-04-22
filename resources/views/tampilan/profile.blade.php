@extends('layout.user')

@section('container')

<!-- Header -->
<div class="page-header-profile">
    <p class="subtitle">GBI Victory Sibolga</p>
    <h1>Profil Pengurus</h1>
    <div class="gold-divider"></div>
</div>

<!-- About Section -->
<section class="profile-about-section">
    <div class="profile-about-inner">
        <div class="profile-about-img">
            <img src="{{ URL::asset('Template/img/fotobersama.jpg') }}" alt="Foto Bersama Pengurus GBI Victory">
            <div class="profile-img-badge">
                <i class="fa fa-church"></i>
                <span>GBI Victory</span>
            </div>
        </div>
        <div class="profile-about-text">
            <div class="section-label" style="text-align:left; margin-bottom:20px;">
                <span>Tentang Kami</span>
                <h2>Pengurus <span style="color:#C9A84C;">Gereja Bethel Indonesia Victory</span></h2>
            </div>
            <p>Foto yang ditampilkan adalah salah satu momen dari pelayanan atau Pengurus yang berlokasi di Gereja Bethel Indonesia Victory. Pengurus atau pelayanan merupakan bagian penting dalam kehidupan gereja, di mana jemaat berkumpul untuk beribadah, belajar Firman Tuhan, serta saling mendukung dan melayani satu sama lain dalam kehidupan rohani.</p>
            <div class="profile-stats">
                <div class="pstat-item">
                    <div class="pstat-icon"><i class="fa fa-users"></i></div>
                    <div>
                        <div class="pstat-num">{{ $dataPengurus->count() }}</div>
                        <div class="pstat-label">Pengurus Aktif</div>
                    </div>
                </div>
                <div class="pstat-item">
                    <div class="pstat-icon"><i class="fa fa-pray"></i></div>
                    <div>
                        <div class="pstat-num">5</div>
                        <div class="pstat-label">Sektor Daerah</div>
                    </div>
                </div>
                <div class="pstat-item">
                    <div class="pstat-icon"><i class="fa fa-heart"></i></div>
                    <div>
                        <div class="pstat-num">Setia</div>
                        <div class="pstat-label">Melayani</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Pengurus Grid -->
<section class="pengurus-section">
    <div class="section-label">
        <span>Kepemimpinan</span>
        <h2>Kepala Jemaat Gereja Bethel Indonesia Victory</h2>
    </div>

    <div class="pengurus-grid">
        @forelse ($dataPengurus as $item)
        <div class="pengurus-card">
            <div class="pengurus-img">
                <img src="{{ URL::asset('Admin/gambar/' . $item->gambar) }}" alt="{{ $item->nama }}">
                <div class="pengurus-overlay">
                    <i class="fa fa-user-tie"></i>
                </div>
            </div>
            <div class="pengurus-body">
                <h4>{{ $item->nama }}</h4>
                <span class="jabatan-badge">{{ $item->jabatan }}</span>
            </div>
        </div>
        @empty
        <div class="empty-state">
            <i class="fa fa-users"></i>
            <p>Belum ada data pengurus.</p>
        </div>
        @endforelse
    </div>
</section>

@endsection