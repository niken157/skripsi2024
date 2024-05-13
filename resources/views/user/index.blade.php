<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Cipto Beton - Index</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ asset('user/assets/img/favicon.png')}}" rel="icon">
  <link href="{{ asset('user/assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('user/assets/vendor/aos/aos.css')}}" rel="stylesheet">
  <link href="{{ asset('user/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{ asset('user/assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{ asset('user/assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{ asset('user/assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
  <link href="{{ asset('user/assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('user/assets/css/style.css')}}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Squadfree
  * Template URL: https://bootstrapmade.com/squadfree-free-bootstrap-template-creative/
  * Updated: Mar 17 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
  <style>
    .upper {
        text-transform: uppercase;
        font-family: "Arial", sans-serif;
    }
</style>
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top header-transparent">
    <div class="container d-flex align-items-center justify-content-between position-relative">

      <div class="logo">
        <h1 class="text-light"><a href="/utama"><span>CiptoBeton</span></a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Utama</a></li>
          <li><a class="nav-link scrollto" href="#services">Produk</a></li>
          <li><a class="nav-link scrollto" href="#about">Cara Pesan</a></li>
          <li><a class="nav-link scrollto" href="#contact">Hubungi Kami</a></li>
          @php
                                $keranjang = DB::table('produk')
                     ->join('keranjang', 'produk.id_produk', '=', 'keranjang.id_produk')
                     ->join('users', 'keranjang.id_users', '=', 'users.id')
                     ->where('users.id', Auth::user()->id)
                    ->get();
                            @endphp
          <li><a href='/keranjang/{{ Auth::user()->id }}'><i class="fa-solid fa-cart-shopping"></i><p class="upper">&nbsp[{{ $keranjang->count()}}]</p></a></li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa-solid fa-user"></i> &nbsp {{ Auth::user()->name }} <span class="caret"></span></a>
            <ul class="dropdown-menu">
                {{-- <li><a href="/">login</a></li>
                <li><a href="/register">Register</a></li> --}}
                <li><a href="/logout">Keluar</a></li>
            </ul>
        </li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div class="hero-container" data-aos="fade-up">
      <h1>Selamat Datang di CiptoBeton</h1>
      <h2>Melayani : <br>Kusen Pintu & Jendela Serutan <br> Lisplang, Cagak Teras, Balok, Knopy, Lis Gypsum <br>Aneka Loster Kaca & Kasa</h2>
      <a href="#services" class="btn-get-started scrollto"><i class="bx bx-chevrons-down"></i></a>
    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container">
        <div class="section-title" data-aos="fade-in" data-aos-delay="100">
            <h2>Cara Pemesanan</h2>
            <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
          </div>
<!-- ======= Isi cara pemesanan ======= -->
        <div class="text-center">
          <img src="{{ asset('user/assets/img/portfolio/portfolio-3.jpg')}}" class="img-fluid" alt="">
        </div>
      </div>
    </section><!-- End About Section -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services">
      <div class="container">

        <div class="section-title" data-aos="fade-in" data-aos-delay="100">
          <h2>Produk</h2>
          <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
        </div>

        <div class="row">
            @foreach($produk as $p)
                <div class="col-sm-4 mb-3 mb-sm-0">
                    <div class="card">
                        <img src="/produk/{{ $p->gambar}}" class="card-img-top img-thumbnail img-fluid" alt="...">
                        <div class="card-body">
                          <h5 class="card-title"><p class="upper">{{ $p->nama_produk }} {{ $p->lebar }}X{{ $p->tinggi }}</p></h5>
                          <h5 class="card-title"><p class="upper">Rp. {{ $p->harga }}</p></h5>
                          <div class="row mx-auto">
                            <div class="col-md-6 d-grid gap-2">
                            <a href="/detailproduk/{{ $p->id_produk }}" class="btn btn-warning"><i class='bx bx-search-alt' ></i> Detail</a>
                            </div>
                            <div class="col-md-6 d-grid gap-2">
                            <a href="#" class="btn btn-success"><i class='bx bxs-shopping-bag' ></i> Tambah </a>
                        </div>
                          </div>
                        </div>
                      </div>
                </div>
                @endforeach
        </div>

      </div>
    </section><!-- End Services Section -->


    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Hubungi Kami</h2>
          <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
        </div>

        <div class="row">
          <div class="col-lg-3 col-md-6">
            <div class="info-box mb-4">
              <i class="bx bx-map"></i>
              <h3>Alamat Kami</h3>
              <p>Jalan Raya Ploso, Ploso, Selopuro, Blitar</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="info-box  mb-4">
              <i class="bx bx-envelope"></i>
              <h3>Email</h3>
              <p>ciptobeton2024.com</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="info-box  mb-4">
              <i class="bx bx-phone-call"></i>
              <h3>Telepon</h3>
              <p>+62 815-1503-6800</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="info-box  mb-4">
                <i class='bx bxs-chat'></i>
              <h3>WhatsApp</h3>
              <a href="https://wa.me/6281515036800?text=Halo,%20saya%20ingin%20bertanya%20tentang%20produk%20Anda" target="_blank">Chat via WhatsApp</a>
            </div>
          </div>

        </div>

        <div class="row">

          <div class="col">
            <iframe class="mb-4 mb-lg-0" src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d3949.573715044814!2d112.329518!3d-8.144803999999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zOMKwMDgnNDEuMyJTIDExMsKwMTknNDYuMyJF!5e0!3m2!1sen!2sid!4v1715315223520!5m2!1sen!2sid" frameborder="0" style="border:0; width: 100%; height: 384px;" allowfullscreen></iframe>
          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>CiptoBeton.NikenCT</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/squadfree-free-bootstrap-template-creative/ -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{ asset('user/assets/vendor/purecounter/purecounter_vanilla.js')}}"></script>
  <script src="{{ asset('user/assets/vendor/aos/aos.js')}}"></script>
  <script src="{{ asset('user/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{ asset('user/assets/vendor/glightbox/js/glightbox.min.js')}}"></script>
  <script src="{{ asset('user/assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
  <script src="{{ asset('user/assets/vendor/swiper/swiper-bundle.min.js')}}"></script>
  <script src="{{ asset('user/assets/vendor/php-email-form/validate.js')}}"></script>
  <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('user/assets/js/main.js')}}"></script>

</body>

</html>
