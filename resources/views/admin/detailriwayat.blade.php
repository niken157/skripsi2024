
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
            DETAIL PENJUALAN
            <span style="float: right">

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
                    </tr>
                </tbody>
            </table>
            <a class="btn btn-outline-primary" href="nota/{{ $pertama->nomer_penjualan }}" role="button" title="Cetak Data Penjualan"><i class="fa-solid fa-print" target="_blank"></i>&nbsp;Nota</a>
        </div>
    </div>
    

@endsection
