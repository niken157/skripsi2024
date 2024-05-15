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
            <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col" class="upper">No</th>
                    <th scope="col" class="upper">Produk</th>
                    <th scope="col" class="upper">Harga</th>
                    <th scope="col" class="upper">Jumlah</th>
                    <th scope="col" class="upper">SubTotal</th>
                  </tr>
                </thead>
                <tbody>
                    @php $no = 1; @endphp
                    @foreach($keranjang as $p)
                  <tr>
                    <td>{{ $no++ }}</td>
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
                     </tr>
                    @endforeach
                    <tr>
                        <td></td>
                        <th><b class="upper">Total Semua :</b></th>
                        <td></td>
                        <td></td>
                        @php
                            $semua = number_format($total_semua, 0, ',', '.') . ',00'; // Format: 1.000.000
                            @endphp
                        <th ><b>Rp.{{ $semua}}</b></th>
                    </tr>

                </tbody>
              </table>
              <div class="alert alert-primary" role="alert">
                Pastikan Pesanan Anda Sudah Benar
              </div>
              <div class="alert alert-success" role="alert">
                isi Form dibawah ini
              </div>
              <div class="card">
                <div class="card-body">
                    <form action="/checkoutproses" method="POST">
                    @csrf
                    <fieldset>
                        @php
                        $nomor_sewa=rand(1000000,9999999);
                        @endphp
                        <input type="hidden" name="nomer_penjualan" value="{{ $nomor_sewa }}?>">
                        <div class="row">
                          <div class="col">
                              <div class="mb-3">
                                  <label for="exampleFormControlInput1" class="form-label">Nama</label>
                          <input name="nama_pembeli" type="text" class="form-control @error('nama_pembeli') is-invalid @enderror" id="exampleFormControlInput1" value="{{ old('nama_pembeli') }}" required>
                          @error('nama_pembeli')
                              <span class="invalid-feedback" role="alert">
                              <strong>{{$message}}</strong>
                              </span>
                          @enderror
                              </div>
                          </div>
                      </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">NO HP</label>
                                <input name="no_hp" type="text" class="form-control @error('no_hp') is-invalid @enderror" id="exampleFormControlInput1" value="{{ old('no_hp') }}" required>
                                @error('no_hp')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                    </span>
                                @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Alamat</label>
                                <textarea name="alamat" class="form-control" id="exampleFormControlTextarea1" rows="3" required></textarea>
                                    </div>
                                </div>
                            </div>
                            {{-- <input type="hidden" name="nama_pembeli" value="{{ Auth::user()->name }}"> --}}
                            <input type="hidden" name="keterangan" value="pesan">
                            <input type="hidden" name="created_at" value="<?php echo date('Y-m-d h:i:s'); ?>">
                            <input type="hidden" name="updated_at" value="<?php echo date('Y-m-d h:i:s'); ?>">
                        <input type="submit" value="Order Sekarang" class="btn btn-primary">
                        <a href="/keranjang/{{ Auth::user()->id }}" class="btn btn-danger">Cancel</a>
                        </fieldset>
                </form>
                </div>
                </div>
        </p>
      </div>
    </section>

  </main><!-- End #main -->
  <br><br><br><br><br>
@endsection
