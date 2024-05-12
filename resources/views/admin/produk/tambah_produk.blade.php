@extends('template')

@section('content')
<br>
<div class="card">
    <div class="card-header">
        <h3>FORM TAMBAH DATA PRODUK</h3>
      </div>
    <div class="card-body">
    <form action="/produk/store" method="post">
        {{ csrf_field() }}
        <div class="row">
    <div class="col">
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">NAMA PRODUK</label>
            <input name="nama_produk" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Masukkan nama produk " value="{{ old('nama_produk') }}" required>
        </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">LEBAR</label>
                    <input name="lebar" type="number" class="form-control" id="exampleFormControlInput1" value="{{ old('lebar') }}" required>
                </div>
            </div>
                    <div class="col">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">TINGGI</label>
                            <input name="tinggi" type="number" class="form-control" id="exampleFormControlInput1" value="{{ old('tinggi') }}" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">HARGA</label>
                            <input name="harga" type="number" class="form-control" id="exampleFormControlInput1" value="{{ old('harga') }}" required>
                        </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">STOK</label>
                                    <input name="stok" type="number" class="form-control" id="exampleFormControlInput1" value="{{ old('stok') }}" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                        <div class="col">
                            <div class="mb-3">
                              <label for="formFile" class="form-label">Upload gambar</label><br>
                              <input name="gambar" required="reqired" class="form-control" type="file" id="formFile">
                            </div>
                      </div>
                      <div class="col"></div>
                        </div>
        <div class="row">
    <div class="col">
        </div>
        </div>
        <input type="hidden" name="created_at" value="<?php echo date('Y-m-d h:i:s'); ?>">
        <input type="hidden" name="updated_at" value="<?php echo date('Y-m-d h:i:s'); ?>">
        <input type="submit" value="SIMPAN DATA" class="btn btn-primary">
    </form>
    </div>
</div>
@endsection
