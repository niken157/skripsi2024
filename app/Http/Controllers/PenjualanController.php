<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class PenjualanController extends Controller
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
                     ->groupBy('nomer_penjualan')
                    ->get();
        $jumlah = DB::table('penjualan')
                    ->join('produk', 'penjualan.id_produk', '=', 'produk.id_produk')
                    ->groupBy('nomer_penjualan')
                    ->get();

       //Count(tb_sewa.jumlah_sewa)
        return view('admin.penjualan.penjualan',['penjualan' => $penjualan,'jumlah' => $jumlah]);
    }
    public function detailshow($nomer_penjualan)
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

        return view('admin.penjualan.detail',['penjualan' => $penjualan,'pertama' => $pertama,'total_semua' => $total_semua]);
    }
    public function cetak($nomer_penjualan)
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

        return view('admin.cetak',['penjualan' => $penjualan,'pertama' => $pertama,'total_semua' => $total_semua]);
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
            'nomer_penjualan' => $request->nomer_penjualan,
			'nama_pembeli' => $request->nama_pembeli,
			'no_hp' => $request->no_hp,
            'alamat' => $request->alamat,
            'keterangan' => $request->keterangan,
            'created_at' => $request->created_at,
            'updated_at' => $request->updated_at
		]);
		//return redirect('/penjualan');
        return redirect()->back()->with('success', 'Data Telah Ditambahkan');
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
            'nomer_penjualan' => $request->nomer_penjualan,
			'nama_pembeli' => $request->nama_pembeli,
			'no_hp' => $request->no_hp,
            'alamat' => $request->alamat,
            'keterangan' => $request->keterangan,
            'created_at' => $request->created_at,
            'updated_at' => $request->updated_at
		]);
		return redirect('/penjualan');
        //return redirect()->back()->with('success', 'Data Telah Diubah');
	}
	// method untuk hapus data produk
	public function hapus($id_penjualan)
	{
		DB::table('penjualan')->where('id_penjualan',$id_penjualan)->delete();

		return redirect('/penjualan');
	}
    public function hapus_s($nomer_penjualan)
	{
		DB::table('penjualan')->where('nomer_penjualan',$nomer_penjualan)->delete();
        alert()->info('Berhasil Menghapus','Data penjualan Telah Berhasil Dihapus');
		return redirect('/penjualan');
	}
    public function updateData($nomer_penjualan)
{

    $dataToUpdate = DB::table('penjualan')->get();

foreach ($dataToUpdate as $data) {
    // Lakukan perubahan pada data
    // Misalnya:
    // $data->field1 = 'New Value 1';
    // $data->field2 = 'New Value 2';

    // Simpan perubahan menggunakan metode query builder
    DB::table('penjualan')
    ->where('nomer_penjualan',$nomer_penjualan)
        ->update([
            'keterangan' => 'selesai',
            // Tambahkan perubahan pada kolom lain sesuai kebutuhan
        ]);
}
alert()->info('Pesanan Selesai','Data penjualan Telah Selesai Dikirim');
return redirect('/penjualan');

}
}
