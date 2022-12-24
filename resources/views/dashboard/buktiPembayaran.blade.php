@extends('dashboard.layouts.main')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4 border border-dark px-4 py-3 rounded" style="background-color: #FFF">
        <h1 class="h3 mb-0 px-3 py-2 rounded font-weight-bold">Bukti Pembayaran</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">Dashboard / Bukti Pembayaran</a>
    </div>

    <div class="pt-4 border border-dark rounded" style="background-color: #FFF">
        <center>
            <a href="{{ asset('assets/buktiPembayaran/' . $pembayaran->bukti_pembayaran) }}" target="_blank">
                <img class="mb-4" src="{{ asset('assets/buktiPembayaran/' . $pembayaran->bukti_pembayaran) }}" alt="">
            </a>
            <p><span class="font-weight-bold">Nama Bank : </span>{{ $pembayaran->nama_bank }}</p>
            <p><span class="font-weight-bold">Nama Pemilik Rekening : </span>{{ $pembayaran->nama_pemilik }}</p>
            <p><span class="font-weight-bold">Nominal : </span>{{ $pembayaran->nominal }}</p>
            <a href="{{ route('dashboard.pembayaran.admin') }}">Kembali</a>
        </center>
    </div>
@endsection