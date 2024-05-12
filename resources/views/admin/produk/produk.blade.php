
@extends('template')

@section('content')
@include('sweetalert::alert')
<style>
    td {
        font-size: 14px;
    }
    .upper { text-transform: uppercase; }
</style>
<br>
    <div class="card mb-4">
    <div class="card-header">
            <!-- <i class="fas fa-table me-1"></i> -->
            <span style=" font-size: 1cm;">
            DATA PRODUK
            <span style="float: right">
            <a class="align-items-center justify-content-between btn btn-primary" href="/produk/tambah" role="button"><i class="fas fa-fw fa-plus"></i> Tambah Data</a>
            <a class="align-items-center justify-content-between btn btn-danger" onclick="return confirm('Apakah Anda Yakin Menghapus Semua Data?')" href="/produk/hapus_semua" role="button"><i class="fas fa-fw fa-trash"></i> Hapus Semua</a>
        </div>
        <div class="card-body table-responsive">
            <table class="table table-striped table-hover" id="datatablesSimple">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>GAMBAR</th>
                        <th class="col-xs-1">NAMA PRODUK</th>
                        <th>UKURAN</th>
                        <th>HARGA</th>
                        <th>STOK</th>
                        <th class="col-xs-1">AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    @php $no = 1; @endphp
                    @foreach($produk as $p)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td><img src="/produk/{{ $p->gambar}}" style="width: 100px;float: left;margin-bottom: 5px;"></td>
                            <td><p class="upper">{{ $p->nama_produk }}</p></td>
                            <td>{{ $p->lebar }}X{{ $p->tinggi }}</td>
                            <td>{{ $p->harga }}</td>
                            <td>{{ $p->stok }}</td>
                            <td>
                                <a class="btn btn-outline-primary" href="/produk/edit/{{ $p->id_produk }}" role="button" title="Edit Data Produk"><i class="fas fa-fw fa-edit"></i></a>

                                <a class="btn btn-outline-danger" onclick="return confirm('Apakah Anda Yakin Menghapus Data Ini?')" href="/produk/hapus/{{ $p->id_produk }}" role="button" title="Hapus Data Produk"><i class="fas fa-fw fa-trash"></i></a>
                            </td>
                        </tr>
                        @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
