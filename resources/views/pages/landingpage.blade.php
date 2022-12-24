@extends('pages.layouts.main')

@section('content')
  @if(session('mustLogin'))
    <script>
      Swal.fire({
        title: 'Warning!',
        text: "{{ session('mustLogin') }}",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Login'
      }).then((result) => {
        if (result.isConfirmed) {
          window.location.href = "{{ route('login.index') }}";
        }
      })
    </script>
  @endif

    <!-- ***** Main Banner Area Start ***** -->
  <section class="section main-banner" id="top" data-section="section1">
    <video autoplay muted loop id="bg-video">
        <source src="{{ asset('assets/pages/images/videowikrama.mp4') }}" type="video/mp4" />
    </video>

    <div class="video-overlay header-text">
        <div class="caption">
          <h2><em>PPDB </em> SMK Wikrama Bogor</h2>
            <h6>Ayo! segera daftarkan dirimu ke SMK Wikrama dengan cara klik PENDAFTARAN PPDB dibawah ini!
              Ilmu yang Amaliah, Amal yang Ilmiah, Akhlakul Karimah.</h6>
            <div class="main-button">
                <div><a href="{{ route('form.index') }}">Daftar Sekarang!</a></div>
            </div>
        </div>
    </div>
</section>
<!-- ***** Main Banner Area End ***** -->


<section class="features">
  <div class="container">
    <div class="row">
      <div class="col-lg-4 col-12">
        <div class="features-post">
          <div class="features-content">
            <div class="content-show">
              <h4><i class="fa fa-pencil"></i>MOTTO</h4>
            </div>
            <div class="content-hide">
              <p>Ilmu yang Amaliah, Amal yang Ilmiah, Akhlaqul Karimah</p>
              <p class="hidden-sm">Ilmu yang Amaliah, Amal yang Ilmiah, Akhlaqul Karimah</p>
          </div>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-12">
        <div class="features-post second-features">
          <div class="features-content">
            <div class="content-show">
              <h4><i class="fa fa-graduation-cap"></i>AFIRMASI</h4>
            </div>
            <div class="content-hide">
              <p>Padamu negeri - kami berjanji - lulus Wikrama siap membangun negeri</p>
              <p class="hidden-sm">Padamu negeri - kami berjanji - lulus Wikrama siap membangun negeri</p>
          </div>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-12">
        <div class="features-post third-features">
          <div class="features-content">
            <div class="content-show">
              <h4><i class="fa fa-book"></i>ATITUDE</h4>
            </div>
            <div class="content-hide">
              <p>Aku ada lingkunganku
                bahagia</p>
              <p class="hidden-sm">Aku ada lingkunganku
                bahagia</p>
          </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="section why-us" data-section="section2">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="section-heading">
          <h2>Jurusan</h2>
        </div>
      </div>
      <div class="col-md-12">
        <div id='tabs'>
          <ul>
            <li><a href='#tabs-1'>PPLG</a></li>
            <li><a href='#tabs-2'>TKJT</a></li>
            <li><a href='#tabs-3'>MPLB</a></li>
          </ul>
          <section class='tabs-content'>
            <article id='tabs-1'>
              <div class="row">
                <div class="col-md-6">
                  <img src="{{ asset('assets/pages/images/choose-us-image-01.png') }}" alt="">
                </div>
                <div class="col-md-6">
                  <h4>Pengembangan Perangkat Lunak dan Gim</h4>
                  <p>Desktop Programming, Web Programming, Mobile Programming, Bussiness Analyst, Database Administration.</p>
                </div>
              </div>
            </article>
            <article id='tabs-2'>
              <div class="row">
                <div class="col-md-6">
                  <img src="{{ asset('assets/pages/images/choose-us-image-02.png') }}" alt="">
                </div>
                <div class="col-md-6">
                  <h4>Teknik Jaringan Komputer dan Telekomunikasi</h4>
                  <p>Kompetensi keahlian Teknik Komputer dan Jaringan sudah memiliki sertifikasi internasional seperti CNAP (Cisco Networking Academy Program) dan MCNA (Mikrotik Certified Network Associate).</p
                </div>
              </div>
            </article>
            <article id='tabs-3'>
              <div class="row">
                <div class="col-md-6">
                  <img src="{{ asset('assets/pages/images/choose-us-image-03.png') }}" alt="">
                </div>
                <div class="col-md-6">
                  <h4>Manajemen Perkantoran Lembaga Bisnis</h4>
                  <p>Kompetensi keahlian Otomatisasi dan Tata Kelola Perkantoran/Administrasi Perkantoran memiliki keunggulan dibidang prestasi peserta didik seperti juara II lomba keterampilan siswa bidang lomba sekretaris tingkat provinsi tahun 2016 dan juara I lomba olimpiade sekretaris tingkat nasional tahun 2017</p>
                </div>
              </div>
            </article>
          </section>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="section courses" data-section="section4">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="section-heading">
          <h2>Testimoni</h2>
        </div>
      </div>
      <div class="owl-carousel owl-theme">
        <div class="item">
          <div class="down-content">
            <h4>Akhmad Munito (2000)</h4>
            <p>Maju Terus Wikrama, dengan sekolah di Wikrama saya dibekali ilmu yg sangat bermanfaat dan akhlakul karimah bisa langsung bisa bersaing ke dunia kerja di era modern ini.</p>
          </div>
        </div>
        <div class="item">
          <div class="down-content">
            <h4>Kamaludin (2016)</h4>
            <p>Menerapkan sistem pembelajaran yang baik, efektif dan berbasis TI yang sangat memudahkan siswa.</p>
          </div>
        </div>
        <div class="item">
          <div class="down-content">
            <h4>Lutfi Hakim (2011)</h4>
            <p>TSMK Wikrama bukan hanya menjadikan siswanya untuk masuk ke dunia kerja, melainkan melebihi dari apa yang dibutuhkan di dunia kerja pada umumnya.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


<section class="section video" data-section="section5">
  <div class="container">
    <div class="row">
      <div class="col-md-6 align-self-center">
        <div class="left-content">
          <span>our presentation is for you</span>
          <h4>Watch the video to learn more <em>about SMK Wikrama Bogor</em></h4>
          <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Repellat placeat odio ea mollitia recusandae quas perferendis repellendus facilis temporibus perspiciatis a, explicabo aspernatur illum vitae delectus, molestiae quod porro deleniti.
          <br><br>Suspendisse tincidunt, magna ut finibus rutrum, libero dolor euismod odio, nec interdum quam felis non ante.</p>
          <div class="main-button"><a rel="nofollow" href="https://www.youtube.com/@multimediawikrama7482" target="_parent">Youtube Channel Wikrama</a></div>
        </div>
      </div>
      <div class="col-md-6">
        <article class="video-item">
          <div class="video-caption">
            <h4>Profile TEFA Wikrama Bogor</h4>
          </div>
          <figure>
            <a href="https://www.youtube.com/watch?v=Wag6WcgKO6o" class="play"><img src="{{ asset('assets/pages/images/thumbyt.webp') }}"></a>
          </figure>
        </article>
      </div>
    </div>
  </div>
</section>

<section class="section contact" data-section="section6">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="section-heading">
          <h2>Hubungi Kami</h2>
        </div>
      </div>
      <div class="col-md-6">
      
      <!-- Do you need a working HTML contact-form script?
                  
                  Please visit https://templatemo.com/contact page -->
                  
        <form id="contact" action="" method="post">
          <div class="row">
            <div class="col-md-6">
                <fieldset>
                  <input name="name" type="text" class="form-control" id="name" placeholder="Your Name" required="">
                </fieldset>
              </div>
              <div class="col-md-6">
                <fieldset>
                  <input name="email" type="text" class="form-control" id="email" placeholder="Your Email" required="">
                </fieldset>
              </div>
            <div class="col-md-12">
              <fieldset>
                <textarea name="message" rows="6" class="form-control" id="message" placeholder="Your message..." required=""></textarea>
              </fieldset>
            </div>
            <div class="col-md-12">
              <fieldset>
                <button type="submit" id="form-submit" class="button">Send Message Now</button>
              </fieldset>
            </div>
          </div>
        </form>
      </div>
      <div class="col-md-6">
        <div id="map">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3963.0158910565074!2d106.84162231434478!3d-6.6449477668061245!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69c89505b4c37d%3A0x307fc4a38e65fa2b!2sSMK%20Wikrama%20Bogor!5e0!3m2!1sid!2sid!4v1671867446027!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection