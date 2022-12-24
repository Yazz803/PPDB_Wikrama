@extends('dashboard.layouts.main')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4 border border-dark px-4 py-3 rounded" style="background-color: #FFF">
        <h1 class="h3 mb-0 px-3 py-2 rounded font-weight-bold">Detail Pembayaran</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">Dashboard / Detail Pembayaran</a>
    </div>

    <div class="p-5 border border-dark rounded">
        <ul>
            <li class="mb-1"><span class="font-weight-bold">NISN</span> : {{ $pembayaran->biodata->nisn }}</li>
            <li class="mb-1"><span class="font-weight-bold">Nomor Seleksi</span> : {{ $pembayaran->biodata->no_seleksi }}</li>
            <li class="mb-1"><span class="font-weight-bold">Nama Siswa</span> : {{ $pembayaran->biodata->nama }}</li>
            <li class="mb-1"><span class="font-weight-bold">Asal Sekolah</span> : {{ $pembayaran->biodata->asal_sekolah }}</li>
            <li class="mb-1"><span class="font-weight-bold">Email</span> : {{ $pembayaran->biodata->email }}</li>
            <li class="mb-1"><span class="font-weight-bold">No HP</span> : {{ $pembayaran->biodata->nomor_hp }}</li>
            <li class="mb-1"><span class="font-weight-bold">No HP Ayah</span> : {{ $pembayaran->biodata->nomor_hp_ayah }}</li>
            <li class="mb-3"><span class="font-weight-bold">No HP Ibu</span> : {{ $pembayaran->biodata->nomor_hp_ibu }}</li>
            <a class="font-weight-bold" href="{{ route('dashboard.pembayaran.admin') }}">Kembali</a>
        </ul>
    </div>
@endsection