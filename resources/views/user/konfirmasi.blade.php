@extends('user.templateuser')

@section('content')
@include('sweetalert::alert')
<main id="main">

    <!-- ======= Breadcrumbs Section ======= -->
    <section class="breadcrumbs">
      <div class="container">
<br>
        <div class="d-flex justify-content-between align-items-center">
          <h2><b>CHECKOUT</b></h2>
          {{-- <ol>
            <li><a href="index.html">Beranda</a></li>
            <li>Keranjang</li>
          </ol> --}}
        </div>

      </div>
    </section><!-- End Breadcrumbs Section -->

    <section class="inner-page">
      <div class="container">
        <p>
            pesenan selesai
        </p>
      </div>
    </section>

  </main><!-- End #main -->
  <br><br><br><br><br>
@endsection
