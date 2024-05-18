@extends('user.templateuser')

@section('content')
@include('sweetalert::alert')
<main id="main">

    <!-- ======= Breadcrumbs Section ======= -->
    <section class="breadcrumbs">
      <div class="container">
<br>
        <div class="d-flex justify-content-between align-items-center">
          <h2><b>Konfirmasi Penjualan</b></h2>
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
            Pesanan diproses <br> Silahkan Klik tombol dibawah untuk melakukan konfirmasi penjualan dan mengirim bukti Screenshot
        </p>
        <a href="https://api.whatsapp.com/send?phone=6281515036800&text=Halo%20Admin%20Saya%20Mau%20Order%0ANama:%20{{ Auth::user()->name }}%0ABagaimana%20cara%20pembayaran?" target="_blank">Chat via WhatsApp</a>
      </div>
    </section>

  </main><!-- End #main -->
  <br><br><br><br><br><br><br><br><br><br><br><br>
@endsection
