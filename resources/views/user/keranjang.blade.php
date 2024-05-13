@extends('user.templateuser')

@section('content')
@include('sweetalert::alert')
<main id="main">

    <!-- ======= Breadcrumbs Section ======= -->
    <section class="breadcrumbs">
      <div class="container">
<br>
        <div class="d-flex justify-content-between align-items-center">
          <h2><b>Keranjang {{ Auth::user()->name }}</b></h2>
          <ol>
            <li><a href="index.html">Beranda</a></li>
            <li>Keranjang</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs Section -->

    <section class="inner-page">
      <div class="container">
        <p>
            <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col" class="upper">No</th>
                    <th scope="col" class="upper">Gambar</th>
                    <th scope="col" class="upper">Produk</th>
                    <th scope="col" class="upper">Harga</th>
                    <th scope="col" class="upper">Jumlah</th>
                    <th scope="col" class="upper">SubTotal</th>
                    <th scope="col" class="upper">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                    @php $no = 1; @endphp
                    @foreach($keranjang as $p)
                  <tr>
                    <td>{{ $no++ }}</td>
                    <td><img src="/produk/{{ $p->gambar}}" style="width: 100px;float: left;margin-bottom: 5px;"></td>
                    <td><p class="upper">{{ $p->nama_produk }} {{ $p->lebar }}X{{ $p->tinggi }}</p></td>
                    @php
                            $rupiah = number_format($p->harga, 0, ',', '.') . ',00'; // Format: 1.000.000
                            $total = $p->harga*$p->jumlah;
                            $ttl = number_format($total, 0, ',', '.') . ',00'; // Format: 1.000.000
                            @endphp
                    <td>Rp.{{ $rupiah }}</td>
                    <td>{{ $p->jumlah }}</td>
                    {{-- <td><input type="number" name="jumlah" class="form-control" style="text-align: center;"></td> --}}
                    <td>Rp.{{ $ttl }}</td>
                    <td>  <a class="btn btn-outline-danger" onclick="return confirm('Apakah Anda Yakin Menghapus Data Ini?')" href="/keranjang/hapus/{{ $p->id_keranjang }}" role="button" title="Hapus"><i class="fas fa-fw fa-trash"></i>Hapus</a></td>
                  </tr>
                    @endforeach
                    <tr>
                        <td></td>
                        <th><b class="upper">Total Semua :</b></th>
                        <td></td>
                        <td></td>
                        <td></td>
                        @php
                            $semua = number_format($total_semua, 0, ',', '.') . ',00'; // Format: 1.000.000
                            @endphp
                        <th ><b>Rp.{{ $semua}}</b></th>
                        <td></td>
                    </tr>
                </tbody>
              </table>
            <tr>
                <td colspan="7" style="text-align: right; font-weight: bold;"><a href="/utama#services" class="btn btn-success">Lanjutkan Belanja</a> <a href="/checkout/{{ Auth::user()->id }}" class="btn btn-primary">Checkout</a></td>
            </tr>
        </p>
      </div>
    </section>

  </main><!-- End #main -->
  <br><br><br><br><br>
@endsection
