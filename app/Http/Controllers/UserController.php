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
            // $ujian = DB::table('peserta')
            //          ->join('ujian', 'peserta.id_peserta', '=', 'ujian.id_peserta')
            //          ->join('ruangan', 'ujian.id_ruangan', '=', 'ruangan.id_ruangan')
            //          ->join('sesi', 'ujian.id_sesi', '=', 'sesi.id_sesi')
            //          ->groupBy('peserta.id_peserta')
            //          ->orderBy('peserta.nama_peserta', 'ASC')
            //          ->orderBy('ruangan.nama_ruangan', 'ASC')
            //          ->orderBy('ujian.nomor_pc', 'ASC')
            //         // ->where('keterangan', 'pinjam')
            //         ->get();
            //         $peserta = DB::table('peserta')->get();
            //         $ruangan = DB::table('ruangan')->get();
            //         $ruangan_ya = DB::table('ruangan')->where('keterangan', '=', 'ya')->get();
            //         $sesi = DB::table('sesi')->get();
            //         $uji = DB::table('ujian')->get();
            //         $setting = DB:: table('setting') ->first();
            // //tampilkan view barang dan kirim ujiannya ke view tersebut
            // return view('index',['ujian' => $ujian,'peserta' => $peserta,'ruangan' => $ruangan, 'sesi' => $sesi,'uji' => $uji,'setting' => $setting,'ruangan_ya' => $ruangan_ya]);

    }
}
