@extends('template')

@section('content')
<br>
<div class="card">
    <div class="card-header">
        <h3>FORM TAMBAH DATA PEMESANAN</h3>
      </div>
    <div class="card-body">
    <form action="/pemesanan/store" method="post">
        {{ csrf_field() }}
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
    </form>
    </div>
</div>
@endsection
