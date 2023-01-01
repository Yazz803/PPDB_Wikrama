@extends('dashboard.layouts.main')

@vite(['resources/sass/app.scss', 'resources/js/app.js'])

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4 border border-dark px-4 py-3 rounded" style="background-color: #FFF">
        <h1 class="h3 mb-0 px-3 py-2 rounded font-weight-bold">Verifikasi Pembayaran</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">Dashboard / Verifikasi Pembayaran</a>
    </div>
    
    <div class="container table-pembayaran">
      <div class="card">
        <div class="card-body">
          {{ $dataTable->table() }}
        </div>
      </div>
    </div>

    @push('scripts')
        {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
        <script>
          const tolak = () => {
            let message = prompt("Masukan Alasan Ditolak", '')
            document.getElementById("message").value = message
          }
        </script>
    @endpush
@endsection