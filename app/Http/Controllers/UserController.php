<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

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
        return view('user.index',['produk' => $produk]);

    }
    public function nolog()
    {
        $produk = DB::table('produk')->orderBy('nama_produk', 'ASC')->get();
        return view('user.indexnolog',['produk' => $produk]);

    }
    public function keranjang($id_users)
    {
        $produk = DB::table('produk')->orderBy('nama_produk', 'ASC')->get();
        $keranjang = DB::table('produk')
                     ->join('keranjang', 'produk.id_produk', '=', 'keranjang.id_produk')
                     ->join('users', 'keranjang.id_users', '=', 'users.id')
                     ->where('users.id', $id_users)
                     //->groupBy('ruangan.keterangan_ruangan')
                    ->get();
        return view('user.keranjang',['produk' => $produk,'keranjang' => $keranjang]);

    }
    public function detail($id_produk)
    {
        $produk = DB::table('produk')->where('id_produk',$id_produk)->first();
        return view('user.detailproduk',['produk' => $produk]);

    }
    public function store(Request $request)
	{
		// insert data ke table keranjang
		DB::table('keranjang')->insert([
            'id_users' => $request->id_users,
			'id_produk' => $request->id_produk,
			'jumlah' => $request->jumlah,
            'harga' => $request->harga,
            'created_at' => $request->created_at,
            'updated_at' => $request->updated_at
		]);
        Alert::success('Hore!', 'Produk Masuk Keranjang');
        return redirect()->back();
		//return redirect()->back()->with('success', 'Data Telah Diubah');
	}
    public function hapus($id_keranjang)
	{
		DB::table('keranjang')->where('id_keranjang',$id_keranjang)->delete();

		return redirect()->back();
	}
}
