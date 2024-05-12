@extends('template')

@section('content')
<br>
<div class="card">
    <div class="card-header">
        <h3>FORM EDIT DATA PRODUK</h3>
      </div>
    <div class="card-body">
      <?php
        $date= date('d F Y, h:i:s A');
        ?>
    <form action="/produk/update" method="post">
        {{ csrf_field() }}
        <input type="hidden" name="id_produk" value="{{ $produk->id_produk }}">
        <div class="row">
    <div class="col">
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">NAMA PRODUK</label>
            <input name="nama_produk" type="text" class="form-control" id="exampleFormControlInput1" value="{{ $produk->nama_produk }}" required>
        </div>
    </div>
</div>
<div class="row">
    <div class="col">
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">LEBAR</label>
            <input name="lebar" type="number" class="form-control" id="exampleFormControlInput1" value="{{ $produk->lebar }}" required>
        </div>
    </div>
            <div class="col">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">TINGGI</label>
                    <input name="tinggi" type="number" class="form-control" id="exampleFormControlInput1" value="{{ $produk->tinggi }}" required>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">HARGA</label>
                    <input name="harga" type="number" class="form-control" id="exampleFormControlInput1" value="{{ $produk->harga }}" required>
                </div>
                    </div>
                    <div class="col">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">STOK</label>
                            <input name="stok" type="number" class="form-control" id="exampleFormControlInput1" value="{{ $produk->stok }}" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                <div class="col">
                    <div class="mb-3">
                    <label for="formFile" class="form-label">Upload Gambar</label><br>
                    <img src="/produk/{{ $produk->gambar}}" style="width: 120px;float: left;margin-bottom: 5px;">
                    <input name="gambar" class="form-control" type="file" id="formFile" value="{{ $produk->gambar }}">
                  </div>
                </div>
            </div>
            <div class="col"></div>
              </div>
        <input type="hidden" name="created_at" value="{{ $produk->created_at }}">
        <input type="hidden" name="updated_at" value="<?php echo date('Y-m-d h:i:s'); ?>">
        <input type="submit" value="Simpan Data" class="btn btn-primary">
    </form>
    </div>
</div>
@endsection
