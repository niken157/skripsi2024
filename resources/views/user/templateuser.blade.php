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
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center justify-content-between position-relative">

      <div class="logo">
        <h1 class="text-light"><a href="/utama"><span>CiptoBeton</span></a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="/utama#hero">Utama</a></li>
          <li><a class="nav-link scrollto" href="/utama#services">Produk</a></li>
          <li><a class="nav-link scrollto" href="/utama#about">Cara Pesan</a></li>
          <li><a class="nav-link scrollto" href="/utama#contact">Hubungi Kami</a></li>
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

  @yield('content')

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
