@extends('layout.user')

@section('container')

<!-- Header -->
<div class="page-header-donasi">
    <p class="subtitle">GBI Victory Sibolga</p>
    <h1>Donasi</h1>
    <div class="gold-divider"></div>
</div>

<!-- Content -->
<section class="donasi-section">
    <div class="section-label">
        <span>Transparansi Keuangan</span>
        <h2>Laporan Donasi Jemaat</h2>
    </div>

    <!-- Summary Cards -->
    <div class="donasi-summary">
        @php $totalKeseluruhan = 0; @endphp
        @foreach ($allDonasi as $jenis => $donasiByJenis)
            @php $totalByJenis = collect($donasiByJenis)->sum('jumlahdonasi'); $totalKeseluruhan += $totalByJenis; @endphp
            <div class="summary-card">
                <div class="summary-icon"><i class="fa fa-hand-holding-heart"></i></div>
                <div>
                    <div class="summary-label">{{ $jenis }}</div>
                    <div class="summary-value">Rp {{ number_format($totalByJenis, 0, ',', '.') }}</div>
                </div>
            </div>
        @endforeach
        <div class="summary-card summary-total">
            <div class="summary-icon"><i class="fa fa-coins"></i></div>
            <div>
                <div class="summary-label">Total Keseluruhan</div>
                <div class="summary-value">Rp {{ number_format($totalKeseluruhan, 0, ',', '.') }}</div>
            </div>
        </div>
    </div>

    <!-- Tables per Jenis -->
    @php $totalKeseluruhan = 0; @endphp
    @foreach ($allDonasi as $jenis => $donasiByJenis)
        @php
            $totalByJenis = 0;
            $nomor = 1;
        @endphp

        <div class="donasi-table-wrap">
            <div class="dtable-header">
                <div class="dtable-icon"><i class="fa fa-list-alt"></i></div>
                <h3>Donasi {{ $jenis }}</h3>
            </div>

            <div class="table-responsive">
                <table class="donasi-table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Pemberi</th>
                            <th>Tanggal</th>
                            <th>Jenis Donasi</th>
                            <th>Jumlah</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($donasiByJenis as $row)
                            @php
                                $totalByJenis += $row->jumlahdonasi;
                                $totalKeseluruhan += $row->jumlahdonasi;
                            @endphp
                            <tr>
                                <td>{{ $nomor++ }}</td>
                                <td>{{ $row->namapemberi }}</td>
                                <td>{{ \Carbon\Carbon::parse($row->tanggal)->translatedFormat('d F Y') }}</td>
                                <td><span class="jenis-badge">{{ $row->jenis }}</span></td>
                                <td class="amount">Rp {{ number_format($row->jumlahdonasi, 0, ',', '.') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr class="subtotal-row">
                            <td colspan="4">Total Donasi {{ $jenis }}</td>
                            <td>Rp {{ number_format($totalByJenis, 0, ',', '.') }}</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    @endforeach

    <!-- Grand Total -->
    <div class="grand-total-card">
        <div class="gt-left">
            <i class="fa fa-trophy"></i>
            <span>Total Keseluruhan Donasi</span>
        </div>
        <div class="gt-amount">Rp {{ number_format($totalKeseluruhan, 0, ',', '.') }}</div>
    </div>

</section>

@endsection