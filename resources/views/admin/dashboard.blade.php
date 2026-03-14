@extends('layout.admin')

@section('content')
    <style>
        .dashboard-row { margin-bottom: 15px; }
        .small-box {
            position: relative;
            display: block;
            margin-bottom: 20px;
            padding: 15px;
            color: #fff;
            text-align: center;
            border-radius: 8px;
            box-shadow: 0 2px 6px rgba(0,0,0,0.2);
            transition: transform 0.3s, box-shadow 0.3s;
            text-decoration: none;
        }
        .small-box:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0,0,0,0.25);
            color: #fff;
            text-decoration: none;
        }
        .small-box .inner { padding: 5px 5px 10px; }
        .small-box .inner p {
            font-size: 15px;
            font-weight: 600;
            margin: 0;
        }
        .small-box .icon {
            position: absolute;
            top: 10px;
            right: 12px;
            font-size: 32px;
            opacity: 0.6;
        }
        .small-box-footer {
            display: block;
            padding: 6px 0;
            background: rgba(0,0,0,0.15);
            color: #fff;
            font-size: 13px;
            border-radius: 0 0 8px 8px;
            margin: 0 -15px -15px;
        }
        .small-box-link { text-decoration: none; }
        .stat-card {
            background: #fff;
            border-radius: 10px;
            padding: 20px 24px;
            box-shadow: 0 2px 12px rgba(0,0,0,0.08);
            margin-bottom: 20px;
        }
    </style>

    <!-- Page Title -->
    <div class="d-flex align-items-center mb-3 mt-3">
        <h4 class="mb-0 font-weight-bold" style="color:#002379;">
            <i class="fas fa-tachometer-alt mr-2"></i> Dashboard Admin
        </h4>
    </div>
    <hr>

    <!-- Menu Grid -->
    <div class="row dashboard-row">
        @php
            $boxes = [
                ['href' => '/admin/warta',        'color' => '#FF5733', 'icon' => 'fas fa-newspaper',    'text' => 'Warta Jemaat'],
                ['href' => '/admin/pengurus',      'color' => '#FFB533', 'icon' => 'fas fa-user-tie',     'text' => 'Pengurus'],
                ['href' => '/admin/faq',           'color' => '#33C4FF', 'icon' => 'fas fa-question-circle','text' => 'FAQ'],
                ['href' => '/admin/datajemaat',    'color' => '#5CBA33', 'icon' => 'fas fa-users',        'text' => 'Data Jemaat'],
                ['href' => '/admin/galeri',        'color' => '#33A1FF', 'icon' => 'fas fa-images',       'text' => 'Galeri'],
                ['href' => '/admin/jadwalibadah',  'color' => '#AA33FF', 'icon' => 'fas fa-calendar-alt', 'text' => 'Jadwal Ibadah'],
                ['href' => '/admin/donasi',        'color' => '#FF3333', 'icon' => 'fas fa-hand-holding-heart','text' => 'Donasi'],
                ['href' => '/admin/pending-jemaat','color' => '#8E44AD', 'icon' => 'fas fa-hourglass-half','text' => 'Pending Jemaat'],
            ];
        @endphp

        @foreach($boxes as $box)
            <div class="col-lg-3 col-md-6 col-sm-6 col-12 mb-3">
                <a href="{{ $box['href'] }}" class="small-box" style="background-color: {{ $box['color'] }};">
                    <div class="inner">
                        <p>{{ $box['text'] }}</p>
                    </div>
                    <div class="icon">
                        <i class="{{ $box['icon'] }}"></i>
                    </div>
                    <div class="small-box-footer">
                        Lihat Detail <i class="fas fa-arrow-circle-right ml-1"></i>
                    </div>
                </a>
            </div>
        @endforeach
    </div>

    <!-- Donasi Filter & Chart -->
    <div class="stat-card mt-2">
        <h5 class="font-weight-bold mb-3" style="color:#002379;">
            <i class="fas fa-chart-bar mr-2"></i> Statistik Donasi
        </h5>

        <form action="{{ route('dashboard') }}" method="get">
            @csrf
            <div class="row mb-3">
                <div class="col-lg-4 col-md-6">
                    <input type="number"
                           id="datepicker"
                           placeholder="Tahun: {{ date('Y') }}"
                           value="{{ $tahun ?? date('Y') }}"
                           name="tahun"
                           class="form-control"
                           min="2000"
                           max="2099">
                </div>
                <div class="col-lg-2 col-md-4 mt-2 mt-md-0">
                    <button class="btn btn-block" style="background-color:#002379; color:#fff; border-color:#002379;">
                        <i class="fas fa-filter mr-1"></i> Filter
                    </button>
                </div>
            </div>
        </form>

        @if($no_donations)
            <div class="alert alert-info">
                <i class="fas fa-info-circle mr-2"></i>
                Tidak ada data donasi untuk tahun yang dipilih.
            </div>
        @else
            <!-- Total Donasi Card -->
            <div class="row mb-4">
                <div class="col-lg-4 col-md-6">
                    <div class="p-3 rounded" style="background:#002379;">
                        <p class="text-white mb-1" style="font-size:0.8rem; letter-spacing:1px; text-transform:uppercase;">Total Donasi {{ $tahun ?? date('Y') }}</p>
                        <h4 class="text-white font-weight-bold mb-0">@currency($donasi)</h4>
                    </div>
                </div>
            </div>
        @endif

        <!-- Chart -->
        <div id="container" style="min-height: 350px;"></div>
    </div>

    <!-- Highcharts Scripts -->
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>

    <script>
        Highcharts.chart('container', {
            chart: { type: 'column', borderRadius: 8 },
            title: { text: 'Statistik Dana Donasi', align: 'left', style: { color: '#002379', fontWeight: 'bold' } },
            subtitle: { text: 'Periode: {{ $tahun ?? date("Y") }}', align: 'left' },
            xAxis: {
                categories: ['Jan','Feb','Mar','Apr','Mei','Jun','Jul','Agu','Sep','Okt','Nov','Des'],
                crosshair: true
            },
            yAxis: { min: 0, title: { text: 'Jumlah (Rp)' } },
            tooltip: {
                pointFormat: '<span style="color:{point.color}">\u25CF</span> {series.name}: <b>Rp {point.y:,.0f}</b><br/>'
            },
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0,
                    borderRadius: 4,
                    dataLabels: {
                        enabled: true,
                        format: 'Rp {point.y:,.0f}',
                        style: { color: '#333', fontSize: '10px' }
                    }
                }
            },
            series: [{
                name: 'Donasi',
                data: {!! json_encode($charts_donasi) !!}.map(Number),
                color: '#002379'
            }]
        });

        $("#datepicker").datepicker({
            format: "yyyy",
            viewMode: "years",
            minViewMode: "years"
        });
    </script>
@endsection
