@extends('layout.admin')

@section('content')
<div class="container">
    <h1>Data Keluarga {{ $jemaat->namakeluarga }}</h1>
    
    <p>Nama Ayah: {{ $keluarga->first()->namaayah }}</p>
    <p>Nama Ibu: {{ $keluarga->first()->namaibu }}</p>
    <p>Nama Anak:</p>
    <ul>
    @foreach($keluarga as $item)
        <li>{{ $item->namaanak }}</li>
    @endforeach
    </ul>
</div>
@endsection
