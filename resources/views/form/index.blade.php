@extends('form.layouts.main')

@section('content')
<section class="h-100 h-custom">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-lg-8 col-xl-6">
          <div class="card rounded-3">
            <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-registration/img3.webp"
              class="w-100" style="border-top-left-radius: .3rem; border-top-right-radius: .3rem;"
              alt="Sample photo">
            <div class="card-body p-4 p-md-5">
              @if(session('success'))
              <div class="alert alert-primary">
                {{ session('success') }}
              </div>
              @endif
                <h3 class="pb-2 pb-md-0 px-md-2 text-center">Form Pendaftaran PPDB</h3>
                <h5 class="text-center mb-4 text-secondary">SMK Wikrama Bogor TP. 2023-2024</h5>
  
              <form class="px-md-2" action="{{ route('form.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-4">

                        <div class="form-outline datepicker">
                        <input type="number" name="nisn" maxlength="11" class="form-control" id="exampleDatepicker1" value="{{ old('nisn') }}" />
                        <label for="exampleDatepicker1" class="form-label">NISN</label>
                        </div>
                      @error('nisn')
                      <div class="text-danger fw-bold">{{ $message }}</div>
                      @enderror

                    </div>
                    <div class="col-md-6 mb-4">
                        <select class="select form-select" name="jk">
                          <option value="" selected disabled hidden>Jenis Kelamin</option>
                          <option value="laki-laki" @if(old('jk') == 'laki-laki') selected @endif>Laki-laki</option>
                          <option value="perempuan" @if(old('jk') == 'perempuan') selected @endif>Perempuan</option>
                        </select>
                        @error('jk')
                          <div class="text-danger fw-bold">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
  
                <div class="form-outline mb-4">
                  <input type="text" name="nama" id="form3Example1q" class="form-control" value="{{ old('nama') }}" />
                  <label class="form-label" for="form3Example1q">Nama</label>
                </div>
                @error('nama')
                  <div class="text-danger fw-bold mb-4">{{ $message }}</div>
                @enderror
  
                <div class="mb-4">
  
                  <select class="select form-select" name="asal_sekolah" id="asal_sekolah" onchange="checkvalue(this.value)">
                    <option value="" selected disabled>Asal Sekolah</option>
                    @include('form.dataSekolah')
                    <option value="lainnya">Lainnya</option>
                  </select>
                  @error('asal_sekolah')
                    <div class="text-danger fw-bold">{{ $message }}</div>
                  @enderror
                  @if(session('error_asal_sekolah_lainnya'))
                    <div class="text-danger fw-bold">{{ session('error_asal_sekolah_lainnya') }}</div>
                  @endif
                </div>

                <div class="form-outline mb-4" style="display: none" id="other_school">
                    <input type="text" id="form3Example1q" name="asal_sekolah_lainnya" class="form-control" value="{{ old('asal_sekolah') }}" />
                    <label class="form-label" for="form3Example1q">Masukan Nama Sekolah Kamu</label>
                </div>

                <div class="form-outline mb-4">
                    <input type="text" id="form3Example1q" name="email" class="form-control" value="{{ old('email') }}" />
                    <label class="form-label" for="form3Example1q">Email</label>
                </div>

                @error('email')
                  <div class="text-danger fw-bold mb-4">{{ $message }}</div>
                @enderror

                <div class="form-outline mb-4">
                    <input type="number" id="form3Example1q" name="nomor_hp" class="form-control" value="{{ old('nomor_hp') }}"/>
                    <label class="form-label" for="form3Example1q">Nomor Handphone : 08----</label>
                </div>
                @error('nomor_hp')
                  <div class="text-danger fw-bold mb-4">{{ $message }}</div>
                @enderror

                <div class="row">
                    <div class="col-md-6 mb-4">

                        <div class="form-outline datepicker">
                            <input type="number" class="form-control" name="nomor_hp_ayah" id="exampleDatepicker1" value="{{ old('nomor_hp_ayah') }}" />
                            <label for="exampleDatepicker1" class="form-label">No.HP Ayah</label>
                        </div>
                        @error('nomor_hp_ayah')
                          <div class="text-danger fw-bold">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-4">
                        <div class="form-outline datepicker">
                            <input type="number" class="form-control" name="nomor_hp_ibu" id="exampleDatepicker1" value="{{ old('nomor_hp_ibu') }}" />
                            <label for="exampleDatepicker1" class="form-label">No.HP Ibu</label>
                        </div>
                        @error('nomor_hp_ibu')
                          <div class="text-danger fw-bold">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
  
                <div class="d-flex justify-content-around align-items-center">
                  <a href="{{ route('landingpage') }}" class="btn btn-primary">Back to Home</a>
                  <button type="submit" class="btn btn-success btn-lg mb-1">Submit</button>
                </div>
  
              </form>

              <p class="mt-3 fw-bold">Setelah menekan tombol Submit, akan otomatis mendownload file pdf berupa tanda bukti Pendaftaran</p>
  
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <script>
    function checkvalue(val) {
        if (val === "lainnya") {
            document.getElementById('other_school').style.display = 'block';
        } else {
            document.getElementById('other_school').style.display = 'none';
        }
    }
  </script>
@endsection