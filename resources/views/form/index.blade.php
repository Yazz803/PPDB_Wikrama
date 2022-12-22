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
                <h3 class="pb-2 pb-md-0 px-md-2 text-center">Form Pendaftaran PPDB</h3>
                <h5 class="text-center mb-4 text-secondary">SMK Wikrama Bogor TP. 2023-2024</h5>
  
              <form class="px-md-2">
                <div class="row">
                    <div class="col-md-6 mb-4">

                        <div class="form-outline datepicker">
                        <input type="number" class="form-control" id="exampleDatepicker1" />
                        <label for="exampleDatepicker1" class="form-label">NISN</label>
                        </div>

                    </div>
                    <div class="col-md-6 mb-4">

                        <select class="select form-select">
                        <option value="" selected disabled hidden>Jenis Kelamin</option>
                        <option value="laki-laki">Laki-laki</option>
                        <option value="perempuan">Perempuan</option>
                        </select>

                    </div>
                </div>
  
                <div class="form-outline mb-4">
                  <input type="text" id="form3Example1q" class="form-control" />
                  <label class="form-label" for="form3Example1q">Name</label>
                </div>
  
  
                <div class="mb-4">
  
                  <select class="select form-select">
                    <option value="" selected disabled>Asal Sekolah</option>
                    <option value="2">Class 1</option>
                    <option value="3">Class 2</option>
                    <option value="4">Class 3</option>
                  </select>
  
                </div>

                <div class="form-outline mb-4">
                    <input type="text" id="form3Example1q" class="form-control" />
                    <label class="form-label" for="form3Example1q">Email</label>
                </div>

                <div class="form-outline mb-4">
                    <input type="text" id="form3Example1q" class="form-control" />
                    <label class="form-label" for="form3Example1q">Nomor Handphone : 08----</label>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-4">

                        <div class="form-outline datepicker">
                            <input type="number" class="form-control" id="exampleDatepicker1" />
                            <label for="exampleDatepicker1" class="form-label">No.HP Ayah</label>
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <div class="form-outline datepicker">
                            <input type="number" class="form-control" id="exampleDatepicker1" />
                            <label for="exampleDatepicker1" class="form-label">No.HP Ibu</label>
                        </div>
                    </div>
                </div>
  
                <button type="submit" class="btn btn-success btn-lg mb-1">Submit</button>
  
              </form>
  
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection