@extends('dashboard.layouts.main')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><i class="fa fa-laugh-wink"></i> Selamat Datang! {{ auth()->user()->name }}</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-info-circle fa-sm text-white-50"></i> Dashboard</a>
    </div>

    <!-- Content Row -->
    <div class="row justify-content-between align-items-start">

        <div class="card-dashboard alert bg-light border border-dark shadow p-3 mb-5 bg-body rounded" style="width: 100%" role="alert">
            <h4 class="alert-heading text-dark font-weight-bold"><i class="fa fa-bell"></i> Notification</h4>
            @forelse($pembayarans as $pembayaran)
                @if($pembayaran->status == 'di tolak')
                <div class="alert bg-danger text-light">
                    <h5 class="font-weight-bold">Pembayaran Di tolak!</h5>
                    <p class="mb-0">Di tolak tgl : <span class="font-weight-bold">{{ $pembayaran->updated_at->format('d F Y H:i:s') }}</span></p>
                    <p>Alasan Di tolak  : <span class="font-weight-bold">{{ $pembayaran->message }}</span></p>
                </div>
                @elseif($pembayaran->status == 'di verifikasi')
                <div class="alert bg-success text-light">
                    <h5 class="font-weight-bold">Pembayaran Berhasil dan diverifikasi!</h5>
                    <p>Di verifikasi tgl : <span class="font-weight-bold">{{ $pembayaran->updated_at->format('d F Y H:i:s') }}</span></p>
                </div>
                @else
                <div class="alert bg-info text-light">
                    <h5 class="font-weight-bold">Sedang Menunggu Verifikasi Pembayaran</h5>
                    <p>Tanggal Pembayaran : <span class="font-weight-bold">{{ $pembayaran->created_at->format('d F Y H:i:s') }}</span></p>
                </div>
                @endif
            @empty
            <div class="alert bg-warning text-light">
                @if (auth()->user()->role == 'user')
                {{-- <p class="m-0 font-weight-bold">Silahkan Lakukan Pembayaran Sebelum Tanggal <span class="btn btn-primary">{{ date('d F Y', strtotime("1 days")) }}</span></p> --}}
                <p class="m-0 font-weight-bold">Silahkan Lakukan Pembayaran</p>
                @else
                <p class="m-0 font-weight-bold">Silahkan mengecek data pendaftaran beserta bukti pembayaran para calon siswa</p>
                <p class="m-0">Total data pembayaran : <span class="font-weight-bold">{{ $allPembayarans->count() }}</span></p>
                @endif
            </div>
            @endforelse
        </div>
    </div>

@endsection