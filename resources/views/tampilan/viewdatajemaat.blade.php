@extends('layout.user')

@section('container')
<style>
  /* Styling khusus untuk halaman ini */
.container {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    margin: 20px auto;
    padding: 20px; /* Menambahkan padding untuk ruang di sekitar konten */
    max-width: 1000px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.family-header {
    text-align: center;
    margin-bottom: 20px;
}

.family-header h1, .family-header h2 {
    margin: 0; /* Reset margin untuk elemen header */
    padding: 0; /* Reset padding untuk elemen header */
    line-height: 1.5; /* Mengatur tinggi garis untuk spasi yang lebih baik */
}

.family-header h1 {
    font-size: 2.5em;
    margin-bottom: 10px; /* Spasi di bawah h1 */
    color: #333;
}

.family-header h2 {
    font-size: 2em;
    margin-top: 0; /* Pastikan margin atas diatur */
    margin-bottom: 20px; /* Spasi di bawah h2 */
    color: #555;
}

.family-details {
    width: 100%;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.family-table {
    width: 100%;
    border-collapse: collapse;
}

.family-table th, .family-table td {
    padding: 15px;
    border: 1px solid #ddd;
    text-align: left;
}

.family-table th {
    background-color: #f8f8f8;
    font-weight: bold;
}

.family-table td {
    background-color: #fafafa;
}

.family-table ul {
    list-style-type: disc;
    padding-left: 20px;
}

.back-button {
    display: inline-block;
    margin-top: 20px;
    padding: 10px 20px;
    background-color: #007bff;
    color: white;
    text-decoration: none;
    border-radius: 5px;
    text-align: center;
    transition: background-color 0.3s;
}

.back-button:hover {
    background-color: #0056b3;
}


</style>

<div class="container">
    <div class="family-header">
        <h1>Data Keluarga</h1>
        <h2>{{ $jemaat->namakeluarga }}</h2>
    </div>

    <div class="family-details">
        <table class="family-table">
            <tr>
                <th>Nama Ayah</th>
                <td>{{ $keluarga->first()->namaayah }}</td>
            </tr>
            <tr>
                <th>Nama Ibu</th>
                <td>{{ $keluarga->first()->namaibu }}</td>
            </tr>
            <tr>
                <th>Nama Anak</th>
                <td>
                    <ul>
                        @foreach($keluarga as $item)
                        <li>{{ $item->namaanak }}</li>
                        @endforeach
                    </ul>
                </td>
            </tr>
        </table>
    </div>

    <a href="{{ url('/datajemaat') }}" class="back-button">Back</a>
</div>
@endsection
