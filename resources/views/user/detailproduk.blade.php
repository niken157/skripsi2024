@extends('user.templateuser')

@section('content')
@include('sweetalert::alert')
<main id="main">

    <!-- ======= Breadcrumbs Section ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
<h2></h2>
          <ol>
            <li><a href="/utama">Beranda</a></li>
            <li>Produk</li>
            <li>{{ $produk->nama_produk }} {{ $produk->lebar }}X{{ $produk->tinggi }}</p></li>
          </ol>
        </div>

      </div>
    </section><!-- Breadcrumbs Section -->

    <!-- ======= Portfolio Details Section ======= -->
    <section id="portfolio-details" class="portfolio-details">
      <div class="container">

        <div class="row gy-4">

          <div class="col-lg-6">
            <div class="portfolio-details-slider swiper">
              <div class="swiper-wrapper align-items-center">

                <div class="swiper-slide">
                  <img src="/produk/{{ $produk->gambar}}" style="width: 600px;" alt="">
                </div>

                {{-- <div class="swiper-slide">
                  <img src="/produk/{{ $produk->gambar}}" alt="">
                </div>

                <div class="swiper-slide">
                  <img src="/produk/{{ $produk->gambar}}" alt="">
                </div> --}}

              </div>
              <div class="swiper-pagination"></div>
            </div>
          </div>

          <div class="col-lg-6">
            <div class="portfolio-info">
                <form action="/detailproduk/store" method="post">
                    {{ csrf_field() }}
                    <input type="hidden" name="id_users" value="{{ Auth::user()->id }}">
                    <input type="hidden" name="id_produk" value="{{ $produk->id_produk }}">
              <h3>Detail Produk</h3>
              <ul>
                <li class="upper"><strong>Nama Produk</strong>: {{ $produk->nama_produk }}</li>
                <li class="upper"><strong>Ukuran</strong>: {{ $produk->lebar }}X{{ $produk->tinggi }}</li>
                <li class="upper"><strong>Harga</strong>: Rp.{{ $produk->harga }}</li>
                <li class="upper"><strong>Jumlah</strong>: <input type="number" name="jumlah" class="form-control" style="text-align: center;"></li>
              </ul>
              <input type="hidden" name="harga" value="{{ $produk->harga }}">
              <input type="hidden" name="created_at" value="<?php echo date('Y-m-d h:i:s'); ?>">
                <input type="hidden" name="updated_at" value="<?php echo date('Y-m-d h:i:s'); ?>">
                <input type="submit" value="Masukkan Keranjang" class="btn btn-primary">
            </div>
        </div>
        </form>

        </div>

      </div>
    </section><!-- End Portfolio Details Section -->

  </main><!-- End #main -->
@endsection
