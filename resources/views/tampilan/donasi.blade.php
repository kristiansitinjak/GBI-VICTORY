@extends('layout.user')

@section('container')


<!-- Header Start -->
<div class="container-fluid bg-breadcrumb" style="background-image: url('{{ URL::asset('Template/img/bg1.png')}}');">
    <div class="container text-center py-5" style="max-width: 900px;">
        <h3 class="text-white display-3 mb-4">Donasi</h3>
        <ol class="breadcrumb justify-content-center mb-0">
        </ol>
    </div>
</div>
<br>
<!-- Header End -->

<div class="container">
    <div class="table-responsive">
        <table class="table" id="myTable">
            <thead class="bg-primary text-white">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Pemberi</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Jenis Donasi</th>
                    <th scope="col">Jumlah Donasi</th>
                </tr>
            </thead>
            <tbody>
                <?php $totalKeseluruhan = 0; ?>
                @foreach ($allDonasi as $jenis => $donasiByJenis)
                <?php $totalByJenis = 0;
                $nomor = 1; ?>
                @foreach ($donasiByJenis as $row)
                <tr>
                    <td>{{ $nomor }}</td>
                    <td>{{ $row->namapemberi }}</td>
                    <td>{{ $row->tanggal }}</td>
                    <td>{{ $row->jenis }}</td>
                    <td>Rp.{{ number_format($row->jumlahdonasi, 0) }}</td>
                </tr>
                <?php 
                $totalByJenis += $row->jumlahdonasi;
                $totalKeseluruhan += $row->jumlahdonasi;
                $nomor++; ?>
                @endforeach
                <tr class="bg-light">
                    <td colspan="4" class="text-right"><strong>Total Donasi {{ $jenis }}</strong></td>
                    <td><strong>Rp.{{ number_format($totalByJenis, 0) }}</strong></td>
                </tr>
                @endforeach
                <tr class="bg-primary text-white">
                    <td colspan="4" class="text-right"><strong>Total Keseluruhan Donasi</strong></td>
                    <td><strong>Rp.{{ number_format($totalKeseluruhan, 0) }}</strong></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

@endsection
