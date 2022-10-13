<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Portofolio - Bintang Febriana</title>
  <link href="{{ asset('images/LogoFix.png') }}" rel="icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <link href="{{ asset('front/assets/vendor/aos/aos.css') }}" rel="stylesheet">
  <link href="{{ asset('front/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('front/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('front/assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('front/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <link href="{{ asset('front/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('front/assets/css/style.css') }}" rel="stylesheet">

</head>

<body>
    <i class="bi bi-list mobile-nav-toggle d-xl-none"></i>

    <header id="header" class="d-flex flex-column justify-content-center">

      <nav id="navbar" class="navbar nav-menu">
        <ul>
          <li><a href="#hero" class="nav-link scrollto active"><i class="bx bx-home"></i> <span>Home</span></a></li>
          <li><a href="#about" class="nav-link scrollto"><i class="bx bx-user"></i> <span>About</span></a></li>
          <li><a href="#resume" class="nav-link scrollto"><i class="bx bx-file-blank"></i> <span>Resume</span></a></li>
          <li><a href="#skills" class="nav-link scrollto"><i class="bx bx-laptop"></i> <span>Skills</span></a></li>
          <li><a href="#portfolio" class="nav-link scrollto"><i class="bx bx-book-content"></i> <span>Portfolio</span></a></li>
        </ul>
      </nav>

    </header>

    <section id="hero" class="d-flex flex-column justify-content-center">
      <div class="container" data-aos="zoom-in" data-aos-delay="100">
        @foreach( $about as $user)
        <h1>{{ $user['nama'] }}</h1>
        @endforeach
        <p>I'm <span class="typed" data-typed-items="{{ $profession_string }} "></span></p>
        <div class="social-links">
          @foreach( $socialmedia as $sosmed)
            <a href="{{ $sosmed['link'] }}" target="_blank"><i class="{{ $sosmed['icon'] }}"></i></a>
          @endforeach
        </div>
      </div>
    </section>

    <main id="main">

      <section id="about" class="about">
        <div class="container" data-aos="fade-up">

          <div class="section-title">
            <h2>About</h2>
          </div>

          <div class="row">
            <div class="col-lg-4">
                @foreach ($about as $a)
              <img src="{{ url('images/skills/' . $a['gambar']) }}" class=" img-fluid" alt="">
              @endforeach
            </div>
            <div class="col-lg-8 pt-4 pt-lg-0 content">
              <h3>{{ str_replace(",", "-", $profession_string) }}</h3>
              @foreach( $about as $abouts)
              <p class="fst-italic">
                {!! $abouts['deskripsi'] !!}
              </p>
              @endforeach
              <div class="row">
                <div class="col-lg-6">
                  <ul>
                    @foreach( $about as $abouts)
                    <li><i class=""></i> <strong>Name:</strong><span>{{ $abouts['nama'] }}</span></li>
                    <li><i class=""></i> <strong>Location:</strong><span>{{ $abouts['alamat'] }}</span></li>
                    <li><i class=""></i> <strong>Email:</strong><span>{{ $abouts['email'] }}</span></li>
                    @endforeach
                  </ul>
                </div>
                <div class="col-lg-6">
                  <ul>
                    @foreach( $socialmedia as $sosmed)
                      <li><i class=""></i> <strong>{{ $sosmed['nama'] }}:</strong> <span>{{ $sosmed['username'] }}</span></li>
                    @endforeach
                    <li><i class=""></i> <strong>Freelance:</strong> <span>Available</span></li>
                    @foreach( $about as $abouts)
                    <li><i class=""></i> <strong>Degree:</strong><span>{{ $abouts['gelar'] }}</span></li>
                    @endforeach
                  </ul>
                </div>
              </div>
            </div>
          </div>

        </div>
      </section>

      <section id="resume" class="resume">
        <div class="container" data-aos="fade-up">

          <div class="section-title">
            <h2>Resume</h2>
          </div>

          <div class="row">

            <div class="col-lg-6">
              <h3 class="resume-title">Sumary</h3>
              <div class="resume-item pb-0">
                @foreach( $about as $abouts)
                <h4>{{ $abouts['nama'] }}</h4>
                <p><em>{!! $abouts['deskripsi'] !!}</em></p>
                <ul>
                  <li>{{ $abouts['alamat'] }}</li>
                  <li>(+62) {{ $abouts['telp'] }}</li>
                  <li>{{ $abouts['email'] }}</li>
                </ul>
                @endforeach
              </div>

              <h3 class="resume-title">Education</h3>
              @foreach($education as $data)
              <div class="resume-item">
                <h4>{{ $data['jurusan'] }}</h4>
                <h5>{{ $data['mulai'] }} - {{$data['selesai']}}</h5>
                <p><em>{{ $data['instansi'] }}</em></p>
                    <ul>
                      @foreach( $education as $data)
                      <li>{!! $data['deskripsi'] !!}</li>
                      @endforeach
                    </ul>
              </div>
              @endforeach
            </div>

            <div class="col-lg-6">
              <h3 class="resume-title">Profesional Experience</h3>
              @foreach($experience as $data)
              <div class="resume-item">
                <h4>{{ $data['profesi'] }}</h4>
                <h5>{{ $data['mulai'] }} - {{ $data['selesai'] }}</h5>
                <p><em>{{ $data['perusahaan'] }} </em></p>
                {!! $data['deskripsi'] !!}
              </div>
              @endforeach

            </div>
          </div>

        </div>
      </section>

      <section id="skills" class="facts">
        <div class="container" data-aos="fade-up">

          <div class="section-title">
            <h2>Skills</h2>
          </div>

          <div class="row">
            @foreach($skills as $data)
            <div class="col-2">
              <div class="count-box">
                <i><img alt="image" src="{{ url('images/skills/' . $data['gambar']) }}" class="img-fluid"></i>
                <p>{{ $data['nama'] }}</p>
              </div>
            </div>
            @endforeach
          </div>
        </div>
      </section>

      <section id="portfolio" class="portfolio section-bg">
        <div class="container" data-aos="fade-up">

          <div class="section-title">
            <h2>Portfolio</h2>
          </div>

          <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">
            @foreach($portofolio as $data)
            <div class="col-lg-3 col-md-6 portfolio-item">
              <div class="portfolio-wrap">
                <img src="{{ asset('images/skills/'. $data['gambar'] ) }}" class="img-fluid" alt="">
                <div class="portfolio-info">
                  <h5>{{ $data['nama'] }}</h5>
                  <!-- <p>Portofolio versi 1</p> -->
                  <div class="portfolio-links">
                    <a href="{{ asset('images/skills/'. $data['gambar'] ) }}" data-gallery="portfolioGallery" class="portfolio-lightbox" title="{{ $data['deskripsi'] }}"><i class="bx bx-show"></i></a>
                    {{-- @if($data['link'])
                    <a href="{{ $data['link'] }}" class="portfolio-details-lightbox" data-glightbox="type: external" title="Portfolio Details"><i class="bx bx-link"></i></a>
                    @endif --}}
                  </div>
                </div>
              </div>
            </div>
            @endforeach
          </div>

        </div>
      </section>

    </main>

    <footer id="footer">
      <div class="container">
        <div class="social-links">
          @foreach( $socialmedia as $sosmed)
            <a href="{{ $sosmed['link'] }}" target="_blank"><i class="{{ $sosmed['icon'] }}"></i></a>
          @endforeach
        </div>
        <div class="copyright">
          &copy; Copyright 2022 <strong><span>Agistya Anugrah Dwiutama</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
          Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
        </div>
      </div>
    </footer>

    <div id="preloader"></div>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{ asset('front/assets/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('front/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('front/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('front/assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('front/assets/vendor/php-email-form/validate.js') }}"></script>
    <script src="{{ asset('front/assets/vendor/purecounter/purecounter.js') }}"></script>
    <script src="{{ asset('front/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('front/assets/vendor/typed.js/typed.min.js') }}"></script>
    <script src="{{ asset('front/assets/vendor/waypoints/noframework.waypoints.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('front/assets/js/main.js') }}"></script>

  </body>

  </html>
