@extends('template')

@section('content')
<br>
<div class="card">
    <div class="card-header">
        <h3>FORM EDIT DATA PEMESANAN</h3>
      </div>
    <div class="card-body">
      <?php
        $date= date('d F Y, h:i:s A');
        ?>
    <form action="/pemesanan/update" method="post">
        {{ csrf_field() }}
        <input type="hidden" name="id_penjualan" value="{{ $penjualan->id_penjualan }}">
        <div class="row">
            <div class="col">
                <div class="mb-3">
                    <label for="id_produk" class="form-label">NAMA PRODUK :</label><br>
                    <select class="selectpicker" data-live-search="true" name="id_produk" data-width="100%" class="form-select" id="id_produk" visibleOptions="true">
                        @php
                        $produk = DB::table('produk')->get();
                        @endphp
                        <option value="{{ $penjualan->id_produk }}">{{ $penjualan->nama_produk }} {{ $penjualan->lebar }}X{{ $penjualan->tinggi }}</option>
                    @foreach($produk as $p)
                        <option value="{{ $p->id_produk }}">{{ $p->nama_produk }} {{ $p->lebar }}X{{ $p->tinggi }}</option>
                    @endforeach
                    </select>
                </div>
    </div>
    <div class="col">
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">JUMLAH</label>
            <input name="jumlah" type="number" class="form-control" id="exampleFormControlInput1" value="{{ $penjualan->jumlah }}" required>
        </div>
        </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">NAMA PEMBELI</label>
            <input name="nama_pembeli" type="text" class="form-control" id="exampleFormControlInput1" value="{{ $penjualan->nama_pembeli }}" required>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">NO HP</label>
            <input name="no_hp" type="text" class="form-control" id="exampleFormControlInput1" value="{{ $penjualan->no_hp }}" required>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Alamat</label>
            <textarea name="alamat" class="form-control" id="exampleFormControlTextarea1" rows="3" required><?php echo $penjualan->alamat; ?></textarea>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="mb-3">
                    <label for="keterangan">KETERANGAN:</label>
            <select name="keterangan" required="reqired" class="form-select" id="keterangan">
            <option value="{{ $penjualan->keterangan }}">{{ $penjualan->keterangan }}</option>
            <option value="pesan" @if ($penjualan->keterangan=="pesan") selected @endif>Pesan</option>
            <option value="selasai" @if ($penjualan->keterangan=="selasai") selected @endif>Selasai</option>
            </select>
                </div>
            </div>
        </div>
        <input type="hidden" name="created_at" value="{{ $penjualan->created_at }}">
        <input type="hidden" name="updated_at" value="<?php echo date('Y-m-d h:i:s'); ?>">
        <input type="submit" value="Simpan Data" class="btn btn-primary">
    </form>
    </div>
</div>
@endsection
