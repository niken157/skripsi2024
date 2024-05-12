@extends('template')

@section('content')
<br>
<div class="card">
    <div class="card-header">
        <h3>FORM EDIT DATA PENJUALAN</h3>
      </div>
    <div class="card-body">
      <?php
        $date= date('d F Y, h:i:s A');
        ?>
    <form action="/penjualan/update" method="post">
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
        </div>
    <div class="row">
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
                    <label for="keterangan">KETERANGAN:</label>
            <select name="keterangan" required="reqired" class="form-select" id="keterangan">
            <option value="{{ $penjualan->keterangan }}">{{ $penjualan->keterangan }}</option>
            <option value="pesan" @if ($penjualan->keterangan=="pesan") selected @endif>Pesan</option>
            <option value="selasai" @if ($penjualan->keterangan=="selasai") selected @endif>Selasai</option>
            </select>
                </div>
            </div>
        </div>
        <input type="hidden" name="nama_pembeli" value="{{ $penjualan->nama_pembeli}}">
                                <input type="hidden" name="no_hp" value="{{ $penjualan->no_hp}}">
                                <input type="hidden" name="alamat" value="{{ $penjualan->alamat}}">
                                <input type="hidden" name="nomer_penjualan" value="{{ $penjualan->nomer_penjualan}}">
        <input type="hidden" name="created_at" value="{{ $penjualan->created_at }}">
        <input type="hidden" name="updated_at" value="<?php echo date('Y-m-d h:i:s'); ?>">
        <input type="submit" value="Simpan Data" class="btn btn-primary">
    </form>
    </div>
</div>
@endsection
