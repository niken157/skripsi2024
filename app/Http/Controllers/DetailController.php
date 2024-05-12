<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class DetailController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index($nomer_penjualan)
    {
        $penjualan = DB::table('penjualan')
                     ->join('produk', 'penjualan.id_produk', '=', 'produk.id_produk')
                     ->where('nomer_penjualan',$nomer_penjualan)
                     //->groupBy('nomer_penjualan')
                    ->get();
       //Count(tb_sewa.jumlah_sewa)
        return view('admin.penjualan.detail',['penjualan' => $penjualan]);
    }
    public function tambah()
	{
		// memanggil view tambah
		return view('admin.penjualan.tambah_penjualan');
	}
	// method untuk insert data ke table penjualan
	public function store(Request $request)
	{
		// insert data ke table penjualan
		DB::table('penjualan')->insert([
			'id_produk' => $request->id_produk,
			'jumlah' => $request->jumlah,
			'nama_pembeli' => $request->nama_pembeli,
			'no_hp' => $request->no_hp,
            'alamat' => $request->alamat,
            'keterangan' => $request->keterangan,
            'created_at' => $request->created_at,
            'updated_at' => $request->updated_at
		]);
		return redirect('/penjualan');
	}
	public function edit($id_penjualan)
	{
		// mengambil data produk berdasarkan id yang dipilih
		//$penjualan = DB::table('penjualan')->where('id_penjualan',$id_penjualan)->first();
        $penjualan = DB::table('penjualan')
        ->join('produk', 'penjualan.id_produk', '=', 'produk.id_produk')
        ->where('id_penjualan',$id_penjualan)->first();
		// passing data penjualan yang didapat ke view edit.blade.php
		return view('admin.penjualan.edit_penjualan',['penjualan' => $penjualan]);
	}
	// update data produk
	public function update(Request $request)
	{
		// update data produk
		DB::table('penjualan')->where('id_penjualan',$request->id_penjualan)->update([
			'id_produk' => $request->id_produk,
			'jumlah' => $request->jumlah,
			'nama_pembeli' => $request->nama_pembeli,
			'no_hp' => $request->no_hp,
            'alamat' => $request->alamat,
            'keterangan' => $request->keterangan,
            'created_at' => $request->created_at,
            'updated_at' => $request->updated_at
		]);
		return redirect('/penjualan');
	}
	// method untuk hapus data produk
	public function hapus($id_penjualan)
	{
		DB::table('penjualan')->where('id_penjualan',$id_penjualan)->delete();

		return redirect('/penjualan');
	}
    public function hapus_s()
	{
		DB::table('penjualan')->truncate();
        alert()->info('Berhasil Menghapus','Data Semua penjualan Telah Berhasil Dihapus');
		return redirect('/penjualan');
	}

}
