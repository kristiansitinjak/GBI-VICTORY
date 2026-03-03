@extends('layout.admin')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="card-title">Daftar Pendaftaran Jemaat Menunggu Approval</h3>
                    <a href="{{ url('/admin/tambahdatajemaat') }}" class="btn btn-success btn-sm">Tambah Jemaat</a>
                </div>
                <div class="card-body">

                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    @if($pendings->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead class="table-light">
                                <tr>
                                    <th>#</th>
                                    <th>Nama Keluarga</th>
                                    <th>Sektor</th>
                                    <th>Telepon</th>
                                    <th>Alamat</th>
                                    <th>Status</th>
                                    <th>Tanggal Daftar</th>
                                    <th>Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($pendings as $p)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td><strong>{{ $p->namakeluarga }}</strong></td>
                                        <td>{{ $p->sektor }}</td>
                                        <td>{{ $p->telepon ?? '-' }}</td>
                                        <td>{{ $p->alamat }}</td>
                                        <td>
                                            @if($p->status == \App\Models\PendingJemaat::STATUS_PENDING)
                                                <span class="badge bg-warning text-dark">Pending</span>
                                            @elseif($p->status == \App\Models\PendingJemaat::STATUS_APPROVED)
                                                <span class="badge bg-success">Disetujui</span>
                                            @elseif($p->status == \App\Models\PendingJemaat::STATUS_REJECTED)
                                                <span class="badge bg-danger">Ditolak</span>
                                            @else
                                                <span class="badge bg-secondary">{{ ucfirst($p->status) }}</span>
                                            @endif
                                        </td>
                                        <td>{{ $p->created_at->format('d-m-Y H:i') }}</td>
                                        <td>
                                            @if($p->status != \App\Models\PendingJemaat::STATUS_APPROVED)
                                            <form action="{{ url('admin/pending-jemaat/'.$p->id.'/approve') }}" method="POST" style="display:inline">
                                                @csrf
                                                <button type="submit" class="btn btn-sm btn-success" onclick="return confirm('Setujui pendaftaran ini?')">
                                                    <i class="fas fa-check"></i> Setujui
                                                </button>
                                            </form>
                                            
                                            <form action="{{ url('admin/pending-jemaat/'.$p->id.'/reject') }}" method="POST" style="display:inline">
                                                @csrf
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menolak pendaftaran ini?')">
                                                    <i class="fas fa-times"></i> Tolak
                                                </button>
                                            </form>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="text-center py-5">
                            <i class="fas fa-user-clock fa-3x text-muted mb-3"></i>
                            <p class="text-muted">Tidak ada pendaftaran jemaat yang perlu diproses saat ini.</p>
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
