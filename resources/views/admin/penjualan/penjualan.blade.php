
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
            DATA PENJUALAN
            <span style="float: right">
            {{-- <a class="align-items-center justify-content-between btn btn-primary" href="/pemesanan/tambah" role="button"><i class="fas fa-fw fa-plus"></i> Tambah Data</a> --}}
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
                                @php
                                $nomor_sewa=rand(1000000,9999999);
                                @endphp
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                        <label for="nomer_penjualan">Nomer Penjualan : </label>
                                        <input class="form-control" name="nomer_penjualan" value="{{ $nomor_sewa }}"  type="number" placeholder="{{ $nomor_sewa }}" readonly>
                                      </div>
                                    </div>
                                </div>
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
                                </div></div>
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
                                                <label for="exampleFormControlInput1" class="form-label">NAMA PEMBELI</label>
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

                                    <input type="hidden" name="created_at" value="<?php echo date('Y-m-d h:i:s'); ?>">
                                    <input type="hidden" name="updated_at" value="<?php echo date('Y-m-d h:i:s'); ?>">
                                <input type="submit" value="SIMPAN DATA" class="btn btn-primary">
                                {{-- <input type="submit" value="Tambah" name="tambah_sewa" class="btn btn-outline-success btn-lg btn-block"> --}}
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
            {{-- <a class="align-items-center justify-content-between btn btn-danger" onclick="return confirm('Apakah Anda Yakin Menghapus Semua Data?')" href="/produk/hapus_semua" role="button"><i class="fas fa-fw fa-trash"></i> Hapus Semua</a> --}}
        </div>
        <div class="card-body table-responsive">
            <table class="table table-striped table-hover" id="datatablesSimple">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nomer Penjualan</th>
                        <th>Nama Pembeli</th>
                        <th>Jenis Produk</th>
                        <th>Total Harga Pembelian</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php $no = 1; @endphp
                    @foreach($penjualan as $u)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $u->nomer_penjualan}}</td>
                            <td><p class="upper">{{ $u->nama_pembeli }}</p></td>
                            @php
                                $up = DB::table('penjualan')
                                ->join('produk', 'penjualan.id_produk', '=', 'produk.id_produk')
                                ->where('nomer_penjualan',$u->nomer_penjualan)
                                ->get();
                            @endphp
                            <td>{{ $up->count()}}</td>
                            @php
                            $total_semua = DB::table('penjualan')
                            ->join('produk', 'penjualan.id_produk', '=', 'produk.id_produk')
                            ->where('nomer_penjualan',$u->nomer_penjualan)
                            ->sum(DB::raw('jumlah * harga'));
                            $semua = number_format($total_semua, 0, ',', '.') . ',00'; // Format: 1.000.000
                            @endphp
                        <th ><b>Rp.{{ $semua}}</b></th>
                            <td>
                                <a class="btn btn-outline-warning" href="detail/{{ $u->nomer_penjualan }}" role="button" title="Edit Data Penjualan"><i class="fas fa-search"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
