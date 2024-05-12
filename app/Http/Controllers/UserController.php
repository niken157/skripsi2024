<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    // public function index()
    // {
    //     return view('user.index');
    // }

    public function index()
    {
        $produk = DB::table('produk')->orderBy('nama_produk', 'ASC')->get();
        $penjualan = DB::table('penjualan')
                     ->join('produk', 'penjualan.id_produk', '=', 'produk.id_produk')
                    //  ->groupBy('nomer_penjualan')
                     ->where('keterangan', 'pesan')
                    ->get();
        $pemesanan = DB::table('penjualan')
                     ->join('produk', 'penjualan.id_produk', '=', 'produk.id_produk')
                     ->where('keterangan', 'pesan')
                    ->get();
        $riwayat = DB::table('penjualan')
                     ->join('produk', 'penjualan.id_produk', '=', 'produk.id_produk')
                    ->where('keterangan', 'selesai')
                    ->get();
        return view('user.index',['produk' => $produk,'penjualan' => $penjualan,'pemesanan' => $pemesanan,'riwayat' => $riwayat]);

    }
    public function nolog()
    {
        $produk = DB::table('produk')->orderBy('nama_produk', 'ASC')->get();
        $penjualan = DB::table('penjualan')
                     ->join('produk', 'penjualan.id_produk', '=', 'produk.id_produk')
                    //  ->groupBy('nomer_penjualan')
                     ->where('keterangan', 'pesan')
                    ->get();
        $pemesanan = DB::table('penjualan')
                     ->join('produk', 'penjualan.id_produk', '=', 'produk.id_produk')
                     ->where('keterangan', 'pesan')
                    ->get();
        $riwayat = DB::table('penjualan')
                     ->join('produk', 'penjualan.id_produk', '=', 'produk.id_produk')
                    ->where('keterangan', 'selesai')
                    ->get();
        return view('user.indexnolog',['produk' => $produk,'penjualan' => $penjualan,'pemesanan' => $pemesanan,'riwayat' => $riwayat]);

    }
}
