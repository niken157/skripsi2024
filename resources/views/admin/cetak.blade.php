<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nota Pembelian Beton</title>
    <style>
        /* Styling untuk nota */
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        .nota {
            border: 1px solid #ccc;
            padding: 20px;
            max-width: 600px;
            margin: 0 auto;
            min-height: 580px; /* Tinggi minimal untuk nota */
        }
        .melayani {
            border: 2px solid #010101;
            padding: 20px;
            max-width: 250px;
            margin: 0 auto;
            font-size: 12px;
            min-height: 60px; /* Tinggi minimal untuk nota */
            text-align: center;
        }
        .info-pelanggan {
            margin-bottom: 20px;
        }
        .info-pelanggan p {
            margin: 5px 0;
        }
        .detail-pembelian table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        .detail-pembelian th, .detail-pembelian td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: left;
        }
        .detail-pembelian th {
            background-color: #f2f2f2;
        }
        .keterangan-kiri, .keterangan-kanan {
            width: 50%;
            float: left;
        }
        .keterangan-kiri img {
            max-width: 400px;
            margin: 0px;
            /* min-height: 100px; */
        }
        .keterangan-kiri {
            text-align: left;
        }
        .keterangan-kanan {
            text-align: right;
        }
        .ttd {
            clear: both;
            text-align: center;
            margin-top: 50px;
        }
    </style>
</head>
<body>
    <?php
    function tgl_indo($tanggal){
        $bulan = array (
            1 =>   'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember'
        );
        $pecahkan = explode('-', $tanggal);

        // variabel pecahkan 0 = tanggal
        // variabel pecahkan 1 = bulan
        // variabel pecahkan 2 = tahun

        return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
    }?>
    <div class="nota">
        <!-- Keterangan Kiri -->
        <div class="keterangan-kiri">
            <img src="{{ asset('cb.png') }}">
            {{-- <p><strong>Alamat:</strong> Jl. Pahlawan No. 123</p>
            <p><strong>No. Telepon:</strong> 081234567890</p> --}}
        </div>

        <!-- Keterangan Kanan -->
        <div class="keterangan-kanan">
            <p>Blitar, <?php echo tgl_indo(date('Y-m-d')); ?></p>
            <p>Kepada Yth. {{ $pertama->nama_pembeli}}</p>
            <p><strong>No. Nota:</strong> {{ $pertama->nomer_penjualan}}/<?php echo date('F/Y'); ?></p>
            <!-- Tambahkan keterangan lain di sini -->
        </div>

        <!-- Detail Pembelian -->
        <div class="detail-pembelian">
            <table>
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Banyaknya</th>
                        <th>Nama Barang</th>
                        <th>Harga Satuan (Rp)</th>
                        <th>Jumlah (Rp)</th>
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
                            $rupiah = number_format($u->harga, 0, ',', '.'); // Format: 1.000.000
                            $total = $u->harga*$u->jumlah;
                            $ttl = number_format($total, 0, ',', '.'); // Format: 1.000.000
                            @endphp
                            <td>Rp.{{ $rupiah}}</td>
                        <td>Rp.{{ $ttl}}</td>
                    </tr>
                    @endforeach
                    <!-- Tambahkan baris data lain sesuai dengan kebutuhan -->
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><p><strong>Total :</strong></p></td>
                        @php
                            $semua = number_format($total_semua, 0, ',', '.'); // Format: 1.000.000
                            @endphp
                        <th ><b>Rp.{{ $semua}}</b></th>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Tanda Tangan -->
        <div class="ttd">
            <div class="keterangan-kiri">
                <p><center>Tanda Terima:<center></p><br>
                <p>_________________</p>
            </div>
            <div class="keterangan-kanan">
                <p><center>Hormat kami:<center></p><br>
                <p>_________________</p>
            </div>
        </div>
    </div>
    <script>
		window.print();
	</script>
</body>
</html>
