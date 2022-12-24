@extends('dashboard.layouts.main')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4 border border-dark px-4 py-3 rounded" style="background-color: #FFF">
        <h1 class="h3 mb-0 px-3 py-2 rounded font-weight-bold">Verifikasi Pembayaran</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">Dashboard / Verifikasi Pembayaran</a>
    </div>
    
    <div class="container border border-dark rounded">
        <table class="table table-striped mt-2">
            <thead>
              <tr class="text-center">
                <th scope="col">No</th>
                <th scope="col">Nomor Registrasi</th>
                <th scope="col">Nama</th>
                <th scope="col">Bukti Pembayaran</th>
                <th scope="col">Detail Pendaftaran</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach($pembayarans as $pembayaran)
              <tr class="text-center">
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $pembayaran->id }}</td>
                <td>{{ $pembayaran->nama_pemilik }}</td>
                <td><a href="{{ route('dashboard.buktiPembayaran', $pembayaran->id) }}">Lihat</a></td>
                <td><a href="{{ route('dashboard.detailPembayaran', $pembayaran->id) }}">Detail</a></td>
                @if($pembayaran->status == NULL)
                <td class="d-flex justify-content-around">
                    <form action="{{ route('dashboard.pembayaran.verifikasi', $pembayaran->id) }}" method="POST">
                      @csrf
                      @method('PUT')
                      <button type="submit" class="btn btn-success">Verifikasi</button>
                    </form>
                    <form action="{{ route('dashboard.pembayaran.tolak', $pembayaran->id) }}" method="POST">
                      @csrf
                      @method('PUT')
                      <input type="hidden" id="message" name="message">
                      <button type="submit" onclick="return tolak()" class="btn btn-danger">Tolak</button>
                    </form>
                </td>
                @else 
                <td class="font-weight-bold {{ $pembayaran->status == 'di tolak' ? 'text-danger' : 'text-success' }}">{{ ucfirst($pembayaran->status) }}</td>
                @endif
                <script>
                  const tolak = () => {
                    let message = prompt("Masukan Alasan Ditolak", '')
                    document.getElementById("message").value = message
                  }
                </script>
              </tr>
              @endforeach
            </tbody>
          </table>
    </div>
@endsection