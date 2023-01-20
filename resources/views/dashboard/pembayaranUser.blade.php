@extends('dashboard.layouts.main')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4 border border-dark px-4 py-3 rounded" style="background-color: #FFF">
        <h1 class="h3 mb-0 px-3 py-2 rounded font-weight-bold">
          @if(!$checkP || $pembayaran->message != NULL)
            Upload Bukti Pembayaran
          @elseif($pembayaran->status == NULL)
            <span class="text-info">Pembayaran Sedang Di proses</span>
          @else
            <span class="text-success">Pembayaran Berhasil</span>
          @endif
          <br> 
          <span style="font-size: 13px;">{{ $pembayarans ? '' : 'Silahkan Mengisi Form Pembayaran di bawah ini' }}</span>
        </h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
            class="fas fa-info-circle fa-sm text-white-50"></i> Dashboard</a>
    </div>

    @if(!$checkP || $pembayaran->message != NULL)
    <div class="border border-dark rounded p-3 mb-4" style="background-color: #FFF">
      <form action="{{ route('dashboard.pembayaran.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
          <h5 class="font-weight-bold">Form Pembayaran</h5>
          <div class="atas d-flex align-items-end justify-content-between" style="flex-wrap: wrap;">
              <div class="mb-3 input-pembayaran" style="width: 32%">
                <label for="exampleInputEmail1" class="text-dark font-weight-bold">Nama Bank</label>
                <select name="nama_bank" id="nama_bank" class="form-control" onchange="checkvalue(this.value)">
                  <option value="" selected hidden>-- Pilih Bank --</option>
                  @include('dashboard.dataBank')
                  <option value="lainnya">Lainnya</option>
                </select>
                @error('nama_bank')
                  <p class="text-danger font-weight-bold">{{ $message }}</p>
                @enderror
                @error('nama_bank_lainnya')
                  <p class="text-danger font-weight-bold">{{ $message }}</p>
                @enderror
              </div>
              <div class="mb-3 input-pembayaran" style="width: 32%">
                <label for="exampleInputPassword1" class="text-dark font-weight-bold">Nama Pemilik Rekening</label>
                <input type="text" class="form-control" name="nama_pemilik" id="exampleInputPassword1">
                @error('nama_pemilik')
                  <p class="text-danger font-weight-bold">{{ $message }}</p>
                @enderror
              </div>
              <div class="mb-3 input-pembayaran" style="width: 32%">
                <label for="exampleInputPassword1" class="text-dark font-weight-bold">Nominal</label>
                <input type="text" name="nominal" id="numberInput" class="form-control">
                @error('nominal')
                  <p class="text-danger font-weight-bold">{{ $message }}</p>
                @enderror
              </div>
          </div>
          <div class="mb-3 input-pembayaran" style="display:none" id="other_payment">
            <label for="exampleInputPassword1" class="text-dark font-weight-bold">Nama Bank atau Dompet Digital</label>
            <input type="text" class="form-control" name="nama_bank_lainnya" id="exampleInputPassword1">
          </div>
          <div class="mb-3">
              <label for="" class="text-dark font-weight-bold">Foto Bukti Pembayaran</label>
              <input type="file" class="form-control" name="bukti_pembayaran">
              @error('bukti_pembayaran')
              <p class="text-danger font-weight-bold">{{ $message }}</p>
              @enderror
          </div>
          
          <div class="d-flex justify-content-end">
            <button type="submit" class="btn btn-primary">Upload Bukti Pembayaran</button>
          </div>
        </form>
    </div>
    @elseif($pembayarans->where('status', 'di verifikasi')->count() > 0)
    <div class="alert bg-success text-light">
      <h5 class="font-weight-bold">Pembayaran Berhasil dan diverifikasi!</h5>
      <p>Di verifikasi tgl : <span class="font-weight-bold">{{ $pembayaran->created_at->format('d F Y H:i:s') }}</span></p>
    </div>
    @else
    <div class="alert bg-info text-light">
      <h5 class="font-weight-bold">Menunggu Konfirmasi!</h5>
      <p>Tgl Upload Bukti Pembayaran : <span class="font-weight-bold">{{ $pembayaran->created_at->format('d F Y H:i:s') }}</span></p>
    </div>
    @endif
    <script>
      function checkvalue(val) {
          if (val === "lainnya") {
              document.getElementById('other_payment').style.display = 'block';
          } else {
              document.getElementById('other_payment').style.display = 'none';
          }
      }

      var numberInput = document.getElementById('numberInput');
      numberInput.addEventListener('keyup', function(e)
      {
        numberInput.value = formatRupiah(this.value, 'Rp ');
      });
      /* Fungsi */
      function formatRupiah(angka, prefix)
      {
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
          split	= number_string.split(','),
          sisa 	= split[0].length % 3,
          rupiah 	= split[0].substr(0, sisa),
          ribuan 	= split[0].substr(sisa).match(/\d{3}/gi);
          
        if (ribuan) {
          separator = sisa ? '.' : '';
          rupiah += separator + ribuan.join('.');
        }
        
        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
      }
    </script>
@endsection