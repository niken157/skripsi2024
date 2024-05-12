
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
            RIWAYAT PENJUALAN
            <span style="float: right">
</div>
        <div class="card-body table-responsive">
            <table class="table table-striped table-hover" id="datatablesSimple">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nomer Penjualan</th>
                        <th>Nama Pembeli</th>
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
                            $total_semua = DB::table('penjualan')
                            ->join('produk', 'penjualan.id_produk', '=', 'produk.id_produk')
                            ->where('nomer_penjualan',$u->nomer_penjualan)
                            ->sum(DB::raw('jumlah * harga'));
                            $semua = number_format($total_semua, 0, ',', '.') . ',00'; // Format: 1.000.000
                            @endphp
                        <th ><b>Rp.{{ $semua}}</b></th>
                            <td>
                                <a class="btn btn-outline-warning" href="riwayatt/{{ $u->nomer_penjualan }}" role="button" title="Edit Data Penjualan"><i class="fas fa-search"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
