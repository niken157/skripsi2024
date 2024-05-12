<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class PemesananController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $penjualan = DB::table('penjualan')
                     ->join('produk', 'penjualan.id_produk', '=', 'produk.id_produk')
                     ->where('keterangan', 'pesan')
                     //->where('nomer_penjualan','345235')
                    ->get();
        return view('admin.pemesanan.pemesanan',['penjualan' => $penjualan]);
    }
    public function tambah()
	{
		// memanggil view tambah
		return view('admin.pemesanan.tambah_pemesanan');
	}
	// method untuk insert data ke table penjualan
	public function store(Request $request)
	{
        // $validator = Validator::make($request->all(), [
        //     'id_produk' => 'required',
        //     'jumlah' => 'required',
        //     'nama_pembeli' => 'required',
		// 	'no_hp' => 'required',
		// 	'alamat' => 'required',
        //     'keterangan' => 'required',
        //     'created_at' => 'required',
        //     'updated_at' => 'required',
        // ]);
        // if ($validator->fails()) {
        //     return back()->withInput($request->all())->withErrors($validator);
        // }
		// insert data ke table penjualan
		DB::table('penjualan')->insert([
			'id_produk' => $request->id_produk,
			'jumlah' => $request->jumlah,
            'nomer_penjualan' => '346346',
			'nama_pembeli' => $request->nama_pembeli,
			'no_hp' => $request->no_hp,
            'alamat' => $request->alamat,
            'keterangan' => $request->keterangan,
            'created_at' => $request->created_at,
            'updated_at' => $request->updated_at
		]);
		return redirect('/pemesanan');
	}
	public function edit($id_penjualan)
	{
		// mengambil data produk berdasarkan id yang dipilih
		//$penjualan = DB::table('penjualan')->where('id_penjualan',$id_penjualan)->first();
        $penjualan = DB::table('penjualan')
        ->join('produk', 'penjualan.id_produk', '=', 'produk.id_produk')
        ->where('id_penjualan',$id_penjualan)->first();
		// passing data penjualan yang didapat ke view edit.blade.php
		return view('admin.pemesanan.edit_pemesanan',['penjualan' => $penjualan]);
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
		return redirect('/pemesanan');
	}
	// method untuk hapus data produk
	public function hapus($id_penjualan)
	{
		DB::table('penjualan')->where('id_penjualan',$id_penjualan)->delete();

		return redirect('/pemesanan');
	}
    public function hapus_s()
	{
		DB::table('penjualan')->truncate();
        alert()->info('Berhasil Menghapus','Data Semua pemesanan Telah Berhasil Dihapus');
		return redirect('/pemesanan');
	}

}
