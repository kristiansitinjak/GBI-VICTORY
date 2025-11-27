@extends('layout.admin')

@section('content')
    <style>
        .dashboard-row {
            margin-bottom: 15px;
        }
        .small-box {
            position: relative;
            display: block;
            margin-bottom: 20px;
            padding: 15px;
            color: #fff;
            text-align: center;
            border-radius: 5px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s, box-shadow 0.3s;
        }
        .small-box:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
        }
        .small-box .inner {
            padding: 5px;
        }
        .small-box p {
            font-size: 14px;
            margin: 0;
        }
        .small-box .icon {
            position: absolute;
            top: 10px;
            right: 10px;
            font-size: 30px;
            opacity: 0.7;
        }
        .small-box-footer {
            display: block;
            padding: 5px 0;
            background: rgba(0, 0, 0, 0.1);
            color: #fff;
            text-decoration: none;
            transition: background-color 0.3s;
        }
        .small-box-footer:hover {
            background: rgba(0, 0, 0, 0.2);
        }
    </style>
    <div class="container">
        <h1>Dashboard</h1>
        <hr>
    </div>

    <div class="container">
        <div class="row dashboard-row">
            @php
                $boxes = [
                    ['href' => '/admin/warta', 'color' => '#FF5733', 'icon' => 'ion-clipboard', 'text' => 'Warta Jemaat'],
                    ['href' => '/admin/pengurus', 'color' => '#FFB533', 'icon' => 'ion-person', 'text' => 'Pengurus'],
                    ['href' => '/admin/faq', 'color' => '#33C4FF', 'icon' => 'ion-help', 'text' => 'Faq'],
                    ['href' => '/admin/datajemaat', 'color' => '#5CFF33', 'icon' => 'ion-person-add', 'text' => 'Data Jemaat'],
                    ['href' => '/admin/galeri', 'color' => '#33A1FF', 'icon' => 'ion-image', 'text' => 'Galeri'],
                    ['href' => '/admin/jadwalibadah', 'color' => '#AA33FF', 'icon' => 'ion-folder', 'text' => 'Jadwal Ibadah'],
                    ['href' => '/admin/donasi', 'color' => '#FF3333', 'icon' => 'ion-cash', 'text' => 'Donasi'],
                    ['href' => '/admin/kontak', 'color' => '#8E44AD', 'icon' => 'ion-email', 'text' => 'Kontak Kami'],
                ];
            @endphp

            @foreach($boxes as $box)
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <a href="{{ $box['href'] }}" class="small-box-link">
                        <div class="small-box" style="background-color: {{ $box['color'] }};">
                            <div class="inner">
                                <p>{{ $box['text'] }}</p>
                            </div>
                            <div class="icon">
                                <i class="ion {{ $box['icon'] }}"></i>
                            </div>
                            <div class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css" rel="stylesheet" />

    <form action="{{ route('dashboard') }}" method="get">
        @csrf
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    <input type="number" id="datepicker" placeholder="Tahun: {{ date('Y') }}" value="{{ $tahun ?? date('Y') }}" name="tahun" class="date-own form-control">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <button class="btn btn-success" style="background-color: #012378; border-color: #012378;">Filter</button>
                </div>
            </div>
        </div>
    </form>


    @if ($no_donations)
        <p>No donations found for the selected year.</p>
    @else
        <div class="row mt-4">
            <div class="col-lg-6 mb-lg-0 mb-4">
                <div class="card" style="background: #012378">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="d-flex flex-column h-100">
                                    <h2 class="font-weight-bolder" style="color: white">TOTAL DONASI</h2>
                                    <h2 class="font-weight-bolder" style="color: white">@currency($donasi)</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <div class="row mt-4">
        <div class="col-lg-12 mb-lg-0 mb-4">
            <div class="card">
                <div class="card-body p-3">
                    <div id="container"></div>
                </div>
            </div>
        </div>
    </div>



    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <script>
        Highcharts.setOptions({
            lang: {
                invalidData: {
                    highcharts: 'Error: unable to process data',
                    highstock: 'Error: unable to apply data',
                    highmaps: 'Error: unable to apply data'
                }
            }
        });

        Highcharts.chart('container', {
            chart: {
                type: 'column'
            },
            title: {
                text: 'Statistik Dana Donasi',
                align: 'left'
            },
            subtitle: {
                text: 'Periode: {{ $tahun }}',
                align: 'left'
            },
            xAxis: {
                categories: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
                crosshair: true,
                accessibility: {
                    description: 'Months'
                }
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Jumlah'
                }
            },
            tooltip: {
                valueSuffix: ' Rp.',
                pointFormat: '<span style="color:{point.color}">\u25CF</span> {series.name}: <b>{point.y:,.0f}</b><br/>'
            },
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0,
                    dataLabels: {
                        enabled: true,
                        format: '{point.y:,.0f} Rp.',
                        style: {
                            color: '#333'
                        }
                    }
                }
            },
            series: [{
                name: 'Donasi',
                data: {!! json_encode($charts_donasi) !!}.map(Number),
                color: '#012378' // Warna hijau
            }]
        });

        $("#datepicker").datepicker({
            format: "yyyy",
            viewMode: "years",
            minViewMode: "years"
        });
    </script>
@endsection
