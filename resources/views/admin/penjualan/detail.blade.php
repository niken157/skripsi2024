
@extends('template')

@section('content')
@include('sweetalert::alert')
<style>
    td {
        font-size: 14px;
    }
    .col {
        font-size: 14px;
    }
    .upper { text-transform: uppercase; }
</style>
<br>
    <div class="card mb-4">
    <div class="card-header">
            <!-- <i class="fas fa-table me-1"></i> -->
            <span style=" font-size: 1cm;">
            DETAIL PENJUALAN
            <span style="float: right">
            {{-- <a class="align-items-center justify-content-between btn btn-primary" href="/pemesanan/tambah" role="button"><i class="fas fa-fw fa-plus"></i> Tambah</a> --}}
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg"><i class="fas fa-fw fa-plus"></i>&nbsp;Tambah Data</button>

            <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Produk</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                    <div class="table">
                    <div class="row">
                    <div class="col-sm">
                        <div class="card">
                        <div class="card-body">
                            <form action="/penjualan/store" method="POST">
                            @csrf
                            <fieldset>
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label for="id_produk" class="form-label">NAMA PRODUK :</label><br>
                                            <select class="selectpicker" data-live-search="true" name="id_produk" data-width="100%" class="form-select" id="id_produk" visibleOptions="true">
                                                @php
                                                $produk = DB::table('produk')->get();
                                                @endphp
                                            @foreach($produk as $p)
                                                <option value="{{ $p->id_produk }}">{{ $p->nama_produk }} {{ $p->lebar }}X{{ $p->tinggi }}</option>

                                            @endforeach
                                            </select>
                                        </div>
                                    </div>
                            </div>
                            <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">JUMLAH</label>
                                    <input name="jumlah" type="number" class="form-control @error('jumlah') is-invalid @enderror" id="exampleFormControlInput1" value="{{ old('jumlah') }}" required>
                                    @error('jumlah')
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
                                            <label for="keterangan">KETERANGAN:</label>
                                    <select name="keterangan" required="reqired" class="form-select" id="keterangan">
                                    <option value="pesan" selected >Pesan</option>
                                    <option value="selesai" >Selesai</option>
                                    </select>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <input type="hidden" name="nama_pembeli" value="{{ $pertama->nama_pembeli}}">
                                <input type="hidden" name="no_hp" value="{{ $pertama->no_hp}}">
                                <input type="hidden" name="alamat" value="{{ $pertama->alamat}}">
                                <input type="hidden" name="nomer_penjualan" value="{{ $pertama->nomer_penjualan}}">
                                <input type="hidden" name="created_at" value="<?php echo date('Y-m-d h:i:s'); ?>">
                                <input type="hidden" name="updated_at" value="<?php echo date('Y-m-d h:i:s'); ?>">
                                <input type="submit" value="SIMPAN DATA" class="btn btn-primary">
                                </fieldset>
                        </form>
                        </div>
                        </div>
                        </div>
                        </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>

            <a class="align-items-center justify-content-between btn btn-danger" onclick="return confirm('Apakah Anda Yakin Menghapus Semua Data?')" href="/penjualan/hapus_kelompok/{{ $pertama->nomer_penjualan }}" role="button"><i class="fas fa-fw fa-trash"></i> Batal Pesanan</a>
        </div>
        <div class="card-body table-responsive">
            <form>
                <div class="no-line-break" >
                        &nbsp; &nbsp; &nbsp;<h6>No Penjualan : {{ $pertama->nomer_penjualan}} </h6>
                        &nbsp; &nbsp; &nbsp;<h6>Nama Pembeli : {{ $pertama->nama_pembeli}} </h6>
                        &nbsp; &nbsp; &nbsp;<h6>Nomer HP : {{ $pertama->no_hp}} </h6>
                        &nbsp; &nbsp; &nbsp;<h6>Alamat : {{ $pertama->alamat}} </h6>
                </div>

              </form>
            <table class="table table-striped table-hover" id="datatablesSimple">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Produk</th>
                        <th>Jumlah</th>
                        <th>Harga</th>
                        <th>Total</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $no = 1;
                         @endphp
                    @foreach($penjualan as $u)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $u->nama_produk }} | {{ $u->lebar }}X{{ $u->tinggi }}</td>
                            <td>{{ $u->jumlah}}</td>
                            @php
                            $rupiah = number_format($u->harga, 0, ',', '.') . ',00'; // Format: 1.000.000
                            $total = $u->harga*$u->jumlah;
                            $ttl = number_format($total, 0, ',', '.') . ',00'; // Format: 1.000.000
                            @endphp
                            <td>Rp.{{ $rupiah}}</td>
                            <td>Rp.{{ $ttl}}</td>
                            <td>
                                {{-- <a class="btn btn-outline-primary" href="/penjualan/edit/{{ $u->id_penjualan }}" role="button" title="Edit Data"><i class="fas fa-fw fa-edit"></i></a> --}}

                                <a class="btn btn-outline-danger" onclick="return confirm('Apakah Anda Yakin Menghapus Data Ini?')" href="/penjualan/hapus/{{ $u->id_penjualan }}" role="button" title="Hapus Data"><i class="fas fa-fw fa-trash"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    <tr>
                        <td></td>
                        <th><b>Total Semua :</b></th>
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
            <a class="btn btn-outline-success" href="selesai/{{ $pertama->nomer_penjualan }}" role="button" title="Pesanan Selesai"><i class="fa-solid fa-check-to-slot"></i>&nbsp;Pesanan Selesai</a>
            <a class="btn btn-outline-primary" href="nota/{{ $pertama->nomer_penjualan }}" role="button" title="Cetak Data Penjualan"><i class="fa-solid fa-print"></i>&nbsp;Nota</a>
        </div>
    </div>


@endsection
