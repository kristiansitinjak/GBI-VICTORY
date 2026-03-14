@extends('layout.user')

@section('container')

<!-- Header -->
<div class="page-header-galeri">
    <p class="subtitle">GBI Victory Sibolga</p>
    <h1>Galeri</h1>
    <div class="gold-divider"></div>
</div>

<!-- Intro -->
<section class="galeri-intro">
    <div class="section-label">
        <span>Dokumentasi</span>
        <h2>Momen Bersama GBI Victory</h2>
    </div>
    <p class="galeri-intro-text">
        Galeri dari GBI Victory berisi tentang kegiatan gereja dan kunjungan pastoral. 
        Dalam galeri ini, Anda akan menemukan momen-momen yang mengabadikan berbagai kegiatan 
        gereja yang diadakan di GBI Victory, serta kunjungan pastoral yang dilakukan oleh gereja tersebut.
        Setiap gambar menceritakan cerita tentang kebersamaan, ibadah, dan pelayanan jemaat.
    </p>
</section>

<!-- Tab Navigation -->
<section class="galeri-section">
    <div class="galeri-tabs">
        <button class="gtab-btn active" data-tab="kegiatan">
            <i class="fa fa-church"></i> Kegiatan Gereja
        </button>
        <button class="gtab-btn" data-tab="pastoral">
            <i class="fa fa-hands-helping"></i> Pastoral
        </button>
    </div>

    <!-- Tab: Kegiatan -->
    <div class="gtab-content active" id="tab-kegiatan">
        <div class="galeri-desc-card">
            <div class="gdesc-icon"><i class="fa fa-church"></i></div>
            <p>Kegiatan di GBI Victory meliputi berbagai aktivitas yang dirancang untuk memperkuat iman dan membangun komunitas jemaat. Setiap minggu, gereja mengadakan ibadah raya rutin yang didukung oleh kegiatan komunitas sel, kelompok doa, dan pendalaman Alkitab. Gereja juga menyelenggarakan acara spesial seperti seminar, retret, Natal, Paskah, baptisan selam, dan penyerahan anak.</p>
        </div>

        <div class="galeri-grid">
            @forelse ($dataGaleri->where('kategori', 'kegiatan') as $item)
                <div class="galeri-card">
                    <div class="gcard-img">
                        <img src="{{ URL::asset('Admin/gambar/' . $item->gambar) }}" alt="{{ $item->judul }}">
                        <div class="gcard-overlay">
                            <span class="gcard-label"><i class="fa fa-church"></i> Kegiatan</span>
                        </div>
                    </div>
                    <div class="gcard-body">
                        <p class="gcard-title">{{ $item->judul }}</p>
                    </div>
                </div>
            @empty
                <div class="empty-state">
                    <i class="fa fa-images"></i>
                    <p>Belum ada foto kegiatan.</p>
                </div>
            @endforelse
        </div>
    </div>

    <!-- Tab: Pastoral -->
    <div class="gtab-content" id="tab-pastoral">
        <div class="galeri-desc-card">
            <div class="gdesc-icon"><i class="fa fa-hands-helping"></i></div>
            <p>Kategori Pastoral GBI Victory mendokumentasikan berbagai aktivitas pelayanan kasih yang dilakukan oleh gereja untuk mendukung dan menguatkan jemaat serta masyarakat sekitar. Pelayanan pastoral mencakup kegiatan melayat, menjenguk jemaat yang sakit, serta menyalurkan bantuan bagi mereka yang terdampak bencana alam melalui aksi sosial.</p>
        </div>

        <div class="galeri-grid">
            @forelse ($dataGaleri->where('kategori', 'pastoral') as $item)
                <div class="galeri-card">
                    <div class="gcard-img">
                        <img src="{{ URL::asset('Admin/gambar/' . $item->gambar) }}" alt="{{ $item->judul }}">
                        <div class="gcard-overlay">
                            <span class="gcard-label"><i class="fa fa-hands-helping"></i> Pastoral</span>
                        </div>
                    </div>
                    <div class="gcard-body">
                        <p class="gcard-title">{{ $item->judul }}</p>
                    </div>
                </div>
            @empty
                <div class="empty-state">
                    <i class="fa fa-images"></i>
                    <p>Belum ada foto pastoral.</p>
                </div>
            @endforelse
        </div>
    </div>
</section>

<script>
    const tabBtns = document.querySelectorAll('.gtab-btn');
    const tabContents = document.querySelectorAll('.gtab-content');

    tabBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            tabBtns.forEach(b => b.classList.remove('active'));
            tabContents.forEach(c => c.classList.remove('active'));
            btn.classList.add('active');
            document.getElementById('tab-' + btn.dataset.tab).classList.add('active');
        });
    });
</script>

@endsection