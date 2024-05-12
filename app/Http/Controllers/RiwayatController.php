<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class RiwayatController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $penjualan = DB::table('penjualan')
                     ->join('produk', 'penjualan.id_produk', '=', 'produk.id_produk')
                     ->where('keterangan', 'selesai')
                     ->groupBy('nomer_penjualan')
                    ->get();
        $jumlah = DB::table('penjualan')
                    ->join('produk', 'penjualan.id_produk', '=', 'produk.id_produk')
                    ->groupBy('nomer_penjualan')
                    ->get();

       //Count(tb_sewa.jumlah_sewa)
        return view('admin.riwayat',['penjualan' => $penjualan,'jumlah' => $jumlah]);
    }
    public function detail($nomer_penjualan)
    {
        $penjualan = DB::table('penjualan')
                     ->join('produk', 'penjualan.id_produk', '=', 'produk.id_produk')
                     ->where('nomer_penjualan',$nomer_penjualan)
                     ->get();
        $pertama = DB::table('penjualan')
                     ->join('produk', 'penjualan.id_produk', '=', 'produk.id_produk')
                     ->where('nomer_penjualan',$nomer_penjualan)
                     ->first();
        $total_semua = DB::table('penjualan')
                            ->join('produk', 'penjualan.id_produk', '=', 'produk.id_produk')
                            ->where('nomer_penjualan',$nomer_penjualan)
                            //->sum('jumlah'*'harga');
                            ->sum(DB::raw('jumlah * harga'));

        return view('admin.detailriwayat',['penjualan' => $penjualan,'pertama' => $pertama,'total_semua' => $total_semua]);
    }
    public function cetak()
    {
        $penjualan = DB::table('penjualan')
                     ->join('produk', 'penjualan.id_produk', '=', 'produk.id_produk')
                     //->where('nomer_penjualan',$nomer_penjualan)
                     ->get();
            return view('admin.cetak',['penjualan' => $penjualan]);//variabel passing
    }

}
